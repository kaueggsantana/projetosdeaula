<?php
/**
* Widget Functions.
*
* @package Aviation Industry
*/


function aviation_industry_widgets_init(){

	register_sidebar(array(
	    'name' => esc_html__('Main Sidebar', 'aviation-industry'),
	    'id' => 'sidebar-1',
	    'description' => esc_html__('Add widgets here.', 'aviation-industry'),
	    'before_widget' => '<div id="%1$s" class="widget %2$s">',
	    'after_widget' => '</div>',
	    'before_title' => '<h3 class="widget-title"><span>',
	    'after_title' => '</span></h3>',
	));


    $aviation_industry_default = aviation_industry_get_default_theme_options();
    $aviation_industry_footer_column_layout = absint( get_theme_mod( 'aviation_industry_footer_column_layout',$aviation_industry_default['aviation_industry_footer_column_layout'] ) );

    for( $i = 0; $i < $aviation_industry_footer_column_layout; $i++ ){
    	
    	if( $i == 0 ){ $count = esc_html__('One','aviation-industry'); }
    	if( $i == 1 ){ $count = esc_html__('Two','aviation-industry'); }
    	if( $i == 2 ){ $count = esc_html__('Three','aviation-industry'); }

	    register_sidebar( array(
	        'name' => esc_html__('Footer Widget ', 'aviation-industry').$count,
	        'id' => 'aviation-industry-footer-widget-'.$i,
	        'description' => esc_html__('Add widgets here.', 'aviation-industry'),
	        'before_widget' => '<div id="%1$s" class="widget %2$s">',
	        'after_widget' => '</div>',
	        'before_title' => '<h2 class="widget-title">',
	        'after_title' => '</h2>',
	    ));
	}

}

add_action('widgets_init', 'aviation_industry_widgets_init');