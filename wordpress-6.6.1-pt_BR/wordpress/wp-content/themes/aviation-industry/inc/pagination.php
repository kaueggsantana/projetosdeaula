<?php
/**
 *
 * Pagination Functions
 *
 * @package Aviation Industry
 */

if( !function_exists('aviation_industry_archive_pagination_x') ):

	// Archive Page Navigation
	function aviation_industry_archive_pagination_x(){

		the_posts_pagination();
	}

endif;
add_action('aviation_industry_archive_pagination','aviation_industry_archive_pagination_x',20);