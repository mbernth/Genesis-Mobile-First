<?php
/**
 * Mobile first
 *
 * This file adds functions to the Genesis Sample Theme.
 *
 * @package Mobile first mono voce
 * @author  mono voce aps
 * @license GPL-2.0+
 * @link    http://www.monovoce.com/
 */

//* Start the engine
include_once( get_template_directory() . '/lib/init.php' );

//* Setup Theme
include_once( get_stylesheet_directory() . '/lib/theme-defaults.php' );

//* Set Localization (do not remove)
load_child_theme_textdomain( 'mobile-first', apply_filters( 'child_theme_textdomain', get_stylesheet_directory() . '/languages', 'mobile-first' ) );

//* Add Image upload and Color select to WordPress Theme Customizer
require_once( get_stylesheet_directory() . '/lib/customize.php' );

//* Include Customizer CSS
include_once( get_stylesheet_directory() . '/lib/output.php' );

//* Child theme (do not remove)
define( 'CHILD_THEME_NAME', 'Mobile first' );
define( 'CHILD_THEME_URL', 'http://www.monovoce.com/' );
define( 'CHILD_THEME_VERSION', '1.0.0' );

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'genesis_sample_enqueue_scripts_styles' );
function genesis_sample_enqueue_scripts_styles() {

	wp_enqueue_style( 'mobile-first-fonts', '//fonts.googleapis.com/css?family=Source+Sans+Pro:400,600,700', array(), CHILD_THEME_VERSION );
	wp_enqueue_style( 'dashicons' );

	wp_enqueue_script( 'mobile-first-responsive-menu', get_stylesheet_directory_uri() . '/js/responsive-menu.js', array( 'jquery' ), '1.0.0', true );
	$output = array(
		'mainMenu' => __( 'Menu', 'mobile-first' ),
		'subMenu'  => __( 'Menu', 'mobile-first' ),
	);
	wp_localize_script( 'mobile-first-responsive-menu', 'genesisSampleL10n', $output );

}

//* Add HTML5 markup structure
add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

//* Add Accessibility support
add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

//* Add viewport meta tag for mobile browsers
add_theme_support( 'genesis-responsive-viewport' );

//* Add custom meta tag for mobile browsers
add_action( 'genesis_meta', 'mono_viewport_meta_tag' );
function mono_viewport_meta_tag() {
	echo '<meta name="HandheldFriendly" content="True">';
	echo '<meta name="MobileOptimized" content="320">';
}
// Change favicon location and add touch icons
add_filter( 'genesis_pre_load_favicon', 'mono_favicon_filter' );
function mono_favicon_filter( $favicon ) {
	echo '<link rel="shortcut icon" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon.ico" type="image/x-icon" />';
	echo '<link rel="apple-touch-icon" sizes="57x57" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-57x57.png">';
	echo '<link rel="apple-touch-icon" sizes="60x60" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-60x60.png">';
	echo '<link rel="apple-touch-icon" sizes="72x72" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-72x72.png">';
	echo '<link rel="apple-touch-icon" sizes="76x76" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-76x76.png">';
	echo '<link rel="apple-touch-icon" sizes="114x114" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-114x114.png">';
	echo '<link rel="apple-touch-icon" sizes="120x120" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-120x120.png">';
	echo '<link rel="apple-touch-icon" sizes="144x144" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-144x144.png">';
	echo '<link rel="apple-touch-icon" sizes="152x152" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-152x152.png">';
	echo '<link rel="apple-touch-icon" sizes="180x180" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/apple-touch-icon-180x180.png">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-16x16.png" sizes="16x16">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-32x32.png" sizes="32x32">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/favicon-96x96.png" sizes="96x96">';
	echo '<link rel="icon" type="image/png" href="'.get_bloginfo( 'stylesheet_directory' ).'/images/android-chrome-192x192.png" sizes="192x192">';
	echo '<meta name="msapplication-square70x70logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//smalltile.png" />';
	echo '<meta name="msapplication-square150x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//mediumtile.png" />';
	echo '<meta name="msapplication-wide310x150logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//widetile.png" />';
	echo '<meta name="msapplication-square310x310logo" content="'.get_bloginfo( 'stylesheet_directory' ).'/images//largetile.png" />';

}

//* Add support for custom header
add_theme_support( 'custom-header', array(
	'width'           => 600,
	'height'          => 160,
	'header-selector' => '.site-title a',
	'header-text'     => false,
	'flex-height'     => true,
) );

//* Add support for custom background
add_theme_support( 'custom-background' );

//* Add support for after entry widget
add_theme_support( 'genesis-after-entry-widget-area' );

//* Add support for 3-column footer widgets
add_theme_support( 'genesis-footer-widgets', 3 );

//* Add Image Sizes
add_image_size( 'featured-image', 720, 400, TRUE );

//* Rename primary and secondary navigation menus
add_theme_support( 'genesis-menus' , array( 'primary' => __( 'After Header Menu', 'mobile-first' ), 'secondary' => __( 'Footer Menu', 'mobile-first' ) ) );

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

//* Reduce the secondary navigation menu to one level depth
add_filter( 'wp_nav_menu_args', 'genesis_sample_secondary_menu_args' );
function genesis_sample_secondary_menu_args( $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}

//* Modify size of the Gravatar in the author box
add_filter( 'genesis_author_box_gravatar_size', 'genesis_sample_author_box_gravatar' );
function genesis_sample_author_box_gravatar( $size ) {

	return 90;

}

//* Modify size of the Gravatar in the entry comments
add_filter( 'genesis_comment_list_args', 'genesis_sample_comments_gravatar' );
function genesis_sample_comments_gravatar( $args ) {

	$args['avatar_size'] = 60;

	return $args;

}

//* Remove the edit link
add_filter ( 'genesis_edit_post_link' , '__return_false' );	

//* Flexible grids
// =====================================================================================================================

// check if the flexible content field has rows of data
add_action( 'genesis_after_entry', 'mono_flexible_grids', 15 );
function mono_flexible_grids() {
	
	if ( is_single() || is_page() ) {
	
	$loopCount = 0;
	
	
	
	if( have_rows('content_row') ):
	
		
	
		// loop through the rows of data
    	while ( have_rows('content_row') ) : the_row();
		
			$headline = 	get_sub_field('row_headline');
			$rowbutton = get_sub_field('row_button');
			$rowbuttonmanual = get_sub_field('row_button_manual_url');
			$rowtext = 	get_sub_field('row_button_text');

        	if( get_row_layout() == 'row_setup' ):
				
			if (get_sub_field('hide_row')){
				
				}else{
				
				echo '<article class="gridcontainer  ';
						the_sub_field('background_colour');
					if (get_sub_field('row_id')){
						echo '" id="';
					 	the_sub_field('row_id');
					}
				echo '" >';
				
				if ($headline){
					echo '<h1 class="row_headline">' . $headline . '</h1>';
				}
				
				
				
				echo '<div class="wrap">';
					
					
					$row = 	get_sub_field('columns');
					$selected = get_sub_field('background_colour');
					$content = get_sub_field('content');
					
					
					while ( have_rows('column') ) : the_row();
							
							
							if (get_sub_field('content')){
							echo '<section class="coll' . $row['columns']. ' wysiwyg">';
							
								
								
							
								the_sub_field('content');
								
								if (get_sub_field('button_text_content')){
									echo '<a class="button" href="';
										if (get_sub_field('botton_manual_link')){
											the_sub_field('botton_manual_link');
										}else{
											the_sub_field('button_content');
										}
									echo '"><span>';
										the_sub_field('button_text_content');
									echo '</span></a>';
								}
								
							echo '</section>';
							}
							
							if (get_sub_field('widget_content')){
							echo '<section class="coll' . $row['columns']. '">';
								the_sub_field('widget_content');
							echo '</section>';
							}
							
							if (get_sub_field('image_link')){
								
								if( get_sub_field('content') && $selected == 'Non'  || $selected == 'Non Black'  || $selected == 'Non Red'  || $selected == 'Non Grey') {
									
									echo '<section class="coll' . $row['columns']. ' backimage" style="background-image: url(';
										the_sub_field('image_link');
									echo ');">';
									echo '</section>';
									
									}else{
										
									echo '<section class="coll' . $row['columns']. '">';
										echo '<img src="';
											the_sub_field('image_link');
										echo '">';
									echo '</section>';
										
								}
								
							}
							
							if (get_sub_field('video_embeding_code')){
							echo '<section class="coll' . $row['columns']. '">';
								the_sub_field('video_embeding_code');
							echo '</section>';
							}
							
							if (get_sub_field('google_map')){
								
								$location = get_sub_field('google_map');
								
							echo '<section class="coll' . $row['columns']. '">';
								echo '<div class="acf-map">
		 								<div class="marker" data-lat="'.$location['lat'].'" data-lng="'.$location['lng'].'"></div>
		 							  </div>';
							echo '</section>';
							}
							
							if (get_sub_field('case_thumbnail')){
								
								echo '<section class="coll' . $row['columns']. ' case_preview">';
									echo '<a href="';
											the_sub_field('case_link');
									echo '">';
									echo '<div class="thumb-image">';
										echo '<img src="';
											the_sub_field('case_thumbnail');
										echo '">';
									echo '</div>';
									echo '</a>';
									echo '<div class="entry-content" itemprop="text">
											<header class="entry-header">
											<h2 class="entry-title" itemprop="headline">
												<a href="';
													the_sub_field('case_link');
												echo '" rel="bookmark">';
													the_sub_field('case_name');
												echo '</a>
											</h2> 
											</header>
											<strong>Kunde: </strong>';
												the_sub_field('case_client');
											echo '</div>';
								echo '</section>';
								
							}
					
					endwhile;
				
				echo '</div>';
				
				if ($rowtext){
					echo '<a class="button" href="';
					if (get_sub_field('row_button_manual_url')){
						echo '' . $rowbuttonmanual . '';
					}else{
						echo '' . $rowbutton . '';
					}
					echo '"><span>' . $rowtext . '</span></a>';
				}
				
				echo '</article>';
			
			}
			endif;
			$loopCount ++;
			

			
    	endwhile;
	
	else :

    // no layouts found

	endif;
	
	}

}