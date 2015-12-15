 <?php 
  get_header();
  /* Template Name: Blog Search */
  // get_sidebar('search'); 
  get_header('nav'); 
?>

<!--PAGE-NEW-->
<div class="page-new container blog_search">
  <!--PAGE-CONTAINER -->
  <?php get_sidebar('mainnew');?>
  <div id="page-container" class="new_page">
  
    <div class="columns eight">
     <!--TITLE -->
    <div class="block">
       
        <h2 class="page-title<?php echo $currentcolor; ?>">
          Blog Search Results
        </h2>
        
    </div>

<?php global $query_string; query_posts($query_string . '&post_type=post'); ?>
    

    <div class="block">


      <!-- MAIN CONTENT DIV-->
      <div id="left-content" class="mt-20">
<?php if ( have_posts() ) : ?>
          <h3 class="pagetitle"> Results for: "<?php echo get_search_query(); ?>"</h3>
<?php else : ?>
            <h3> Sorry, Nothing Found! </h3>

            <div class="top-search" style="margin-top: 30px;">
              <form method="get" id="search" action="<?php echo home_url( '/' ); ?>">
               <!--  <label for="s" class="sr-only">Search Terms</label>  -->
                <input name="s" id="s" type="text" size="40" placeholder="Search CMANY..." />
              </form>
            </div>

<?php endif; ?>
             
             
            
<?php while (have_posts()) : the_post(); ?>

  
     <div class="searchpost">
      <h4 id="post-<?php the_ID(); ?>">
        <a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to<?php the_title(); ?>">
<?php the_title(); ?>
        </a>
      </h4>

      <p><?php the_excerpt(); ?>
    
     </div>
<?php endwhile; ?>

     <div class="navigation">
        <div class="alignleft">
<?php next_posts_link('&laquo; Previous Entries') ?>
        </div>
        <div class="alignright">
<?php previous_posts_link('Next Entries &raquo;') ?>
        </div>
      </div>
 

    </div>

 </div>

      </div>
       
      <!-- Sidebar CONTENT --> 
      <div class="three columns">

        <div id="search-2" class="widget widget_search sidebar_search">
          <div class="inner_container">
            <h4 class="widgettitle">Search</h4>
            <?php 
            
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
  <!--   </div> -->
 


    <div class="clear" aria-hidden="true">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>