<?php
/**
 * Template Name: Front-new
 */

the_post();
//$currentcolor=$post->post_name;
get_header();
get_sidebar('mainnew');
get_header('nav');
?>

<!--START CAROUSEL-->
<?php get_template_part('blocks/carousel'); ?>

<!--PAGE-NEW-->
<div id="page-new" >

  <!--PAGE-CONTAINER -->
  <div id="page-container" class="homecols">

    <!--QUARTERS-->
<?php get_template_part('blocks/quarter-blocks'); ?>




  <!--CLEAR-->
  <div class="clear">&nbsp;</div>

  <!--END PAGE-CONTAINER -->
  </div>

  <!--END PAGE-NEW-->
</div>

<?php get_footer(); ?>