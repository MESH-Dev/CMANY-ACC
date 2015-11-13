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
    

    <div class="calendar_main_column">

        <div class="block calendar_filter">
          <div class="cal_viewby">
            View By:
            <a id="daily" href="<?php echo site_url(); ?>/events/?cur_month=<?php echo $nnow_month; if($new_yr){echo'&cur_year='.$new_yr;}?>&amp;view=day&amp;today=<?php echo $now_day;?>" >Dailly</a>

            <a class="active" id="weekly"  href="<?php echo site_url(); ?>/events/?cur_week=<?php echo $current_week;?><?php if($new_yr){echo'&cur_year='.$new_yr;}?>">Weekly</a>
          </div>



          <div class="cal_browseby">
            <span class="left">Browse By:</span>
            <ul>
              <li>Age
	<?php
					$terms = get_terms('age');
					$count = count($terms); $i=0;
					if ($count > 0) { ?>
						<ul>
						<?php foreach($terms as $term){ ?>
							<li><a href="<?php echo $actual_link; ?>&amp;age_filter=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
						<?php } ?>
						</ul>
					<?php } ?>
              </li>

              <li>Category</li>

              <li>Location
	<?php
					$terms = get_terms('location');
					$count = count($terms); $i=0;
					if ($count > 0) { ?>
						<ul>
						<?php foreach($terms as $term){
                echo $term->slug ;
                 if ($term->slug == 'exhibition' || $term->slug == 'special-event'){ echo "aaaa";}
                 else{
              ?>
							<li><a href="<?php echo $actual_link; ?>&amp;loc_filter=<?php echo $term->slug ;  ?>"><?php echo $term->name; ?></a></li>
						<?php } }?>
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
							<li><a href="<?php echo $actual_link; ?>&amp;loc_filter=<?php echo $term->slug; ?>"><?php echo $term->name; ?></a></li>
						<?php } ?>
						</ul>
					<?php } ?>
              </li>
            </ul>
          </div>
        </div>

        <div class="block calendar_nav">
          <div id="cal_next_week"><a href="<?php echo site_url(); ?>/events/?week=next&amp;cur_week=<?php echo $next_week;?><?php if($new_yr){echo'&cur_year='.$new_yr;}?>">Next Week</a></div>
          <div id="cal_prev_week"><a href="<?php echo site_url(); ?>/events/?week=prev&amp;cur_week=<?php echo $last_week;?><?php if($last_yr){echo'&cur_year='.$last_yr;}?>">Prev Week</a></div>
        </div>



        <!--START CALENDAR Day VIEW-->
<?php include('blocks/event_day_view.php'); ?>
        <!--END CALENDAR DAY VIEW-->


        <!--START CALENDAR WEEK VIEW-->
<?php include('blocks/event_week_view.php'); ?>
        <!--END CALENDAR WEEK VIEW-->

    </div><!--END cal main columns-->


    <!--EVENT SIDEBAR-->
    <div id="event_sidebar">

      <div id="event_mini_calendar">
<?php include('blocks/event_mini_calendar.php'); ?>
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

<?php get_footer('new'); ?>


<style>


</style>
