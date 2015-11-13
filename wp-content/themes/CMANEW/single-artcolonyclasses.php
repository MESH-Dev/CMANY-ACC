<?php
  get_header();
  get_sidebar('mainnew');
  get_header('nav');
?>

<!--PAGE-NEW-->
<div id="page-new" class="accget">
  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">
  	<div class="block">
      <h2 class="page-title">Classes Calendar</h2>
    </div>
<?php while ( have_posts() ) : the_post(); ?>


      <!-- MAIN CONTENT DIV-->
       <div class="calendar_main_column">
       	<a href="<?php bloginfo('url');?>/classes-calendar"><button class="feedBacks">Go back</button></a>

      	<div id="event-content">

        	<h2><?php the_title(); ?></h2>

        	<div class="block">
		   <?php get_template_part('blocks/banner-script'); ?>
		    </div>

			<?php

			$layout = get_field('layout');

			if($layout == 'Two Column')
			{
				$thumbnail = "single-event-small";
				?>

				<div class="<?php echo $thumbnail; ?>-thumb">
	        		<?php if ( has_post_thumbnail() ) { the_post_thumbnail($thumbnail);} ?>
	        	 </div>

	        	<?php

			}
			else{

			    if(get_field('slide-image')){
	             get_template_part('blocks/slider');
	          	}
	        	else
	        	{
			 		$thumbnail = "single-event-large";?>
			 		<div class="<?php echo $thumbnail; ?>-thumb">
	        			<?php if ( has_post_thumbnail() ) { the_post_thumbnail($thumbnail);}  ?>
	        		 </div>
		    <?php
	            }
	            ?>



	        	<?php

			}

			 ?>


	        <!-- MAIN CONTENT ddddddd-->
	        <div class="<?php echo $thumbnail; ?>-content">

	        	<div class="single-event-time">

			   <?php
			        	date_default_timezone_set('UTC');
			        	$startdate = get_field('start_date_TEST');
			        	$enddate = get_field('end_date_TEST');

						$edate = date('F jS', strtotime($enddate));
						$sdate = date('F jS', strtotime($startdate));

						//echo date('l, F jS', $time);


			        	if ($enddate !='' && $sdate != $edate) {
			        		echo $sdate . " - " . $edate;

			        	}
			        	else
			        	{
			        		echo date('l, F jS', $time);
			        	}



			        ?> <br>

			   <?php the_field('start'); ?> -<?php echo the_field('end');?>
			    </div>

			      <div class="single-event-location">
			   <?php
			            $locations = get_the_terms($post->ID, 'location' );
			            $separator = ',';
			            $output = '';

			            if($locations){
			              foreach($locations as $location) {
			                $output .= $location->name . $separator;
			              }
			              echo trim($output, $separator);
			            }
			        ?>
			    </div>

	        	<div class="single-event-cats">
			   <?php
			            $categories = get_the_category();
			            $separator = ',';
			            $output = '';

			            if($categories){
			              foreach($categories as $category) {
			                $output .= $category->cat_name . $separator;
			              }
			              echo trim($output, $separator);
			            }
			        ?>
			    </div>


			    <div class="single-event-ages">
			   <?php
			            $ages = get_the_terms($post->ID, 'age' );
			            $separator = ', ';
			            $output = '';

			            if($ages){
			              foreach($ages as $age) {
			                $output .= $age->name . $separator;
			              }
			              echo "AGES " . trim($output, $separator);
			            }
			        ?>
			    </div>

	        	<?php the_content(); ?>

	        </div>

	    <?php if(get_field('footer-text')): ?>
	            <hr>
	            <div class="page-footer-text">
	         <?php the_field('footer-text'); ?>
	            </div>
	   <?php endif; ?>

 		</div>

      </div>


      <!-- Sidebar CONTENT -->
      <sidebar id="cma-sidebar" class="mt-10">
   <?php get_sidebar('events'); ?>
      </sidebar>


<?php endwhile; ?>


    <div class="clear">&nbsp;</div>
    <!--CLEAR-->
    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>

<?php get_footer(); ?>
