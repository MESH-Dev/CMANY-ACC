<?php
  get_header();
  //get_sidebar('mainnew');
  get_header('nav');
?>

<!--PAGE-NEW-->
<div class="page-new container post-single">
  <!--PAGE-CONTAINER -->
  <?php get_sidebar('mainnew');?>
  <div id="page-container" class="new_page">
    <div class="eight columns">

      <?php get_template_part('blocks/breadcrumb'); ?>

        <?php while ( have_posts() ) : the_post(); ?>

     <!--TITLE -->
        <div class="block">
          <h2 class="page-title<?php //echo $currentcolor; ?>">

              <?php echo the_title(); ?>
              <?php //if(get_field('title_fill')) { $logo = wp_get_attachment_image_src(get_field('title_fill'), 'full') ?>
          </h2>

          

        </div>
         <div class="date" role="date"><?php echo get_the_date(''); // Display the time published ?> </div>
        <div class="feat_img"><?php the_post_thumbnail();?></div>
       

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
        <div id="page-content">

          <?php the_content(); ?>

          <div class="comments">
            <?php comments_template(); ?>
          </div>

        </div>

        <?php if(get_field('footer-text')): ?>
        <hr>
            <div class="page-footer-text">
              <?php the_field('footer-text'); ?>
            </div>
        <?php endif; ?>

         <?php if (get_the_category_list()){ ?>

            <div class="cats">
              <span class="label">Posted in: </span><?php echo get_the_category_list (',&nbsp;'); ?>
            </div>

          <?php } ?>

          <?php if (get_the_tag_list()){ ?>

            <div class="tags">
              <span class="label">Tagged in: </span><?php echo get_the_tag_list('', ',&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>  
            </div>

          <?php } ?>

        </div>


      </div></div>
<div class="three columns">
        <div id="search-2" class="widget widget_search sidebar_search">
          <div class="inner_container">
            <h4 class="widgettitle">Search</h4>
            <?php 
            // if(isset($_GET['search-type'])) {
        //        $type = $_GET['search-type'];
        //        $args = array( 'post_type' => 'post' );
        //        $args = array_merge( $args, $wp_query->query );
        //          query_posts( $args );
            //    }
            //  $s = new_wp_query($args);
            ?>
            <form role="search" method="get" id="searchform" action="<?php echo site_url( '/' ); ?>">
                <label class="screen-reader-text" for="s">Search for:</label>
                <input type="text" value="" name="s" id="s" placeholder="Search Our Blog...">
                <input type="hidden" name="post_type" value="post" />
                <input type="submit" id="searchsubmit" value="Search">
            </form>
          </div>
        </div>
        <div class="clips block">
          <h4>Find Your Creation</h4>
          Stopped in recently? Find your work at our CMA CLIPS gallery!
          <a href="http://vimeo.com/cmaclips/albums">Browse CMA Clips </a>
          <div class="sprite" id="bubble-man"></div>
        <div class="sprite" id="man"></div></div>
        </div>
        
      </div>
<?php endwhile; ?>
</div>

    <div class="clear" aria-hidden="true">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>
