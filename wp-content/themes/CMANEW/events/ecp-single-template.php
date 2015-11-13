<?php
/**
*  If 'Default Events Template' is selected in Settings -> The Events Calendar -> Theme Settings -> Events Template, 
*  then this file loads the page template for all for the individual 
*  event view.  Generally, this setting should only be used if you want to manually 
*  specify all the shell HTML of your ECP pages in this template file.  Use one of the other Theme 
*  Settings -> Events Template to automatically integrate views into your 
*  theme.
*
* You can customize this view by putting a replacement file of the same name (ecp-single-template.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }
?>
<?php get_header(); error_reporting(0);?>

<?php the_post(); global $post; ?>
  
         
<?php $tribe_ecp = TribeEvents::instance();
			$foo = get_the_terms( get_the_ID(), $tribe_ecp->get_event_taxonomy() );
			//print_r($foo);
			$first = array_shift(array_values($foo));
			$current_cat = $first->term_taxonomy_id;
			if ($current_cat == '34') // exhibits category id is 34
			
			{ include 'exhibit-event.php'; } // if exhibit, load custom template
			
			
			elseif ($current_cat == '35')  // if special event, load custom template
			
			{ include 'specialevent-event.php';  } 
			
			
			else  // if not load default
			
			{ include 'default-event.php';  } 
			
			
 ?>


