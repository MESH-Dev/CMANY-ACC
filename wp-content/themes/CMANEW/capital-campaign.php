<?php
/**
 * Template Name: Capital Campaign
 *
 */

the_post();



if($post->post_parent) {
  $post_data = get_post($post->post_parent);

  $currentcolor = $post_data->post_name;
} else {

	$currentcolor = $post->post_name;

}

$currentcolor2= "get-involved";

$currentcolor="home";

get_header('new');
get_sidebar('mainnew');
get_header('navnew2');

?>

<!--PAGE-NEW-->
<div id="page-new" >

  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">

<div class="block">



<h2 class="page-title<?php echo $currentcolor; ?>">
<?php if(get_field('title_fill')) { $logo = wp_get_attachment_image_src(get_field('title_fill'), 'full') ?>
 <img src="<?php echo $logo[0]; ?>" alt="<?php the_title(); ?>" /><?php } else { the_title(); } ?>
 </h2>

</div>

<div id="left-content">
        <div  id="camp-body">

            <div id="s2" class="pics">

   <?php while(the_repeater_field('slideshow_campaign')): ?>
                                           <div class="block" id="hide">
													<?php if(get_sub_field('campaign_image')) { $slide = wp_get_attachment_image_src(get_sub_field('campaign_image'), 'full') ?>
                                                    <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $slide[0]; ?>&h=333&w=635&zc=1" alt="<?php the_sub_field('campaign_caption'); ?> " />
                                      <?php } ?>

                                                    <div class="block">

                                                    <span class="camp-caption"><?php the_sub_field('campaign_caption'); ?></span>

                                                    </div><!-- block -->
                                           </div><!-- block -->
 <?php endwhile; ?>

            </div>

             <div class="nav" id="campaign">

                <div class="nav-right capnav">
                <a id="next2" class="image-nav-buttons" href="#" ></a>
                <a id="prev2" class="image-nav-buttons" href="#"></a>
                </div>
             </div> <!-- nav -->


        </div><!-- block -->
          <div class="block">

        <h3 class="camp-headline<?php echo $currentcolor2; ?>"><?php the_field('headline'); ?></h3>

<?php the_field('content_campaign'); ?>


         <div class="block">
                            <ul class="tabs">


                                        <li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php the_field('program-title'); ?>"><?php the_field('program-title'); ?></a></li>
                                    	<li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php the_field('giving_levels_title'); ?>"><?php the_field('giving_levels_title'); ?></a></li>
                                    	<li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php the_field('naming_opportunities_title'); ?>"><?php the_field('naming_opportunities_title'); ?></a></li>
                                    	 <li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php the_field('use_of_funds'); ?>"><?php the_field('use_of_funds'); ?></a></li>


                           </ul>  <!-- tabs -->


                                <div class="pane">
                                	 <h3 class="camp-tab"><?php the_field('program-title'); ?></h3>
                       <?php the_field('program-content'); ?>

                                 </div>   <!-- pane -->
                               	<div class="pane">
                                	 <h3 class="camp-tab" ><?php the_field('giving_levels_title'); ?></h3>

                                    	  <div class="column">
                            <?php
										      $total=count(get_field('giving_levels'));

										   $count=1; while(the_repeater_field('giving_levels')):


										   ?>

                                  			<div class="giving" style="float:left;width:100%;height:50px;margin-bottom:1px;">
                                                <div class="barcolor" style="width:6px;height:50px;float:left;background-color:<?php the_sub_field('color'); ?>">&nbsp;</div>
                                                <div style="float:left;width:170px;margin-left:4px;margin-top:5px;height:50px;">
                                               <strong><?php the_sub_field('level'); ?></strong><br/>
                                  <?php the_sub_field('amount'); ?>
                                              </div>

                                             </div>
                              <?php if($total==$count) { ?> <div class="giving" style="float:left;width:100%;height:50px;"></div> </div><?php } else {  if($count%4==0) {?></div> <div class="column"><? } } ?>
                            <?php $count++; endwhile; ?>
                                            <br />
                                       <span class="camp-caption" style="font-size:10px;"><?php the_field('give-asterisk'); ?></span>
                                       <br /><br />
                                       <div class="block"><br />
                                        <h3 class="camp-tab"><?php the_field('list_of_supporters'); ?></h3>
                          <?php the_field('list_of_supporters_content'); ?>
                                        </div>

                                 </div>   <!-- pane -->

                                 <div class="pane">
                                	 <h3 class="camp-tab"><?php the_field('naming_opportunities_title'); ?></h3>

                                     <div class="column">
                       <?php the_field('column_1'); ?>
                                     </div>
                                       <div class="column">
                       <?php the_field('column_2'); ?>
                                     </div>
                                       <div class="column">
                       <?php the_field('column_3'); ?>

                                     </div>


                                     <span class="camp-caption" style="font-size:10px;"><?php the_field('opp-asterisk'); ?></span>


                                 </div>   <!-- pane -->
                                 <div class="pane">

                       <?php if(get_field('use_of_funds_image')) { $slide2 = wp_get_attachment_image_src(get_field('use_of_funds_image'), 'full') ?>
                                      <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $slide2[0]; ?>&w=635&zc=0" alt="<?php the_field('use_of_funds'); ?>" />
                        <?php } ?>
                                 </div>   <!-- pane -->




                          </div>  <!--block -->

                          <div class="hr-grey"></div>
            <?php the_field('partner_logos'); ?>


         </div><!-- block -->
</div><!-- left-content -->


<sidebar id="cma-sidebar" style="margin-top:-4px; margin-right:0px;">
<h3 class="greybar">Total Goal:<br/> <span class="home">$<?php the_field('total_goal'); ?></span></h3>

<?php

$raised=get_field('amount_raised');
$raisedStrip=str_replace(",", "", get_field('amount_raised'));

$goal= get_field('total_goal');
$goalStrip=str_replace(",", "", get_field('total_goal'));


$remainder=get_field('remainder');
$remainderStrip=str_replace(",", "", get_field('remainder'));

?>

<?php if(get_field('fundrasing_graph')) { $slide = wp_get_attachment_image_src(get_field('fundrasing_graph'), 'full') ?>
                                                    <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $slide[0]; ?>&w=196&zc=0" alt="" />
<?php } ?>

<!---
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">

      // Load the Visualization API and the piechart package.
      google.load('visualization', '1', {'packages':['corechart']});

      // Set a callback to run when the Google Visualization API is loaded.
      google.setOnLoadCallback(drawChart);

      // Callback that creates and populates a data table,
      // instantiates the pie chart, passes in the data and
      // draws it.
      function drawChart() {

      // Create our data table.
        var data = new google.visualization.DataTable();
        data.addColumn('string', 'Task');
        data.addColumn('number', 'Hours per Day');
        data.addRows([
          ['', 0],
          ['', 0],
          ['', 0],
          ['', 0],
          ['', 0],
          ['', 0],
          ['', 0],
          ['', 0],
          ['', 0],
          ['', 0],
// Edit numbers here
          ['Raised: $<?php //echo $raised; ?>',<?php // echo $raisedStrip; ?>],
          ['Remaining to be raised: $<?php// echo $remainder; ?>',<?php //echo $remainderStrip; ?>]
        ]);

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('chart_div'));
        chart.draw(data, {width: 196, height: 230,  chartArea: {left:15,top:5, width:"80%",height:"90%"}, legend: {position: 'bottom'}, is3D: true, title: ''});
      }
    </script>
<div id="chart_div"></div>-->
<br />
<br />
<?php get_sidebar('campaign'); ?>

</sidebar>
  <div class="clear">&nbsp;</div><!--CLEAR-->

  <!--END PAGE-CONTAINER -->
  </div>

  <!--END PAGE-NEW-->
</div>


<?php get_footer('new'); ?>
