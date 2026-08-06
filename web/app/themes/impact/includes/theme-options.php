<?php

################################################################################
// Add custom Theme Options
################################################################################
function custom_acf_options_page()
{
	if (function_exists('acf_add_options_page')) {

		acf_add_options_page(
			array(
				'page_title' => 'Site Information',
			'menu_title' => 'Site Info',
			'menu_slug' => 'site-information',
			'capability' => 'edit_posts',
			'redirect' => false,
			'position' => 2
		)
	);
	}
}

add_action('acf/init', 'custom_acf_options_page');
?>