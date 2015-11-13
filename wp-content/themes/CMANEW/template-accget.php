<?php
/*
	Template Name: ACCget
*/
get_header();
get_sidebar('mainnew');
get_header('nav'); ?>

<!--PAGE-NEW-->
<div id="page-new" class="accget" >
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


		<?php
			if($_SERVER['REQUEST_METHOD'] == "GET"){
				$taxArr = array();

				if($_GET['season'] != ''){
					$season = $_GET['season'];
					$seasonArr = array(
						'taxonomy' => 'classseason',
						'field' => 'slug',
						'terms' => $season,
					);
					array_push($taxArr, $seasonArr);

					$seasonName = get_term_by('slug', $season, 'classseason');
					$seasonName = $seasonName->name.', ';
				}

				if($_GET['category'] != ''){
					$department = $_GET['category'];
					$departmentArr = array(
						'taxonomy' => 'classdepartment',
						'field' => 'slug',
						'terms' => $department,
					);
					array_push($taxArr, $departmentArr);

					$departmentName = get_term_by('slug', $department, 'classdepartment');
					$departmentName = $departmentName->name.', ';
				}

				if($_GET['age'] != ''){
					$age = $_GET['age'];
					$ageArr = array(
						'taxonomy' => 'classages',
						'field' => 'slug',
						'terms' => $age,
					);
					array_push($taxArr, $ageArr);

					$ageName = get_term_by('slug', $age, 'classages');
					$ageName = $ageName->name.', ';
				}

				if($_GET['location'] != ''){
					$location = $_GET['location'];
					$locationArr = array(
						'taxonomy' => 'classlocation',
						'field' => 'slug',
						'terms' => $location,
					);
					array_push($taxArr, $locationArr);

					$locationName = get_term_by('slug', $location, 'classlocation');
					$locationName = $locationName->name.', ';
				}

				if($_GET['week'] != ''){
					$week = $_GET['week'];
					$weekArr = array(
						'taxonomy' => 'classweek',
						'field' => 'slug',
						'terms' => $week,
					);
					array_push($taxArr, $weekArr);
					$currentYear = date('Y');
					$thisweek = "$currentYearW$week";
					$thisweek --;

			        $timestamp = mktime( 0, 0, 0, 1, 1,  $currentYear) + ( $thisweek * 7 * 24 * 60 * 60 );
			        $timestamp_for_monday = $timestamp - 86400 * ( date( 'N', $timestamp )  );
			        $date_for_monday = date( 'F jS', $timestamp_for_monday );


					//$weekStart = date('M jS',strtotime($thisday));
				}

				wp_reset_query();
				$args = array(
					'post_type' => 'artcolonyclasses',
					'category_name' => 'art-colony',
          'post_status'=>'publish',
					'posts_per_page' => -1,
					'tax_query' => $taxArr,
          'meta_key' => 'sortStartDate',
          'orderby' => 'meta_value_num',
          'order' => 'ASC'
				);
        // $args = array(
        //   'post_type' => 'artcolonyclasses',
        //   'category_name' => 'art-colony',
        //   'post_status'=>'publish',
        //   'posts_per_page' => -1
        // );
				$query = new WP_Query($args);
				if($seasonName || $ageName || $locationName || $departmentName){
					echo "<h3 id='filterBy'>Filtered by: <span>$seasonName</span> <span>$ageName</span> <span>$locationName</span> <span>$departmentName</span></h3>";
				}
				if($date_for_monday){
					echo "<h2 id='weekFilter'>Week of $date_for_monday</h2>";
				}

			}else{
				$seasonTerms = get_terms('classseason');
				$season = array();
				foreach($seasonTerms as $term){
					array_push($season,$term->slug);
				}

				$departmentTerms = get_terms('classdepartment');
				$department = array();
				foreach($departmentTerms as $term){
					array_push($department,$term->slug);
				}

				$ageTerms = get_terms('classage');
				$age = array();
				foreach($ageTerms as $term){
					array_push($age,$term->slug);
				}

				$locationTerms = get_terms('classlocation');
				$location = array();
				foreach($locationTerms as $term){
					array_push($location,$term->slug);
				}

				$weekTerms = get_terms('classweek');
				$week = array();
				foreach($weekTerms as $term){
					array_push($week,$term->slug);
				}
				wp_reset_query();
				$args = array(
					'post_type' => 'artcolonyclasses',
          'post_status'=>'publish',
					'posts_per_page' => -1,
					'category_name' => 'art-colony',
          'meta_key' => 'sortStartDate',
          'orderby' => 'meta_value_num',
          'order' => 'ASC'
					);
        // $args = array(
        //   'post_type' => 'artcolonyclasses',
        //   'post_status'=>'publish',
        //   'posts_per_page' => -1,
        //   'category_name' => 'art-colony'
        // );
				$query = new WP_Query($args);
			}
		?>

		<?php
		if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
			$ages = wp_get_post_terms(get_the_id(), 'classages',array('fields' => 'names'));
			natsort($ages); ?>

			<div class="two_third"><h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
			<p><?php the_content(); ?></p></div><p></p>
			<p></p><div class="one_third last_column"><p>&nbsp;</p>
			<?php $post_id = get_the_ID();
				$startMeta = get_post_meta( $post_id, 'start_date_TEST', true );
				$endMeta = get_post_meta( $post_id, 'end_date_TEST', true );
				$startMeta = strtotime($startMeta);
				$endMeta = strtotime($endMeta);

        // update_post_meta($post_id, 'sortStartDate', $startMeta);
        // update_post_meta($post_id, 'sortEndDate', $endMeta);

				$startMetaName = date('M jS', $startMeta);
				$endMetaName = date('M jS', $endMeta);

				$locations = wp_get_post_terms($post_id, 'classlocation'); ?>
			<p><strong>Ages: <?php  $comma_separated = implode(", ", $ages); echo $comma_separated;?></strong><br>
			<p><strong>Dates: <?php echo $startMetaName; ?> - <?php echo $endMetaName; ?></strong></p><br>

			<?php if(get_field('classtime')){ ?>
				<strong>Time:<?php the_field('classtime'); ?><br></strong></p>
			<?php } ?>
			<p><strong><span class="location">Location: <?php foreach($locations as $loc){ echo $loc->name; } ?></span></strong></p>

			</div><div class="clear_column"></div><p></p>
			<hr><p></p>

		<?php } } wp_reset_query(); ?>

    <?php if(get_field('footer-text')): ?>
            <hr>
            <div class="page-footer-text">
         <?php the_field('footer-text'); ?>
            </div>
   <?php endif; ?>



      </div>

      <!-- Sidebar CONTENT -->
      <sidebar id="cma-sidebar" class="mt-10">
   <?php get_template_part( 'blocks/classes', 'filterget' ); ?>
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
