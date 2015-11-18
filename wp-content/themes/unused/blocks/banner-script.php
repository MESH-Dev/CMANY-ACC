<?php if(get_field('banner')): ?>

              <div class="wrapper">
					<?php $image = wp_get_attachment_image_src(get_field('banner'), 'full'); ?>
                     <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $image[0]; ?>&w=840&h=230&zc=1" alt="<?php the_field('banner'); ?>" />
                     
                 <?php if(get_field('banner_overlay')): ?>
                     <div class='overlay'>
                        <p class='overlay_content<?php echo $currentcolor; ?>-footer'><?php the_field('banner_overlay'); ?></p>  
                    </div>  <!--  overlay --> 
                <?php endif; ?>
                     
              </div> <!--  wrapper --> 
 
<?php endif; ?>