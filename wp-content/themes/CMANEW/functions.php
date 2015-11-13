<?php

//include_once('inc/menu-primary.php');
//include_once('inc/menu-secondary.php');

//include_once('inc/remove.php');

//default walker code from line #67-92 of /wp-includes/nav-menu-template.php

//CUSTOM MENU
class menu_secondary_walker extends Walker_Nav_Menu {

	/**
	 * @see Walker::start_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function start_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "\n$indent<ul class=\"sub-menu\">\n";
	}

	/**
	 * @see Walker::end_lvl()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param int $depth Depth of page. Used for padding.
	 */
	function end_lvl( &$output, $depth = 0, $args = array() ) {
		$indent = str_repeat("\t", $depth);
		$output .= "$indent</ul>\n";
	}



	/**
	 * @see Walker::start_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Menu item data object.
	 * @param int $depth Depth of menu item. Used for padding.
	 * @param int $current_page Menu item ID.
	 * @param object $args
	 */
	function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
		global $wp_query;
		$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

		$class_names = $value = '';

		$classes = empty( $item->classes ) ? array() : (array) $item->classes;
		$classes[] = 'menu-item-' . $item->ID;

		$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args ) );
		$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

		$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args );
		$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

		$output .= $indent . '<li' . $id . $value . $class_names .'>';

		$attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
		$attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
		$attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';

    if($item->menu_item_parent == 0){

    } else {

		$item_output = $args->before;
		$item_output .= '<a'. $attributes .'>';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</a>';
		$item_output .= $args->after;

    }

		$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
	}

	/**
	 * @see Walker::end_el()
	 * @since 3.0.0
	 *
	 * @param string $output Passed by reference. Used to append additional content.
	 * @param object $item Page data object. Not used.
	 * @param int $depth Depth of page. Not Used.
	 */
	function end_el( &$output, $item, $depth = 0, $args = array() ) {
		$output .= "</li>\n";
	}

//END CLASS
}






/**
 * CMA functions and definitions
 */

 // redirect for special events and exhibitions
add_action( 'template_redirect', 'redirect' );
function redirect() {


		if ($_SERVER['REQUEST_URI'] == '/campaign' || $_SERVER['REQUEST_URI'] == '/Campaign' ) {

			wp_redirect( 'http://cmany.org/get-involved/campaign', 301 );
			exit;

		}


        /*
        if (is_page('special-events')) :

			if(get_field('choose_featured_special_event')) {

				$redirectID=get_field('choose_featured_special_event');

				wp_redirect( $redirectID, 301 );
				exit;

			} else {

					$upcomings = tribe_get_events( array('eventDisplay'=>'upcoming','posts_per_page'=>1, 'tax_query'=>array(array('taxonomy'=>'tribe_events_cat','field'=>'id','terms'=>35))));

				if($upcomings) {
						foreach($upcomings as $upcoming) : $redirectID=$upcoming->ID; endforeach;
						wp_redirect( get_permalink($redirectID) , 301 );
						exit;
				} elseif (!$upcomings) {
						$pasts = tribe_get_events( array('eventDisplay'=>'past','posts_per_page'=>1, 'tax_query'=>array(array('taxonomy'=>'tribe_events_cat','field'=>'id','terms'=>35))));

						foreach($pasts as $past) : $redirectID=$past->ID; endforeach;
						wp_redirect( get_permalink($redirectID) , 301 );
						exit;

				} else { }


			} // end if get field

		endif; // end if is page

		if (is_page(593)) :

			if(get_field('set_upcoming_exhibit')) {

				$redirect=get_field('set_upcoming_exhibit');

				$redirectURL=get_permalink($redirect->ID);

				wp_redirect( $redirectURL, 301 );
				exit;

			} else {




			} // end if get field

		endif; // end if is page

		if (is_page(array(38,'exhibits','Exhibits'))) :

				if(get_field('choose_featured_exhibit')) {

				$redirect=get_field('choose_featured_exhibit');

				$redirectURL=get_permalink($redirect->ID);

				wp_redirect( $redirectURL, 301 );

				exit;

			} else {
						$upcomings = tribe_get_events( array('eventDisplay'=>'upcoming','posts_per_page'=>1, 'tax_query'=>array(array('taxonomy'=>'tribe_events_cat','field'=>'id','terms'=>34))));

							if($upcomings) {
									foreach($upcomings as $upcoming) : $redirectID=$upcoming->ID; endforeach;
									wp_redirect( get_permalink($redirectID) , 301 );
									exit;
							} elseif (!$upcomings) {
									$pasts = tribe_get_events( array('eventDisplay'=>'past','posts_per_page'=>1, 'tax_query'=>array(array('taxonomy'=>'tribe_events_cat','field'=>'id','terms'=>34))));

									foreach($pasts as $past) : $redirectID=$past->ID; endforeach;
									wp_redirect( get_permalink($redirectID) , 301 );
									exit;

							} else { }

			}

        endif; // end if is exhibit page
        */
}


function my_wp_nav_menu_args( $args = '' )
{
	$args['container'] = false;
	return $args;
} // function

add_filter( 'wp_nav_menu_args', 'my_wp_nav_menu_args' );


//add_action( 'init', 'create_post_type' );

/*
function create_post_type() {
	register_post_type( 'artcolonyclass',
		array(
			'labels' => array(
				'name' => __( 'Art Colony Classes' ),
				'singular_name' => __( 'Art Colony Class' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail','page-attributes','excerpt'),
		'rewrite' => array('slug' => 'art-colony-class')
		)
	);

		register_post_type( '2',
		array(
			'labels' => array(
				'name' => __( 'Special Event Highlights' ),
				'singular_name' => __( 'Special Event Highlight' )
			),
		'public' => true,
		'has_archive' => true,
		'supports' => array('title','editor','thumbnail','page-attributes','excerpt'),
		'rewrite' => array('slug' => 'past-highlights')
		)
	);


}

register_taxonomy('season', 'artcolonyclass', array(
'hierarchical' => true,  'label' => 'Season',
'query_var' => true, 'rewrite' => false));

register_taxonomy('class-price', 'artcolonyclass', array(
'hierarchical' => true,  'label' => 'Price',
'query_var' => true, 'rewrite' => false));

register_taxonomy('ages', 'artcolonyclass', array(
'hierarchical' => true,  'label' => 'Ages',
'query_var' => true, 'rewrite' => false));

register_taxonomy('dates', 'artcolonyclass', array(
'hierarchical' => true,  'label' => 'Dates',
'query_var' => true, 'rewrite' => false));


register_taxonomy('medium', 'artcolonyclass', array(
'hierarchical' => true,  'label' => 'Medium',
'query_var' => true, 'rewrite' => false));


register_taxonomy('location', 'artcolonyclass', array(
'hierarchical' => true,  'label' => 'Location',
'query_var' => true, 'rewrite' => false));

register_taxonomy('event_ages', 'tribe_events', array(
'hierarchical' => true,  'label' => 'Event Ages',
'query_var' => true, 'rewrite' => false));

register_taxonomy('event_location', 'tribe_events', array(
'hierarchical' => true,  'label' => 'Event Location',
'query_var' => true, 'rewrite' => false));

*/


/**
 * Sort grid view by location
 *
 * @author jkudish
 * @uses pre_get_posts filter
 * @param object $query the query object
 * @return object $query the filtered object
 */
//add_action( 'pre_get_posts', 'exclude_events_category' );
function exclude_events_category( $query ) {

 $vars= get_query_var('event_location');

 if ( $query->query_vars['post_type'] == TribeEvents::POSTTYPE && !empty($vars) ) {


    $query->set( 'tax_query', array(
      array(
        'taxonomy' => 'event_location',
        'field' => 'slug',
        'terms' => array($vars),
        'operator' => 'IN'
      )
    ) );
  }

  return $query;

}


function print_taxonomy_ranks( $terms ) {
    // if terms is not array or its empty don't proceed
    if ( ! is_array( $terms ) || empty( $terms ) ) {
        return false;
    }

    foreach ( $terms as $term ) {
        // if the term have a parent, set the child term as attribute in parent term
        if ( $term->parent != 0 )  {
            $terms[$term->parent]->child = $term;
        } else {
            // record the parent term
            $parent = $term;
        }
    }

    echo "$parent->name";

	if($parent->child->name){ echo ", {$parent->child->name}"; }
}



function my_qmt_reset_url( $reset_url ) {
     return get_page_link( 165 );
}
add_filter( 'qmt_reset_url', 'my_qmt_reset_url' );

function my_qmt_base_url() {
  return get_page_link( 165 );
}
add_filter( 'qmt_reset_url', 'my_qmt_base_url' );



/**
 * Convert a hexa decimal color code to its RGB equivalent
 *
 * @param string $hexStr (hexadecimal color value)
 * @param boolean $returnAsString (if set true, returns the value separated by the separator character. Otherwise returns associative array)
 * @param string $seperator (to separate RGB values. Applicable only if second parameter is true.)
 * @return array or string (depending on second parameter. Returns False if invalid hex color value)
 */
function hex2RGB($hexStr, $returnAsString = false, $seperator = ',') {
    $hexStr = preg_replace("/[^0-9A-Fa-f]/", '', $hexStr); // Gets a proper hex string
    $rgbArray = array();
    if (strlen($hexStr) == 6) { //If a proper hex code, convert using bitwise operation. No overhead... faster
        $colorVal = hexdec($hexStr);
        $rgbArray['red'] = 0xFF & ($colorVal >> 0x10);
        $rgbArray['green'] = 0xFF & ($colorVal >> 0x8);
        $rgbArray['blue'] = 0xFF & $colorVal;
    } elseif (strlen($hexStr) == 3) { //if shorthand notation, need some string manipulations
        $rgbArray['red'] = hexdec(str_repeat(substr($hexStr, 0, 1), 2));
        $rgbArray['green'] = hexdec(str_repeat(substr($hexStr, 1, 1), 2));
        $rgbArray['blue'] = hexdec(str_repeat(substr($hexStr, 2, 1), 2));
    } else {
        return false; //Invalid hex color code
    }
    return $returnAsString ? implode($seperator, $rgbArray) : $rgbArray; // returns the rgb string or the associative array

}

//TABS

add_shortcode('tabs', 'tabs_group');
add_shortcode('tab', 'tab');

// this variable will hold your divs
$tabs_divs = '';

function tabs_group( $atts, $content = null ) {
    global $tabs_divs;

    // reset divs
    $tabs_divs = '';

    extract(shortcode_atts(array(
        'id' => '',
        'class' => ''
    ), $atts));
    if(empty($id))
        $id =  rand(100,999);



    $output = '<div id="'.$id.'" class="newtabs"><ul role="tablist" class="tabs"   ';


    $output.='>'.do_shortcode($content).'</ul>';
    $output.= $tabs_divs;
    $output.='</div>';
    return $output;
}


function tab($atts, $content = null) {
    global $tabs_divs;

    extract(shortcode_atts(array(
        'id' => '',
        'title' => '',
        'active'=>''
    ), $atts));

    if(empty($id))
        $id = 'tab_item_'.rand(100,999);

    if ($active == 'y'){
    	 $activeClass = "current";
    }
    else{
    	 $activeClass = $active;
    }

    //$activeClass = $active == 'y' ? 'current' :'';
    $output = '
        <li role="presentation">
            <a href="#'.$id.'" class="'.$activeClass.'">'.$title.'</a>
        </li>
    ';

    $tabs_divs.= '<div role="tabpanel" id="'.$id.'" class="pane '.$activeClass.'" >'.do_shortcode($content).'</div>';

    return $output;
}


if ( function_exists( 'add_theme_support' ) ) {
	add_theme_support( 'post-thumbnails' );
        set_post_thumbnail_size( 635, 300 ); // default Post Thumbnail dimensions
}

if ( function_exists( 'add_image_size' ) ) {

	add_image_size( 'slider', 635, 9999 ); //(cropped)
	add_image_size( 'blockimage', 260, 250 ); //(cropped)
	add_image_size( 'event-thumb', 100, 9999 );
	add_image_size( 'single-event-small', 300, 9999 );
	add_image_size( 'single-event-large', 540, 9999 );
	add_image_size( 'topbanner', 840, 230,true );
}

register_nav_menu( 'primary', __( 'Primary Menu', 'twentyeleven' ) );

function get_excerpt_by_id($post_id){
$the_post = get_post($post_id); //Gets post ID
$the_excerpt = $the_post->post_content; //Gets post_content to be used as a basis for the excerpt
$excerpt_length = 35; //Sets excerpt length by word count
$the_excerpt = strip_tags(strip_shortcodes($the_excerpt)); //Strips tags and images
$words = explode(' ', $the_excerpt, $excerpt_length + 1);
if(count($words) > $excerpt_length) :
array_pop($words);
array_push($words, '…');
$the_excerpt = implode(' ', $words);
endif;
$the_excerpt = '<p>' . $the_excerpt . '</p>';
return $the_excerpt;
}

function classes_dates($post_id){
	$postType = get_post_type($post_id);

	$startMeta = get_post_meta( $post_id, 'start_date_TEST', true );
	$endMeta = get_post_meta( $post_id, 'end_date_TEST', true );

	$start_date = strtotime($startMeta);
	$end_date = strtotime($endMeta);

	$start_week  = (int)date('W', $start_date);
	$end_week  = (int)date('W', $end_date);

	if($postType == 'artcolonyclasses'){
		$i = $start_week;
		$weekArr = array();
		while($i <= $end_week){
			array_push($weekArr, strval($i));
			$i++;
		}

		wp_set_object_terms( $post_id, $weekArr, 'classweek', false );

		update_post_meta($post_id, 'sortStartDate', $start_date);
		update_post_meta($post_id, 'sortEndDate', $end_date);
	}
}
add_action( 'save_post', 'classes_dates' );



?>
