<?php include('blocks/class_calendar.php'); ?>
<?php get_header();get_sidebar('mainnew'); get_header('nav');  ?>

<div id="page-new">
  <!--PAGE-CONTAINER -->

  <div class="new_page" id="page-container">
    <div class="block">
      <h2 class="page-title">Classes Calendar<br>-<?php $term = get_term_by( 'slug', get_query_var( 'term' ), get_query_var( 'taxonomy' ) ); echo $term->name; ?></h2>
    </div>
    <div class="calendar_main_column">
    	<div id="loader"></div>
    	<div id="calendarMain">
        	<?php
        		$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
        	?>
   <?php
        query_posts($query_string.'&posts_per_page=-1');
        if ( have_posts() ) {
			while ( have_posts() ) {
				the_post(); ?>
					<div class="event_box">
      <h2>
        <a href="<?php echo get_permalink($post->ID); ?>">
     <?php echo get_the_title($post->ID); ?>
        </a>
      </h2>
      <div class="event_location">
   <?php
            $locations = get_the_terms($post->ID, 'location' );
            $separator = ',';
            $output = '';

            if($locations){
              foreach($locations as $location) {
                $output .= $location->name . $separator;
              }
              echo trim($output, $separator);
              echo ", ";
            }
        ?>
      </div>
       <div class="event_cats">
   <?php
            $categories = get_the_category();
            $separator = ',';
            $output = '';

            if($categories){
              foreach($categories as $category) {
                $output .= $category->cat_name . $separator;
              }
              echo ", ";
              echo trim($output, $separator);

            }
        ?>
      </div>


      <div class="event_ages">
   <?php
            $ages = get_the_terms($post->ID, 'age' );
            $separator = ',';
            $output = '';

            if($ages){
              foreach($ages as $age) {
                $output .= $age->name . $separator;
              }
              echo ", ";
              echo trim($output, $separator);
            }
        ?>
      </div>

      <div class="event_time">
   <?php echo get_field('start').' - '.get_field('end'); ?>
      </div>

 <?php $fields = get_fields($post->ID);
          if($fields['featured'] == "Yes") { ?>
      <div class="event_featured_icon">

            <img src="<?php bloginfo( 'template_url' ); ?>/images/event-featured.png" >

      </div>
 <?php } ?>

 <?php $thumbn = get_the_post_thumbnail($post->ID, 'event-thumb'); ?>
 <?php if ($thumbn != '') {?>
      <div class="event_thumbnail">
    <?php echo $thumbn; ?>
      </div>

 <?php } ?>


      <div class="event_content">
   <?php //echo get_post_field('post_content', $post->ID);?>
   <?php  echo get_excerpt_by_id($post->ID); ?>
        <a class="event_more" href="<?php echo get_permalink($post->ID); ?>">
           READ MORE &rsaquo;&rsaquo;
        </a>
      </div>





    </div>
		<?php } } ?>


    	</div>
    	<div id="calendarFeed">
    		<button class="feedBack">Go back</button>
    		<div id="event-content"></div>
    		<button class="feedBack">Go back</button>
    	</div>
    </div><!--END cal main columns-->


    <!--EVENT SIDEBAR-->
    <div id="event_sidebar">

      <div id="event_mini_calendar">
  <?php include('blocks/event_mini_calendar.php'); ?>

      </div>


  		<?php $meta_values = get_post_meta( 9211, 'sidebar_callout', true ); ?>
  		<?php if($meta_values){ ?>
      	 <div id="event-callout">
		  	 <div class="gutter">
		  	 	<?php echo $meta_values; ?>
		  	 </div>
		  	 <div id="callout-caret"></div>
		 </div>
 <?php } ?>

	  <div id="event_box_featured">
  <?php include('blocks/event_special.php'); ?>
      </div>

      <div id="event_box_featured">
      </div>

    </div>

    <div class="clear">&nbsp;</div>
    <!--CLEAR-->





    <!--END PAGE-CONTAINER -->
  </div>
  <!--END PAGE-NEW-->
</div>


<?php get_footer('new'); ?>