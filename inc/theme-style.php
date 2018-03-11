<?php

function industry_theme_custom_css()
{
    
    $body_font      = cs_get_option('body_font');
    $body_font_size = cs_get_option('body_font_size');
    
    $different_hadding_font = cs_get_option('different_hadding_font');
    $heading_font           = cs_get_option('heading_font');
    
    $header_menu_color = cs_get_option('header_menu_color');
    
    
    if (!empty($body_font)) {
        $body_font_family = $body_font['family'];
    } else {
        $body_font_family = 'Montserrat';
    }
    
    if (!empty($heading_font)) {
        $heading_font_family = $heading_font['family'];
    } else {
        $heading_font_family = 'Montserrat';
    }
    
    wp_enqueue_style('industry-default-style', get_template_directory_uri() . '/assets/css/custom.css');
    $custom_css = '';
    $custom_css .= '
		body{font-family:' . esc_html($body_font_family) . ';font-size:' . esc_attr($body_font_size) . ';font-weight:' . $body_font['variant'] . ';}
	';
    
    if ($different_hadding_font == true) {
        $custom_css .= '
		h1, h2, h3, h4, h5, h6{font-family:' . esc_html($heading_font_family) . ';font-weight:' . $heading_font['variant'] . ';}';
    }
    
    $custom_css = '
		.header-bottom-area{
			background-color:' . esc_attr($header_menu_color) . '
		}
	';
    
    wp_add_inline_style('industry-default-style', $custom_css);
}

add_action('wp_enqueue_scripts', 'industry_theme_custom_css');