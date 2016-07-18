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
	$tabs = get_field( 'tabs' );
	$accordion = get_field ( 'accordion_to_tabs' );
	
	if($tabs){
		wp_enqueue_script( 'mobile-first-fullwidth-tabs', get_stylesheet_directory_uri() . '/js/cbpFWTabs.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'fullwidth-tabs_init', get_stylesheet_directory_uri() . '/js/tabsinit.js', array( 'jquery' ), '1.0.0', true );
	}
	
	if($accordion){
		wp_enqueue_script( 'accordion_tabs_jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js', array( 'jquery' ), '1.0.0', true );
		wp_enqueue_script( 'accordion_tabs', get_stylesheet_directory_uri() . '/js/accordiontabs.js', array( 'jquery' ), '1.0.0', true );
	}

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

//* Render accordion to tabs
add_action( 'genesis_after_entry', 'mono_accordion_tabs', 15 );
function mono_accordion_tabs() {
	$rows = get_field( 'accordion_to_tabs' );
	
	if ( is_single() || is_page ) {
		
		if($rows) {
			echo '<article class="gridcontainer"><div class="wrap"><section class="coll1">';
			echo '<ul id="nav">';
			foreach($rows as $row) {
				echo '<li>
						<a href="#acctab">
						<svg class="nine-icon nine-icon-plus"><use xlink:href="#nine-icon-plus"></use></svg>
						<svg class="nine-icon nine-icon-minus"><use xlink:href="#nine-icon-minus"></use></svg>
						' . $row['label']. '</a>';
				echo '<section>';
					echo '' . $row['content']. '';
				echo '</section></li>';
			$loopCounter ++;
			}
			echo '</ul>';
			echo '</section></div></article>';
		}
	}
}

//* Run the Genesis loop
genesis();
