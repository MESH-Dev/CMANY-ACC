<?php 
  get_header();
  // get_sidebar('search'); 
  get_header('nav'); 
?>

<!--PAGE-NEW-->
<div class="page-new container site_search">
  <!--PAGE-CONTAINER -->
  <?php get_sidebar('mainnew');?>
  <div id="page-container" class="new_page columns eleven">
  
    
     <!--TITLE -->
    <div class="block">
       
        <h2 class="page-title<?php echo $currentcolor; ?>">
          Search Results
        </h2>
        
    </div>


    

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
        <a href="<?php the_permalink() ?>" rel="bookmark" >
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
       
      <!-- Sidebar CONTENT --> 
      <sidebar id="cma-sidebar" class="mt-10">
<?php //get_sidebar('default'); ?>
      </sidebar>
      
    </div>
 


    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>
<?php get_footer(); ?>