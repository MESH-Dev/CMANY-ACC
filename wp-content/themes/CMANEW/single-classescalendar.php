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


    <div class="block">

      <!-- MAIN CONTENT DIV-->
      <div id="left-content" class="mt-20">

      	<div id="event-content">

        	<h2><?php the_title(); ?></h2>

        	<div class="block">
		   <?php get_template_part('blocks/banner-script'); ?>
		    </div>
	        <!-- SLIDESHOW -->
	   <?php if(get_field('slide')): ?>
	       <?php get_template_part('blocks/slider'); ?>
	   <?php endif; ?>



	 		<?php
		 		$thumbnail = "single-event-small";
	            $categories = get_the_category();
	            $separator = ',';
	            $output = '';

	            if($categories){
	              foreach($categories as $category) {
	                if($category->cat_name =='Exhibition')
	                {
	                	$thumbnail = "single-event-large";

	                }
	              }

	            }
	        ?>

	        <div class="<?php echo $thumbnail; ?>-thumb">

	        	<?php if ( has_post_thumbnail() ) { the_post_thumbnail($thumbnail);} ?>

	        </div>
	        <!-- MAIN CONTENT ddddddd-->
	        <div class="<?php echo $thumbnail; ?>-content">

	        	<div class="single-event-time">

			   <?php
			        	date_default_timezone_set('UTC');
			        	$startdate = get_field('start_date');
			        	$enddate = get_field('end_date');


			        	$y = substr($startdate, 0, 4);
						$m = substr($startdate, 4, 2);
						$d = substr($startdate, 6, 2);
						$time = strtotime("{$d}-{$m}-{$y}");

						$ey = substr($enddate, 0, 4);
						$em = substr($enddate, 4, 2);
						$ed = substr($enddate, 6, 2);
						$etime = strtotime("$ed-$em-$ey");

						$edate = date('F jS', $etime);
						$sdate = date('F jS', $time);

						echo date('l, F jS', $time);


			        	if ($enddate !='') {
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
