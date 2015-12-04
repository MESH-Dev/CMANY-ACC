<?php
  get_header();
  //get_sidebar('mainnew');
  get_header('nav');
?>

<div id="page-new" class="container post_archive">
  <!--PAGE-CONTAINER -->
  <?php get_sidebar('mainnew');?>
  <div id="page-container" class="new_page">
    <div class="eight columns">
    	<!-- <h1 class="page-title">CMANY Blog</h1> -->
    	<img alt="CMANY Blog" class="title" src="<?php echo get_template_directory_uri("/")?>/images/bloggif.gif" />
    	<?php
    		 $args = array(
  				'post_type' => 'post',
      			'posts_per_page' => 5,
      			'post_status' => 'publish',
      			'orderby' => 'date',
      			'order' => 'DESC'
      			);

      			$the_query = new WP_Query( $args );
    	?>
    	<?php if ( $the_query->have_posts() ) :?>
    	<?php //query_posts($query_string."&orderby=date&order=DESC"); ?>


        <?php while ( $the_query->have_posts() ) : $the_query->the_post(); ?>
        <article class="post">
        	<?php the_post_thumbnail();?>
        	<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        	<div class="date" role="date"><?php echo get_the_date(''); // Display the time published ?> </div>
        	<?php the_excerpt( 'Continue...' ); ?>
        	<?php if (get_the_category_list()){ ?>
        	<div class="cats">
        		<span class="label">Posted in:</span> <?php echo get_the_category_list ('&nbsp;|&nbsp;'); ?>
        	</div>
        	<?php } ?>
        	<?php if (get_the_tag_list()){ ?>
        	<div class="tags">
				<span class="label">Tagged in: </span><?php echo get_the_tag_list('', '&nbsp;|&nbsp;' ); // Display the tags this post has, as links separated by spaces and pipes ?>	
			</div>
			<?php } ?>
			
		</article>
		<?php endwhile; endif; ?>	
		
		<div class="pagination"><?php wp_link_pages(); // This will display pagination links, if applicable to the post ?></div>
			</div> <!-- end .eight.columns -->
			<div class="three columns">
				<div class="clips block">
					<h4>Find Your Creation</h4>
					Stopped in recently? Find your work at our CMA CLIPS gallery!
<a href="http://vimeo.com/cmaclips/albums" aria-label="Browse CMA Clips">Browse CMA Clips </a>
				</div><div class="sprite" id="bubble-man"></div><div class="sprite" id="man"></div></div>
				</div>
		</div>	
			</div> <!-- end #page-container -->
			</div> <!-- end  .container -->

<?php get_footer(); ?>
