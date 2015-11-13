
<?php
  /**
   * //Template Name: Overview
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
      <p class="headline"><?php the_field('overview_headline'); ?></p>
    </div>
    <!-- block -->      
    <div class="block">
<?php $cntr = 0; while(the_repeater_field('overview_item')):  ?>
<?php $cntr ++; endwhile; ?> 
<?php $cntr2 = 0; while(the_repeater_field('overview_item')):  ?>
      <a class="overview-item" href="<?php the_sub_field('page_link'); ?>"<?php if(!get_sub_field('image')): ?>id="no-image"<?php endif; ?>>
        <div class='wrapper'>
<?php if(get_sub_field('image')):  $image = wp_get_attachment_image_src(get_sub_field('image'), 'full'); ?>
          <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $image[0]; ?>&h=229&w=209&zc=1" alt="<?php the_sub_field('title'); ?>" />
<?php endif; ?>
<?php if(get_sub_field('overlay_text')) { ?>
          <div class='overlay'>
            <p class='overlay_content<?php echo $currentcolor; ?>-footer'><?php the_sub_field('overlay_text'); ?></p>
          </div>
<?php } ?>
          <!-- end description div -->  
        </div>
        <!-- end wrapper div --> 
        <div class="subtitle">
          <h3 class="<?php echo $currentcolor; ?>"><?php the_sub_field('title'); ?></h3>
          <p><?php the_sub_field('subtitle'); ?></p>
        </div>
      </a>
      <!-- end  overlay item -->  
<?php if(($cntr2 == 2)&&($cntr == 6)){ echo "<div class=\"clear\"></div>"; }?>
<?php $cntr2 ++;?>
<?php endwhile; ?>  
    </div>
    <!-- block -->      
    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer('new'); ?>