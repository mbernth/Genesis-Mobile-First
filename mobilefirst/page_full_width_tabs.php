<?php
/**
 * Mobile first
 *
 *
 * @package Mobile first mono voce
 * @author  mono voce apd
 * @license GPL-2.0+
 * @link    http://www.monovoce.com/
 */

//* Template Name: Full Width Tabs

//* Setup icons
include_once( get_stylesheet_directory() . '/lib/svg_icons.php' );

//* Enqueue Scripts and Styles
add_action( 'wp_enqueue_scripts', 'mobile_first_fullwidth_tabs' );
function mobile_first_fullwidth_tabs() {

	wp_enqueue_script( 'mobile-first-fullwidth-tabs', get_stylesheet_directory_uri() . '/js/cbpFWTabs.js', array( 'jquery' ), '1.0.0', true );
	wp_enqueue_script( 'fullwidth-tabs_init', get_stylesheet_directory_uri() . '/js/tabsinit.js', array( 'jquery' ), '1.0.0', true );

}

//* Force full width content layout
add_filter( 'genesis_site_layout', '__genesis_return_full_width_content' );

//* Render tabs
add_action( 'genesis_after_entry', 'mono_fullwidth_tabs', 15 );
function mono_fullwidth_tabs() {
	$rows = get_field( 'tabs' );
	$loopCount = 0;
	$loopCounter = 0;
	
	if ( is_single() || is_page ) {
	echo '<div id="tabs" class="tabs">';
		
		if($rows) {
			echo '<nav> 	<ul>';		
			foreach($rows as $row) {
				echo '<li>';
					echo '<a href="#section-'. $loopCount.'"><svg class="nine-icon nine-icon-' . $row['icon']. '"><use xlink:href="#nine-icon-' . $row['icon']. '"></use></svg><span>' . $row['label']. '</span></a>';
				echo '</li>';
			$loopCount ++;
			}
			echo '</ul></nav>';
		}
		
		if($rows) {
			echo '<div class="tab-content">';
			foreach($rows as $row) {
				echo '<section id="section-'. $loopCounter.'">';
					echo '' . $row['content']. '';
				echo '</section>';
			$loopCounter ++;
			}
			echo '</div>';
		}
		
	echo '</div>';
	}
	
}

//* Run the Genesis loop
genesis();
