<?php
/**
 * The Sidebar containing the main widget area.
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 * @since Twenty Eleven 1.0
 */

?>
<div id="page-new" >
<div id="sidebar-new">
    			<a href="<?php echo site_url(); ?>">	<img alt="Return to CMANY home" src="<?php bloginfo( 'template_url' ) ?>/images/cma-logo.jpg" /> </a>



            <?php //if(get_field('logo_fill')) {

				//$CMA = wp_get_attachment_image_src(get_field('logo_fill'), 'full') 	?>

                		<!-- <img src="<?php //echo $CMA[0]; ?>" alt="<?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /> -->

 				<?php //} elseif ($post->post_parent && !get_field('logo_fill')) {

				 //$post_data = get_post($post->post_parent);
  				//$parentID = $post_data->ID;

							// $CMA = wp_get_attachment_image_src(get_field('logo_fill', $parentID), 'full')   ?>

                			<!-- <img src="<?php //echo $CMA[0]; ?>" alt="<?php //echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" /> -->

                <?php// } //else {  ?>

                             <!--  <img src="<?php //bloginfo( 'template_url' ) ?>/images/cma-logo.jpg" /> -->

						<?php //}

						?>

				<!--SUBMENU-->

				<div id="subMenu">


				<?php
				  if($post->post_parent !== 0){
					  $children = wp_list_pages(array(
              'title_li' => '',
              'child_of' => $post->post_parent,
              'echo' => 0,
              'depth'=>1,
              'orderby' => 'menu_order',
              'order' => 'asc',
              'post_status' => 'publish'
            ));

				  } else {

            $children = wp_list_pages(array(
              'title_li' => '',
              'child_of' => $post->ID,
              'echo' => 0,
              'depth'=>1,
              'orderby' => 'menu_order',
              'order' => 'asc',
              'post_status' => 'publish'
            ));
					}?>

     <?php if ($children) { ?>
						  <ul>
						  	<?php echo $children; ?>
						  </ul>
				<?php } ?>







        </div>
     </div>

     				<div class="clear"></div>


</div><!-- sidebar -->