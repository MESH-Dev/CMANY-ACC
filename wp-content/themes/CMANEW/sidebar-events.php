<?php 
while(the_repeater_field('sidebar_item')): ?>

<?php $format = get_sub_field('format') ?>
<?php if($format == 'hover-image'){?>

         <div class="sidebar-item<?php if ($format) {   echo $format; }?>" >
              <img src="<?php the_sub_field('download_file');?>" />
              <div class="subtitle">
                  <h3><?php the_sub_field('sidebar_title');?></h3>
                  <p><?php the_sub_field('sidebar_content');?></p>
             <?php if( get_sub_field('link_url') ) { ?>
                    <a class="read-more" href="<?php the_sub_field('link_url'); ?>" title="<?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?>"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Read More >>"; } ?></a>
       <?php } ?>
              </div>

        </div>


<?php }
    else{ ?>

        <div class="sidebar-item<?php if ($format){ echo $format; }?>" >
       <?php if (get_sub_field('sidebar_title')) { ?>
                <h4 class=" " ><?php the_sub_field('sidebar_title'); ?></h4>
       <?php } ?>

       <?php the_sub_field('sidebar_content'); ?>

       <?php if( get_sub_field('download_url') ) { ?>
                    <a class="download" href="<?php the_sub_field('download_url'); ?>" title="<?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?>" target="_blank"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?></a>
       <?php }
            elseif (get_sub_field('download_file')) { ?>
                		<a class="download" href="<?php the_sub_field('download_file'); ?>" title="<?php the_sub_field('link_text'); ?>" target="_blank"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?></a>
       <?php } else { } ?>

       <?php if( get_sub_field('link_url') ) { ?>
                    <a class="links" href="<?php the_sub_field('link_url'); ?>" title="<?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?>"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?></a>
       <?php } ?>
        </div>

<?php } ?>


<?php endwhile; ?>

<div id="event_box_featured">
     <?php $post_objects = get_field('related_workshops');

      if( $post_objects ): ?>
          <h2 class="featured">Related Workshops</h2>



          <div id="event-callout">
              <div class="gutter">

           <?php foreach( $post_objects as $post): setup_postdata($post); ?>
                <a href="<?php echo the_permalink(); ?>" ><h3><?php echo the_title();?></h3></a>
                <div class="feature-date"><?php if($fields['specific_date'] != "") {  echo date('F jS',strtotime($fields['specific_date'])); } ?>
           <?php
                  if($fields['end_date'] != '' && $fields['end_date'] != $fields['specific_date']){
                    echo ' - ';
                    echo date('F jS',strtotime($fields['end_date']));
                  }
                ?></div>
                <div class="feature-location">

             <?php
                        $locations = get_the_terms($post->ID, 'location' );
                        $separator = ',';
                        $output = '';

                        if($locations){
                          foreach($locations as $location) {
                            $output .= $location->name . $separator;
                          }
                          echo trim($output, $separator);
                        }
                      ?>

                </div>
                <div class="feature-time">
             <?php the_field('start'); ?> -<?php  the_field('end');?>
                </div> <br><br>
           <?php endforeach; ?>
             <?php wp_reset_postdata();  ?>


              </div>
              <div id="callout-caret"></div>
          </div>
   <?php endif; ?>

</div>
