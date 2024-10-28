<?php

$aviation_industry_custom_css = "";

$aviation_industry_theme_pagination_options_alignment = get_theme_mod('aviation_industry_theme_pagination_options_alignment', 'Center');
	if ($aviation_industry_theme_pagination_options_alignment == 'Center') {
	    $aviation_industry_custom_css .= '.pagination{';
	    $aviation_industry_custom_css .= 'text-align: center;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_theme_pagination_options_alignment == 'Right') {
	    $aviation_industry_custom_css .= '.pagination{';
	    $aviation_industry_custom_css .= 'text-align: Right;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_theme_pagination_options_alignment == 'Left') {
	    $aviation_industry_custom_css .= '.pagination{';
	    $aviation_industry_custom_css .= 'text-align: Left;';
	    $aviation_industry_custom_css .= '}';
	}

	 $aviation_industry_theme_breadcrumb_options_alignment = get_theme_mod('aviation_industry_theme_breadcrumb_options_alignment', 'Left');
	if ($aviation_industry_theme_breadcrumb_options_alignment == 'Center') {
	    $aviation_industry_custom_css .= '.breadcrumbs ul{';
	    $aviation_industry_custom_css .= 'text-align: center !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_theme_breadcrumb_options_alignment == 'Right') {
	    $aviation_industry_custom_css .= '.breadcrumbs ul{';
	    $aviation_industry_custom_css .= 'text-align: Right !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_theme_breadcrumb_options_alignment == 'Left') {
	    $aviation_industry_custom_css .= '.breadcrumbs ul{';
	    $aviation_industry_custom_css .= 'text-align: Left !important;';
	    $aviation_industry_custom_css .= '}';
	}

	$aviation_industry_menu_text_transform = get_theme_mod('aviation_industry_menu_text_transform', 'Capitalize');
	if ($aviation_industry_menu_text_transform == 'Capitalize') {
	    $aviation_industry_custom_css .= '.site-navigation .primary-menu > li a{';
	    $aviation_industry_custom_css .= 'text-transform: Capitalize !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_menu_text_transform == 'uppercase') {
	    $aviation_industry_custom_css .= '.site-navigation .primary-menu > li a{';
	    $aviation_industry_custom_css .= 'text-transform: uppercase !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_menu_text_transform == 'lowercase') {
	    $aviation_industry_custom_css .= '.site-navigation .primary-menu > li a{';
	    $aviation_industry_custom_css .= 'text-transform: lowercase !important;';
	    $aviation_industry_custom_css .= '}';
	}

	$aviation_industry_single_page_content_alignment = get_theme_mod('aviation_industry_single_page_content_alignment', 'left');
	if ($aviation_industry_single_page_content_alignment == 'left') {
	    $aviation_industry_custom_css .= '#single-page .type-page{';
	    $aviation_industry_custom_css .= 'text-align: left !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_single_page_content_alignment == 'center') {
	    $aviation_industry_custom_css .= '#single-page .type-page{';
	    $aviation_industry_custom_css .= 'text-align: center !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_single_page_content_alignment == 'right') {
	    $aviation_industry_custom_css .= '#single-page .type-page{';
	    $aviation_industry_custom_css .= 'text-align: right !important;';
	    $aviation_industry_custom_css .= '}';
	}

	$aviation_industry_footer_widget_title_alignment = get_theme_mod('aviation_industry_footer_widget_title_alignment', 'left');
	if ($aviation_industry_footer_widget_title_alignment == 'left') {
	    $aviation_industry_custom_css .= 'h2.widget-title{';
	    $aviation_industry_custom_css .= 'text-align: left !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_footer_widget_title_alignment == 'center') {
	    $aviation_industry_custom_css .= 'h2.widget-title{';
	    $aviation_industry_custom_css .= 'text-align: center !important;';
	    $aviation_industry_custom_css .= '}';
	} else if ($aviation_industry_footer_widget_title_alignment == 'right') {
	    $aviation_industry_custom_css .= 'h2.widget-title{';
	    $aviation_industry_custom_css .= 'text-align: right !important;';
	    $aviation_industry_custom_css .= '}';
	}

    $aviation_industry_show_hide_related_product = get_theme_mod('aviation_industry_show_hide_related_product',true);
    if($aviation_industry_show_hide_related_product != true){
        $aviation_industry_custom_css .='.related.products{';
            $aviation_industry_custom_css .='display: none;';
        $aviation_industry_custom_css .='}';
    }