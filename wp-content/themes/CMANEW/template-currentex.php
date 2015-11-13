<?php
   /**
    * Template Name: Current Exhibitions
    */
  get_header();
  get_sidebar('mainnew');
  get_header('nav');
?>

<!--PAGE-NEW-->
<div id="page-new" >
  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">


     <!--TITLE -->
    <div class="block">
      <h2 class="page-title<?php echo $currentcolor; ?>">
        Current Exhibitions
      </h2>

    </div>


    <div class="block">
      	<!-- Header Text Custom Field-->
  		<div class="headline"><?php the_field('header-text'); ?></div>
  	</div>


<?php while ( have_posts() ) : the_post(); ?>
  	<!-- Box Repeater Custom Field-->

    <div class="block">
   <?php while(the_repeater_field('blocks')): ?>
        <div class="overview-item" href="<?php the_sub_field('block-link');?>">
		  <?php
              $attachment_id = get_sub_field('block-image');
              $size = "blockimage";
              $image =  wp_get_attachment_image( $attachment_id, $size );   ?>
            <img src="<?php the_sub_field('block-image')?>" />


		      <a  href="<?php the_sub_field('block-link');?>" >
  		      <div class="subtitle">
                  <div style="display:none">hahahaha</div>
  		          <h3><?php the_sub_field('block-title');?></h3>
  		          <p><?php the_sub_field('block-description');?></p>
  		          <a class="read-more" href="<?php the_sub_field('block-link');?>" >READ MORE >></a>
  		      </div>
          </a>
    	 	</div>
  <?php endwhile ?>



    </div>



<?php endwhile; ?>


    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>
