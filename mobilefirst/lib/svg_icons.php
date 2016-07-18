<?php
/* 
 * Adds SVG icons to website
 */
 
add_filter( 'genesis_before', 'icomoon_icons', 1 );
function icomoon_icons() {
	echo '
		  <svg display="none" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
			<defs>
			
			<symbol id="nine-icon-location" viewBox="0 0 32 32">
				<title>location</title>
				<path class="path1" d="M16 0c-5.523 0-10 4.477-10 10 0 10 10 22 10 22s10-12 10-22c0-5.523-4.477-10-10-10zM16 16c-3.314 0-6-2.686-6-6s2.686-6 6-6 6 2.686 6 6-2.686 6-6 6z"></path>
			</symbol>
			
			<symbol id="nine-icon-airplane" viewBox="0 0 32 32">
				<title>airplane</title>
				<path class="path1" d="M24 19.999l-5.713-5.713 13.713-10.286-4-4-17.141 6.858-5.397-5.397c-1.556-1.556-3.728-1.928-4.828-0.828s-0.727 3.273 0.828 4.828l5.396 5.396-6.858 17.143 4 4 10.287-13.715 5.713 5.713v7.999h4l2-6 6-2v-4l-7.999 0z"></path>
			</symbol>
			
			<symbol id="nine-icon-glass2" viewBox="0 0 32 32">
				<title>glass2</title>
				<path class="path1" d="M27.786 5.618c0.236-0.301 0.28-0.711 0.113-1.055s-0.517-0.563-0.899-0.563h-22c-0.383 0-0.732 0.219-0.899 0.563s-0.123 0.754 0.113 1.055l9.786 12.455v11.927h-3c-0.552 0-1 0.448-1 1s0.448 1 1 1h10c0.552 0 1-0.448 1-1s-0.448-1-1-1h-3v-11.927l9.786-12.455zM24.943 6l-3.143 4h-11.599l-3.143-4h17.885z"></path>
			</symbol>
			
			<symbol id="nine-icon-star-full" viewBox="0 0 32 32">
				<title>star-full</title>
				<path class="path1" d="M32 12.408l-11.056-1.607-4.944-10.018-4.944 10.018-11.056 1.607 8 7.798-1.889 11.011 9.889-5.199 9.889 5.199-1.889-11.011 8-7.798z"></path>
			</symbol>
			
			<symbol id="nine-icon-spoon-knife" viewBox="0 0 32 32">
				<title>spoon-knife</title>
				<path class="path1" d="M7 0c-3.314 0-6 3.134-6 7 0 3.31 1.969 6.083 4.616 6.812l-0.993 16.191c-0.067 1.098 0.778 1.996 1.878 1.996h1c1.1 0 1.945-0.898 1.878-1.996l-0.993-16.191c2.646-0.729 4.616-3.502 4.616-6.812 0-3.866-2.686-7-6-7zM27.167 0l-1.667 10h-1.25l-0.833-10h-0.833l-0.833 10h-1.25l-1.667-10h-0.833v13c0 0.552 0.448 1 1 1h2.604l-0.982 16.004c-0.067 1.098 0.778 1.996 1.878 1.996h1c1.1 0 1.945-0.898 1.878-1.996l-0.982-16.004h2.604c0.552 0 1-0.448 1-1v-13h-0.833z"></path>
			</symbol>
			
			</defs>
		</svg>
		 ';
}