<?php
   /**
    * Template Name: Listing Page
    */
  get_header();
  //get_sidebar('mainnew'); 
  get_header('nav'); 
?>

<!--PAGE-NEW-->
<div id="page-new" class="container">
  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">

    <?php get_sidebar('mainnew'); ?>

<?php while ( have_posts() ) : the_post(); ?>
    <div class="columns eleven">
     <!--TITLE -->
    <div class="block">
      <h2 class="page-title<?php echo $currentcolor; ?>">
   <?php if(get_field('title_fill')) { $logo = wp_get_attachment_image_src(get_field('title_fill'), 'full') ?>
      </h2>
      <img src="<?php echo $logo[0]; ?>" alt="<?php the_title(); ?>" /><?php } else { the_title(); } ?>
    </div>


    <div class="block">  
   <?php get_template_part('blocks/banner-script'); ?> 
    </div>
    

    <div class="block">
      	<!-- Header Text Custom Field-->
  		<div class="headline"><?php the_field('header-text'); ?></div>
  	</div>

  	<!-- Box Repeater Custom Field-->   

    <div class="block"> 
   <?php 
        $ctr = 1;
        while(the_repeater_field('blocks')): ?>     
        
		  <?php 
              //$attachment_id = get_sub_field('block-image');
              $block_image = get_sub_field('block-image');
              $block_imageUrl = $block_image['url'];
              $block_imageAlt = $block_image['alt'];
              $size = "blockimage";  
              $image =  wp_get_attachment_image( $attachment_id, $size );   ?>

		  <div class="overview-item title-<?php echo $ctr; ?><?php the_sub_field('block-title');?>" style="background-image=url('<?php echo $block_imageUrl; ?>')">
		     
          <div class="subtitle">
            <div class="subtitle-content"
		          <h3><?php the_sub_field('block-title');?></h3>
              <p class="learnmore">Learn More...</p>
		          <p class="content"><?php the_sub_field('block-description');?></p>
		     <?php if(get_sub_field('block-link')){ ?> <a class="read-more" href="<?php the_sub_field('block-link');?>" >READ MORE >></a><?php }?>
            </div>
		      </div>  
    	 	</div>
   <?php  if($ctr %3 == 0) { ?>
        <div class="listing-row hide">
           <div class="xclose" ><a class="xclose" > CLOSE </a></div>
          <div class="listing-content">

     <?php  } ?>
          
    <?php  if($ctr %3 == 0) { ?>
          </div>
        </div>
     <?php  } ?>



  <?php $ctr++; endwhile ?>

        <div class="listing-row" style="display:none;" >
          <div class="xclose" ><a class="xclose" > CLOSE </a></div>
          <div class="listing-content">
             
          </div>
        </div>
    	 	  
                 
    </div>

      
     
<?php endwhile; ?>


    <div class="clear" aria-hidden="true">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>