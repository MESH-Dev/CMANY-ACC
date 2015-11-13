<?php if(get_field('banner')): ?>

              <div class="wrapper">
					<?php $image = wp_get_attachment_image_src(get_field('banner'), 'topbanner'); ?>

                     <img src="<?php echo $image[0]; ?>" alt="<?php the_field('banner'); ?>" />
                     
        <?php if(get_field('banner_overlay')): ?>
                     <div class='overlay'>
                        <p class='overlay_content<?php echo $currentcolor; ?>-footer'><?php the_field('banner_overlay'); ?></p>  
                    </div>  <!--  overlay --> 
       <?php endif; ?>
                     
              </div> <!--  wrapper --> 
 
<?php endif; ?>