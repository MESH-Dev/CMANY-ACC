<?php
  /**
   * Template Name: Wee
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
        <h3 class="greybar"><?php the_field('tab_group_1_title'); ?></h3>
        <p><?php the_field('tab_group_description'); ?></p>
        <ul class="tabs">
<?php while(the_repeater_field('tab')): ?>
          <li><a class="<?php echo $currentcolor; ?>-footer" href="#<?php the_sub_field('tab_title'); ?>"><?php the_sub_field('tab_title'); ?></a></li>
<?php endwhile; ?>
        </ul>
<?php while(the_repeater_field('tab')): ?>
        <div class="pane">
          <div<?php if(get_sub_field('register_url')=='') { echo 'class="block"'; } else { echo 'class="left-465"';} ?> id="wee">
<?php the_sub_field('tab_content'); ?>
          </div>
<?php 
            if(get_sub_field('register_url')!='') : ?>
          <div class="right-145 mt15"> 
<?php $status=get_sub_field('status');
              if ($status=='open') { ?>
            <a class="button-base<?php echo $currentcolor; ?>-footer" href="<?php the_sub_field('register_url');?>" target="_blank">Register</a>
<?php } elseif ($status=='sold out') { ?>
            <a class="button-base grey" href="#">Sold Out</a>
<?php } else { ?>
            <a class="button-base grey" href="#">Closed</a>
<?php } ?>
          </div>
          <? endif; ?>
        </div>
        <!-- end pane -->
<?php endwhile; ?>
        <h3 class="greybar"><?php the_field('title_2'); ?></h3>
        <p><?php the_field('content_2'); ?></p>
<?php if(get_field('content_3')) : ?>
        <h3 class="greybar"><?php the_field('title_3'); ?></h3>
        <p><?php the_field('content_3'); ?></p>
<?php endif; ?>
<?php if(get_field('footer')) : ?>
        <div class="left" id="class-footer">
          <div class="hr-grey"></div>
          <p><?php the_field('footer'); ?></p>
        </div>
        <!--  end class footer --> 
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