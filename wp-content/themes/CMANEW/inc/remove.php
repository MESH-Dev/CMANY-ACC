<?php

//FROM
//http://digwp.com/2010/03/wordpress-functions-php-template-custom-functions/
//http://webstractions.com/wordpress/remove-recent-comments-inline-styl/
//http://wpengineer.com/1438/wordpress-header/
//https://github.com/boldperspective/Whiteboard-Framework

//REMOVE ADMIN BAR 
add_filter( 'show_admin_bar', '__return_false' );


//HIDE ADMIN HELP
function hide_help() {
    echo '<style type="text/css">
            #contextual-help-link-wrap { display: none !important; }
          </style>';
}
add_action('admin_head', 'hide_help');

//Removes Login Error Info
add_filter('login_errors',create_function('$a', "return null;"));
  
//Removes WordPress Version
function wb_remove_version() {
		return '';
}

add_filter('the_generator', 'wb_remove_version');


//REMOVE JUNK FROM HEADER
remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wp_generator');
remove_action('wp_head', 'feed_links', 2);
remove_action('wp_head', 'index_rel_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'feed_links_extra', 3);

remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);
//remove_action('wp_head', 'rel_canonical');

remove_action('wp_head', 'start_post_rel_link', 10, 0);
remove_action('wp_head', 'parent_post_rel_link', 10, 0);

add_action('widgets_init', 'my_remove_recent_comments_style');

//REMOVE INLINE CSS
function my_remove_recent_comments_style() {
	global $wp_widget_factory;
	remove_action('wp_head', array($wp_widget_factory->widgets['WP_Widget_Recent_Comments'], 'recent_comments_style'));
} 

/*
Plugin Name: Remove Website Field
Description: Removes the website field from the comments form
http://techhacking.com/2011/02/04/wordpress-how-to-remove-the-website-field-from-the-comment-form/
http://www.1stwebdesigner.com/wordpress/comment-form-customization/
*/
add_filter('comment_form_default_fields', 'url_filtered');
function url_filtered($fields)
{
  if(isset($fields['url']))
   unset($fields['url']);
   //unset($fields['comment_notes_after']);
  return $fields;
}




/*** CLEAN UP FUNCTIONS ----------------------------------------*/
  
  /* admin part cleanups */
  add_action('admin_menu','remove_dashboard_widgets'); // cleaning dashboard widgets  
  add_action('admin_menu', 'delete_menu_items'); // deleting menu items from admin area
  add_action('admin_menu','customize_meta_boxes'); // remove some meta boxes from pages and posts edition page
  add_filter('manage_posts_columns', 'custom_post_columns'); // remove column entries from list of posts
  add_filter('manage_pages_columns', 'custom_pages_columns'); // remove column entries from list of page
  add_action('wp_before_admin_bar_render', 'wce_admin_bar_render' ); // clean up the admin bar
  add_action('widgets_init', 'unregister_default_widgets', 11); // remove widgets from the widget page
  
  


  // removes detailed login error information for security
  add_filter('login_errors',create_function('$a', "return null;")); 
  /**---------------------------------------------------------------------------------------------------*/    

  
/*** cleaning up the dashboard- ----------------------------------------*/
function remove_dashboard_widgets(){
  
  //remove_meta_box('dashboard_right_now','dashboard','core'); // right now overview box
  remove_meta_box('dashboard_incoming_links','dashboard','core'); // incoming links box
  //remove_meta_box('dashboard_quick_press','dashboard','core'); // quick press box
  remove_meta_box('dashboard_plugins','dashboard','core'); // new plugins box
  remove_meta_box('dashboard_recent_drafts','dashboard','core'); // recent drafts box
  remove_meta_box('dashboard_recent_comments','dashboard','core'); // recent comments box
  remove_meta_box('dashboard_primary','dashboard','core'); // wordpress development blog box
  remove_meta_box('dashboard_secondary','dashboard','core'); // other wordpress news box
    
  
} 

/*----------------------------------------------------------------------*/


/* Remove some menus froms the admin area*/
function delete_menu_items() {
  
  /*** Remove menu http://codex.wordpress.org/Function_Reference/remove_menu_page 
  syntaxe : remove_menu_page( $menu_slug )  **/
  //remove_menu_page('index.php'); // Dashboard
  remove_menu_page('edit.php'); // Posts
  //remove_menu_page('upload.php'); // Media
  remove_menu_page('link-manager.php'); // Links
  //remove_menu_page('edit.php?post_type=page'); // Pages
  remove_menu_page('edit-comments.php'); // Comments
  //remove_menu_page('themes.php'); // Appearance
  //remove_menu_page('plugins.php'); // Plugins
  //remove_menu_page('users.php'); // Users
  //remove_menu_page('tools.php'); // Tools
  //remove_menu_page('options-general.php'); // Settings
}

/*----------------------------------------------------------------------*/


/* remove some meta boxes from pages and posts -------------------------
feel free to comment / uncomment  */

function customize_meta_boxes() {
  /* Removes meta boxes from Posts */
  //remove_meta_box('postcustom','post','normal'); // custom fields metabox
  //remove_meta_box('trackbacksdiv','post','normal'); // trackbacks metabox 
  //remove_meta_box('commentstatusdiv','post','normal'); // comment status metabox 
  //remove_meta_box('commentsdiv','post','normal'); // comments  metabox 
  //remove_meta_box('postexcerpt','post','normal'); // post excerpts metabox 
  //remove_meta_box('authordiv','post','normal'); // author metabox 
  //remove_meta_box('revisionsdiv','post','normal'); // revisions  metabox 
  //remove_meta_box('tagsdiv-post_tag','post','normal'); // tags
  //remove_meta_box('slugdiv','post','normal'); // slug metabox 
  //remove_meta_box('categorydiv','post','normal'); // comments metabox
  //remove_meta_box('postimagediv','post','normal'); // featured image metabox
  //remove_meta_box('formatdiv','post','normal'); // format metabox 
  /* Removes meta boxes from pages */   
  //remove_meta_box('postcustom','page','normal'); // custom fields metabox
  remove_meta_box('trackbacksdiv','page','normal'); // trackbacks metabox
  //remove_meta_box('commentstatusdiv','page','normal'); // comment status metabox 
  //remove_meta_box('commentsdiv','page','normal'); // comments  metabox 
  remove_meta_box('authordiv','page','normal'); // author metabox 
  //remove_meta_box('revisionsdiv','page','normal'); // revisions  metabox 
  //remove_meta_box('postimagediv','page','side'); // featured image metabox
  //remove_meta_box('slugdiv','page','normal'); // slug metabox 
  
  /* remove meta boxes for links **/
  //remove_meta_box('linkcategorydiv','link','normal');
  //remove_meta_box('linkxfndiv','link','normal');
  //remove_meta_box('linkadvanceddiv','link','normal');
  
}

/*-----------------------------------------------------------------------*/


/** removing parts from column ------------------------------------------*/
/* use the column id, if you need to hide more of them
syntaxe : unset($defaults['columnID']);   */

/** remove column entries from posts **/
function custom_post_columns($defaults) {
  unset($defaults['comments']); // comments 
  unset($defaults['author']); // authors
  unset($defaults['tags']); // tag 
  //unset($defaults['date']); // date
  //unset($defaults['categories']); // categories    
  return $defaults;
}


/** remove column entries from pages **/
function custom_pages_columns($defaults) {
  unset($defaults['comments']); // comments 
  unset($defaults['author']); // authors
  unset($defaults['date']);  // date 
  return $defaults;
}

/*-----------------------------------------------------------------------**/


/** remove widgets from the widget page ------------------------------------*/
/* Credits : http://wpmu.org/how-to-remove-default-wordpress-widgets-and-clean-up-your-widgets-page/ 
uncomment what you want to remove  */
 function unregister_default_widgets() {
     // unregister_widget('WP_Widget_Pages');
     // unregister_widget('WP_Widget_Calendar');
     // unregister_widget('WP_Widget_Archives');
      unregister_widget('WP_Widget_Links');
     // unregister_widget('WP_Widget_Meta');
     // unregister_widget('WP_Widget_Search');
     // unregister_widget('WP_Widget_Text');
     // unregister_widget('WP_Widget_Categories');
      unregister_widget('WP_Widget_Recent_Posts');
      unregister_widget('WP_Widget_Recent_Comments');
     // unregister_widget('WP_Widget_RSS');
     // unregister_widget('WP_Widget_Tag_Cloud');
     //unregister_widget('WP_Nav_Menu_Widget');
    //unregister_widget('Twenty_Eleven_Ephemera_Widget');
 }





/****** removings items froms admin bars 
use the last part of the ID after "wp-admin-bar-" to add some menu to the list  exemple for comments : id="wp-admin-bar-comments" so the id to use is "comments"  ***********/
function wce_admin_bar_render() {
global $wp_admin_bar;
  $wp_admin_bar->remove_menu('comments'); //remove comments
  $wp_admin_bar->remove_menu('wp-logo'); //remove the whole wordpress logo, help etc part
  
}
/*-----------------------------------------------------------------------**/

