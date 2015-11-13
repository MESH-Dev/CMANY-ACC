<?php
/**
* The TEC template for a list of events. This includes the Past Events and Upcoming Events views 
* as well as those same views filtered to a specific category.
*
* You can customize this view by putting a replacement file of the same name (list.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

get_header();

get_sidebar('small');

get_header('nav'); 

?>
</div><!-- #page-container --></div><!-- #page-right -->

<div class="block"></div>      <!-- block -->     
                

<?php if(get_field('calendar_banner_img', 303)): ?>
<div class="block mt20 left mb15">
              <a href="<?php the_field('calendar_banner_link', 303); ?>" title="<?php the_field('banner_alt', 303); ?>">
					<?php $image = wp_get_attachment_image_src(get_field('calendar_banner_img', 303), 'full'); ?>
                     <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $image[0]; ?>&w=946" alt="<?php the_field('banner_alt', 303); ?>" />
               </a>      
         
</div>      <!-- block -->    
<?php endif; ?>



<div id="tribe-events-content" class="upcoming">
<h2 class="page-title calendar">
<?php $querycatslug=get_query_var('tribe_events_cat'); 

$queryCat=get_term_by('slug', $querycatslug, 'tribe_events_cat');

if($queryCat) { echo '' . get_query_var('eventDisplay') . ' ' . $queryCat->name; } else {  echo '' . get_query_var('eventDisplay') . ' Events'; }
?></h2>

	<?php if(!tribe_is_day()): // day view doesn't have a grid ?>
		
		<span class='tribe-events-calendar-buttons'> 
			<a class='tribe-events-button-on decker' id="list" href='<?php echo tribe_get_listview_link(); ?>'><?php _e('List', 'tribe-events-calendar')?></a>
			<a class='tribe-events-button-off decker' id="calendar" href='<?php echo tribe_get_gridview_link(); ?>'><?php _e('Calendar', 'tribe-events-calendar')?></a>
		</span>
        
	<?php endif; ?>
    <div class="block left">
            <div id="tribe-events-loop" class="tribe-events-events post-list clearfix">
            
       <?php if (have_posts()) : ?>
       <?php $hasPosts = true; $first = true; ?>
       <?php while ( have_posts() ) : the_post(); ?>
           <?php global $more; $more = false; ?>
                
           <?php if ( tribe_is_new_event_day() && !tribe_is_day() ) : ?>
                        <h2 class="event-day"><?php echo tribe_get_start_date( null, false ); ?></h2>
               <?php endif; ?>
               <?php if ( tribe_is_day() && $first ) : $first = false; ?>
                        <h2 class="event-day"><?php echo tribe_event_format_date(strtotime(get_query_var('eventDate')), false); ?></h2>
               <?php endif; ?>
                    
                <div id="post-<?php the_ID() ?>"<?php post_class('tribe-events-event clearfix') ?> itemscope itemtype="http://schema.org/Event">
                
                    
                    <!--<?php if(get_field('image')) : ?>
                    <?php $image = wp_get_attachment_image_src(get_field('image'), 'full'); ?>
                         <a class="img-left" href="<?php echo tribe_get_event_link(); ?>">
                             <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $image[0]; ?>&h=127&w=244&zc=0" alt="<?php the_field('banner'); ?>" />
                         <a>
               <?php endif; ?>-->
                    
               <?php 
                    $terms = get_the_terms( $post->ID, 'event_location' ); // get an array of all the terms as objects.
        
                if(!empty($terms)) {
        
                        $terms_slugs = array();
                        
                        foreach( $terms as $term ) {
                        
                        if ($term->parent==0) 
                        
                            { 
                                $terms_slugs[] = $term->slug; // if term has no parent echo the slug
                            } 
                            else { 
                                $array = get_term_by('id', $term->parent, 'event_location', 'terms_slugs');
                          } 
                          
                        }
                        
                } else { $terms_slugs= ""; } 
                
                ?>
                    
                    
                    <div class="entry-content tribe-events-event-entry<?php if ($terms) { echo " " . $terms_slugs[0]; } ?>" itemprop="description"<?php if(!get_field('image')) { ?>id="blank-image"<?php } ?>>
                    <dl class="category"><?php tribe_meta_event_cats(' ' ,'separator'); ?></dl>
               <?php the_title('<h2 class="entry-title calendar" itemprop="name"><a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', ' <span class="raquo">&raquo;</span></a></h2>'); ?>
                        <div class="eventdesc">
                   <?php if (has_excerpt ()): ?>
                       <?php the_excerpt(); ?>
                        
                   <?php endif; ?>
                        </div><!-- end event meta -->
                        
                             <div class="tribe-events-event-list-meta" itemprop="location" itemscope itemtype="http://schema.org/Place">
                                    <table cellspacing="0">
                                   <?php if (tribe_is_multiday()): ?>
                                        <tr>
                                       
                                            <td class="tribe-events-event-meta-value" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date(); ?></td>
                                        </tr>
                                        <tr>
                                          
                                            <td class="tribe-events-event-meta-value" itemprop="endDate" content="<?php echo tribe_get_end_date(); ?>"><?php echo tribe_get_end_date(); ?></td>
                                        </tr>
                                   <?php else:  ?>
                                        <tr>
                                          
                                            <td class="tribe-events-event-meta-value" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date( $post->ID, false, 'g:i a' );  ?> -<?php echo tribe_get_end_date( $post->ID, false, 'g:i a' ); ?></td>
                                        </tr>
                                   <?php  endif; ?>
                    
                                  <?php if(get_the_terms( $post->ID, 'event_location' )) : ?>
                                        <tr>
                                        
                                            <td class="tribe-events-event-meta-value" itemprop="name">
                                               
                                               <span class="cmalocation"><?php print_taxonomy_ranks( get_the_terms( $post->ID, 'event_location' ) );  ?></span>
                                               
                                            </td>
                                        </tr>
                                   <?php  endif; ?>
                                   <?php /* if (tribe_address_exists( get_the_ID() ) ) : ?>
                                        <tr>
                                          
                                       <?php if( get_post_meta( get_the_ID(), '_EventShowMapLink', true ) == 'true' ) : ?>
                                              <td class="tribe-events-event-meta-value">
                                                <a class="gmap" itemprop="maps" href="<?php echo tribe_get_map_link(); ?>" title="Click to view a Google Map" target="_blank"><?php _e('Google Map', 'tribe-events-calendar' ); ?></a>
                                                </td>
                                       <?php endif; ?>
                                            <td class="tribe-events-event-meta-value"><?php echo tribe_get_full_address( get_the_ID() ); ?></td>
                                        </tr>
                                   <?php endif; */ ?>
                                   <?php
                                            $cost = tribe_get_cost();
                                            if ( !empty( $cost ) ) :
                                        ?>
                                        <tr>
                                         
                                            <td class="tribe-events-event-meta-value" itemprop="price">$<?php echo $cost; ?></td>
                                         </tr>
                                   <?php endif; ?>
                                        
                                    <?php if(get_the_terms( $post->ID, 'event_ages' )) : ?>
                                        <tr>
                                        
                                            <td class="tribe-events-event-meta-value" itemprop="name">
                                               
                                               <span class="cmaage"><?php print_taxonomy_ranks( get_the_terms( $post->ID, 'event_ages' ) );  ?></span>
                                               
                                            </td>
                                        </tr>
                                   <?php endif ?>
                                        
                                        
                                    </table>
                                </div><!-- End meta -->
                                
                    </div> <!-- End tribe-events-event-entry -->
        
                    
                </div> <!-- End post -->
       <?php endwhile;// posts ?>
       <?php else :?>
           <?php 
                    $tribe_ecp = TribeEvents::instance();
                    if ( is_tax( $tribe_ecp->get_event_taxonomy() ) ) {
                        $cat = get_term_by( 'slug', get_query_var('term'), $tribe_ecp->get_event_taxonomy() );
                        if( tribe_is_upcoming() ) {
                            $is_cat_message = sprintf(__(' listed under %s. Check out past events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
                        } else if( tribe_is_past() ) {
                            $is_cat_message = sprintf(__(' listed under %s. Check out upcoming events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
                        }
                    }
                ?>
           <?php if(tribe_is_day()): ?>
               <?php printf( __('No events scheduled for <strong>%s</strong>. Please try another day.', 'tribe-events-calendar'), date_i18n('F d, Y', strtotime(get_query_var('eventDate')))); ?>
           <?php endif; ?>
        
           <?php if(tribe_is_upcoming()){ ?>
               <?php _e('No upcoming events', 'tribe-events-calendar');
                    echo !empty($is_cat_message) ? $is_cat_message : ".";?>
        
           <?php }elseif(tribe_is_past()){ ?>
               <?php _e('No previous events' , 'tribe-events-calendar');
                    echo !empty($is_cat_message) ? $is_cat_message : ".";?>
           <?php } ?>
                
       <?php endif; ?>
        
        
            </div><!-- #tribe-events-loop -->
            
            
            
            <sidebar id="cal-list">
            
       <?php
                    $cats = get_terms('tribe_events_cat', 'parent=0');
                
                    echo '<ul class="events-cat-menu">';
                    
                    echo '<li class="head">Programs</li>';
                    echo '<li class="parent"><a href="' . get_bloginfo('url') . '/calendar/upcoming">All</a></li>';
                            foreach ( $cats as $cat ) {
                            
                                    
                            
                                    echo '<li';
                                    
                                    if($cat->parent) { echo ' class="child" '; } else { echo ' class="parent" '; }
                                    
                                    echo ' id="tax-menu-'. $cat->slug .'"><a href="'. get_bloginfo('url') . '/calendar/category/' . $cat->slug . '/upcoming/">' . $cat->name . '</a></li>'; 
                                    
                                    $termID = $cat->term_id;
                                    $taxonomyName = "tribe_events_cat";
                                    $termchildren = get_term_children( $termID, $taxonomyName );
                                    
                                        foreach ($termchildren as $child) 
                                        {
                                            $children = get_term_by( 'id', $child, $taxonomyName );
                                            echo '<li class="child" ><a href="'. get_bloginfo('url') . '/calendar/category/' . $children->slug . '/upcoming/">' . $children->name . '</a></li>';
                                        } // end for each term child
                                                
                            } // end for eeach term parent
                            
                    echo '</ul>';
            
            
            
                    $terms2 = get_terms("event_location", 'hide_empty=0&child_of=61');
                    
                    $parent2=get_term_by('id', 61, 'event_location');
                    
                    
                        echo '<ul class="events-tax-menu" id="at-cma">';
                        echo '<li class="parent" id="tax-menu-'. $parent2->slug .'"><a href="'. get_bloginfo('url') . '/calendar/upcoming/?event_location='. $parent2->slug .'">' . $parent2->name . '</a></li>';
                        foreach ( $terms2 as $term ) {
                                echo '<li class="child" id="tax-menu-'. $term->slug .'"><a href="'. get_bloginfo('url') . '/calendar/upcoming/?event_location='. $term->slug .'">' . $term->name . '</a></li>';
                        }
                        echo '</ul>';
                        
            
                    $terms = get_terms("event_location", 'hide_empty=0&child_of=98');
                    
                    $parent=get_term_by('id', 98, 'event_location');
                    
                        echo '<ul class="events-tax-menu" id="community">';
                        echo '<li class="parent" id="tax-menu-'. $parent->slug .'"><a href="'. get_bloginfo('url') . '/calendar/upcoming/?event_location='. $parent->slug .'">' . $parent->name . '</a></li>';
                        foreach ( $terms as $term ) {
                                
                                $grandchild=get_term_by('id', $term->parent, 'event_location');
                                
                                echo '<li class="';
                                if($grandchild->parent) { echo 'grandchild'; } else { echo 'child'; }
                                echo '"  id="tax-menu-'. $term->slug .'" ><a href="'. get_bloginfo('url') . '/calendar/upcoming/?event_location='. $term->slug .'">' . $term->name . '</a></li>';
                        }
                        echo '</ul>';
            
                
        
        ?>
        
           <?php if(get_field('hours_title', 303)): ?>
                
                    <div class="block" id="hours">
                    
                    <h3><?php the_field('hours_title', 303); ?></h3>
                    <p><?php the_field('hours_before', 303); ?></p>
                    
               <?php if (get_field('hour_list',303)): ?>
                        <table>
                       <?php while(the_repeater_field('hour_list',303)): ?>
                                <tr>
                                    <td class="first"><?php the_sub_field('cal_sidebar_day'); ?></td><td class="second"><?php the_sub_field('cal_sidebar_times'); ?></td>
                                </tr>
                       <?php endwhile; ?>
                         </table>
               <?php endif; ?> 
                    <p><?php the_field('after_hours', 303); ?></p>
                    
                    </div><!-- end hours -->
                
                     
           <?php endif; ?>
        
            </sidebar>
    </div>
    
	<div id="tribe-events-nav-below" class="tribe-events-nav clearfix list">

		<div class="tribe-events-nav-previous"><?php 
		// Display Previous Page Navigation
		if( tribe_is_upcoming() && get_previous_posts_link() ) : ?>
			<?php previous_posts_link( '<span>'.__('&laquo; Previous Events', 'tribe-events-calendar').'</span>' ); ?>
		<?php elseif( tribe_is_upcoming() && !get_previous_posts_link( ) ) : ?>
			<a href='<?php echo tribe_get_past_link(); ?>'><span><?php _e('&laquo; Previous Events', 'tribe-events-calendar' ); ?></span></a>
		<?php elseif( tribe_is_past() && get_next_posts_link( ) ) : ?>
			<?php next_posts_link( '<span>'.__('&laquo; Previous Events', 'tribe-events-calendar').'</span>' ); ?>
		<?php endif; ?>
		</div>

		<div class="tribe-events-nav-next"><?php
		// Display Next Page Navigation
		if( tribe_is_upcoming() && get_next_posts_link( ) ) : ?>
			<?php next_posts_link( '<span>'.__('Next Events &raquo;', 'tribe-events-calendar').'</span>' ); ?>
		<?php elseif( tribe_is_past() && get_previous_posts_link( ) ) : ?>
			<?php previous_posts_link( '<span>'.__('Next Events &raquo;', 'tribe-events-calendar').'</span>' ); // a little confusing but in 'past view' to see newer events you want the previous page ?>
		<?php elseif( tribe_is_past() && !get_previous_posts_link( ) ) : ?>
			<a href='<?php echo tribe_get_upcoming_link(); ?>'><span><?php _e('Next Events &raquo;', 'tribe-events-calendar'); ?></span></a>
		<?php endif; ?>
		</div>

	</div>
	<?php /*if ( !empty($hasPosts) && function_exists('tribe_get_ical_link') ): ?>
		<a title="<?php esc_attr_e('iCal Import', 'tribe-events-calendar') ?>" class="ical" href="<?php echo tribe_get_ical_link(); ?>"><?php _e('iCal Import', 'tribe-events-calendar') ?></a>
	<?php endif; */ ?>
</div>

<style title="text/css">
.sf-menu #calendar a {color:#00BAC5 !important;}
.sf-menu #classes.sf-breadcrumb a {color:#00BAC5 !important;}

</style>
<?php //get_footer('calendar'); ?>