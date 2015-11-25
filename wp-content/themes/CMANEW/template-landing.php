<?php
   /**
    * Template Name: Landing Page
    */
  get_header();
  //get_sidebar('mainnew');
  get_header('nav');
?>

<!--PAGE-NEW-->
<div id="page-new" class="container">

  <?php get_sidebar('mainnew'); ?>
  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">
    <div class="eleven columns">
<?php while ( have_posts() ) : the_post(); ?>

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
   <?php while(the_repeater_field('blocks')): ?>
   <!--<?php //if (have_rows('blocks')) : 
          //while (have_rows('blocks') : the_row(); ?>-->
           <?php
              //$attachment_id = get_sub_field('block-image');
              $blockimage = get_sub_field('block-image');
              $blockimageUrl = $blockimage['url'];
              $blockimageAlt = $blockimage['alt'];
              //var_dump($blockimageUrl);
              $size = "blockimage";
              $image =  wp_get_attachment_image( $attachment_id, $size );   ?>
        <div class="overview-item" href="<?php the_sub_field('block-link');?>" style="background-image:url('<?php echo $blockimage['url'] ?>'); background-repeat:no-repeat;">
		 
            <!-- <img alt="<?php //echo $blockimage['alt'] ?>" src="<?php echo $blockimage['url'] ?>" />
 -->

		      <a  href="<?php the_sub_field('block-link');?>" >
  		      <div aria-has-popup="true" class="subtitle" ><!-- style="top: -60px" -->
              <div class="subtitle-content">

  		          <h3><?php the_sub_field('block-title');?></h3>
  		     <?php the_sub_field('block-description');?>

           <?php if(get_sub_field('block-link') != ''){ ?>
  		          <p class="read-more">LEARN MORE >></p><!-- href="<?php //the_sub_field('block-link');?>" -->
                <!-- <div class="close">Close</div> -->
           <?php } ?>
              </div>
  		      </div>
          </a>
    	 	</div>
  <?php endwhile;  ?>



    </div>

</div>

<?php endwhile; ?>


    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>
