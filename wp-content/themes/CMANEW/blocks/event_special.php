<?php wp_reset_postdata();
  //POSTS
  	$posts = get_posts(array(
	  'numberposts' => -1,
	  'post_type' => 'events',
	  'order'=>'ASC',
	  'meta_query' => array(
        array(
          'key' => 'featured_exhibition',
          'value' => 'yes'
          )
        )
	)); ?>
<h2 class="featured">Special Exhibitions</h2>

<?php foreach($posts as $post){
	$fields = get_fields($post->ID);
?>

	<div class="feature-event">
		<h3><?php echo the_title(); ?></h3>

		<a href="<?php echo the_permalink(); ?>" >
		<div class="feature-anim">
			<?php $speakerIMG = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<div class="feature-img" style="background-image:url(<?php echo $speakerIMG; ?>);"></div>
			<div class="feature-overlay">
				<div class="gutter">
					<div class="feature-date"><?php if($fields['specific_date'] != "") {  echo date('F jS',strtotime($fields['specific_date'])); } ?>
					<?php
						if($fields['end_date'] != '' && $fields['end_date'] != $fields['specific_date']){
							echo ' - ';
							echo date('F jS',strtotime($fields['end_date']));
						}
					?></div>
					<div class="feature-location">

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
					<div class="feature-time">
						<?php the_field('start'); ?> -<?php  the_field('end');?>
					</div>

				</div>
			</div>
			<div class="feature-excerpt">
				<div class="gutter">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
		</a>
	</div>


<?php  } wp_reset_postdata(); ?>