<?php

while(the_repeater_field('sidebar_item')): ?>

<?php $format = get_sub_field('format'); 
      $file = get_sub_field('download_file');
      $file_url = $file['url'];
      $file_alt = $file['alt'];

      ?>
<?php if($format == 'hover-image'){?>

         <div class="sidebar-item<?php if ($format) {   echo $format; }?>" >
              <img alt="<?php echo $file_alt ?>" src="<?php echo $file_url; ?>" />
              <div class="subtitle">
                  <h3><?php the_sub_field('sidebar_title');?></h3>
                  <p><?php the_sub_field('sidebar_content');?></p>

    <?php if( get_sub_field('link_url') ) { ?>
                    <a class="read-more" href="<?php the_sub_field('link_url'); ?>"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Read More &rsaquo;&rsaquo;"; } ?></a>
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
                    <a class="download" href="<?php echo $file_url; ?>" target="_blank"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?></a>
<?php }
            elseif (get_sub_field('download_file')) { ?>
                		<a class="download" target="_blank"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?></a>
<?php } else { } ?>

<?php if( get_sub_field('link_url') ) { ?>
                    <a class="links" href="<?php echo $file_url; ?>" target="_blank"><?php if(get_sub_field('link_text')) { echo get_sub_field('link_text'); } else { echo "Learn More"; } ?></a>
<?php } ?>
        </div>

<?php } ?>


<?php endwhile; ?>
