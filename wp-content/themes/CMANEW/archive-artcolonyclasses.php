<?php include('blocks/class_calendar.php'); ?>


<?php
  get_header();
  get_sidebar('mainnew');
  get_header('nav');

?>
<!--PAGE-NEW-->
<div id="page-new">
  <!--PAGE-CONTAINER -->

  <div class="new_page" id="page-container">
    <div class="block">
      <h2 class="page-title">Classes Calendar</h2>
    </div>
<?php
        		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        		$last = $actual_link[strlen($actual_link)-1];
        		if($last == '/'){
	        		$precede = '?';
        		}else{
	        		$precede = '&';
        		}
        	?>
    <div class="calendar_main_column">
        <div id="loader"></div>
    	<div id="calendarMain">
        <div class="block calendar_filter">
          <div class="cal_viewby">
            View By:
            <a <?php
            		if(isset($_GET['view'])){
            			if($_GET['view'] == 'day'){
	            			echo 'class="active"';
            			}
            		}
            	?> id="daily" href="<?php echo site_url(); ?>/classes-calendar/?cur_month=<?php echo $nnow_month; if($new_yr){echo'&cur_year='.$new_yr;}?>&view=day&today=<?php echo $now_day;?>" >Daily</a>

            <a<?php
            		if(!isset($_GET['view'])){
	            		echo 'class="active"';
            		}
            	?> id="weekly"  href="<?php echo site_url(); ?>/classes-calendar/?cur_week=<?php echo $current_week;?><?php if($new_yr){echo'&cur_year='.$new_yr;}?>">Weekly</a>
          </div>



          <div class="cal_browseby">
            <span class="left">Browse By:</span>
            <ul>
              <li>Age
	<?php
					$terms = get_terms('classages');
					$count = count($terms); $i=0;
					if ($count > 0) { ?>
						<ul>
						<?php foreach($terms as $term){ ?>
							<li><a href="<?php echo $actual_link; ?><?php echo $precede; ?>age_filter=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
						<?php } ?>
						</ul>
					<?php } ?>
              </li>

              <li>Classes
			  		<?php
					$terms = get_categories();
					$count = count($terms); $i=0;
					if ($count > 0) { ?>
						<ul>
						<?php foreach($terms as $term){
               if ($term->slug == 'exhibition' || $term->slug == 'special-event'){ continue;}

              ?>
							<li><a href="<?php echo $actual_link; ?><?php echo $precede; ?>cat_filter=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
						<?php } ?>
						</ul>
					<?php } ?>
              </li>

              <li>Location
	<?php
					$terms = get_terms('classlocation');
					$count = count($terms); $i=0;
					if ($count > 0) { ?>
						<ul>
						<?php foreach($terms as $term){ ?>
<?php echo $precede; ?>loc_filter=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
						<?php } ?>
						</ul>
					<?php } ?>
              </li>
              <li>Season
	<?php
					$terms = get_terms('classseason');
					$count = count($terms); $i=0;
					if ($count > 0) { ?>
						<ul>
						<?php foreach($terms as $term){ ?>
							<li><a href="<?php bloginfo('url'); ?>/classseason/<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
						<?php } ?>
						</ul>
					<?php } ?>
              </li>
            </ul>          </div>
        </div>

        <div class="block calendar_nav">
<?php $viewMode = $_GET['view'];
			if($viewMode == 'day'){ ?>
			 	<div id="cal_prev_week"><a href="<?php echo site_url(); ?>/classes-calendar/?cur_month=<?php echo $prevDayM; ?>&cur_year=<?php echo $prevDayY; ?>&view=day&today=<?php echo $prevDayD; ?>">Prev Day</a></div>
			 	<div id="cal_next_week"><a href="<?php echo site_url(); ?>/classes-calendar/?cur_month=<?php echo $nextDayM; ?>&cur_year=<?php echo $nextDayY; ?>&view=day&today=<?php echo $nextDayD; ?>">Next Day</a></div>
			<?php }else{ ?>
				<div id="cal_next_week"><a href="<?php echo site_url(); ?>/classes-calendar/?week=next&cur_week=<?php echo $next_week;?><?php if($new_yr){echo'&cur_year='.$new_yr;}?>">Next Week</a></div>
	          <div id="cal_prev_week"><a href="<?php echo site_url(); ?>/classes-calendar/?week=prev&cur_week=<?php echo $last_week;?><?php if($last_yr){echo'&cur_year='.$last_yr;}?>">Prev Week</a></div>
			<?php } ?>
        </div>



        <!--START CALENDAR Day VIEW-->
<?php include('blocks/event_day_view.php'); ?>
        <!--END CALENDAR DAY VIEW-->


        <!--START CALENDAR WEEK VIEW-->
<?php include('blocks/event_week_view.php'); ?>
        <!--END CALENDAR WEEK VIEW-->

    </div><!--END cal main columns-->
	<div id="calendarFeed">
    		<button class="feedBack">Go back</button>
    		<div id="event-content"></div>
    		<button class="feedBack">Go back</button>
    	</div>
    </div>
    <!--EVENT SIDEBAR-->
    <div id="event_sidebar">

      <div id="class_mini_calendar">
<?php include('blocks/class_mini_calendar.php'); ?>
      </div>



    </div>

    <div class="clear">&nbsp;</div>
    <!--CLEAR-->





    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>

<?php get_footer('new'); ?>


<style>


</style>
