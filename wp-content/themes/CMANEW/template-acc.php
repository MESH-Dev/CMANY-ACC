<?php
/*
	Template Name: ACC TEST
*/
get_header();
get_sidebar('mainnew');
get_header('nav'); ?>

<!--PAGE-NEW-->
<div id="page-new" >
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
			if($_SERVER['REQUEST_METHOD'] == "POST"){
				$taxArr = array();

				if($_POST['season'] != ''){
					$season = $_POST['season'];
					$seasonArr = array(
						'taxonomy' => 'classseason',
						'field' => 'slug',
						'terms' => $season,
					);
					array_push($taxArr, $seasonArr);

					$seasonName = get_term_by('slug', $season, 'classseason');
					$seasonName = $seasonName->name.', ';
				}

				if($_POST['category'] != ''){
					$department = $_POST['category'];
					$departmentArr = array(
						'taxonomy' => 'classdepartment',
						'field' => 'slug',
						'terms' => $department,
					);
					array_push($taxArr, $departmentArr);

					$departmentName = get_term_by('slug', $department, 'classdepartment');
					$departmentName = $departmentName->name.', ';
				}

				if($_POST['age'] != ''){
					$age = $_POST['age'];
					$ageArr = array(
						'taxonomy' => 'classages',
						'field' => 'slug',
						'terms' => $age,
					);
					array_push($taxArr, $ageArr);

					$ageName = get_term_by('slug', $age, 'classages');
					$ageName = $ageName->name.', ';
				}

				if($_POST['location'] != ''){
					$location = $_POST['location'];
					$locationArr = array(
						'taxonomy' => 'classlocation',
						'field' => 'slug',
						'terms' => $location,
					);
					array_push($taxArr, $locationArr);

					$locationName = get_term_by('slug', $location, 'classlocation');
					$locationName = $locationName->name.', ';
				}

				if($_POST['week'] != ''){
					$week = $_POST['week'];
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
			        $timestamp_for_monday = $timestamp - 86400 * ( date( 'N', $timestamp ) - 1 );
			        $date_for_monday = date( 'F jS', $timestamp_for_monday );


					//$weekStart = date('M jS',strtotime($thisday));
				}

				wp_reset_query();
				$args = array(
					'post_type' => 'artcolonyclasses',
					'category_name' => 'art-colony',
					'posts_per_page' => -1,
					'tax_query' => $taxArr
				);
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
					'posts_per_page' => -1,
					'category_name' => 'art-colony'
					);
				$query = new WP_Query($args);
			}
		?>

		<?php
		if ( $query->have_posts() ) { while ( $query->have_posts() ) { $query->the_post();
			$ages = wp_get_post_terms(get_the_id(), 'classages',array('fields' => 'names'));
			natsort($ages); ?>

			<div class="two_third"><h3><?php the_title(); ?></h3>
			<p><?php the_content(); ?></p></div><p></p>
			<p></p><div class="one_third last_column"><p>&nbsp;</p>
			<?php $post_id = get_the_ID();
				$startMeta = get_post_meta( $post_id, 'start_date_TEST', true );
				$endMeta = get_post_meta( $post_id, 'end_date_TEST', true );
				$startMeta = strtotime($startMeta);
				$endMeta = strtotime($endMeta);

				$startMetaName = date('M jS', $startMeta);
				$endMetaName = date('M jS', $endMeta);

				$locations = wp_get_post_terms($post_id, 'classlocation'); ?>
			<p><strong>Ages:<?php echo $ages[0]; ?>-<?php echo end($ages); ?></strong><br>
			<p><strong>Dates:<?php echo $startMetaName; ?> -<?php echo $endMetaName; ?></strong></p><br>

			<?php if(get_field('classtime')){ ?>
				<strong>Time:<?php the_field('classtime'); ?><br></strong></p>
			<?php } ?>
			<p><strong><span class="location">Location:<?php foreach($locations as $loc){ echo $loc->name; } ?></span></strong></p>
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
   <?php get_template_part( 'blocks/classes', 'filters' ); ?>
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
