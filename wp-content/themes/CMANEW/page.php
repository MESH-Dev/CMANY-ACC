<?php
  get_header();
  get_sidebar('mainnew');
  get_header('nav');
?>

<!--PAGE-NEW-->
<div id="page-new" >
  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">
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


      <!-- MAIN CONTENT DIV-->
      <div id="left-content" class="mt-20">

        <!-- SLIDESHOW -->

<?php if(get_field('slide-image')): ?>
<?php get_template_part('blocks/slider'); ?>
<?php endif; ?>



        <!-- MAIN CONTENT -->
<?php the_content(); ?>

<?php if(get_field('footer-text')): ?>
            <hr>
            <div class="page-footer-text">
<?php the_field('footer-text'); ?>
            </div>
<?php endif; ?>



      </div>

      <!-- Sidebar CONTENT -->
      <sidebar id="cma-sidebar" class="mt-10">
<?php get_sidebar('default'); ?>
      </sidebar>

    </div>
<?php endwhile; ?>


    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>
