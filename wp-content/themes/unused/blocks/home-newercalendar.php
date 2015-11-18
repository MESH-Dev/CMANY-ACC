<?php
	//Current time
	$thisDayNum = date('w');
	$thisDay = date('d');
	$thisWeek = date('W');
	$thisMonth = date('m');
	$thisYear = date('Y');
	$thisLeap = date('L');



	//Timestamp
	$timestamp = strtotime($thisYear.$thisMonth.$thisDay);

	

	$args = array(
	  'numberposts' => -1,
	  'post_type' => 'events',
	  'order'=>'DESC',
	  'cat' => 157,
	  'orderby' => 'specific_date'
	  /* ,
	  'meta_query' => array(
		  'relation' => 'AND',
		  //Check start and end dates
		  array(
		  	'key' => 'specific_date',
		  	'value' => $timestamp,
		  	'type' => 'DATE',
		  	'compare' => '<='
		  ),
		  //Check end date
		  array(
		  	'key' => 'end_date',
		  	'value' => $timestamp,
		  	'type' => 'DATE',
		  	'compare' => '>='
		  ),
		   Check if featured
		  array(
		  	'key' => 'featured',
		  	'value' => 'Yes',
		  	'compare' => '='
		  ), 
		  //Check if hidden
		  array(
		  	'key' => 'hide_event',
		  	'value' => 'no',
		  	'compare' => '='
		  )
	  )*/
	);

	$posts = get_posts($args);
	$dayCard = date('l',$timestamp);
	$day = date('Ymd',$timestamp);
	$i = 0;
	foreach($posts as $post){
		
		$hidedates = get_field('hidden_dates');
		$startdate = get_field('specific_date');
		$postID = $post->ID;
		 //echo get_the_title($post->ID); 
		if(get_field('day')){
			$dayCheck = get_field('day');
		}else{
			$dayCheck = array();
		}
		if($startdate == $day || isset($dayCheck) && in_array($dayCard,$dayCheck)){ $i++; ?>

		<div class="home_event_box">
	      <h3>
	        <a href="<?php echo get_permalink($post->ID); ?>">
	     <?php echo get_the_title($post->ID); ?>
	        </a>
	      </h3>
	      <div class="event_time" style="margin-bottom:0px; ">
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
	      <div class="home_event_content" style="width: 190px;">
	   <?php //echo get_post_field('post_content', $post->ID);?>
	        <p><?php  echo get_excerpt_by_id($post->ID); ?></p>
	        <p class="event_more"><!-- href="<?php //echo get_permalink($post->ID); ?>" -->
	           READ MORE &rsaquo;&rsaquo;
	        </p>
	      </div>
	    </div>

	<?php } ?>

	<?php }
		if($i == 0){
			echo "No Workshops Today";
		}
	 ?>