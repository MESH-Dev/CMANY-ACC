<?php
  /**
   * Template Name: Birthdays
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
    <div class="block">
<?php if(get_field('banner')): ?>
<?php $image = wp_get_attachment_image_src(get_field('banner'), 'full'); ?>
      <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $image[0]; ?>&h=230&w=840&zc=1" alt="<?php the_field('banner'); ?>" />
<?php endif; ?>
<?php if(get_field('banner_overlay' )): ?>
          <div class='overlay'>
            <p class='overlay_content<?php echo $currentcolor; ?>-footer'><?php the_field('banner_overlay',$childID); ?></p>
          </div>
<?php endif; ?>
    </div>
    <!-- block -->      
    <div class="block">
      <div id="left-content" class="mt-20">
<?php the_content(); ?>
        <h3 class="greybar"><?php the_field('step_1_title'); ?></h3>
        <div class="block">
          <ul class="tabs">
<?php while(the_repeater_field('step_1_tabs')): ?>
            <li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php the_sub_field('tab_title'); ?>"><?php the_sub_field('tab_title'); ?></a></li>
<?php endwhile; ?>
          </ul>
          <!-- tabs --> 
<?php while(the_repeater_field('step_1_tabs')): ?>
          <div class="pane">
<?php the_sub_field('tab_content');?>
          </div>
          <!-- pane --> 
<?php endwhile; ?>
        </div>
        <!--block --> 
        <h3 class="greybar"><?php the_field('step_2_title'); ?></h3>
        <p><?php the_field('step_2_content'); ?></p>
        <h3 class="greybar"><?php the_field('step_3_title'); ?></h3>
        <div class="block">
          <ul class="tabs">
<?php while(the_repeater_field('step_3_tabs')): ?>
            <li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php the_sub_field('tab_title_3'); ?>"><?php the_sub_field('tab_title_3'); ?></a></li>
<?php endwhile; ?>
          </ul>
          <!-- tabs --> 
<?php while(the_repeater_field('step_3_tabs')): ?>
          <div class="pane">
<?php the_sub_field('tab_content_3');?>
          </div>
          <!-- pane -->  
<?php endwhile; ?>
        </div>
        <!-- block --> 
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