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
