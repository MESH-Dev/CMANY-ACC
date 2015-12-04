<?php
  get_header();
  //get_sidebar('mainnew');
  get_header('nav');
?>

<!--PAGE-NEW-->
<div id="page-new" class="container post-single">
  <!--PAGE-CONTAINER -->
  <?php get_sidebar('mainnew');?>
  <div id="page-container" class="new_page">
    <div class="eight columns">
        <?php while ( have_posts() ) : the_post(); ?>

     <!--TITLE -->
        <div class="block">
          <h2 class="page-title<?php echo $currentcolor; ?>">
              <?php if(get_field('title_fill')) { $logo = wp_get_attachment_image_src(get_field('title_fill'), 'full') ?>
          </h2>

          <img src="<?php echo $logo[0]; ?>" alt="<?php the_title(); ?>" /><?php } else { the_title(); } ?>

        </div>
        <?php the_post_thumbnail();?>
        <div class="date" role="date"><?php echo get_the_date(''); // Display the time published ?> </div>

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
        <div id="page-content"><?php the_content(); ?></div>

        <?php if(get_field('footer-text')): ?>
        <hr>
            <div class="page-footer-text">
              <?php the_field('footer-text'); ?>
            </div>
        <?php endif; ?>

         <?php if (get_the_category_list()){ ?>

            <div class="cats">
              <span class="label">Posted in: </span><?php echo get_the_category_list ('&nbsp;|&nbsp;'); ?>
            </div>

          <?php } ?>

          <?php if (get_the_tag_list()){ ?>

            <div class="tags">
              <span class="label">Tagged in: </span><?php echo get_the_tag_list('', '&nbsp;|&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>  
            </div>

          <?php } ?>

        </div>


      </div></div>
<div class="three columns">
        <div class="clips block">
          <h4>Find Your Creation</h4>
          Stopped in recently? Find your work at our CMA CLIPS gallery!
          <a href="http://vimeo.com/cmaclips/albums">Browse CMA Clips </a>
        </div>
        <div class="sprite" id="bubble-man"></div>
        <div class="sprite" id="man"></div></div>
      </div>
<?php endwhile; ?>
</div>

    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>
