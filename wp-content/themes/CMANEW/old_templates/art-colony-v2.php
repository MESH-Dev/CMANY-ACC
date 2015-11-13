<?php
  /**
   * Template Name: Art Colony v2
   * @since Twenty Eleven 1.0
   */
  
  the_post();
  
  		if($post->post_parent) {
  		  $post_data = get_post($post->post_parent);
  			$currentcolor = $post_data->post_name;
  		} else {
  			$currentcolor = $post->post_name;
  		}
  
  
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
<?php
        $args = array(
        	'post_parent' => $post->ID,
        	'post_type' => 'page',
        	'post_status' => 'publish',
        	'orderby' => 'menu_order',
        	'order' => 'ASC'
        );
        $my_pagelist = get_children($args);
        ?>
<?php  if ($my_pagelist) : ?>
      <ul class="tabs">
<?php foreach($my_pagelist as $my_child) {
          $my_child_slug = '#'. $my_child->post_name ;
           $childID=$my_child->ID;
          ?>
        <li><a class="<?php echo $currentcolor; ?>-footer" href="<?php echo $my_child_slug; ?>"><?php if(get_field('ac_tab_title',$childID)) { the_field('ac_tab_title',$childID); } else { echo $my_child->post_title; } ?></a></li>
<?php }  // end foreach tab ?>		
      </ul>
<?php foreach($my_pagelist as $my_child) { 
        $childID=$my_child->ID;  ?>
      <div class="pane" id="class">
        <h3 class="camp-tab"><?php echo $my_child->post_title; ?></h3>
        <br />
<?php if(get_field('banner',$childID)): ?>
        <div class="wrapper">
<?php $image = wp_get_attachment_image_src(get_field('banner',$childID), 'full'); ?>
          <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $image[0]; ?>&h=230&w=840&zc=1" alt="<?php the_field('banner',$childID); ?>" />
<?php if(get_field('banner_overlay',$childID)): ?>
          <div class='overlay'>
            <p class='overlay_content<?php echo $currentcolor; ?>-footer'><?php the_field('banner_overlay',$childID); ?></p>
          </div>
          <!--  overlay --> 
<?php endif; ?>
        </div>
        <!--  wrapper --> 
        <!-- block -->    
<?php endif; ?>
        <div id="left-content" class="mt-20">
<?php
            $values = get_field('ac_season_intro',$childID);
             if($values): ?>
          <p class="headline">
<?php echo $values; ?>
          </p>
<?php endif; ?>  
<?php if(get_field('ac_browse_title',$childID)): ?>  
          <div class="block greybg mb20" style="margin-left: 10px">
            <div class="browsebox">
              <h3 class="underline">
  <?php the_field('ac_browse_title',$childID); ?>
              </h3>
              <p class="mtb"><?php the_field('ac_browse_text_content',$childID); ?></p>
<?php if(get_field('ac_browse_button_text',$childID)): ?>  
              <a href="<?php echo '' . get_bloginfo('url') . '/'. get_field('ac_browse_button_link',$childID); ?>" title="<?php the_field('ac_browse_button_text',$childID); ?>" class="button-base<?php echo $currentcolor; ?>-footer">
<?php the_field('ac_browse_button_text',$childID); ?>
              </a>
<?php endif; ?>
            </div>
          </div>
<?php endif; ?> 
<?php if(get_field('ac_schedule_title',$childID)): ?>
          <h3 class="ac">
<?php the_field('ac_schedule_title',$childID); ?>
          </h3>
<?php endif; ?>  
          <? $schedule=get_field('ac_schedule',$childID);
            if($schedule) : ?>
          <div class="block mb20">
<?php while(the_repeater_field('ac_schedule',$childID)): ?>
            <div class="hr-thin"></div>
            <div class="block mtb" id="ac">
              <div class="column w135">
  <?php the_sub_field('ac_time',$childID); ?>
              </div>
              <div class="column w425 right">
  <?php the_sub_field('ac_description',$childID); ?>
              </div>
            </div>
            <!-- end row --> 
<?php endwhile; ?>
          </div>
          <!-- end block --> 
<?php	endif; ?> 
<?php if(get_field('ac_group_a_title',$childID)): ?>
          <div class="block  mt20">
            <h3 class="underline">
<?php the_field('ac_group_a_title',$childID); ?>
            </h3>
          </div>
<?php endif; ?>  
<?php if(get_field('ac_group_a_content',$childID)): ?>
          <div class="block">
<?php the_field('ac_group_a_content',$childID); ?>
          </div>
<?php endif; ?>  
<?php if(get_field('ac_fees_title',$childID)): ?>
          <h3 class="ac">
<?php the_field('ac_fees_title',$childID); ?>
          </h3>
<?php endif; ?>  
          <? if(get_field('ac_fees_table',$childID)) : ?>
          <div class="block mb10">
<?php while(the_repeater_field('ac_fees_table',$childID)): ?>
            <div class="hr-thin"></div>
            <div class="block mtb" id="ac">
              <div class="column w135">
  <?php the_sub_field('ac_feestable_price'); ?>
              </div>
              <div class="column w425 right">
  <?php the_sub_field('ac_feestable_description'); ?>
              </div>
            </div>
            <!-- end row --> 
<?php endwhile; ?>
          </div>
          <!-- end block --> 
<?php	endif; ?> 
<?php if(get_field('ac_fees_content',$childID)): ?>
          <div class="block mt20 mb20">
<?php the_field('ac_fees_content',$childID); ?>
          </div>
<?php endif; ?> 
<?php if(get_field('ac_footer',$childID)): ?>
          <div class="block mb20">
<?php the_field('ac_footer',$childID); ?>
          </div>
<?php endif; ?> 
        </div>
        <!-- end left-content --> 
        <sidebar id="ac-sidebar" class="mt-20" >
<?php 
            if($post->post_parent) { $post_data = get_post($post->post_parent); $currentcolor = $post_data->post_name;} else { $currentcolor = $post->post_name;}
            
            while(the_repeater_field('sidebar_item',$childID)): ?> 
          <div class="sidebar-item<?php $format = get_sub_field('format',$childID); if($format=='alert') { echo $currentcolor; ?>-footer<?php } ?>"<?php if ($format) { ?>id="<?php echo $format; ?>"<?php } else {?>id="white"<?php }?> >
<?php $sidebartitle=get_sub_field('sidebar_title',$childID); 
              if ($format=='simple download') { ?>
            <h4 class="<?php echo $currentcolor; ?>" >
              <a class="<?php echo $currentcolor; ?>" href="<?php  if(get_sub_field('download_file',$childID)){  $link=get_sub_field('download_file',$childID); } else { $link=get_sub_field('download_url',$childID); }  echo $link; ?>">
<?php the_sub_field('link_text',$childID); ?>
              </a>
            </h4>
<?php }  else { ?>
            <h4 class="<?php echo $currentcolor; ?>" >
<?php echo $sidebartitle; ?>
            </h4>
<?php } the_sub_field('sidebar_content',$childID); ?>
<?php if( get_sub_field('download_url',$childID) && $format!='simple download') { ?>
            <a class="download mb10<?php echo $currentcolor; ?>-footer" href="<?php the_sub_field('download_url',$childID); ?>" title="<?php if(get_sub_field('link_text',$childID)) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?>" target="_blank"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?></a>
<?php } elseif (get_sub_field('download_file',$childID)) { ?>
            <a class="download mb10<?php echo $currentcolor; ?>-footer" href="<?php the_sub_field('download_file',$childID); ?>" title="<?php the_sub_field('link_text',$childID); ?>" target="_blank"><?php if(get_sub_field('link_text',$childID)) { echo get_sub_field('link_text',$childID); } else { echo "Learn More"; } ?></a>
<?php } else { } ?>
          </div>
          <!-- <div class="hr-thin"></div>  -->    
<?php endwhile; ?>
        </sidebar>
        <!-- sidebar -->  
      </div>
      <!-- end pane -->
<?php }  // end foreach tab ?>
      <? endif; // end check for mypagelist ?>          
    </div>
    <!-- end block -->
    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer('new'); ?>