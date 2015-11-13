<?php
	//URL variables
	$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$parseURL = parse_url($actual_link);
	$baseURL = home_url('/events/');
	$currentQuery = explode('&', $parseURL['query']);

	//Current time
	$thisDayNum = date('w');
	$thisDay = date('d');
	$thisWeek = date('W');
	$thisMonth = date('m');
	$thisYear = date('Y');
	$thisLeap = date('L');

	//Timestamps
	if(isset($_GET['Sweek']) || isset($_GET['Syear'])){
		//If queried
		$week = $_GET['Sweek'];
		$year = $_GET['Syear'];
		$queryDate = date('U',strtotime($year.'W'.$week));

		$first_day_of_week = strtotime('Last Sunday', $queryDate);
		$last_day_of_week = strtotime('Next Saturday', $queryDate);
	}else{
		//If not queried
		$today_stamp = strtotime($thisYear.$thisMonth.$thisDay);
		if($thisDayNum == 0){
			$first_day_of_week = $today_stamp;
		}else{
			$first_day_of_week = strtotime('Last Sunday', time());
		}
		if($thisDayNum == 6){
			$last_day_of_week = $today_stamp;
		}else{
			$last_day_of_week = strtotime('Next Sunday', time());
		}
	}

	//For Filter
	$firstDayFilter = date('Ymd',$first_day_of_week);
	$lastDayFilter = date('Ymd',$last_day_of_week);

	//Array Range
	$dayArray = array();
	$dayArrAdd = $first_day_of_week;
	$dayArray[] = date('Ymd',$dayArrAdd);
	for($i=1; $i<7; $i++){
		$dayArrAdd = strtotime('+1 day',$dayArrAdd);
		$dayArray[] = date('Ymd',$dayArrAdd);
	}

?>

<?php
	//Get variables for next & prev week links based on current week's starting point
	$newWeek = date('W', $last_day_of_week);
	$newYear = date('Y', $last_day_of_week);
	$newLeap = date('L', $last_day_of_week);

	$linkWeekDown = $newWeek - 1;
	$linkWeekUp = $newWeek + 1;
	$linkYearUp = $newYear;
	$linkYearDown = $newYear;

	//Leap year?
	if($linkWeekDown == 0){
		--$linkYearDown;
		if(date('L', strtotime("$linkYearDown-01-01")) == 1){
			$linkWeekDown = 53;
		}else{
			$linkWeekDown = 52;
		}
	}
	if($linkWeekUp == 54 && $newLeap == 0 || $linkWeekUp == 53){
		$linkWeekUp = 1;
		++$linkYearUp;
	}

	//Add 0 if week is single digit (NECESSARY FOR UNIX DATE CALCULATION)
	if($linkWeekDown < 10){
		$linkWeekDown = str_pad($linkWeekDown, 2, '0', STR_PAD_LEFT);
	}
	if($linkWeekUp < 10){
		$linkWeekUp = str_pad($linkWeekUp, 2, '0', STR_PAD_LEFT);
	}

	//Construct week queries

	parse_str($parseURL['query'], $vars);
	unset($vars['Sweek']);
	unset($vars['Syear']);


	$nextWeekQuery = $vars;
	$nextWeekQuery['Sweek'] = $linkWeekUp;
	$nextWeekQuery['Syear'] = $linkYearUp;
	$nextWeekLink = http_build_query($nextWeekQuery);



	$lastWeekQuery = $vars;
	$lastWeekQuery['Sweek'] = $linkWeekDown;
	$lastWeekQuery['Syear'] = $linkYearDown;
	$lastWeekLink = http_build_query($lastWeekQuery);
?>
<div class="block calendar_nav">
	<div id="cal_next_week"><a href="<?php echo get_post_type_archive_link('events'); ?>?<?php echo $nextWeekLink; ?>">Next Week</a></div>
	<div id="cal_prev_week"><a href="<?php echo get_post_type_archive_link('events'); ?>?<?php echo $lastWeekLink; ?>">Prev Week</a></div>
</div>
<div class="block cal_listing_title">
	<h3>Week of <?php echo date( 'F jS' , $first_day_of_week ); ?></h3>
</div>



<?php //If query, show the filters and filter cancels
	if(isset($_GET['filtAge']) || isset($_GET['filtCat']) || isset($_GET['filtLoc'])){ ?>
<div id="filterButtons">
	<h4>Filtered by:</h4>
	<?php if(isset($_GET['filtAge'])){
		$tFilter = get_term_by('slug', $_GET['filtAge'], 'age', 'ARRAY_A');
		parse_str($parseURL['query'], $vars);
		unset($vars['filtAge']);
		$queryString = http_build_query($vars);
	?>
		<div class="filter" data-filter="filtAge">
			<span class="filtah">Age: </span>
			<?php echo $tFilter['name']; ?>
			<a href="<?php echo $baseURL; ?>?<?php echo $queryString; ?>" data-filter="filtAge">[remove]</a>
		</div>
	<?php }
	if(isset($_GET['filtCat'])){
		$tFilter = get_term_by('slug', $_GET['filtCat'], 'category', 'ARRAY_A');
		parse_str($parseURL['query'], $vars);
		unset($vars['filtCat']);
		$queryString = http_build_query($vars);
	?>
		<div class="filter" data-filter="filtCat">
			<span class="filtah">Category: </span>
			<?php echo $tFilter['name']; ?>
			<a href="<?php echo $baseURL; ?>?<?php echo $queryString; ?>" data-filter="filtCat">[remove]</a>
		</div>
	<?php }
	if(isset($_GET['filtLoc'])){
		$tFilter = get_term_by('slug', $_GET['filtLoc'], 'location', 'ARRAY_A');
		parse_str($parseURL['query'], $vars);
		unset($vars['filtLoc']);
		$queryString = http_build_query($vars);
	?>
		<div class="filter" data-filter="filtLoc">
			<span class="filtah">Location: </span>
			<?php echo $tFilter['name']; ?>
			<a href="<?php echo $baseURL; ?>?<?php echo $queryString; ?>" data-filter="filtLoc">[remove]</a>
		</div>
	<?php } ?>
</div>
<?php } ?>



<?php
	//Construct query based on GET variables
	$args = array(
	  'numberposts' => -1,
	  'post_type' => 'events',
	  'order'=>'DESC',
	  'orderby' => 'specific_date',
	  'meta_query' => array(
		  'relation' => 'AND',
		  //Check start and end dates
		  array(
		  	'key' => 'specific_date',
		  	'value' => $lastDayFilter,
		  	'type' => 'DATE',
		  	'compare' => '<='
		  ),
		  //Check end date
		  array(
		  	'key' => 'end_date',
		  	'value' => $firstDayFilter,
		  	'type' => 'DATE',
		  	'compare' => '>='
		  ),
		  //Check if hidden
		  array(
		  	'key' => 'hide_event',
		  	'value' => 'no',
		  	'compare' => '='
		  )
	  )
	);

	//Add filters to query
	if(isset($_GET['filtAge']) || isset($_GET['filtCat']) || isset($_GET['filtLoc'])){
		$taxArray = array();
		$taxArray['relation'] = 'AND';
		if(isset($_GET['filtAge'])){
			$ageArr = array();
			$ageArr['taxonomy'] = 'age';
			$ageArr['field'] = 'slug';
			$ageArr['terms'] = $_GET['filtAge'];
			array_push($taxArray, $ageArr);
		}
		if(isset($_GET['filtCat'])){
			$catArr = array();
			$catArr['taxonomy'] = 'category';
			$catArr['field'] = 'slug';
			$catArr['terms'] = $_GET['filtCat'];
			array_push($taxArray, $catArr);
		}
		if(isset($_GET['filtLoc'])){
			$locArr = array();
			$locArr['taxonomy'] = 'location';
			$locArr['field'] = 'slug';
			$locArr['terms'] = $_GET['filtLoc'];
			array_push($taxArray, $locArr);
		}
		$args['tax_query'] = $taxArray;
	}

	//Query based on date range
	$posts = get_posts($args);
	//Go through each day
	foreach($dayArray as $day){
		$dayX = strtotime($day);
		$dayCard = date('l',$dayX); ?>
		<div class="day<?php if(isset($today_stamp) && $today_stamp == $dayX){ echo 'this-day'; } ?>">
		    <div class="day_left">
		      <h2><?php echo date('l',$dayX); ?><br><?php echo date('M',$dayX); ?><br><?php echo date('j',$dayX);?><br> </h2>
		    </div>
		    <div class="day_right">
				<?php //Get events that belong in this day
					foreach($posts as $post){
						$hidedates = get_field('hidden_dates');
						$hidearr = array();
						foreach($hidedates as $date){
							array_push($hidearr,$date['hide_date']);
						}

						$startdate = get_field('specific_date');
						$postID = $post->ID;
						if(get_field('day')){
							$dayCheck = get_field('day');
						}else{
							$dayCheck = array();
						}

						if($startdate == $day || isset($dayCheck) && in_array($dayCard,$dayCheck) && !in_array($day, $hidearr)){ ?>
							<div class="event_box">
						      <h2>
						        <a href="<?php echo get_permalink($postID); ?>">
						<?php echo get_the_title($postID); ?>
						        </a>
						      </h2>
						      <div class="event_location"><span class="sr-only">Location</span>
						<?php
									$locations = wp_get_post_terms($postID, 'location', array('fields' => 'names'));
									if($locations){
										$i = 0;
										$num = count($locations);
										foreach($locations as $location){
											if(++$i === $num){
												echo $location.'&nbsp;';
											}else{
												echo $location.', &nbsp;';
											}
										}
									}
						        ?>
						      </div>
						      <div class="event_cats"><span class="sr-only">Categories</span>
								<?php
								  	$categories = wp_get_post_categories($postID, array('fields' => 'names'));
								  	if($categories){
								  		if($locations){
									  		echo '|&nbsp;';
								  		}
										$i = 0;
										$num = count($categories);
										foreach($categories as $category){
											if(++$i === $num){
												echo $category.'&nbsp;';
											}else{
												echo $category.', &nbsp;';
											}
										}
									}
								  ?>
						      </div>
						      <div class="event_ages"><span class="sr-only">For ages</span>
								<?php
								  	$ages = wp_get_post_terms($postID, 'age', array('fields' => 'names'));
								  	if($ages){
								  		if($categories || $locations){
									  		echo '|&nbsp;';
								  		}
										$i = 0;
										$num = count($ages);
										foreach($ages as $age){
											if(++$i === $num){
												echo $age.'&nbsp;';
											}else{
												echo $age.', &nbsp;';
											}
										}
									}
								  ?>
						      </div>

						      <div class="event_time"><span class="sr-only">Event time</span>
								<?php
								  	$sTime = get_field('start');
								  	$eTime = get_field('end');
								  	$eDay = $dayCard;
								  	$eDay = strtolower($eDay);
								  	if($eDay == 'sunday'){
									  	$eDay = 'sunnday';
								  	}
								  	$specTime = get_field($eDay.'-times');
								  	if($specTime){
									  	echo $specTime;
								  	}else{
									  	echo $sTime.'-'.$eTime;
								  	}
								  ?>
						      </div>

						<?php $fields = get_fields($postID);
						          if($fields['featured'] == "Yes") { ?>
						      <div class="event_featured_icon">

						            <img alt="Featured event" src="<?php bloginfo( 'template_url' ); ?>/images/event-featured.png" >

						      </div>
						<?php } ?>

						<?php $thumbn = get_the_post_thumbnail($postID, 'event-thumb'); ?>
						<?php if ($thumbn != '') {?>
						      <div class="event_thumbnail">
						<?php echo $thumbn; ?>
						      </div>

						<?php } ?>


						      <div class="event_content">
						<?php //echo get_post_field('post_content', $postID);?>
						<?php  echo get_excerpt_by_id($postID); ?>
						        <a class="event_more" href="<?php echo get_permalink($postID); ?>">
						           READ MORE &rsaquo;&rsaquo;
						        </a>
						      </div>
						    </div>
						<?php }

					}
				?>
			</div>
		</div>
	<?php } ?>