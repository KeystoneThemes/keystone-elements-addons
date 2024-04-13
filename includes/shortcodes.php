<?php
add_shortcode('cjbtn', 'cjbtn');

add_filter("the_content", "cj_content_filter");

function cj_content_filter($content) {
 
	// array of custom shortcodes requiring the fix 
	$block = join("|",array("cjbtn"));
 
	// opening tag
	$rep = preg_replace("/(<p>)?\[($block)(\s[^\]]+)?\](<\/p>|<br \/>)?/","[$2$3]",$content);
		
	// closing tag
	$rep = preg_replace("/(<p>)?\[\/($block)](<\/p>|<br \/>)?/","[/$2]",$rep);
 
	return $rep;
 
}

if ( ! function_exists( 'cjbtn' ) ) {
    function cjbtn($atts, $content = null) {
        extract(shortcode_atts(array(
            "url" => 'url',
            "style" => 'style',
            "target" => 'target'
        ), $atts));
        return '<a href="' . esc_url($url) . '" target="' . esc_attr($target) . '" class="cjbtn cjbtn-' . esc_attr($style) . '">' . esc_html($content) . '</a>';
    }
}