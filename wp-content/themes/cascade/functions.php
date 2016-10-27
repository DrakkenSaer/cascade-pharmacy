<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

remove_filter('template_redirect','redirect_canonical');
add_theme_support( 'post-thumbnails' );

/* Remove Emojis */
function fp_no_emojiedit() {
  remove_action( 'wp_head', 'print_emoji_detection_script', 7 );
  remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
  remove_action( 'admin_print_styles', 'print_emoji_styles' );
  remove_action( 'wp_print_styles', 'print_emoji_styles' );
  remove_filter( 'the_content_feed', 'wp_staticize_emoji' );
  remove_filter( 'comment_text_rss', 'wp_staticize_emoji' );
  remove_filter( 'wp_mail', 'wp_staticize_emoji_for_email' );

add_filter( 'tiny_mce_plugins', 'fp_no_emoji' );
}
add_action( 'init', 'fp_no_emojiedit' );

function fp_no_emoji( $plugins ) {

  if ( ! is_array( $plugins ) ) {
    return array();
  }

  return array_diff( $plugins, array( 'wpemoji' ) );
}

//Register Styles and Scripts
function fp_styleLoader() {
  wp_register_style( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css','',null );
  wp_register_style( 'fontawesome', '//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css','',null );
  wp_register_style( 'global_helpers', get_template_directory_uri() . '/assets/css/_global_helpers.css','',null );
  wp_register_style( 'main', get_template_directory_uri() . '/assets/css/main.css','',null );
  wp_register_style( 'animate', '//cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.css','',null );
  wp_enqueue_style( 'bootstrap' );
  wp_enqueue_style( 'fontawesome' );
  wp_enqueue_style( 'global_helpers' );
  wp_enqueue_style( 'main' );
  wp_enqueue_style( 'animate' );
  }
add_action( 'wp_enqueue_scripts', 'fp_styleLoader' );

function fp_scriptLoader() {
  wp_register_script( 'jq','//code.jquery.com/jquery-2.1.4.min.js',null,'',true );
  wp_register_script( 'bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js','',null,true );
  wp_register_script( 'scripts', get_template_directory_uri() . '/assets/js/scripts.js','',null,true );
  wp_enqueue_script( 'jq' );
  wp_enqueue_script( 'bootstrap' );
  wp_enqueue_script( 'scripts' );
}

add_action( 'wp_enqueue_scripts', 'fp_scriptLoader' );

//SET URL PATH TO TEMPLATE
function fp_stocker($asset) {
  $themeuri = get_template_directory_uri();
  return $themeuri.'/assets/i/'.$asset;
}

//REMOVE QUERY STRINGS FROM STATIC RESOURCES
function fp_noQueryStrings( $src ){
  $parts = explode( '?', $src );
  return $parts[0];
}
add_filter( 'script_loader_src', 'fp_noQueryStrings', 15, 1 );
add_filter( 'style_loader_src', 'fp_noQueryStrings', 15, 1 );

//CHANGE THE BACKEND ADMIN FOOTER TEXT

if (! function_exists('dashboard_footer') ){
function dashboard_footer () {
echo bloginfo( 'name' ).' | All rights reserved © '.date('Y');}}
add_filter('admin_footer_text', 'dashboard_footer');


//CHANGE THE LOGIN UPPER LOGO 100px height
function fp_adminLogin() {
    echo '<style type="text/css">
       #login h1 a { background:url('.fp_stocker('logo-login.png').') top center no-repeat; height:110px; width:320px; display:block; } </style>'; }
add_action('login_head', 'fp_adminLogin');

function fp_adminLoginTitle () {
  return get_bloginfo( 'name' );
}
add_action('login_headertitle', 'fp_adminLoginTitle');

function fp_adminLoginURL() {
  return get_bloginfo( 'url' );
}
add_action('login_headerurl', 'fp_adminLoginURL');


//ADD/REMOVE DASHBOARD WIDGETS
add_action('wp_dashboard_setup', 'my_custom_dashboard_widgets');
function my_custom_dashboard_widgets() {
   global $wp_meta_boxes;
   unset($wp_meta_boxes['dashboard']['normal']['core']['dashboard_plugins']);
   unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_primary']);
   unset($wp_meta_boxes['dashboard']['side']['core']['dashboard_secondary']);
   unset($wp_meta_boxes['dashboard']['normal']['core']['w3tc_latest']);
   unset($wp_meta_boxes['dashboard']['normal']['core']['w3tc_pagespeed']);
}

// REMOVE HEADER EXTRA INFO
function remove_header_info() {
    remove_action('wp_head', 'rsd_link');
    remove_action('wp_head', 'wlwmanifest_link');
    remove_action('wp_head', 'wp_generator');
    remove_action('wp_head', 'start_post_rel_link');
    remove_action('wp_head', 'index_rel_link');
    remove_action('wp_head', 'adjacent_posts_rel_link');
}

add_action('init', 'remove_header_info');

//ADD EXCERPTS TO PAGES
add_post_type_support('page', 'excerpt');

//SET DEFAULT SIZE FOR FEATURED IMAGE
//set_post_thumbnail_size( 345, 230, true ); 

/*
//REGISTER WIDGETS
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Sidebar',
'before_widget' => '',
'after_widget' => '',
'before_title' => '',
'after_title' => '',
));
*/


//REGISTER NAVIGATION MENU LOCATIONS
if ( function_exists( 'register_nav_menus' ) ) {
  register_nav_menus(
    array(
      'header' => __('Header Menu'),
      'footer' => __('Footer Menu')
    )
  );
}


/*
//ALLOW IFRAME IN POSTS
function add_iframe($initArray) {
$initArray['extended_valid_elements'] = "iframe[id|class|title|style|align|frameborder|height|longdesc|marginheight|marginwidth|name|scrolling|src|width]";
return $initArray;
}
add_filter('tiny_mce_before_init', 'add_iframe');
*/

/*
//ADD FAVICON TO ALL PAGES
function blog_favicon() {
 echo '<link rel="icon" type="image/x-icon" href="/favicon.ico" />';
 }
 add_action('wp_head', 'blog_favicon');  
*/

/*
//GET CHILD PAGE DEPTH STORED IN VARIABLE $depht and function wt_get_depth
function wt_get_depth($id = '', $depth = '', $i = 0)
{
  global $wpdb;
  global $post;

  if($depth == '')  {
    if(is_page())   {
      if($id == '')     {
        $id = $post->ID;    }
      $depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$id."'");
      return wt_get_depth($id, $depth, $i);   } } elseif($depth == "0") {
    return $i;  } else  {
    $depth = $wpdb->get_var("SELECT post_parent FROM $wpdb->posts WHERE ID = '".$depth."'");
    $i++;
    return wt_get_depth($id, $depth, $i);
  }
} */


//THEME OPTIONS
if( function_exists('acf_add_options_page') ) {
  
  acf_add_options_page(array(
    'page_title'  => 'Theme Options',
    'menu_title'  => 'Theme Options',
    'menu_slug'   => 'theme-general-settings',
    'capability'  => 'edit_posts',
    'redirect'    => false
  ));

}

//ADD ACTIVE CLASS TO NAV MENU
add_filter('nav_menu_css_class' , 'special_nav_class' , 10 , 2);
function special_nav_class($classes, $item){
  if( in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}


?>