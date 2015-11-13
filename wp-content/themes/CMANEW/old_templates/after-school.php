<?php
   /**
    * Template Name: AfterSchool
    */
   
   the_post();
   
   
   
   if($post->post_parent) { $post_data = get_post($post->post_parent); $currentcolor = $post_data->post_name;} else { $currentcolor = $post->post_name;}
   
   
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
<?php include 'banner-script.php'; ?>
      <div class="block">
         <div id="left-content" class="mt-20">
<?php the_content(); ?>
            <h3 class="greybar"><?php the_field('season_name'); ?></h3>
            <p><?php the_field('season_content'); ?></p>
<?php 
               $the_array = array(); 
               
               while(the_repeater_field('class')):
               
               
               // loop through the data 
               $row = get_sub_field('day_of_week');
               	//add the data to the array 
               	array_push($the_array,$row); 
               
               endwhile;	
               
               $selectDays=array_unique($the_array);
               
               	
               						
               			?>
            <ul class="tabs">
 <?php foreach ($selectDays as $day) { ?>
               <li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php echo $day; ?>"><?php echo $day; ?></a></li>
 <?php } ?>
            </ul>
<?php foreach ($selectDays as $day) { ?>
            <div class="pane" id="class">
               <h4><?php the_sub_field('day_of_week'); ?>  </h4>
 <?php 	while(the_repeater_field('class')): 
                  $sub = get_sub_field('day_of_week');
                  
                  
                  if($sub==$day) { ?>
               <div class="border-bottom">
                  <h4><?php the_sub_field('class_title'); ?></h4>
                  <div class="left-465">
       <?php the_sub_field('class_description');?>
                  </div>
                  <div class="right-145">
                     <ul class="class">
          <?php if(get_sub_field('class_ages')) { ?>
                        <li>Ages:<?php the_sub_field('class_ages'); ?></li>
          <?php } ?>
          <?php if(get_sub_field('class_times')) { ?>
                        <li>Time:<?php the_sub_field('class_times'); ?></li>
          <?php } ?>
          <?php if(get_sub_field('class_instructor')) { ?>
                        <li>Instructor:<?php the_sub_field('class_instructor'); ?></li>
          <?php } ?>
                     </ul>
       <?php $status=get_sub_field('status'); if ($status=='open' && get_sub_field('register_url')) { ?>
                     <a class="button-base<?php echo $currentcolor; ?>-footer" href="<?php the_sub_field('register_url');?>" target="_blank">Register</a>
       <?php } elseif ($status=='sold out') { ?>
                     <a class="button-base grey" href="#">Sold Out</a>
       <?php }
                        elseif ($status=='coming soon') { ?>
                     <a class="button-base grey" href="#">Coming Soon</a>
       <?php } else { ?>
                     <a class="button-base grey" href="#">Closed</a>
       <?php }?>
                  </div>
               </div>
 <?php } endwhile; ?>
            </div>
<?php } ?>
<?php if(get_field('footer')) : ?>
            <div class="left" id="class-footer">
               <p><?php the_field('footer'); ?></p>
            </div>
<?php endif; ?>
         </div>
         <!-- left-content --> 
         <sidebar id="cma-sidebar" class="mt-10">   
<?php get_sidebar('default'); ?>
         </sidebar>
         <!-- sidebar -->   
      </div>
      <!-- block -->     
      <div class="clear">&nbsp;</div>
      <!--CLEAR-->
      <!--END PAGE-CONTAINER -->
   </div>
   <!--END PAGE-NEW-->
</div>
<?php get_footer('new'); ?>