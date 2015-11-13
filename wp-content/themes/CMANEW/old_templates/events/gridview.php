
<?php
/**
 * Grid view template.  This file loads the TEC month view, specifically the 
 * month view navigation.  The actual rendering if the calendar happens in the 
 * table.php template.
 *
 * You can customize this view by putting a replacement file of the same name (gridview.php) in the events/ directory of your theme.
 */
the_post();

 $currentcolor='calendar';

//get_header();
get_sidebar('small-logo');
//get_header('nav'); 

//get_sidebar('mainnew'); 
get_header('navnew2'); 

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }

$tribe_ecp = TribeEvents::instance();
?>	

  
<!--PAGE-NEW-->
<div id="page-new" >
  
  <!--PAGE-CONTAINER -->
  <div id="page-container" class="new_page">




<style title="text/css">
.sf-navbar li#calendar a {color:#00BAC5 !important;}
#page {margin-bottom:0px !important;}
</style>
<!--
</div> #page-container </div> #page-right -->


<?php if(get_field('calendar_banner_img', 303)): ?>
<div class="block left mt20 mb15">
              <a href="<?php the_field('calendar_banner_link', 303); ?>" title="<?php the_field('banner_alt', 303); ?>">
					<?php $image = wp_get_attachment_image_src(get_field('calendar_banner_img', 303), 'full'); ?>
                     <img src="<?php bloginfo( 'template_url' ); ?>/timthumb.php?src=<?php echo $image[0]; ?>&w=946" alt="<?php the_field('banner_alt', 303); ?>" />
               </a>      
         
</div>      <!-- block -->    
<?php endif; ?><!-- 
</div>end page -->

<div id="cal-page-reset">

<div class="block">	

	<div id="tribe-events-content" class="grid">
      <!-- This title is here for pjax loading - do not remove if you wish to use ajax switching between month views -->
      
		<div id='tribe-events-calendar-header' class="clearfix">
        
              <h2 class="page-title calendar">
         <?php $tribe_ecp = TribeEvents::instance();
                echo $tribe_ecp->getDateString(tribe_get_month_view_date() ); ?>
               </h2>
               
                              
               <div class="right mt20">
                          <div id="tribe-events-nav-top" class="left">
    
                            <div class="tribe-events-nav-previous left">
                                <a href="<?php bloginfo('url'); ?>/calendar/<?php
                
                $querycatslug=get_query_var('tribe_events_cat'); 
                
                $queryCat=get_term_by('slug', $querycatslug, 'tribe_events_cat');
                
                if($queryCat) { echo 'category/'.$queryCat->slug.'/'; } ?><?php echo $tribe_ecp->previousMonth(tribe_get_month_view_date() ); ?><?php $querylocslug=get_query_var('event_location'); 
                
                $queryLoc=get_term_by('slug', $querylocslug, 'event_location');
                
                if($queryLoc) { echo '/?event_location='. $queryLoc->slug ; } ?>">
                                <img src="<?php bloginfo('template_url'); ?>/images/cal-prev.png" /></a>
                            </div>
                             <div class="tribe-events-nav-next right">
                                <a href="<?php bloginfo('url'); ?>/calendar/<?php
                
                $querycatslug=get_query_var('tribe_events_cat'); 
                
                $queryCat=get_term_by('slug', $querycatslug, 'tribe_events_cat');
                
                if($queryCat) { echo 'category/'.$queryCat->slug.'/'; } ?><?php echo $tribe_ecp->nextMonth(tribe_get_month_view_date() ); ?><?php $querylocslug=get_query_var('event_location'); 
                
                $queryLoc=get_term_by('slug', $querylocslug, 'event_location');
                
                if($queryLoc) { echo '/?event_location='. $queryLoc->slug ; } ?>">
                               <img src="<?php bloginfo('template_url'); ?>/images/cal-next.png" /></a>
                            </div>
                
                        </div><!-- end tribe-events-nav-top -->
                
           		 </div><!-- right -->

        
                <div class="left block mt20">
         
                    <div class="gridview-dropdown" id="programs">
                    
                    <h3 class="head decker-bold">Program</h3>
                    
               <?php $cats = get_terms('tribe_events_cat', 'parent=0');
                    
                        echo '<ul class="events-cat-menu">';
                        
                        
                        echo '<li class="parent"><a href="' . get_bloginfo('url') . '/calendar/month">All</a></li>';
						
                                foreach ( $cats as $cat ) {
								
                                        echo '<li';
                                        
                                        if($cat->parent) { echo ' class="child" '; } else { echo ' class="parent" '; }
                                        
                                        echo ' id="tax-menu-'. $cat->slug .'"><a href="'. get_bloginfo('url') . '/calendar/category/' . $cat->slug ;
										if(get_query_var('eventDate')) {  echo '/' . $tribe_ecp->previousMonth($tribe_ecp->nextMonth(tribe_get_month_view_date())); }
										echo '">' . $cat->name . '</a></li>'; 
                                        
                                        $termID = $cat->term_id;
                                        $taxonomyName = "tribe_events_cat";
                                        $termchildren = get_term_children( $termID, $taxonomyName );
                                        
                                            foreach ($termchildren as $child) 
                                            {
                                                $children = get_term_by( 'id', $child, $taxonomyName );
                                                echo '<li class="child" ><a href="'. get_bloginfo('url') . '/calendar/category/' . $children->slug;
												if(get_query_var('eventDate')) { echo '/' . $tribe_ecp->previousMonth($tribe_ecp->nextMonth(tribe_get_month_view_date())); } //this is my crude way of getting the current month
												echo '">' . $children->name . '</a></li>';
                                            } // end for each term child
                                                    
                                } // end for eeach term parent
                                
                        echo '</ul>';
                        
                        ?>
                    </div><!-- programs -->
                    
                    <div class="gridview-dropdown" id="at-cma">
               <?php 
                    
                    $terms2 = get_terms("event_location", 'hide_empty=0&child_of=61');
                        
                        $parent2=get_term_by('id', 61, 'event_location');
                        
                            echo '<h3 class="head decker-bold" id="at-cma">'.$parent2->name.'</h3>';
                            echo '<ul class="events-tax-menu" id="at-cma">';
                            echo '<li class="parent" id="tax-menu-'. $parent2->slug .'"><a href="'. get_bloginfo('url') . '/calendar';
							if(get_query_var('eventDate')) { echo '/' . $tribe_ecp->previousMonth($tribe_ecp->nextMonth(tribe_get_month_view_date())); }
							echo '/?event_location='. $parent2->slug .'">All</a></li>';
                            foreach ( $terms2 as $term ) {
                                    echo '<li class="child" id="tax-menu-'. $term->slug .'"><a href="'. get_bloginfo('url') . '/calendar';
									if(get_query_var('eventDate')) { echo '/' . $tribe_ecp->previousMonth($tribe_ecp->nextMonth(tribe_get_month_view_date())); }
									echo '/?event_location='. $term->slug .'">' . $term->name . '</a></li>';
                            }
                            echo '</ul>';
            ?>
                    </div><!--at-cma -->
                    
                    <div class="gridview-dropdown" id="community">
                  <?php 
                    $terms = get_terms("event_location", 'hide_empty=0&child_of=98');
                        
                        $parent=get_term_by('id', 98, 'event_location');
                        
                            echo '<h3 class="head decker-bold">'.$parent->name.'</h3>';
                            echo '<ul class="events-tax-menu" id="community">';
                            echo '<li class="parent" id="tax-menu-'. $parent->slug .'"><a href="'. get_bloginfo('url') . '/calendar';
							if(get_query_var('eventDate')) { echo '/' . $tribe_ecp->previousMonth($tribe_ecp->nextMonth(tribe_get_month_view_date())); }
							echo '/?event_location='. $parent->slug .'">All</a></li>';
                            foreach ( $terms as $term ) {
                                    
                                    $grandchild=get_term_by('id', $term->parent, 'event_location');
                                    
                                    echo '<li class="';
                                    if($grandchild->parent) { echo 'grandchild'; } else { echo 'child'; }
                                    echo '"  id="tax-menu-'. $term->slug .'" ><a href="'. get_bloginfo('url') . '/calendar';
									if(get_query_var('eventDate')) { echo '/' . $tribe_ecp->previousMonth($tribe_ecp->nextMonth(tribe_get_month_view_date())); }
									echo '/?event_location='. $term->slug .'">' . $term->name . '</a></li>';
                            }
                            echo '</ul>';
                    ?>
                    </div><!-- community -->
            
            
                <span class='tribe-events-calendar-buttons'> 
                    <a class='tribe-events-button-off decker-bold' id="list" href='<?php echo tribe_get_listview_link(); ?>'><?php _e('List', 'tribe-events-calendar')?></a>
                    <a class='tribe-events-button-on decker-bold' id="calendar" href='<?php echo tribe_get_gridview_link(); ?>'><?php _e('Calendar', 'tribe-events-calendar')?></a>
                </span>
                
            </div><!-- end container for calendar nav -->
           
		</div><!-- tribe-events-calendar-header -->
        
        
		<?php tribe_calendar_grid(); // See the views/table.php template for customization ?>
        
             <div id="tribe-events-nav-below" class="tribe-events-nav clearfix mt20 mb20"> 
             
                 <div class="tribe-events-nav-previous">
                    <p class='block'><a href="<?php bloginfo('url'); ?>/calendar/<?php
    
    $querycatslug=get_query_var('tribe_events_cat'); 
    
    $queryCat=get_term_by('slug', $querycatslug, 'tribe_events_cat');
    
    if($queryCat) { echo 'category/'.$queryCat->slug.'/'; } ?><?php echo $tribe_ecp->previousMonth(tribe_get_month_view_date() ); ?><?php $querylocslug=get_query_var('event_location'); 
    
    $queryLoc=get_term_by('slug', $querylocslug, 'event_location');
    
    if($queryLoc) { echo '/?event_location='. $queryLoc->slug ; } ?>">
    
                    &laquo;<?php echo tribe_get_previous_month_text(); ?></a>
                    </div>
                    
                
                    <div class="tribe-events-nav-next">
    
    <a href="<?php bloginfo('url'); ?>/calendar/<?php
    
    $querycatslug=get_query_var('tribe_events_cat'); 
    
    $queryCat=get_term_by('slug', $querycatslug, 'tribe_events_cat');
    
    if($queryCat) { echo 'category/'.$queryCat->slug.'/'; } ?><?php echo $tribe_ecp->nextMonth(tribe_get_month_view_date() ); ?><?php $querylocslug=get_query_var('event_location'); 
    
    $queryLoc=get_term_by('slug', $querylocslug, 'event_location');
    
    if($queryLoc) { echo '/?event_location='. $queryLoc->slug ; } ?>"> 
        <?php echo tribe_get_next_month_text(); ?> &raquo;</a></p>
                  </div>
	
            </div>
        
 <?php /* if( function_exists( 'tribe_get_ical_link' ) ): ?>
         <a title="<?php esc_attr_e('iCal Import', 'tribe-events-calendar') ?>" class="ical" href="<?php echo tribe_get_ical_link(); ?>"><?php _e('iCal Import', 'tribe-events-calendar') ?></a>
 <?php endif; */ ?>
	</div>
</div>
			  
        
   <!--END CAL-PAGE-RESET-->
   </div>   
        
  <div class="clear">&nbsp;</div><!--CLEAR-->
    
  <!--END PAGE-CONTAINER -->
  </div>

  <!--END PAGE-NEW-->
</div> 




<?php get_footer('new'); ?>