<?php error_reporting(0);
  get_header();
  get_sidebar('mainnew');
  get_header('nav');

?>
<!--PAGE-NEW-->
<div id="page-new">
  <!--PAGE-CONTAINER -->

  <div class="new_page" id="page-container">
    <div class="block">
      <h2 class="page-title">Calendar</h2>
    </div>

    <div class="calendar_main_column">
    	<div id="loader"></div>
    	<div id="calendarMain">
        	<?php
        		//Get query variables
        		$view = $_GET['view'];
        		$day = $_GET['sDay'];
        		$month = $_GET['sMonth'];
        		$week = $_GET['sWeek'];
        		$year = $_GET['sYear'];
        		$age = $_GET['filtAge'];
        		$cat = $_GET['filtCat'];
        		$loc = $_GET['filtLoc'];

				//Get base URL
				$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
				$parseURL = parse_url($actual_link);
				//print_r($parseURL);

				$baseURL = home_url('/events/');
				?>



        <div class="block calendar_filter">

          <div class="cal_viewby">
            View By:
<?php
	        	//include filters with view change
	        	parse_str($parseURL['query'], $vars);
				unset($vars['view']);
				unset($vars['Sday']);
				unset($vars['Smonth']);
				unset($vars['Syear']);
				unset($vars['Sweek']);
            ?>
            <a id="daily" class="<?php if($_GET['view'] == 'day'){ echo 'active'; } ?>" href="<?php
            	$vars['view'] = 'day';
            	$shiftString = http_build_query($vars);
            	echo get_post_type_archive_link('events'); ?>?<?php echo $shiftString; ?>">Daily</a>
            <a class="<?php if($_GET['view'] != 'day'){ echo 'active'; } ?>" id="weekly" href="<?php
            	$vars['view'] = 'week';
            	$shiftString = http_build_query($vars);
            	echo get_post_type_archive_link('events'); ?>?<?php echo $shiftString; ?>">Weekly</a>
          </div>

          <div class="cal_browseby">
            <span class="left">Browse By:</span>
            <ul>
            	<li>Age
	            	<ul>
						<?php
							parse_str($parseURL['query'], $vars);
							unset($vars['filtAge']);
							$queryString = http_build_query($vars);
							$filters = get_terms('age','hide_empty=0');
							foreach($filters as $filter){
								echo "<li><a tabindex='-1' href='".$baseURL."?".$queryString."&filtAge=".$filter->slug."'>".$filter->name."</a></li>";
							}
						?>
	            	</ul>
            	</li>
            	<li>Categories
	            	<ul>
						<?php
							parse_str($parseURL['query'], $vars);
							unset($vars['filtCat']);
							$queryString = http_build_query($vars);
							$filters = get_terms('category',"hide_empty=0&exclude=164,163,130,,217");
							foreach($filters as $filter){
								echo "<li><a tabindex='-1' href='".$baseURL."?".$queryString."&filtCat=".$filter->slug."'>".$filter->name."</a></li>";
							}
						?>
	            	</ul>
            	</li>
            	<li>Location
	            	<ul>
						<?php
							parse_str($parseURL['query'], $vars);
							unset($vars['filtLoc']);
							$queryString = http_build_query($vars);
							$filters = get_terms('location','hide_empty=0');
							foreach($filters as $filter){
								echo "<li><a tabindex='-1' href='".$baseURL."?".$queryString."&filtLoc=".$filter->slug."'>".$filter->name."</a></li>";
							}
						?>
	            	</ul>
            	</li>
            </ul>
          </div>

        </div>



        <div class="block calendar_nav">

        </div>


		<?php
			//is the view GET set?
			if(isset($_GET['view'])){
				//load the day view
				if($_GET['view'] == 'day'){
					get_template_part('calendar/query','day');
				//load the week view
				}else{
					get_template_part('calendar/query','week');
				}
			//load the week view by default
			}else{
				get_template_part('calendar/query','week');
			}
		?>



    	</div>
    	<div id="calendarFeed">
    		<button class="feedBack">Go back</button>
    		<div id="event-content"></div>
    		<button class="feedBack">Go back</button>
    	</div>
    </div><!--END cal main columns-->


    <!--EVENT SIDEBAR-->
    <div id="event_sidebar">

      <div id="event_mini_calendar">
		<?php include('blocks/event_mini_calendar.php'); ?>
      </div>


  		<?php $meta_values = get_post_meta( 9281, 'sidebar_callout', true ); ?>
  		<?php if($meta_values){ ?>
      	 <div id="event-callout">
		  	 <div class="gutter">
		  	 	<?php echo $meta_values; ?>
		  	 </div>
		  	 <div id="callout-caret"></div>
		 </div>
<?php } ?>

	  <div id="event_box_featured">
<?php include('blocks/event_special.php'); ?>
      </div>

      <div id="event_box_featured">
<?php include('blocks/event_featured.php'); ?>
      </div>

    </div>

    <div class="clear">&nbsp;</div>
    <!--CLEAR-->





    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>

<?php get_footer(); ?>


<style>


</style>
