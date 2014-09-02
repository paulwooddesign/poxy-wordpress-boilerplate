<?php
/**
 * A unique identifier is defined to store the options in the database and reference them from the theme.
 * By default it uses the theme name, in lowercase and without spaces, but this can be changed if needed.
 * If the identifier changes, it'll appear as if the options have been reset.
 * 
 */

function optionsframework_option_name() {

	// This gets the theme name from the stylesheet (lowercase and without spaces)
	$theme = wp_get_theme();
	$themename = $theme->Name;
	$themename = preg_replace("/\W/", "", strtolower($themename) );
	
	$optionsframework_settings = get_option('optionsframework');
	$optionsframework_settings['id'] = $themename;
	update_option('optionsframework', $optionsframework_settings);
}

/**
 * Defines an array of options that will be used to generate the settings page and be saved in the database.
 * When creating the "id" fields, make sure to use all lowercase and no spaces.
 *  
 */

function optionsframework_options() {	
	
	// Home Project Type
	$home_project_type = array("all" => "All projects", "featured" => "Featured");	

	$page_head_size = array("tera" => "Tera", "giga" => "Giga", "mega" => "Mega", "alpha" => "Alpha", "beta" => "Beta", "gamma" => "Gamma", "delta" => "Delta", "epsilon" => "Epsilon", "zeta" => "Zeta");	
	$background_size = array("cover" => "Cover", "contain" => "Contain", "repeat" => "Repeat", "repeat-x" => "Repeat X", "repeat-y" => "Repeat Y");
	$background_position = array("center" => "Center", "top" => "Top", "right" => "Right", "bottom" => "Bottom", "left" => "Left");	
	$background_repeat = array("repeat" => "Repeat", "repeat-x" => "Repeat X", "repeat-y" => "Repeat Y");

	$menu_type = array("block" => "Block", "parallax" => "Parallax");


	$header_position = array(
		"fixed-top" => "Fixed Top", 
		"fixed-bottom" => "Fixed Bottom", 
		"absolute-top" => "Absolute Top"
	);



	$home_slideshows = array(
		"flexslider-full-screen" => "Flexslider Full Screen", 
		"flexslider" => "Flexslider Basic", 
		"royal" => "Royal Basic"
		);



	// Thumb Ratios
	$home_page_thumbs_per_row = array("one_half" => "Two", "one_third" => "Three", "one_fourth" => "Four", "one_fifth" => "Five", "one_sixth" => "Six");
	
	// Post Featured Image Size
	$post_featured_image_size = array("large" => "Large", "small" => "Small");
	
	// Slideshow Transition Effect
	$slideshow_effect = array("slide" => "Slide", "fade" => "Fade");
	
	// Pull all the pages into an array
	$options_pages = array();  
	$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
	$options_pages[''] = 'Select a page:';
	foreach ($options_pages_obj as $page) {
    	$options_pages[$page->ID] = $page->post_title;
	}
		
	// If using image radio buttons, define a directory path
	$imagepath =  get_bloginfo('stylesheet_directory') . '/images/';
		
	$options = array();




	///////////////////////////////////////
	//  GENERAL
	//////////////////////////////////////	
	
	$options[] = array( "name" => __('General','poxy'),
						"type" => "heading");	

	$options[] = array( "name" => __('Nav Type','poxy'),
				"desc" => __(' ','poxy'),
				"id" => "poxy_menu_type",
				"std" => "block",
				"type" => "select",
				"options" => $menu_type);


	$options[] = array( "name" => __('Header Position','poxy'),
					"desc" => __(' ','poxy'),
					"id" => "poxy_header_position",
					"std" => "Absolute Top",
					"type" => "select",
					"options" => $header_position);



	$options[] = array( "name" => __('Accent Color','poxy'),
					"desc" => __('Select an accent color for your site.','poxy'),
					"id" => "poxy_color_accent",
					"std" => "",
					"type" => "color");

	$options[] = array( "name" => __('Link Color','poxy'),
			"desc" => __('Select main link color. (#meat a)','poxy'),
			"id" => "poxy_color_link",
			"std" => "",
			"type" => "color");

	$options[] = array( "name" => __('Link Color Hover','poxy'),
			"desc" => __('Select main link hover color. (#meat a:hover)','poxy'),
			"id" => "poxy_color_link_hover",
			"std" => "",
			"type" => "color");

	$options[] = array( "name" => __('Logo','poxy'),
				"desc" => __('Upload a custom logo.','poxy'),
				"id" => "logo",
				"type" => "upload");

	$options[] = array( "name" => __('Mobile Logo','poxy'),
				"desc" => __('Upload a custom mobile logo. (1:1)','poxy'),
				"id" => "mobile_logo",
				"type" => "upload");

	$options[] = array( "name" => __('Favicon','poxy'),
					"desc" => __('Upload a custom favicon.','poxy'),
					"id" => "poxy_favicon",
					"type" => "upload");



	$options[] = array( "name" => __('Analytics/Tracking Code','poxy'),
					"desc" => __('Enter your custom analytics code. (e.g. Google Analytics).','poxy'),
					"id" => "poxy_analytics",
					"std" => "",
					"type" => "textarea",
					"validate" => "none");										
		
	
	$options[] = array( "name" => __('Custom CSS','poxy'),
						"desc" => __('Enter custom CSS here.','poxy'),
						"id" => "poxy_custom_css",
						"std" => "",
						"type" => "textarea");	

	$options[] = array( "name" => __('Overlay Background Image','poxy'),
						"desc" => __('Enter custom SVG code here.','poxy'),
						"id" => "poxy_section_overlay",
						"std" => "",
						"type" => "textarea");	


	$options[] = array( "name" => __('Line Spacer Background Image','poxy'),
					"desc" => __('Upload a custom header background image.','poxy'),
					"id" => "poxy_line_spacer_background_image",
					"type" => "upload");
	

	// $options[] = array( "name" => __('Font for Home Slideshow Title','poxy'),
	// 					"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for home slideshow titles.','poxy'),
	// 					"id" => "poxy_slideshow_heading_font",
	// 					"std" => "",
	// 					"type" => "text");
						
	// $options[] = array( "name" => __('Font for Home Slideshow Description','poxy'),
	// 					"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for home slideshow descriptions.','poxy'),
	// 					"id" => "poxy_slideshow_description_font",
	// 					"std" => "",
	// 					"type" => "text");



	///////////////////////////////////////
	//  HOME PAGE	
	//////////////////////////////////////	
	$options[] = array( "name" => __('Home','poxy'),
						"type" => "heading");


	$options[] = array( "name" => __('Home Layout','poxy'),
						"desc" => __('Enter Layout Number.','poxy'),
						"id" => "poxy_home_layout",
						"std" => "1",
						"type" => "text");

	//Main Banner
	$options['poxy_slideshow_enabled'] = array( "name" => __('Enable Slideshow','poxy'),
						"desc" => __('Check this box to enable the home page slideshow.','poxy'),
						"id" => "poxy_slideshow_enabled",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Choose Slideshow','poxy'),
						"desc" => __(' ','poxy'),
						"id" => "poxy_home_slideshow_type",
						"std" => "flexslider",
						"type" => "select",
						"options" => $home_slideshows);

	$options[] = array( "name" => __('Slideshow Delay','poxy'),
						"desc" => __('Enter the delay in seconds between slides. Enter 0 to disable auto-playing.','poxy'),
						"id" => "poxy_slideshow_delay",
						"std" => "6",
						"type" => "text");

	$options[] = array( "name" => __('Slideshow Height','poxy'),
						"desc" => __('Enter the Height of the slideshow.','poxy'),
						"id" => "poxy_slideshow_height",
						"std" => "1900",
						"type" => "text");

	$options[] = array( "name" => __('Slideshow Effect','poxy'),
						"desc" => __('Select the type of transition effect for the slideshow.','poxy'),
						"id" => "poxy_slideshow_effect",
						"std" => "fade",
						"type" => "select",
						"options" => $slideshow_effect);

	// $options[] = array( "name" => __('Slideshow right arrow','poxy'),
	// 					"desc" => __('Upload right arrow for slideshow.','poxy'),
	// 					"id" => "poxy_slideshow_right_arrow",
	// 					"type" => "upload");

	// $options[] = array( "name" => __('Slideshow left arrow','poxy'),
	// 					"desc" => __('Upload left arrow for slideshow.','poxy'),
	// 					"id" => "poxy_slideshow_left_arrow",
	// 					"type" => "upload");

	$options[] = array( "name" => __('Featured Products Title','poxy'),
						"desc" => __('Enter the title that will appear above the featured pages section on the home page.','poxy'),
						"id" => "poxy_featured_pages_title",
						"std" => "New & Featured Products",
						"type" => "text");

	$options[] = array( "name" => __('Featured Products sub-heading','poxy'),
						"desc" => __('Enter the description that will appear above the featured pages section on the home page.','poxy'),
						"id" => "poxy_featured_pages_description",
						"std" => "Featured Products Description.",
						"type" => "textarea");

	$options[] = array( "name" => __('Featured Pages Title','poxy'),
					"desc" => __('Enter the title that will appear above the featured pages section on the home page.','poxy'),
					"id" => "poxy_featured_pages_title",
					"std" => "Our Services",
					"type" => "text");
						
	$options[] = array( "name" => __('Featured Pages Description','poxy'),
						"desc" => __('Enter the description that will appear above the featured pages section on the home page.','poxy'),
						"id" => "poxy_featured_pages_description",
						"std" => "A little about what we do.",
						"type" => "textarea");		
						
	$options[] = array( "name" => __('Number of  Featured Pages to Show','poxy'),
						"desc" => __('Enter the number of featured pages to show on the home page.','poxy'),
						"id" => "poxy_featured_pages_count",
						"std" => "6",
						"type" => "text");	
						
	$options[] = array( "name" => __('Enable Featured Pages Links','poxy'),
						"desc" => __('Check this box to have the featured pages link to their corresponding single page when clicked.','poxy'),
						"id" => "poxy_featured_pages_links_enabled",
						"std" => "",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Featured Pages Background','poxy'),
						"desc" => __('Upload an image for the featured pages section.','poxy'),
						"id" => "poxy_featured_pages_bkg",
						"type" => "upload");



	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Header
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$options[] = array( "name" => __('Header','poxy'),
						"type" => "heading");	

	$options[] = array( "name" => __('Enable Odd/Even BG Colors','poxy'),
			"desc" => __('Enables alterntating odd even color sections.','poxy'),
			"id" => "poxy_enable_header_odd_even_background_colors",
			"std" => "",
			"type" => "checkbox");


	$options[] = array( "name" => __('Is The Header Dark?','poxy'),
					"desc" => __('Check this the header is dark.','poxy'),
					"id" => "poxy_dark_header",
					"std" => "",
					"type" => "checkbox");

	$options[] = array( "name" => __('Header Background Color','poxy'),
					"desc" => __('Select a header background color for your site.','poxy'),
					"id" => "poxy_color_header",
					"std" => "",
					"type" => "color");


	$options[] = array( "name" => __('Enable Full Width Header','poxy'),
						"desc" => __('Check this box to enable full width top header.','poxy'),
						"id" => "poxy_full_width_header",
						"std" => "",
						"type" => "checkbox");



	$options[] = array( "name" => __('Enable small Header Navigation','poxy'),
					"desc" => __('Check this box to enable small Header Navigation Bar.','poxy'),
					"id" => "poxy_enable_top_header_menu",
					"std" => "",
					"type" => "checkbox");

	$options[] = array( "name" => __('Enable Small Main Navigation','poxy'),
					"desc" => __('Check this box to enable small Header Navigation Bar.','poxy'),
					"id" => "poxy_enable_small_main_menu",
					"std" => "",
					"type" => "checkbox");



	$options[] = array( "name" => __('Main Menu Text Color','poxy'),
		"desc" => __('Select main nav text color. (#main-nav a)','poxy'),
		"id" => "poxy_main_nav_color",
		"std" => "",
		"type" => "color");

	$options[] = array( "name" => __('Main Menu Background Color Hover','poxy'),
					"desc" => __('Select a header background color for your site.','poxy'),
					"id" => "poxy_header_menu_background_hover",
					"std" => "",
					"type" => "color");

	

	$options[] = array( "name" => __('Header Sub Menu Background Color','poxy'),
					"desc" => __('Select a header sub menu background color for your site.','poxy'),
					"id" => "poxy_header_sub_menu_background_color",
					"std" => "",
					"type" => "color");

	$options[] = array( "name" => __('Header Sub Nav Color','poxy'),
				"desc" => __('Select a sub nav font color.','poxy'),
				"id" => "poxy_header_sub_menu_color",
				"std" => "",
				"type" => "color");

	$options[] = array( "name" => __('Line Spacer Header Border Color','poxy'),
				"desc" => __('','poxy'),
				"id" => "poxy_line_spacer_header_border_color",
				"std" => "",
				"type" => "color");

	$options[] = array( "name" => __('Tagline Image','poxy'),
						"desc" => __('Upload a custom favicon.','poxy'),
						"id" => "poxy_tagline_image",
						"type" => "upload");


	$options[] = array( "name" => __('Header Background Image','poxy'),
						"desc" => __('Upload a custom header background image.','poxy'),
						"id" => "poxy_header_background_image",
						"type" => "upload");

	
	// $options[] = array( "name" => __('Background Size','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_header_background_size",
	// 				"std" => "repeat",
	// 				"type" => "select",
	// 				"options" => $background_size);	

	// 	$options[] = array( "name" => __('Background Size','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_header_background_repeat",
	// 				"std" => "repeat",
	// 				"type" => "select",
	// 				"options" => $background_repeat);	

	// 	$options[] = array( "name" => __('Background X Position','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_header_background_x_position",
	// 				"std" => "center",
	// 				"type" => "select",
	// 				"options" => $background_position);	

	// 	$options[] = array( "name" => __('Background Y Position','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_header_background_y_position",
	// 				"std" => "center",
	// 				"type" => "select",
	// 				"options" => $background_position);	



	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Page Head
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	$options[] = array( "name" => __('Page Head','poxy'),
						"type" => "heading");

	$options[] = array( "name" => __('Enable Header Banners','poxy'),
			"desc" => __('Enables image banner section headers.','poxy'),
			"id" => "poxy_enable_page_head_banners",
			"std" => "",
			"type" => "checkbox");

	$options[] = array( "name" => __('Enable breadcrumbs','poxy'),
				"desc" => __('Check this box to enable breadcrumbs.','poxy'),
				"id" => "poxy_enable_breadcrumbs",
				"std" => "",
				"type" => "checkbox");

	$options[] = array( "name" => __('Page Head Size','poxy'),
					"desc" => __('Select font size of page heads.','poxy'),
					"id" => "poxy_page_head_size",
					"std" => "beta",
					"type" => "select",
					"options" => $page_head_size);	

	$options[] = array( "name" => __('Page Head Text Color','poxy'),
					"desc" => __('Select Page Head text color. (#page-head)','poxy'),
					"id" => "poxy_color_pagehead",
					"std" => "",
					"type" => "color");

	

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	//  SECTION SETTINGS (Content)
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////	
	$options[] = array( "name" => __('MEAT','poxy'),
						"type" => "heading");
	
	$options[] = array( "name" => __('Enable Odd/Even BG Colors','poxy'),
				"desc" => __('Enables alterntating odd even color sections.','poxy'),
				"id" => "poxy_enable_meat_odd_even_background_colors",
				"std" => "",
				"type" => "checkbox");

	$options[] = array( "name" => __('Divider Height','poxy'),
						"desc" => __('include unit(em or px)','poxy'),
						"id" => "poxy_meat_divider_height",
						"std" => "1",
						"type" => "text");

	$options[] = array( "name" => __('Is The Meat Dark?','poxy'),
				"desc" => __('Check this the meat/main content area is dark.','poxy'),
				"id" => "poxy_dark_meat",
				"std" => "",
				"type" => "checkbox");

	// $options[] = array( "name" => __('Meat Background Color','poxy'),
	// 			"desc" => __('Select a background color for the main content area of the site.','poxy'),
	// 			"id" => "poxy_background_meat",
	// 			"std" => "",
	// 			"type" => "color");

	// $options[] = array( "name" => __('Even Section Background Color','poxy'),
	// 			"desc" => __('','poxy'),
	// 			"id" => "poxy_even_section_background_color",
	// 			"std" => "",
	// 			"type" => "color");

	// $options[] = array( "name" => __('Odd Section Background Color','poxy'),
	// 		"desc" => __('','poxy'),
	// 		"id" => "poxy_odd_section_background_color",
	// 		"std" => "",
	// 		"type" => "color");

	//Main Banner
	$options['poxy_full_width_spacers_enabled'] = array( "name" => __('Enable Full Width Spacers','poxy'),
						"desc" => __('Check this box to enable full width spacers.','poxy'),
						"id" => "poxy_full_width_spacers_enabled",
						"std" => "1",
						"type" => "checkbox");


	$options[] = array( "name" => __('Line Spacer Bottom Border Color','poxy'),
					"desc" => __('','poxy'),
					"id" => "poxy_line_spacer_bottom_border_color",
					"std" => "",
					"type" => "color");
			


		$options[] = array( "name" => __('Line Spacer Top Border Color','poxy'),
						"desc" => __('','poxy'),
						"id" => "poxy_line_spacer_top_border_color",
						"std" => "",
						"type" => "color");


		$options[] = array( "name" => __('Meat Background Image','poxy'),
					"desc" => __('Upload a custom meat background image.','poxy'),
					"id" => "poxy_meat_background_image",
					"type" => "upload");

		// $options[] = array( "name" => __('Background Size','poxy'),
		// 			"desc" => __(' ','poxy'),
		// 			"id" => "poxy_meat_background_size",
		// 			"std" => "repeat",
		// 			"type" => "select",
		// 			"options" => $background_size);	

		// $options[] = array( "name" => __('Background Size','poxy'),
		// 			"desc" => __(' ','poxy'),
		// 			"id" => "poxy_meat_background_repeat",
		// 			"std" => "repeat",
		// 			"type" => "select",
		// 			"options" => $background_repeat);	

		// $options[] = array( "name" => __('Background X Position','poxy'),
		// 			"desc" => __(' ','poxy'),
		// 			"id" => "poxy_meat_background_x_position",
		// 			"std" => "center",
		// 			"type" => "select",
		// 			"options" => $background_position);	

		// $options[] = array( "name" => __('Background Y Position','poxy'),
		// 			"desc" => __(' ','poxy'),
		// 			"id" => "poxy_meat_background_y_position",
		// 			"std" => "center",
		// 			"type" => "select",
		// 			"options" => $background_position);	






	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	// Footer
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

					
						
	$options[] = array( "name" => __('Footer','poxy'),
						"type" => "heading");

	$options[] = array( "name" => __('Home Layout','poxy'),
					"desc" => __('Enter Layout Number.','poxy'),
					"id" => "poxy_footer_widget_layout",
					"std" => "4",
					"type" => "text");

	$options[] = array( "name" => __('Enable Odd/Even BG Colors','poxy'),
			"desc" => __('Enables alterntating odd even color sections.','poxy'),
			"id" => "poxy_enable_footer_odd_even_background_colors",
			"std" => "",
			"type" => "checkbox");



	$options[] = array( "name" => __('Is The Footer Dark?','poxy'),
					"desc" => __('Check this the footer is dark.','poxy'),
					"id" => "poxy_dark_footer",
					"std" => "",
					"type" => "checkbox");

	$options[] = array( "name" => __('Footer Background Color','poxy'),
				"desc" => __('Select a body/footer background color for your site.','poxy'),
				"id" => "poxy_background_body",
				"std" => "",
				"type" => "color");



	$options[] = array( "name" => __('Footer Logo','poxy'),
						"desc" => __('Upload a custom Footer logo.','poxy'),
						"id" => "poxy_footer_logo",
						"type" => "upload");


	$options[] = array( "name" => __('Line Spacer Footer Border Color','poxy'),
				"desc" => __('','poxy'),
				"id" => "poxy_line_spacer_footer_border_color",
				"std" => "",
				"type" => "color");


	$options[] = array( "name" => __('Copywrite Background Color','poxy'),
						"desc" => __('Select the copywrite background color for your site.','poxy'),
						"id" => "poxy_background_copywrite",
						"std" => "",
						"type" => "color");




	$options[] = array( "name" => __('Footer Background Image','poxy'),
						"desc" => __('Upload a custom footer background image.','poxy'),
						"id" => "poxy_footer_background_image",
						"type" => "upload");
	
	// $options[] = array( "name" => __('Background Size','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_footer_background_size",
	// 				"std" => "repeat",
	// 				"type" => "select",
	// 				"options" => $background_size);	

	// 	$options[] = array( "name" => __('Background Size','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_footer_background_repeat",
	// 				"std" => "repeat",
	// 				"type" => "select",
	// 				"options" => $background_repeat);	

	// 	$options[] = array( "name" => __('Background X Position','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_footer_background_x_position",
	// 				"std" => "center",
	// 				"type" => "select",
	// 				"options" => $background_position);	

	// 	$options[] = array( "name" => __('Background Y Position','poxy'),
	// 				"desc" => __(' ','poxy'),
	// 				"id" => "poxy_footer_background_y_position",
	// 				"std" => "center",
	// 				"type" => "select",
	// 				"options" => $background_position);	


	

	// $options[] = array( "name" => __('Background Size','poxy'),
	// 			"desc" => __(' ','poxy'),
	// 			"id" => "poxy_footer_background_size",
	// 			"std" => "repeat",
	// 			"type" => "select",
	// 			"options" => $background_size;	

	// $options[] = array( "name" => __('Background X Position','poxy'),
	// 		"desc" => __('','poxy'),
	// 		"id" => "poxy_footer_background_x_position",
	// 		"std" => "repeat",
	// 		"type" => "select",
	// 		"options" => $background_x_position;	

	// $options[] = array( "name" => __('Background Y Position','poxy'),
	// 		"desc" => __('','poxy'),
	// 		"id" => "poxy_footer_background_y_position",
	// 		"std" => "repeat",
	// 		"type" => "select",
	// 		"options" => $background_y_position;


	





	








						
	// $options[] = array( "name" => __('Appearance','poxy'),
	// 					"type" => "heading");
	
	// $options[] = array( "name" => __('Header Color','poxy'),
	// 					"desc" => __('Select a header color for your theme.','poxy'),
	// 					"id" => "poxy_color_header",
	// 					"std" => "#74c9b4",
	// 					"type" => "color");
						
	// $options[] = array( "name" => __('Accent Color','poxy'),
	// 					"desc" => __('Select an accent color for your theme.','poxy'),
	// 					"id" => "poxy_color_accent",
	// 					"std" => "#74c9b4",
	// 					"type" => "color");	
						
	// $options[] = array( "name" => __('Menu Color','poxy'),
	// 					"desc" => __('Select a color for your menu links.','poxy'),
	// 					"id" => "poxy_color_menu",
	// 					"std" => "#8f8f8f",
	// 					"type" => "color");
						
	// $options[] = array( "name" => __('Menu Hover Color','poxy'),
	// 					"desc" => __('Select a hover color for your menu links.','poxy'),
	// 					"id" => "poxy_color_menu_hover",
	// 					"std" => "#2e2e2e",
	// 					"type" => "color");
						
	// $options[] = array( "name" => __('Button Color','poxy'),
	// 					"desc" => __('Select a color for your buttons.','poxy'),
	// 					"id" => "poxy_color_btn",
	// 					"std" => "#757575",
	// 					"type" => "color");
						
	// $options[] = array( "name" => __('Button Hover Color','poxy'),
	// 					"desc" => __('Select a hover color for your buttons.','poxy'),
	// 					"id" => "poxy_color_btn_hover",
	// 					"std" => "#595959",
	// 					"type" => "color");
						
	// $options[] = array( "name" => __('Link Color','poxy'),
	// 					"desc" => __('Select a color for your links.','poxy'),
	// 					"id" => "poxy_color_link",
	// 					"std" => "#4da7ca",
	// 					"type" => "color");

	// $options[] = array( "name" => __('Link Hover Color','poxy'),
	// 					"desc" => __('Select a hover color for your links.','poxy'),
	// 					"id" => "poxy_color_link_hover",
	// 					"std" => "#4290ae",
	// 					"type" => "color");


		



	



	
	


	///////////////////////////////////////
	//  Info Bar
	//////////////////////////////////////	
	// $options[] = array( "name" => __('Info Bar','poxy'),
	// 					"type" => "heading");

	// $options[] = array( "name" => __('Info Bar Main Title','poxy'),
	// 				"desc" => __('Main Title.','poxy'),
	// 				"id" => "poxy_info_box_34_title",
	// 				"std" => "Info Box Title",
	// 				"type" => "text");

	// $options[] = array( "name" => __('Main Section Copy','poxy'),
	// 				"desc" => __('Enter the copy for the large block.','poxy'),
	// 				"id" => "poxy_info_box_34_content",
	// 				"std" => "3/4 Section Content",
	// 				"type" => "textarea");

	// $options[] = array( "name" => __('Main Section Image','poxy'),
	// 					"desc" => __('Upload Main Info Box Image.','poxy'),
	// 					"id" => "poxy_info_box_34_image",
	// 					"type" => "upload");

	// $options[] = array( "name" => __('Secondary Section Copy','poxy'),
	// 				"desc" => __('Enter the copy for the small block.','poxy'),
	// 				"id" => "poxy_info_box_14_content",
	// 				"std" => "1/4 Section Content",
	// 				"type" => "textarea");

	// $options[] = array( "name" => __('Secondary Section Button Title','poxy'),
	// 			"desc" => __('Button Title.','poxy'),
	// 			"id" => "poxy_info_box_14_button_title",
	// 			"std" => "Shop Now!",
	// 			"type" => "text");

	// $options[] = array( "name" => __('Secondary Section Button URL','poxy'),
	// 			"desc" => __('Secondary Section Button URL.','poxy'),
	// 			"id" => "poxy_info_box_14_button_url",
	// 			"std" => "",
	// 			"type" => "text");








	// Client Logos
	// $options['poxy_client_logos_enabled'] = array( "name" => __('Enable Client Logos','poxy'),
	// 					"desc" => __('Check this box to enable the home Client Logos.','poxy'),
	// 					"id" => "poxy_client_logos_enabled",
	// 					"std" => "1",
	// 					"type" => "checkbox");

	// $options[] = array( "name" => __('Enable Client Logos','poxy'),
	// 					"desc" => __('Check this box to have the client logos link to their corresponding single page when clicked.','poxy'),
	// 					"id" => "poxy_client_logos_links_enabled",
	// 					"std" => "1",
	// 					"type" => "checkbox");

	// $options[] = array( "name" => __('Number of  Featured Pages to Show','poxy'),
	// 					"desc" => __('Enter the number of featured pages to show on the home page.','poxy'),
	// 					"id" => "poxy_client_logos_count",
	// 					"std" => "6",
	// 					"type" => "text");

	// $options[] = array( "name" => __('Client logos Per Row','poxy'),
	// 					"desc" => __('Select the number of thumbs to display per row.','poxy'),
	// 					"id" => "poxy_client_thumbs_per_row",
	// 					"std" => "one_fourth",
	// 					"type" => "select",
	// 					"options" => $home_page_thumbs_per_row);


	// $options[] = array( "name" => __('Client Logos Title','poxy'),
	// 					"desc" => __('Enter the title that will appear above the featured pages section on the home page.','poxy'),
	// 					"id" => "poxy_client_logos_title",
	// 					"std" => "Featured Clients",
	// 					"type" => "text");


	// $options[] = array( "name" => __('Client Logos Description','poxy'),
	// 					"desc" => __('Enter the description that will appear above the featured pages section on the home page.','poxy'),
	// 					"id" => "poxy_client_logos_description",
	// 					"std" => "Client Logos Description.",
	// 					"type" => "textarea");				
	

	



	//Twitter Feed
	// $options['poxy_twitter_feed_enabled'] = array( "name" => __('Enable Twitter Feed','poxy'),
	// 					"desc" => __('Check this box to enable the home twitter feed.','poxy'),
	// 					"id" => "poxy_twitter_feed_enabled",
	// 					"std" => "1",
	// 					"type" => "checkbox");

	// $options[] = array( "name" => __('Twitter API','poxy'),
	// 					"desc" => __('Enter the twitter API.','poxy'),
	// 					"id" => "poxy_twitter_api",
	// 					"std" => "",
	// 					"type" => "text");

	// $options[] = array( "name" => __('Twitter Feed Title','poxy'),
	// 					"desc" => __('Enter the title that will appear above the twitter feed on the home page.','poxy'),
	// 					"id" => "poxy_twitter_feed_title",
	// 					"std" => "Twitter Feed",
	// 					"type" => "text");

	// $options[] = array( "name" => __('Twitter Feed Description','poxy'),
	// 					"desc" => __('Enter the description that will appear above the twitter feed on the home page.','poxy'),
	// 					"id" => "poxy_twitter_feed_description",
	// 					"std" => "Twitter Feed Description.",
	// 					"type" => "textarea");



	
						
	
	//Featued Projects			
	// $options[] = array( "name" => __('Recent Projects Title','poxy'),
	// 					"desc" => __('Enter the title that will appear above the recent themes section on the home page.','poxy'),
	// 					"id" => "poxy_recent_projects_title",
	// 					"std" => "Our Latest Work",
	// 					"type" => "text");
							
	// $options[] = array( "name" => __('Recent Projects Description','poxy'),
	// 					"desc" => __('Enter the description that will appear above the recent projects section on the home page.','poxy'),
	// 					"id" => "poxy_recent_projects_description",
	// 					"std" => "Take a look at some of our recent projects.",
	// 					"type" => "textarea");
						
	
	// $options[] = array( "name" => __('Number of Projects to Show','poxy'),
	// 					"desc" => __('Enter the number of project to show on the home page.','poxy'),
	// 					"id" => "poxy_home_project_count",
	// 					"std" => "6",
	// 					"type" => "text");
						
	// $options[] = array( "name" => __('Type of Projects to Show','poxy'),
	// 					"desc" => __('Select the type of projects to show on the home page.','poxy'),
	// 					"id" => "poxy_home_project_type",
	// 					"std" => "latest",
	// 					"type" => "select",
	// 					"options" => $home_project_type);


	//Testimonials						
	// $options[] = array( "name" => __('Testimonials Title','poxy'),
	// 					"desc" => __('Enter the title that will appear above the testimonials section on the home page.','poxy'),
	// 					"id" => "poxy_testimonials_title",
	// 					"std" => "Testimonials",
	// 					"type" => "text");	
						
	// $options[] = array( "name" => __('Testimonials Description','poxy'),
	// 					"desc" => __('Enter the description that will appear above the testimonials section on the home page.','poxy'),
	// 					"id" => "poxy_testimonials_description",
	// 					"std" => "What our customers are saying.",
	// 					"type" => "textarea");
	
	
	// $options[] = array( "name" => __('Number of  Testimonials to Show','poxy'),
	// 					"desc" => __('Enter the number of Testimonials to show on the home page.','poxy'),
	// 					"id" => "poxy_home_testimonial_count",
	// 					"std" => "3",
	// 					"type" => "text");	
						
	
						
						
		
	//Home Posts	
	// $options[] = array( "name" => __('Recent Posts Title','poxy'),
	// 					"desc" => __('Enter the title that will appear above the posts section on the home page.','poxy'),
	// 					"id" => "poxy_recent_posts_title",
	// 					"std" => "From the Bog",
	// 					"type" => "text");
						
	// $options[] = array( "name" => __('Recent Posts Description','poxy'),
	// 					"desc" => __('Enter the description that will appear above the posts section on the home page.','poxy'),
	// 					"id" => "poxy_recent_posts_description",
	// 					"std" => "",
	// 					"type" => "textarea");
						
	// $options[] = array( "name" => __('Number of Recent Posts to Show','poxy'),
	// 					"desc" => __('Enter the number of recent posts to show on the home page.','poxy'),
	// 					"id" => "poxy_recent_posts_count",
	// 					"std" => "3",
	// 					"type" => "text");
	
				

		






	///////////////////////////////////////
	//  Posts
	//////////////////////////////////////	
	$options[] = array( "name" => __('Blog','poxy'),
						"type" => "heading");

	$options[] = array( "name" => __('Blog Layout','poxy'),
						"desc" => __('Enter Layout Number.','poxy'),
						"id" => "poxy_blog_layout",
						"std" => "1",
						"type" => "text");

	$options[] = array( "name" => __('Blog Single Post Layout','poxy'),
						"desc" => __('Enter Layout Number.','poxy'),
						"id" => "poxy_blog_single_layout",
						"std" => "1",
						"type" => "text");

	$options[] = array( "name" => __('Blog Banner Image','poxy'),
					"desc" => __('Upload a blog page banner image.','poxy'),
					"id" => "poxy_blog_banner",
					"type" => "upload");
	
	$options[] = array( "name" => "Select a Page",
						"desc" => "Select the page you're using as your blog page. This is used to show the blog title at the top of your posts.",
						"id" => "poxy_blog_page",
						"type" => "select",
						"options" => $options_pages);

	$options[] = array( "name" => __('Post Heading Size','poxy'),
						"desc" => __('Select font size of post titles.','poxy'),
						"id" => "poxy_post_head_size",
						"std" => "beta",
						"type" => "select",
						"options" => $page_head_size);
						
	$options[] = array( "name" => __('Show Author','poxy'),
						"desc" => __('Check this box to show the author.','poxy'),
						"id" => "poxy_post_show_author",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Date','poxy'),
						"desc" => __('Check this box to show the publish date.','poxy'),
						"id" => "poxy_post_show_date",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Category','poxy'),
						"desc" => __('Check this box to show the category.','poxy'),
						"id" => "poxy_post_show_category",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Comment Count','poxy'),
						"desc" => __('Check this box to show the comment count.','poxy'),
						"id" => "poxy_post_show_comments",
						"std" => "1",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Featured Image Size','poxy'),
						"desc" => __('Select the size of the post featured image.','poxy'),
						"id" => "poxy_post_featured_img_size",
						"std" => "large",
						"type" => "select",
						"options" => $post_featured_image_size);
						
	$options[] = array( "name" => __('Show Featured Image on Single Posts','poxy'),
						"desc" => __('Check this box to show the featured image on single post pages.','poxy'),
						"id" => "poxy_post_show_featured_image",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Featured Image on Home Page','poxy'),
						"desc" => __('Check this box to show the featured image on the home page template.','poxy'),
						"id" => "poxy_post_show_featured_image_on_home",
						"std" => "",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Enable Full Width Blog','poxy'),
						"desc" => __('Check this box to make your posts span the width of the page.','poxy'),
						"id" => "poxy_post_full_width",
						"std" => "0",
						"type" => "checkbox");
						
	$options[] = array( "name" => __('Show Full Posts','poxy'),
						"desc" => __('Check this box to show full posts instead of excerpts on index and archive pages.','poxy'),
						"id" => "poxy_post_show_full",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Read More Link Title','poxy'),
				"desc" => __('Main Title.','poxy'),
				"id" => "poxy_read_more_title",
				"std" => "Read More",
				"type" => "text");


	$options[] = array( "name" => __('Disqus Shortname','poxy'),
					"desc" => __('Enter your disqus shortname.','poxy'),
					"id" => "poxy_disqus_shortname",
					"std" => "",
					"type" => "text");
						
	
						
	
	
	///////////////////////////////////////
	//  Footer 
	//////////////////////////////////////	
	// $options[] = array( "name" => __('Footer','poxy'),
	// 					"type" => "heading");

	// $options[] = array( "name" => __('Left Footer Text','poxy'),
	// 					"desc" => __('This will appear on the left side of the footer.','poxy'),
	// 					"id" => "poxy_footer_left",
	// 					"std" => "",
	// 					"type" => "textarea");

	// $options[] = array( "name" => __('Right Footer Text','poxy'),
	// 					"desc" => __('This will appear on the right side of the footer.','poxy'),
	// 					"id" => "poxy_footer_right",
	// 					"std" => "",
	// 					"type" => "textarea");

	// $options[] = array( "name" => __('Facebook Likes','poxy'),
	// 					"desc" => __('Check this box to display an Facebook likes.','poxy'),
	// 					"id" => "poxy_show_facebook_likes",
	// 					"std" => "0",
	// 					"type" => "checkbox");



	
	// $options[] = array( "name" => __('Google Map Address','poxy'),
	// 					"desc" => __('Enter the address to display on your Google Map.','poxy'),
	// 					"id" => "poxy_google_map_address",
	// 					"std" => "",
	// 					"type" => "textarea");
						
	// $options[] = array( "name" => __('Google Map Height','poxy'),
	// 					"desc" => __('Enter a height in pixels for your Google Map.','poxy'),
	// 					"id" => "poxy_google_map_height",
	// 					"std" => "350",
	// 					"type" => "text");	
						
	// $options[] = array( "name" => __('Google Map Tint Color','poxy'),
	// 					"desc" => __('Select a tint color for your Google Map.','poxy'),
	// 					"id" => "poxy_google_map_tint",
	// 					"std" => "#79d1bb",
	// 					"type" => "color");	
						
						


	///////////////////////////////////////
	//  Social Networks
	//////////////////////////////////////	
	
	$options[] = array( "name" => __('Social','poxy'),
						"type" => "heading");	

	$options[] = array( "name" => __('Facebook Likes (Facebook ID)','poxy'),
					"desc" => __('Enter the facebook page ID. Example (https://www.facebook.com/<stong>FACEBOOK_ID</strong>)','poxy'),
					"id" => "poxy_facebook_page_id",
					"std" => "",
					"type" => "text");

	$options[] = array( "name" => __('Social Network Icons','poxy'),
						"desc" => __('Check this box to show footer widgets.','poxy'),
						"id" => "poxy_social_icons",
						"std" => "1",
						"type" => "checkbox");

	$options[] = array( "name" => __('Facebook','poxy'),
						"desc" => __('Facebook URL.','poxy'),
						"id" => "poxy_facebook_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Twitter','poxy'),
						"desc" => __('Twitter URL.','poxy'),
						"id" => "poxy_twitter_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Tumblr','poxy'),
						"desc" => __('Tumblr URL.','poxy'),
						"id" => "poxy_tumblr_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Google','poxy'),
						"desc" => __('Google URL.','poxy'),
						"id" => "poxy_google_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Linkedin','poxy'),
						"desc" => __('Linkedin URL.','poxy'),
						"id" => "poxy_linkedin_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Pinterest','poxy'),
						"desc" => __('Pinterest URL.','poxy'),
						"id" => "poxy_pinterest_url",
						"std" => "",
						"type" => "text");
	
	$options[] = array( "name" => __('Vimeo','poxy'),
						"desc" => __('Vimeo URL.','poxy'),
						"id" => "poxy_vimeo_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('YouTube','poxy'),
						"desc" => __('YouTube URL.','poxy'),
						"id" => "poxy_youtube_url",
						"std" => "",
						"type" => "text");

	$options[] = array( "name" => __('Instagram','poxy'),
						"desc" => __('Instagram URL.','poxy'),
						"id" => "poxy_instagram_url",
						"std" => "",
						"type" => "text");

	///////////////////////////////////////
	//  Typography
	//////////////////////////////////////	
	
	$options[] = array( "name" => __('Typography','poxy'),
						"type" => "heading");	


	$options[] = array( "name" => __('Paragraph Color','poxy'),
					"desc" => __('Select body text color.','poxy'),
					"id" => "poxy_color_body",
					"std" => "",
					"type" => "color");

	$options[] = array( "name" => __('Paragraph Font','poxy'),
					"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the body text.','poxy'),
					"id" => "poxy_body_font",
					"std" => "",
					"type" => "text");

	$options[] = array( "name" => __('Paragraph Line Height','poxy'),
						"desc" => __('Paragraph Line Height (ems)','poxy'),
						"id" => "poxy_paragraph_line_height",
						"std" => "1.725",
						"type" => "text");

	$options[] = array( "name" => __('Paragraph Letter Spacing','poxy'),
						"desc" => __('Paragraph letter spacing (ems)','poxy'),
						"id" => "poxy_paragraph_letter_spacing",
						"std" => "0.03",
						"type" => "text");

	$options[] = array( "name" => __('Heading Text Color','poxy'),
			"desc" => __('Select heading text color. (h1, h2, h3, h4, h5, h6)','poxy'),
			"id" => "poxy_color_heading",
			"std" => "",
			"type" => "color");


	$options[] = array( "name" => __('Heading Font','poxy'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for headings.','poxy'),
						"id" => "poxy_heading_font",
						"std" => "",
						"type" => "text");


	$options[] = array( "name" => __('Heading Line Height','poxy'),
					"desc" => __('Heading Line Height (ems)','poxy'),
					"id" => "poxy_heading_line_height",
					"std" => "",
					"type" => "text");

	$options[] = array( "name" => __('Heading Letter Spacing','poxy'),
						"desc" => __('Heading letter spacing (ems)','poxy'),
						"id" => "poxy_heading_letter_spacing",
						"std" => "",
						"type" => "text");




	$options[] = array( "name" => __('Heading Weight','poxy'),
					"desc" => __('Heading Font Weight (300, 500, 800, bold, light, normal)','poxy'),
					"id" => "poxy_heading_weight",
					"std" => "",
					"type" => "text");
						
	$options[] = array( "name" => __('Font for Sub Headings','poxy'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for sub headings.','poxy'),
						"id" => "poxy_sub_heading_font",
						"std" => "",
						"type" => "text");



	$options[] = array( "name" => __('Font for Main Menu','poxy'),
						"desc" => __('Enter the name of the <a href="http://www.google.com/webfonts" target="_blank">Google Web Font</a> you want to use for the main menu.','poxy'),
						"id" => "poxy_menu_font",
						"std" => "",
						"type" => "text");	
	


	///////////////////////////////////////
	//  Development
	//////////////////////////////////////	
	$options[] = array( "name" => __('Post Types','poxy'),
						"type" => "heading");	

	$options[] = array( "name" => __('Events','poxy'),
					"desc" => __('Check to enable events.','poxy'),
					"id" => "poxy_event_post_type",
					"std" => "0",
					"type" => "checkbox");

	$options[] = array( "name" => __('FAQs','poxy'),
					"desc" => __('Check to enable events.','poxy'),
					"id" => "poxy_faq_post_type",
					"std" => "0",
					"type" => "checkbox");

	$options[] = array( "name" => __('Testimonials','poxy'),
					"desc" => __('Check to enable testimonials.','poxy'),
					"id" => "poxy_testimonial_post_type",
					"std" => "0",
					"type" => "checkbox");

	$options[] = array( "name" => __('Staff','poxy'),
				"desc" => __('Check to enable staff/team.','poxy'),
				"id" => "poxy_staff_post_type",
				"std" => "0",
				"type" => "checkbox");

	$options[] = array( "name" => __('Locations','poxy'),
				"desc" => __('Check to enable Locations.','poxy'),
				"id" => "poxy_locations_post_type",
				"std" => "0",
				"type" => "checkbox");


	///////////////////////////////////////
	//  Development
	//////////////////////////////////////	
	$options[] = array( "name" => __('DEV','poxy'),
						"type" => "heading");	

	$options[] = array( "name" => __('Wordpress Admin Bar.','poxy'),
						"desc" => __('Hide admin bar.','poxy'),
						"id" => "poxy_hide_admin_bar",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('DEV Styles.','poxy'),
						"desc" => __('Show DEV Styles.','poxy'),
						"id" => "poxy_dev_styles",
						"std" => "0",
						"type" => "checkbox");

	$options[] = array( "name" => __('Option Styles.','poxy'),
					"desc" => __('Hide Options Styles.','poxy'),
					"id" => "poxy_option_styles",
					"std" => "0",
					"type" => "checkbox");

	$options[] = array( "name" => __('Placeholder Text Color','poxy'),
			"desc" => __('','poxy'),
			"id" => "poxy_placeholder_text_color",
			"std" => "#666",
			"type" => "color");

	$options[] = array( "name" => __('Placeholder Background Color','poxy'),
			"desc" => __('','poxy'),
			"id" => "poxy_placeholder_background_color",
			"std" => "#ccc",
			"type" => "color");
						
	$options[] = array( "name" => __('Placeholder Text','poxy'),
						"desc" => __('Enter Placeholder Text.','poxy'),
						"id" => "poxy_placeholder_text",
						"std" => "
						Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quisque vitae mi gravida, imperdiet nisi non, egestas elit. Vivamus quis dapibus lectus. Aliquam in ornare urna. Donec aliquam eu neque eu facilisis. Fusce venenatis, ipsum at sagittis tincidunt, tellus arcu elementum ipsum, non tincidunt lorem velit ut nisl. Curabitur vulputate metus tortor. Fusce volutpat rutrum nunc, vel luctus lorem egestas eu. Etiam viverra quam in sapien mollis, quis egestas quam gravida. Morbi nec orci vulputate, volutpat magna in, placerat nisl. Vivamus luctus dui id gravida fermentum. Etiam aliquam urna dolor, eget ornare turpis tempus in. Nam id eros eget mi suscipit rutrum.

Ut rutrum posuere mauris. Nulla auctor ac leo at rutrum. Ut ultrices, mauris vitae faucibus lacinia, magna magna condimentum felis, non aliquet lorem purus eget leo. Nam id augue quis tortor tristique porttitor in ac turpis. Aliquam ullamcorper nulla id volutpat accumsan. Fusce interdum at magna at condimentum. Etiam vitae dolor faucibus, venenatis dui vitae, vulputate ipsum. Ut at tincidunt felis, at consectetur diam. Nulla consequat sodales fringilla.

Phasellus tristique enim lorem, id vehicula risus egestas id. Quisque suscipit non nunc vitae vestibulum. Morbi porttitor turpis vehicula sollicitudin suscipit. Duis feugiat dapibus risus vel posuere. In placerat mi vel dapibus dictum. Nulla vitae sem lacinia, volutpat orci eget, dapibus dui. Cras sed rhoncus odio. Fusce luctus rutrum est sit amet tristique. Pellentesque tincidunt quam eget condimentum ornare. Vivamus odio sapien, lacinia vitae fermentum vitae, dictum et felis. Morbi vitae urna ultrices, imperdiet quam et, imperdiet augue. Quisque imperdiet elementum diam, a vestibulum nulla rhoncus eget. Ut et interdum turpis, vel euismod justo.

Maecenas molestie sapien at ipsum blandit ultrices nec in dui. Morbi pellentesque pretium felis, at blandit justo lacinia nec. Suspendisse ultrices bibendum tristique. Curabitur adipiscing laoreet risus. Fusce convallis tempor mi quis consequat. In rutrum ligula at augue dictum, nec ultricies massa pretium. Donec molestie condimentum sagittis. Proin auctor laoreet nisi, eu cursus lorem vestibulum eu. Fusce vestibulum arcu a nibh cursus, nec congue mi convallis.
						",
						"type" => "textarea",
						"validate" => "none");

	
		// $options[] = array( "name" => __('Analytics','poxy'),
		// 				"desc" => __('Enter your custom analytics code. (e.g. Google Analytics).','poxy'),
		// 				"id" => "poxy_analytics",
		// 				"std" => "",
		// 				"type" => "textarea",
		// 				"validate" => "none");			
	
	
						
	
	return $options;
}