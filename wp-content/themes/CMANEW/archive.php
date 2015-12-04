<?php
  get_header();
  //get_sidebar('mainnew');
  get_header('nav');
?>

<div id="page-new" class="container">
  <!--PAGE-CONTAINER -->
  <?php get_sidebar('mainnew');?>
  <div id="page-container" class="new_page">
  	<?php while ( have_posts() ) : the_post(); endwhile;?>
  </div>
    

<?php get_footer(); ?>
