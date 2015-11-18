<?php wp_reset_postdata();
  //POSTS
  	$posts = get_posts(array(
	  'numberposts' => -1,
	  'post_type' => 'artcolonyclasses',
	  'order'=>'ASC'
	)); ?>
<h2 class="featured">Special Exhibitions</h2>
<?php foreach($posts as $post){ 
	$fields = get_fields($post->ID);
	if($fields['featured'] == "Yes" && $fields['featured_exhibition'] == "yes") {
?>

	<div class="feature-event">
		<h3><?php echo the_title(); ?></h3>
		<div class="feature-anim">
			<?php $speakerIMG = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
			<div class="feature-img" style="background-image:url(<?php echo $speakerIMG; ?>);"></div>
			<div class="feature-overlay">
				<div class="gutter">
					<div class="feature-date"><?php if($fields['specific_date'] != "") {  echo date('M j',strtotime($fields['specific_date'])); } ?>
					<?php
						if($fields['end_date'] != ''){
							echo ' to ';
							echo date('M j,Y',strtotime($fields['specific_date']));
						}
					?></div>
					<div class="feature-teaser"><?php echo $fields['event_teaser']; ?></div>
				</div>
			</div>
			<div class="feature-excerpt">
				<div class="gutter">
					<?php the_excerpt(); ?>
				</div>
			</div>
		</div>
	</div>

  
<?php } } wp_reset_postdata(); ?>