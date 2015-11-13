<?php
/**
 * Template Name: Opportunities 1
 * @since Twenty Eleven 1.0
 */


the_post();

//if (is_page(array(43,'special-events','Special Events'))) { 

			/// $redirects = tribe_get_events( array('posts_per_page'=>1, 'tax_query'=>array(array('taxonomy'=>'tribe_events_cat','field'=>'id','terms'=>35))));
			 
			// print_r( $redirects );
			 
			// foreach($redirects as $redirect) :
			//  $redirectID=$redirect->ID;
			//	endforeach;
			
			// wp_redirect( get_permalink($redirectID) , 301 );
 
//}

if($post->post_parent) { $post_data = get_post($post->post_parent); $currentcolor = $post_data->post_name;} else { $currentcolor = $post->post_name;}

$currentcolor="about-us";

 
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
        		
        		 </div>      <!-- left-content --> 
                 
              <sidebar id="cma-sidebar" class="mt-10">   
<?php get_sidebar('opp'); ?>
               </sidebar>     <!-- sidebar -->   
                
                
     </div>      <!-- block -->    
     
     <style type="text/css">
	 .menu-item-481 {text-decoration:underline}
	 </style> 
                
       <div class="clear">&nbsp;</div><!--CLEAR-->
    
  <!--END PAGE-CONTAINER -->
  </div>

  <!--END PAGE-NEW-->
</div> 




<?php get_footer('new'); ?>