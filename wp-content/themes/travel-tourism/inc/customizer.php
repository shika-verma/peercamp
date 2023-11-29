<?php
/**
 * Travel Tourism Theme Customizer
 *
 * @package Travel Tourism
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */

function travel_tourism_custom_controls() {
	load_template( trailingslashit( get_template_directory() ) . '/inc/custom-controls.php' );
}
add_action( 'customize_register', 'travel_tourism_custom_controls' );

function travel_tourism_customize_register( $wp_customize ) {

	load_template( trailingslashit( get_template_directory() ) . '/inc/icon-picker.php' );

	$wp_customize->get_setting( 'blogname' )->transport = 'postMessage'; 
	$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'blogname', array( 
		'selector' => '.logo .site-title a', 
	 	'render_callback' => 'travel_tourism_customize_partial_blogname', 
	)); 

	$wp_customize->selective_refresh->add_partial( 'blogdescription', array( 
		'selector' => 'p.site-description', 
		'render_callback' => 'travel_tourism_customize_partial_blogdescription', 
	));

	//add home page setting pannel
	$travel_tourism_parent_panel = new Travel_Tourism_WP_Customize_Panel( $wp_customize, 'travel_tourism_panel_id', array(
		'capability' => 'edit_theme_options',
		'theme_supports' => '',
		'title' => esc_html__( 'Homepage Settings', 'travel-tourism' ),
		'priority' => 10,
	));

	//Top Header
	$wp_customize->add_section( 'travel_tourism_top_header' , array(
    	'title'      => __( 'Top Header', 'travel-tourism' ),
		'panel' => 'travel_tourism_panel_id'
	) );

   	// Header Background color 

	$wp_customize->add_setting('travel_tourism_header_background_color', array(
		'default'           => '#edf2f5',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_header_background_color', array(
		'label'    => __('Header Background Color', 'travel-tourism'),
		'section'  => 'travel_tourism_top_header',
	)));

	$wp_customize->add_setting('travel_tourism_phone_number',array(
		'default'=> '',
		'sanitize_callback'	=> 'travel_tourism_sanitize_phone_number'
	));	
	$wp_customize->add_control('travel_tourism_phone_number',array(
		'label'	=> __('Phone Number','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '+00 123 456 7890', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_email_address',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));	
	$wp_customize->add_control('travel_tourism_email_address',array(
		'label'	=> __('Email Address','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'support@123.com', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_top_header',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_opening_time',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('travel_tourism_opening_time',array(
		'label'	=> __('Opening Time','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Mon to Sat 8:00am - 5:00pm', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_top_header',
		'type'=> 'text'
	));

	//Menus Settings
	$wp_customize->add_section( 'travel_tourism_menu_section' , array(
    	'title' => __( 'Menus Settings', 'travel-tourism' ),
		'panel' => 'travel_tourism_panel_id'
	) );

	$wp_customize->add_setting('travel_tourism_navigation_menu_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_navigation_menu_font_size',array(
		'label'	=> __('Menus Font Size','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_menu_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_navigation_menu_font_weight',array(
        'default' => 700,
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_navigation_menu_font_weight',array(
        'type' => 'select',
        'label' => __('Menus Font Weight','travel-tourism'),
        'section' => 'travel_tourism_menu_section',
        'choices' => array(
        	'100' => __('100','travel-tourism'),
            '200' => __('200','travel-tourism'),
            '300' => __('300','travel-tourism'),
            '400' => __('400','travel-tourism'),
            '500' => __('500','travel-tourism'),
            '600' => __('600','travel-tourism'),
            '700' => __('700','travel-tourism'),
            '800' => __('800','travel-tourism'),
            '900' => __('900','travel-tourism'),
        ),
	) );

	// text trasform
	$wp_customize->add_setting('travel_tourism_menu_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_menu_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Menus Text Transform','travel-tourism'),
		'choices' => array(
            'Uppercase' => __('Uppercase','travel-tourism'),
            'Capitalize' => __('Capitalize','travel-tourism'),
            'Lowercase' => __('Lowercase','travel-tourism'),
        ),
		'section'=> 'travel_tourism_menu_section',
	));

	$wp_customize->add_setting('travel_tourism_menus_item_style',array(
        'default' => '',
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_menus_item_style',array(
        'type' => 'select',
        'section' => 'travel_tourism_menu_section',
		'label' => __('Menus Item Hover Style','travel-tourism'),
		'choices' => array(
            'None' => __('None','travel-tourism'),
            'Zoom In' => __('Zoom In','travel-tourism'),
        ),
	) );

	$wp_customize->add_setting('travel_tourism_header_menus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_header_menus_color', array(
		'label'    => __('Menus Color', 'travel-tourism'),
		'section'  => 'travel_tourism_menu_section',
	)));

	$wp_customize->add_setting('travel_tourism_header_menus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_header_menus_hover_color', array(
		'label'    => __('Menus Hover Color', 'travel-tourism'),
		'section'  => 'travel_tourism_menu_section',
	)));

	$wp_customize->add_setting('travel_tourism_header_submenus_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_header_submenus_color', array(
		'label'    => __('Sub Menus Color', 'travel-tourism'),
		'section'  => 'travel_tourism_menu_section',
	)));

	$wp_customize->add_setting('travel_tourism_header_submenus_hover_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_header_submenus_hover_color', array(
		'label'    => __('Sub Menus Hover Color', 'travel-tourism'),
		'section'  => 'travel_tourism_menu_section',
	)));

	//Social links
	$wp_customize->add_section(
		'travel_tourism_social_links', array(
		'title'		=>	__('Social Links', 'travel-tourism'),
		'priority'	=>	null,
		'panel'		=>	'travel_tourism_panel_id'
	));

	$wp_customize->add_setting('travel_tourism_social_icons',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_social_icons',array(
		'label' =>  __('Steps to setup social icons','travel-tourism'),
		'description' => __('<p>1. Go to Dashboard >> Appearance >> Widgets</p>
			<p>2. Add Vw Social Icon Widget in Social Media.</p>
			<p>3. Add social icons url and save.</p>','travel-tourism'),
		'section'=> 'travel_tourism_social_links',
		'type'=> 'hidden'
	));
	$wp_customize->add_setting('travel_tourism_social_icon_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_social_icon_btn',array(
		'description' => "<a target='_blank' href='". admin_url('widgets.php') ." '>Setup Social Icons</a>",
		'section'=> 'travel_tourism_social_links',
		'type'=> 'hidden'
	));
    
	//Slider
	$wp_customize->add_section( 'travel_tourism_slidersettings' , array(
    	'title'      => __( 'Slider Settings', 'travel-tourism' ),
    	'description' => __('Free theme has 3 slides options, For unlimited slides and more options <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/travel-agency-wordpress-theme/">GO PRO</a>','travel-tourism'),
		'panel' => 'travel_tourism_panel_id'
	) );

	$wp_customize->add_setting( 'travel_tourism_slider_arrows',array(
    	'default' => 0,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));  
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_slider_arrows',array(
      	'label' => esc_html__( 'Show / Hide Slider','travel-tourism' ),
      	'section' => 'travel_tourism_slidersettings'
    )));

    $wp_customize->add_setting('travel_tourism_slider_type',array(
        'default' => 'Default slider',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	) );
	$wp_customize->add_control('travel_tourism_slider_type', array(
        'type' => 'select',
        'label' => __('Slider Type','travel-tourism'),
        'section' => 'travel_tourism_slidersettings',
        'choices' => array(
            'Default slider' => __('Default slider','travel-tourism'),
            'Advance slider' => __('Advance slider','travel-tourism'),
        ),
	));

	$wp_customize->add_setting('travel_tourism_advance_slider_shortcode',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_advance_slider_shortcode',array(
		'label'	=> __('Add Slider Shortcode','travel-tourism'),
		'section'=> 'travel_tourism_slidersettings',
		'type'=> 'text',
		'active_callback' => 'travel_tourism_advance_slider'
	));

    //Selective Refresh
    $wp_customize->selective_refresh->add_partial('travel_tourism_slider_arrows',array(
		'selector'        => '#slider .carousel-caption h1',
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_slider_arrows',
	));

	for ( $count = 1; $count <= 3; $count++ ) {
		$wp_customize->add_setting( 'travel_tourism_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'travel_tourism_sanitize_dropdown_pages'
		) );
		$wp_customize->add_control( 'travel_tourism_slider_page' . $count, array(
			'label'    => __( 'Select Slider Page', 'travel-tourism' ),
			'description' => __('Slider image size (350 x 350)','travel-tourism'),
			'section'  => 'travel_tourism_slidersettings',
			'type'     => 'dropdown-pages',
			'active_callback' => 'travel_tourism_default_slider'
		) );
	}

	$wp_customize->add_setting('travel_tourism_slider_button_text',array(
		'default'=> 'Read More',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_slider_button_text',array(
		'label'	=> __('Add Slider Button Text','travel-tourism'),
		'input_attrs' => array(
            'placeholder' => __( 'Read More', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_slidersettings',
		'type'=> 'text',
		'active_callback' => 'travel_tourism_default_slider'
	));

	//content layout
	$wp_customize->add_setting('travel_tourism_slider_content_option',array(
        'default' => 'Center',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control(new Travel_Tourism_Image_Radio_Control($wp_customize, 'travel_tourism_slider_content_option', array(
        'type' => 'select',
        'label' => __('Slider Content Layouts','travel-tourism'),
        'section' => 'travel_tourism_slidersettings',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/slider-content1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/slider-content2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/slider-content3.png',
    ),
    	'active_callback' => 'travel_tourism_default_slider'
	)));

    //Slider content padding
    $wp_customize->add_setting('travel_tourism_slider_content_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_slider_content_padding_top_bottom',array(
		'label'	=> __('Slider Content Padding Top Bottom','travel-tourism'),
		'description'	=> __('Enter a value in %. Example:20%','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '50%', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_slidersettings',
		'type'=> 'text',
		'active_callback' => 'travel_tourism_default_slider'
	));

	$wp_customize->add_setting('travel_tourism_slider_content_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_slider_content_padding_left_right',array(
		'label'	=> __('Slider Content Padding Left Right','travel-tourism'),
		'description'	=> __('Enter a value in %. Example:20%','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '50%', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_slidersettings',
		'type'=> 'text',
		'active_callback' => 'travel_tourism_default_slider'
	));

    //Slider excerpt
	$wp_customize->add_setting( 'travel_tourism_slider_excerpt_number', array(
		'default'              => 8,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'travel_tourism_slider_excerpt_number', array(
		'label'       => esc_html__( 'Slider Excerpt length','travel-tourism' ),
		'section'     => 'travel_tourism_slidersettings',
		'type'        => 'range',
		'settings'    => 'travel_tourism_slider_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),'active_callback' => 'travel_tourism_default_slider'
	) );

	//Slider height
	$wp_customize->add_setting('travel_tourism_slider_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_slider_height',array(
		'label'	=> __('Slider Height','travel-tourism'),
		'description'	=> __('Specify the slider height (px).','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '500px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_slidersettings',
		'type'=> 'text',
		'active_callback' => 'travel_tourism_default_slider'
	));

	$wp_customize->add_setting( 'travel_tourism_slider_speed', array(
		'default'  => 4000,
		'sanitize_callback'	=> 'travel_tourism_sanitize_float'
	) );
	$wp_customize->add_control( 'travel_tourism_slider_speed', array(
		'label' => esc_html__('Slider Transition Speed','travel-tourism'),
		'section' => 'travel_tourism_slidersettings',
		'type'  => 'number',
		'active_callback' => 'travel_tourism_default_slider'
	) );

	//Opacity
	$wp_customize->add_setting('travel_tourism_slider_opacity_color',array(
      'default'              => 0.4,
      'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));

	$wp_customize->add_control( 'travel_tourism_slider_opacity_color', array(
	'label'       => esc_html__( 'Slider Image Opacity','travel-tourism' ),
	'section'     => 'travel_tourism_slidersettings',
	'type'        => 'select',
	'settings'    => 'travel_tourism_slider_opacity_color',
	'choices' => array(
      '0' =>  esc_attr('0','travel-tourism'),
      '0.1' =>  esc_attr('0.1','travel-tourism'),
      '0.2' =>  esc_attr('0.2','travel-tourism'),
      '0.3' =>  esc_attr('0.3','travel-tourism'),
      '0.4' =>  esc_attr('0.4','travel-tourism'),
      '0.5' =>  esc_attr('0.5','travel-tourism'),
      '0.6' =>  esc_attr('0.6','travel-tourism'),
      '0.7' =>  esc_attr('0.7','travel-tourism'),
      '0.8' =>  esc_attr('0.8','travel-tourism'),
      '0.9' =>  esc_attr('0.9','travel-tourism')
	),'active_callback' => 'travel_tourism_default_slider'
	));

	$wp_customize->add_setting( 'travel_tourism_slider_image_overlay',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'travel_tourism_switch_sanitization'
   ));
   $wp_customize->add_control( new travel_tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_slider_image_overlay',array(
      	'label' => esc_html__( 'Show / Hide Slider Image Overlay','travel-tourism' ),
      	'section' => 'travel_tourism_slidersettings',
      	'active_callback' => 'travel_tourism_default_slider'
   )));

   $wp_customize->add_setting('travel_tourism_slider_image_overlay_color', array(
		'default'           => '#151414',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_slider_image_overlay_color', array(
		'label'    => __('Slider Image Overlay Color', 'travel-tourism'),
		'section'  => 'travel_tourism_slidersettings',
		'active_callback' => 'travel_tourism_default_slider'
	)));

	//About Us Section
	$wp_customize->add_section('travel_tourism_about', array(
		'title'       => __('About Us Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_about_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_about_text',array(
		'description' => __('<p>1. More options for about us section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for about us section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_about',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_about_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_about_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_about',
		'type'=> 'hidden'
	));

	//Search Tour Section
	$wp_customize->add_section('travel_tourism_search_tour', array(
		'title'       => __('Search Tour Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_search_tour_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_search_tour_text',array(
		'description' => __('<p>1. More options for search tour section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for search tour section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_search_tour',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_search_tour_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_search_tour_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_search_tour',
		'type'=> 'hidden'
	));

	//Destination Section
	$wp_customize->add_section('travel_tourism_destination', array(
		'title'       => __('Destination Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_destination_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_destination_text',array(
		'description' => __('<p>1. More options for destination section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for destination section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_destination',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_destination_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_destination_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_destination',
		'type'=> 'hidden'
	));

	//Explore Section
	$wp_customize->add_section('travel_tourism_explore', array(
		'title'       => __('Explore Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_explore_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_explore_text',array(
		'description' => __('<p>1. More options for explore section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for explore section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_explore',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_explore_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_explore_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_explore',
		'type'=> 'hidden'
	));

	//Insurance Section
	$wp_customize->add_section('travel_tourism_insurance', array(
		'title'       => __('Insurance Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_insurance_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_insurance_text',array(
		'description' => __('<p>1. More options for insurance section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for insurance section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_insurance',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_insurance_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_insurance_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_insurance',
		'type'=> 'hidden'
	));
 
	//Popular destination
	$wp_customize->add_section('travel_tourism_services',array(
		'title'	=> __('Popular Destination Section','travel-tourism'),
		'description' => __('For more options of the popular destination  section <br/><a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/travel-agency-wordpress-theme/">GO PRO</a>','travel-tourism'),
		'panel' => 'travel_tourism_panel_id',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'travel_tourism_section_title', array( 
		'selector' => '.heading-text h2', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_section_title',
	));

	$wp_customize->add_setting('travel_tourism_section_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('travel_tourism_section_text',array(
		'label'	=> __('Section Text','travel-tourism'),
		'input_attrs' => array(
            'placeholder' => __( 'Check out our  popular destination', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_services',
		'type'=> 'text'
	));	

	$wp_customize->add_setting('travel_tourism_section_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('travel_tourism_section_title',array(
		'label'	=> __('Section Title','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Choose Tour', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_services',
		'type'=> 'text'
	));	

	$categories = get_categories();
		$cat_posts = array();
			$i = 0;
			$cat_posts[]='Select';	
		foreach($categories as $category){
			if($i==0){
			$default = $category->slug;
			$i++;
		}
		$cat_posts[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('travel_tourism_services_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'travel_tourism_sanitize_choices',
	));
	$wp_customize->add_control('travel_tourism_services_category',array(
		'type'    => 'select',
		'choices' => $cat_posts,
		'label' => __('Select Category to display Popular Destination Section','travel-tourism'),		
		'section' => 'travel_tourism_services',
	));

	//Promotion Section
	$wp_customize->add_section('travel_tourism_promotion', array(
		'title'       => __('promotion Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_promotion_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_promotion_text',array(
		'description' => __('<p>1. More options for promotion section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for promotion section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_promotion',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_promotion_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_promotion_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_promotion',
		'type'=> 'hidden'
	));

	//Products Section
	$wp_customize->add_section('travel_tourism_products', array(
		'title'       => __('Products Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_products_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_products_text',array(
		'description' => __('<p>1. More options for products section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for products section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_products',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_products_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_products_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_products',
		'type'=> 'hidden'
	));

	//Newsletter Section
	$wp_customize->add_section('travel_tourism_newsletter', array(
		'title'       => __('Newsletter Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_newsletter_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_newsletter_text',array(
		'description' => __('<p>1. More options for newsletter section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for newsletter section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_newsletter',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_newsletter_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_newsletter_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_newsletter',
		'type'=> 'hidden'
	));

	//Partners Section
	$wp_customize->add_section('travel_tourism_partners', array(
		'title'       => __('Partners Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_partners_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_partners_text',array(
		'description' => __('<p>1. More options for partners section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for partners section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_partners',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_partners_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_partners_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_partners',
		'type'=> 'hidden'
	));

	//Testimonials Section
	$wp_customize->add_section('travel_tourism_testimonials', array(
		'title'       => __('Testimonials Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_testimonials_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_testimonials_text',array(
		'description' => __('<p>1. More options for testimonials section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for testimonials section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_testimonials',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_testimonials_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_testimonials_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_testimonials',
		'type'=> 'hidden'
	));

	//Blogs Section
	$wp_customize->add_section('travel_tourism_blogs', array(
		'title'       => __('Blogs Section', 'travel-tourism'),
		'description' => __('<p class="premium-opt">Premium Theme Features</p>','travel-tourism'),
		'priority'    => null,
		'panel'       => 'travel_tourism_panel_id',
	));

	$wp_customize->add_setting('travel_tourism_blogs_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_blogs_text',array(
		'description' => __('<p>1. More options for blogs section.</p>
			<p>2. Unlimited images options.</p>
			<p>3. Color options for blogs section.</p>','travel-tourism'),
		'section'=> 'travel_tourism_blogs',
		'type'=> 'hidden'
	));

	$wp_customize->add_setting('travel_tourism_blogs_btn',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_blogs_btn',array(
		'description' => "<a class='go-pro' target='_blank' href='". admin_url('themes.php?page=travel_tourism_guide') ." '>More Info</a>",
		'section'=> 'travel_tourism_blogs',
		'type'=> 'hidden'
	));

	//Footer Text
	$wp_customize->add_section('travel_tourism_footer',array(
		'title'	=> __('Footer Settings','travel-tourism'),
		'description' => __('For more options of the footer section <a class="go-pro-btn" target="blank" href="https://www.vwthemes.com/themes/travel-agency-wordpress-theme/">GO PRO</a>','travel-tourism'),
		'panel' => 'travel_tourism_panel_id',
	));	

	$wp_customize->add_setting( 'travel_tourism_footer_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));
    $wp_customize->add_control( new travel_tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_footer_hide_show',array(
      'label' => esc_html__( 'Show / Hide Footer','travel-tourism' ),
      'section' => 'travel_tourism_footer'
    )));

	$wp_customize->add_setting('travel_tourism_footer_background_color', array(
		'default'           => '#222222',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_footer_background_color', array(
		'label'    => __('Footer Background Color', 'travel-tourism'),
		'section'  => 'travel_tourism_footer',
	)));

	$wp_customize->add_setting('travel_tourism_footer_background_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'travel_tourism_footer_background_image',array(
        'label' => __('Footer Background Image','travel-tourism'),
        'section' => 'travel_tourism_footer'
	)));

	$wp_customize->add_setting('travel_tourism_footer_img_position',array(
	  'default' => 'center center',
	  'transport' => 'refresh',
	  'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_footer_img_position',array(
		'type' => 'select',
		'label' => __('Footer Image Position','travel-tourism'),
		'section' => 'travel_tourism_footer',
		'choices' 	=> array(
			'left top' 		=> esc_html__( 'Top Left', 'travel-tourism' ),
			'center top'   => esc_html__( 'Top', 'travel-tourism' ),
			'right top'   => esc_html__( 'Top Right', 'travel-tourism' ),
			'left center'   => esc_html__( 'Left', 'travel-tourism' ),
			'center center'   => esc_html__( 'Center', 'travel-tourism' ),
			'right center'   => esc_html__( 'Right', 'travel-tourism' ),
			'left bottom'   => esc_html__( 'Bottom Left', 'travel-tourism' ),
			'center bottom'   => esc_html__( 'Bottom', 'travel-tourism' ),
			'right bottom'   => esc_html__( 'Bottom Right', 'travel-tourism' ),
		),
	)); 

	// Footer
	$wp_customize->add_setting('travel_tourism_img_footer',array(
		'default'=> 'scroll',
		'sanitize_callback'	=> 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_img_footer',array(
		'type' => 'select',
		'label'	=> __('Footer Background Attatchment','travel-tourism'),
		'choices' => array(
            'fixed' => __('fixed','travel-tourism'),
            'scroll' => __('scroll','travel-tourism'),
        ),
		'section'=> 'travel_tourism_footer',
	));

	$wp_customize->add_setting('travel_tourism_footer_widgets_heading',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_footer_widgets_heading',array(
        'type' => 'select',
        'label' => __('Footer Widget Heading','travel-tourism'),
        'section' => 'travel_tourism_footer',
        'choices' => array(
        	'Left' => __('Left','travel-tourism'),
            'Center' => __('Center','travel-tourism'),
            'Right' => __('Right','travel-tourism')
        ),
	) );

	$wp_customize->add_setting('travel_tourism_footer_widgets_content',array(
        'default' => 'Left',
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_footer_widgets_content',array(
        'type' => 'select',
        'label' => __('Footer Widget Content','travel-tourism'),
        'section' => 'travel_tourism_footer',
        'choices' => array(
        	'Left' => __('Left','travel-tourism'),
            'Center' => __('Center','travel-tourism'),
            'Right' => __('Right','travel-tourism')
        ),
	) );

	// footer padding
	$wp_customize->add_setting('travel_tourism_footer_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_footer_padding',array(
		'label'	=> __('Footer Top Bottom Padding','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'travel-tourism' ),
    ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

    // footer social icon
  	$wp_customize->add_setting( 'travel_tourism_footer_icon',array(
		'default' => false,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_footer_icon',array(
		'label' => esc_html__( 'Show / Hide Footer Social Icon','travel-tourism' ),
		'section' => 'travel_tourism_footer'
    )));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('travel_tourism_footer_text', array( 
		'selector' => '.copyright p', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_footer_text', 
	));

	$wp_customize->add_setting( 'travel_tourism_copyright_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));
    $wp_customize->add_control( new travel_tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_copyright_hide_show',array(
		'label' => esc_html__( 'Show / Hide Copyright','travel-tourism' ),
		'section' => 'travel_tourism_footer'
    )));

	$wp_customize->add_setting('travel_tourism_copyright_background_color', array(
		'default'           => '#ffcc05',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_copyright_background_color', array(
		'label'    => __('Copyright Background Color', 'travel-tourism'),
		'section'  => 'travel_tourism_footer',
	)));
	
	$wp_customize->add_setting('travel_tourism_footer_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control('travel_tourism_footer_text',array(
		'label'	=> __('Copyright Text','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Copyright 2019, .....', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_copyright_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_copyright_font_size',array(
		'label'	=> __('Copyright Font Size','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_copyright_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_copyright_padding_top_bottom',array(
		'label'	=> __('Copyright Padding Top Bottom','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_copyright_alignment',array(
        'default' => 'center',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control(new Travel_Tourism_Image_Radio_Control($wp_customize, 'travel_tourism_copyright_alignment', array(
        'type' => 'select',
        'label' => __('Copyright Alignment','travel-tourism'),
        'section' => 'travel_tourism_footer',
        'settings' => 'travel_tourism_copyright_alignment',
        'choices' => array(
            'left' => esc_url(get_template_directory_uri()).'/assets/images/copyright1.png',
            'center' => esc_url(get_template_directory_uri()).'/assets/images/copyright2.png',
            'right' => esc_url(get_template_directory_uri()).'/assets/images/copyright3.png'
    ))));

	$wp_customize->add_setting( 'travel_tourism_footer_scroll',array(
    	'default' => 1,
      	'transport' => 'refresh',
      	'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));  
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_footer_scroll',array(
      	'label' => esc_html__( 'Show / Hide Scroll to Top','travel-tourism' ),
      	'section' => 'travel_tourism_footer'
    )));

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial('travel_tourism_scroll_to_top_icon', array( 
		'selector' => '.scrollup i', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_scroll_to_top_icon', 
	));

    $wp_customize->add_setting('travel_tourism_scroll_to_top_icon',array(
		'default'	=> 'fas fa-long-arrow-alt-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Travel_Tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_scroll_to_top_icon',array(
		'label'	=> __('Add Scroll to Top Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_footer',
		'setting'	=> 'travel_tourism_scroll_to_top_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('travel_tourism_scroll_to_top_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_scroll_to_top_font_size',array(
		'label'	=> __('Icon Font Size','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_scroll_to_top_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_scroll_to_top_padding',array(
		'label'	=> __('Icon Top Bottom Padding','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_scroll_to_top_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_scroll_to_top_width',array(
		'label'	=> __('Icon Width','travel-tourism'),
		'description'	=> __('Enter a value in pixels Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_scroll_to_top_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_scroll_to_top_height',array(
		'label'	=> __('Icon Height','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_footer',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'travel_tourism_scroll_to_top_border_radius', array(
		'default'              => 50,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'travel_tourism_scroll_to_top_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_footer',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

    $wp_customize->add_setting('travel_tourism_scroll_top_alignment',array(
        'default' => 'Right',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control(new Travel_Tourism_Image_Radio_Control($wp_customize, 'travel_tourism_scroll_top_alignment', array(
        'type' => 'select',
        'label' => __('Scroll To Top','travel-tourism'),
        'section' => 'travel_tourism_footer',
        'settings' => 'travel_tourism_scroll_top_alignment',
        'choices' => array(
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/layout2.png',
            'Right' => esc_url(get_template_directory_uri()).'/assets/images/layout3.png'
    ))));

	//Blog Post
	$wp_customize->add_panel( $travel_tourism_parent_panel );

	$BlogPostParentPanel = new Travel_Tourism_WP_Customize_Panel( $wp_customize, 'blog_post_parent_panel', array(
		'title' => __( 'Blog Post Settings', 'travel-tourism' ),
		'panel' => 'travel_tourism_panel_id',
		'priority' => 11,
	));

	$wp_customize->add_panel( $BlogPostParentPanel );

	// Add example section and controls to the middle (second) panel
	$wp_customize->add_section( 'travel_tourism_post_settings', array(
		'title' => __( 'Post Settings', 'travel-tourism' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Blog layout
    $wp_customize->add_setting('travel_tourism_blog_layout_option',array(
        'default' => 'Default',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
    ));
    $wp_customize->add_control(new Travel_Tourism_Image_Radio_Control($wp_customize, 'travel_tourism_blog_layout_option', array(
        'type' => 'select',
        'label' => __('Blog Layouts','travel-tourism'),
        'section' => 'travel_tourism_post_settings',
        'choices' => array(
            'Default' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout1.png',
            'Center' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout2.png',
            'Left' => esc_url(get_template_directory_uri()).'/assets/images/blog-layout3.png',
    ))));

	$wp_customize->add_setting('travel_tourism_theme_options',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_theme_options',array(
        'type' => 'select',
        'label' => __('Post Sidebar Layout','travel-tourism'),
        'description' => __('Here you can change the sidebar layout for posts. ','travel-tourism'),
        'section' => 'travel_tourism_post_settings',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','travel-tourism'),
            'Right Sidebar' => __('Right Sidebar','travel-tourism'),
            'One Column' => __('One Column','travel-tourism'),
            'Three Columns' => __('Three Columns','travel-tourism'),
            'Four Columns' => __('Four Columns','travel-tourism'),
            'Grid Layout' => __('Grid Layout','travel-tourism')
        ),
	) );

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('travel_tourism_toggle_postdate', array( 
		'selector' => '.post-main-box h2 a', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_toggle_postdate', 
	));

    $wp_customize->add_setting('travel_tourism_toggle_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Travel_Tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_toggle_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_post_settings',
		'setting'	=> 'travel_tourism_toggle_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'travel_tourism_toggle_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_toggle_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','travel-tourism' ),
        'section' => 'travel_tourism_post_settings'
    )));

    $wp_customize->add_setting('travel_tourism_toggle_author_icon',array(
		'default'	=> 'far fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Travel_Tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_toggle_author_icon',array(
		'label'	=> __('Add Author Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_post_settings',
		'setting'	=> 'travel_tourism_toggle_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'travel_tourism_toggle_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_toggle_author',array(
		'label' => esc_html__( 'Show / Hide Author','travel-tourism' ),
		'section' => 'travel_tourism_post_settings'
    )));

    $wp_customize->add_setting('travel_tourism_toggle_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Travel_Tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_toggle_comments_icon',array(
		'label'	=> __('Add Comments Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_post_settings',
		'setting'	=> 'travel_tourism_toggle_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'travel_tourism_toggle_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_toggle_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','travel-tourism' ),
		'section' => 'travel_tourism_post_settings'
    )));

    $wp_customize->add_setting('travel_tourism_toggle_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Travel_Tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_toggle_time_icon',array(
		'label'	=> __('Add Time Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_post_settings',
		'setting'	=> 'travel_tourism_toggle_time_icon',
		'type'		=> 'icon'
	)));

     $wp_customize->add_setting( 'travel_tourism_toggle_time',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_toggle_time',array(
		'label' => esc_html__( 'Show / Hide Time','travel-tourism' ),
		'section' => 'travel_tourism_post_settings'
    )));

    $wp_customize->add_setting( 'travel_tourism_featured_image_hide_show',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
	));
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_featured_image_hide_show', array(
		'label' => esc_html__( 'Show / Hide Featured Image','travel-tourism' ),
		'section' => 'travel_tourism_post_settings'
    )));

    //Featured Image
	$wp_customize->add_setting( 'travel_tourism_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_featured_image_border_radius', array(
		'label'       => esc_html__( 'Featured Image Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'travel_tourism_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Featured Image Box Shadow','travel-tourism' ),
		'section'     => 'travel_tourism_post_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );


	//Featured Image
	$wp_customize->add_setting('travel_tourism_blog_post_featured_image_dimension',array(
       'default' => 'default',
       'sanitize_callback'	=> 'travel_tourism_sanitize_choices'
	));
  	$wp_customize->add_control('travel_tourism_blog_post_featured_image_dimension',array(
		'type' => 'select',
		'label'	=> __('Blog Post Featured Image Dimension','travel-tourism'),
		'section'	=> 'travel_tourism_post_settings',
		'choices' => array(
		'default' => __('Default','travel-tourism'),
		'custom' => __('Custom Image Size','travel-tourism'),
      ),
  	));

	$wp_customize->add_setting('travel_tourism_blog_post_featured_image_custom_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
		));
	$wp_customize->add_control('travel_tourism_blog_post_featured_image_custom_width',array(
		'label'	=> __('Featured Image Custom Width','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'travel-tourism' ),),
		'section'=> 'travel_tourism_post_settings',
		'type'=> 'text',
		'active_callback' => 'travel_tourism_blog_post_featured_image_dimension'
		));

	$wp_customize->add_setting('travel_tourism_blog_post_featured_image_custom_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_blog_post_featured_image_custom_height',array(
		'label'	=> __('Featured Image Custom Height','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
    	'placeholder' => __( '10px', 'travel-tourism' ),),
		'section'=> 'travel_tourism_post_settings',
		'type'=> 'text',
		'active_callback' => 'travel_tourism_blog_post_featured_image_dimension'
	));

    $wp_customize->add_setting( 'travel_tourism_excerpt_number', array(
		'default'              => 30,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'travel_tourism_excerpt_number', array(
		'label'       => esc_html__( 'Excerpt length','travel-tourism' ),
		'section'     => 'travel_tourism_post_settings',
		'type'        => 'range',
		'settings'    => 'travel_tourism_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('travel_tourism_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','travel-tourism'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','travel-tourism'),
		'section'=> 'travel_tourism_post_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('travel_tourism_blog_page_posts_settings',array(
        'default' => 'Into Blocks',
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_blog_page_posts_settings',array(
        'type' => 'select',
        'label' => __('Display Blog Posts','travel-tourism'),
        'section' => 'travel_tourism_post_settings',
        'choices' => array(
        	'Into Blocks' => __('Into Blocks','travel-tourism'),
            'Without Blocks' => __('Without Blocks','travel-tourism')
        ),
	) );

    $wp_customize->add_setting('travel_tourism_excerpt_settings',array(
        'default' => 'Excerpt',
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_excerpt_settings',array(
        'type' => 'select',
        'label' => __('Post Content','travel-tourism'),
        'section' => 'travel_tourism_post_settings',
        'choices' => array(
        	'Content' => __('Content','travel-tourism'),
            'Excerpt' => __('Excerpt','travel-tourism'),
            'No Content' => __('No Content','travel-tourism')
        ),
	) );

	$wp_customize->add_setting('travel_tourism_excerpt_suffix',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_excerpt_suffix',array(
		'label'	=> __('Add Excerpt Suffix','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '[...]', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_post_settings',
		'type'=> 'text'
	));

    // Button Settings
	$wp_customize->add_section( 'travel_tourism_button_settings', array(
		'title' => __( 'Button Settings', 'travel-tourism' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('travel_tourism_button_text', array( 
		'selector' => '.post-main-box .more-btn a', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_button_text', 
	));

    $wp_customize->add_setting('travel_tourism_button_text',array(
		'default'=> esc_html__( 'Read More', 'travel-tourism' ),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_button_text',array(
		'label'	=> __('Add Button Text','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Read More', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_button_settings',
		'type'=> 'text'
	));

	// font size button
	$wp_customize->add_setting('travel_tourism_button_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_button_font_size',array(
		'label'	=> __('Button Font Size','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'travel-tourism' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'travel_tourism_button_settings',
	));

	$wp_customize->add_setting( 'travel_tourism_button_border_radius', array(
		'default'              => 50,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'travel_tourism_button_border_radius', array(
		'label'       => esc_html__( 'Button Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_button_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('travel_tourism_button_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_button_padding_top_bottom',array(
		'label'	=> __('Padding Top Bottom','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_button_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_button_padding_left_right',array(
		'label'	=> __('Padding Left Right','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_button_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_button_letter_spacing',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_button_letter_spacing',array(
		'label'	=> __('Button Letter Spacing','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
      	'placeholder' => __( '10px', 'travel-tourism' ),
    ),
    	'type'        => 'text',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
		'section'=> 'travel_tourism_button_settings',
	));

	// text trasform
	$wp_customize->add_setting('travel_tourism_button_text_transform',array(
		'default'=> 'Uppercase',
		'sanitize_callback'	=> 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_button_text_transform',array(
		'type' => 'radio',
		'label'	=> __('Button Text Transform','travel-tourism'),
		'choices' => array(
            'Uppercase' => __('Uppercase','travel-tourism'),
            'Capitalize' => __('Capitalize','travel-tourism'),
            'Lowercase' => __('Lowercase','travel-tourism'),
        ),
		'section'=> 'travel_tourism_button_settings',
	));

	// Related Post Settings
	$wp_customize->add_section( 'travel_tourism_related_posts_settings', array(
		'title' => __( 'Related Posts Settings', 'travel-tourism' ),
		'panel' => 'blog_post_parent_panel',
	));

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial('travel_tourism_related_post_title', array( 
		'selector' => '.related-post h3', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_related_post_title', 
	));

    $wp_customize->add_setting( 'travel_tourism_related_post',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_related_post',array(
		'label' => esc_html__( 'Show / Hide Related Post','travel-tourism' ),
		'section' => 'travel_tourism_related_posts_settings'
    )));

    $wp_customize->add_setting('travel_tourism_related_post_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_related_post_title',array(
		'label'	=> __('Add Related Post Title','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Related Post', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_related_posts_settings',
		'type'=> 'text'
	));

   	$wp_customize->add_setting('travel_tourism_related_posts_count',array(
		'default'=> '3',
		'sanitize_callback'	=> 'travel_tourism_sanitize_float'
	));
	$wp_customize->add_control('travel_tourism_related_posts_count',array(
		'label'	=> __('Add Related Post Count','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '3', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_related_posts_settings',
		'type'=> 'number'
	));

	$wp_customize->add_setting( 'travel_tourism_related_posts_excerpt_number', array(
		'default'              => 20,
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_related_posts_excerpt_number', array(
		'label'       => esc_html__( 'Related Posts Excerpt length','travel-tourism' ),
		'section'     => 'travel_tourism_related_posts_settings',
		'type'        => 'range',
		'settings'    => 'travel_tourism_related_posts_excerpt_number',
		'input_attrs' => array(
			'step'             => 5,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	// Single Posts Settings
	$wp_customize->add_section( 'travel_tourism_single_blog_settings', array(
		'title' => __( 'Single Post Settings', 'travel-tourism' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('travel_tourism_single_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_single_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_single_blog_settings',
		'setting'	=> 'travel_tourism_single_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'travel_tourism_single_postdate',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'travel_tourism_switch_sanitization'
	) );
	$wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_postdate',array(
	    'label' => esc_html__( 'Show / Hide Date','travel-tourism' ),
	   'section' => 'travel_tourism_single_blog_settings'
	)));

	$wp_customize->add_setting('travel_tourism_single_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_single_author_icon',array(
		'label'	=> __('Add Author Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_single_blog_settings',
		'setting'	=> 'travel_tourism_single_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'travel_tourism_single_author',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'travel_tourism_switch_sanitization'
	) );
	$wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_author',array(
	    'label' => esc_html__( 'Show / Hide Author','travel-tourism' ),
	    'section' => 'travel_tourism_single_blog_settings'
	)));

   	$wp_customize->add_setting('travel_tourism_single_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_single_comments_icon',array(
		'label'	=> __('Add Comments Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_single_blog_settings',
		'setting'	=> 'travel_tourism_single_comments_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'travel_tourism_single_comments',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'travel_tourism_switch_sanitization'
	) );
	$wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_comments',array(
	    'label' => esc_html__( 'Show / Hide Comments','travel-tourism' ),
	    'section' => 'travel_tourism_single_blog_settings'
	)));

  	$wp_customize->add_setting('travel_tourism_single_time_icon',array(
		'default'	=> 'fas fa-clock',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_single_time_icon',array(
		'label'	=> __('Add Time Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_single_blog_settings',
		'setting'	=> 'travel_tourism_single_time_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'travel_tourism_single_time',array(
	    'default' => 1,
	    'transport' => 'refresh',
	    'sanitize_callback' => 'travel_tourism_switch_sanitization'
	) );

	$wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_time',array(
	    'label' => esc_html__( 'Show / Hide Time','travel-tourism' ),
	    'section' => 'travel_tourism_single_blog_settings'
	)));

	$wp_customize->add_setting( 'travel_tourism_single_post_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_post_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Breadcrumb','travel-tourism' ),
		'section' => 'travel_tourism_single_blog_settings'
    )));

    // Single Posts Category
  	$wp_customize->add_setting( 'travel_tourism_single_post_category',array(
		'default' => true,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
  	$wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_post_category',array(
		'label' => esc_html__( 'Show / Hide Category','travel-tourism' ),
		'section' => 'travel_tourism_single_blog_settings'
    )));

   	$wp_customize->add_setting( 'travel_tourism_toggle_tags',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
	));
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_toggle_tags', array(
		'label' => esc_html__( 'Show / Hide Tags','travel-tourism' ),
		'section' => 'travel_tourism_single_blog_settings'
    )));

   	$wp_customize->add_setting( 'travel_tourism_single_blog_post_navigation_show_hide',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
	));
	$wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_blog_post_navigation_show_hide', array(		  'label' => esc_html__( 'Show / Hide Post Navigation','travel-tourism' ),
		  'section' => 'travel_tourism_single_blog_settings'
	)));

	$wp_customize->add_setting('travel_tourism_single_post_meta_field_separator',array(
		'default'=> '|',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_single_post_meta_field_separator',array(
		'label'	=> __('Add Meta Separator','travel-tourism'),
		'description' => __('Add the seperator for meta box. Example: "|", "/", etc.','travel-tourism'),
		'section'=> 'travel_tourism_single_blog_settings',
		'type'=> 'text'
	));

    $wp_customize->add_setting('travel_tourism_single_blog_comment_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_tourism_single_blog_comment_title',array(
		'label'	=> __('Add Comment Title','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Leave a Reply', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_single_blog_comment_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_tourism_single_blog_comment_button_text',array(
		'label'	=> __('Add Comment Button Text','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Post Comment', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_single_blog_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_single_blog_comment_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_single_blog_comment_width',array(
		'label'	=> __('Comment Form Width','travel-tourism'),
		'description'	=> __('Enter a value in %. Example:50%','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '100%', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_single_blog_settings',
		'type'=> 'text'
	));

	// Grid layout setting
	$wp_customize->add_section( 'travel_tourism_grid_layout_settings', array(
		'title' => __( 'Grid Layout Settings', 'travel-tourism' ),
		'panel' => 'blog_post_parent_panel',
	));

  	$wp_customize->add_setting('travel_tourism_grid_postdate_icon',array(
		'default'	=> 'fas fa-calendar-alt',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_grid_postdate_icon',array(
		'label'	=> __('Add Post Date Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_grid_layout_settings',
		'setting'	=> 'travel_tourism_grid_postdate_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'travel_tourism_grid_postdate',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_grid_postdate',array(
        'label' => esc_html__( 'Show / Hide Post Date','travel-tourism' ),
        'section' => 'travel_tourism_grid_layout_settings'
    )));

	$wp_customize->add_setting('travel_tourism_grid_author_icon',array(
		'default'	=> 'fas fa-user',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_grid_author_icon',array(
		'label'	=> __('Add Author Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_grid_layout_settings',
		'setting'	=> 'travel_tourism_grid_author_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'travel_tourism_grid_author',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_grid_author',array(
		'label' => esc_html__( 'Show / Hide Author','travel-tourism' ),
		'section' => 'travel_tourism_grid_layout_settings'
    )));

   	$wp_customize->add_setting('travel_tourism_grid_comments_icon',array(
		'default'	=> 'fa fa-comments',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new travel_tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_grid_comments_icon',array(
		'label'	=> __('Add Comments Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_grid_layout_settings',
		'setting'	=> 'travel_tourism_grid_comments_icon',
		'type'		=> 'icon'
	)));

    $wp_customize->add_setting( 'travel_tourism_grid_comments',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_grid_comments',array(
		'label' => esc_html__( 'Show / Hide Comments','travel-tourism' ),
		'section' => 'travel_tourism_grid_layout_settings'
    )));

	//Other Settings
	$wp_customize->add_panel( $travel_tourism_parent_panel );

	$OtherParentPanel = new Travel_Tourism_WP_Customize_Panel( $wp_customize, 'other_parent_panel', array(
		'title' => __( 'Other Settings', 'travel-tourism' ),
		'panel' => 'travel_tourism_panel_id',
		'priority' => 11,
	));

	$wp_customize->add_panel( $OtherParentPanel );

	// Layout
	$wp_customize->add_section( 'travel_tourism_left_right', array(
    	'title'      => esc_html__( 'General Settings', 'travel-tourism' ),
		'panel' => 'other_parent_panel'
	) );

	$wp_customize->add_setting('travel_tourism_width_option',array(
        'default' => 'Full Width',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control(new Travel_Tourism_Image_Radio_Control($wp_customize, 'travel_tourism_width_option', array(
        'type' => 'select',
        'label' => __('Width Layouts','travel-tourism'),
        'description' => __('Here you can change the width layout of Website.','travel-tourism'),
        'section' => 'travel_tourism_left_right',
        'choices' => array(
            'Full Width' => esc_url(get_template_directory_uri()).'/assets/images/full-width.png',
            'Wide Width' => esc_url(get_template_directory_uri()).'/assets/images/wide-width.png',
            'Boxed' => esc_url(get_template_directory_uri()).'/assets/images/boxed-width.png',
    ))));

	$wp_customize->add_setting('travel_tourism_page_layout',array(
        'default' => 'One Column',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_page_layout',array(
        'type' => 'select',
        'label' => __('Page Sidebar Layout','travel-tourism'),
        'description' => __('Here you can change the sidebar layout for pages. ','travel-tourism'),
        'section' => 'travel_tourism_left_right',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','travel-tourism'),
            'Right Sidebar' => __('Right Sidebar','travel-tourism'),
            'One Column' => __('One Column','travel-tourism')
        ),
	) );

	$wp_customize->add_setting( 'travel_tourism_single_page_breadcrumb',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_single_page_breadcrumb',array(
		'label' => esc_html__( 'Show / Hide Page Breadcrumb','travel-tourism' ),
		'section' => 'travel_tourism_left_right'
    )));

	//Wow Animation
	$wp_customize->add_setting( 'travel_tourism_animation',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_animation',array(
        'label' => esc_html__( 'Show / Hide Animations','travel-tourism' ),
        'description' => __('Here you can disable overall site animation effect','travel-tourism'),
        'section' => 'travel_tourism_left_right'
    )));

    $wp_customize->add_setting('travel_tourism_reset_all_settings',array(
      	'sanitize_callback'	=> 'sanitize_text_field',
   	));
   	$wp_customize->add_control(new Travel_Tourism_Reset_Custom_Control($wp_customize, 'travel_tourism_reset_all_settings',array(
		'type' => 'reset_control',
		'label' => __('Reset All Settings', 'travel-tourism'),
		'description' => 'travel_tourism_reset_all_settings',
		'section' => 'travel_tourism_left_right'
   	)));

    //Pre-Loader
	$wp_customize->add_setting( 'travel_tourism_loader_enable',array(
        'default' => 0,
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_loader_enable',array(
        'label' => esc_html__( 'Show / Hide Pre-Loader','travel-tourism' ),
        'section' => 'travel_tourism_left_right'
    )));

	$wp_customize->add_setting('travel_tourism_preloader_bg_color', array(
		'default'           => '#ffcc05',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_preloader_bg_color', array(
		'label'    => __('Pre-Loader Background Color', 'travel-tourism'),
		'section'  => 'travel_tourism_left_right',
	)));

	$wp_customize->add_setting('travel_tourism_preloader_border_color', array(
		'default'           => '#ffffff',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_preloader_border_color', array(
		'label'    => __('Pre-Loader Border Color', 'travel-tourism'),
		'section'  => 'travel_tourism_left_right',
	)));

	$wp_customize->add_setting('travel_tourism_preloader_bg_img',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'travel_tourism_preloader_bg_img',array(
        'label' => __('Preloader Background Image','travel-tourism'),
        'section' => 'travel_tourism_left_right'
	)));

    //404 Page Setting
	$wp_customize->add_section('travel_tourism_404_page',array(
		'title'	=> __('404 Page Settings','travel-tourism'),
		'panel' => 'other_parent_panel',
	));	

	$wp_customize->add_setting('travel_tourism_404_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_tourism_404_page_title',array(
		'label'	=> __('Add Title','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '404 Not Found', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_404_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_tourism_404_page_content',array(
		'label'	=> __('Add Text','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Looks like you have taken a wrong turn, Dont worry, it happens to the best of us.', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_404_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_404_page_button_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_404_page_button_text',array(
		'label'	=> __('Add Button Text','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'GO BACK', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_404_page',
		'type'=> 'text'
	));

	//No Result Page Setting
	$wp_customize->add_section('travel_tourism_no_results_page',array(
		'title'	=> __('No Results Page Settings','travel-tourism'),
		'panel' => 'other_parent_panel',
	));	

	$wp_customize->add_setting('travel_tourism_no_results_page_title',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_tourism_no_results_page_title',array(
		'label'	=> __('Add Title','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Nothing Found', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_no_results_page',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_no_results_page_content',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));

	$wp_customize->add_control('travel_tourism_no_results_page_content',array(
		'label'	=> __('Add Text','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( 'Sorry, but nothing matched your search terms. Please try again with some different keywords.', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_no_results_page',
		'type'=> 'text'
	));

	//Social Icon Setting
	$wp_customize->add_section('travel_tourism_social_icon_settings',array(
		'title'	=> __('Social Icons Settings','travel-tourism'),
		'panel' => 'other_parent_panel',
	));	

	$wp_customize->add_setting('travel_tourism_social_icon_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_social_icon_font_size',array(
		'label'	=> __('Icon Font Size','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_social_icon_padding',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_social_icon_padding',array(
		'label'	=> __('Icon Padding','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_social_icon_width',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_social_icon_width',array(
		'label'	=> __('Icon Width','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_social_icon_height',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_social_icon_height',array(
		'label'	=> __('Icon Height','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_social_icon_settings',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'travel_tourism_social_icon_border_radius', array(
		'default'              => '',
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'travel_tourism_social_icon_border_radius', array(
		'label'       => esc_html__( 'Icon Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_social_icon_settings',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Responsive Media Settings
	$wp_customize->add_section('travel_tourism_responsive_media',array(
		'title'	=> __('Responsive Media','travel-tourism'),
		'panel' => 'other_parent_panel',
	));

    $wp_customize->add_setting( 'travel_tourism_resp_slider_hide_show',array(
      'default' => 0,
      'transport' => 'refresh',
      'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));  
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_resp_slider_hide_show',array(
      'label' => esc_html__( 'Show / Hide Slider','travel-tourism' ),
      'section' => 'travel_tourism_responsive_media'
    )));

    $wp_customize->add_setting( 'travel_tourism_sidebar_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));  
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_sidebar_hide_show',array(
      'label' => esc_html__( 'Show / Hide Sidebar','travel-tourism' ),
      'section' => 'travel_tourism_responsive_media'
    )));

    $wp_customize->add_setting( 'travel_tourism_resp_scroll_top_hide_show',array(
      'default' => 1,
      'transport' => 'refresh',
      'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ));  
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_resp_scroll_top_hide_show',array(
      'label' => esc_html__( 'Show / Hide Scroll To Top','travel-tourism' ),
      'section' => 'travel_tourism_responsive_media'
    )));

    $wp_customize->add_setting('travel_tourism_resp_menu_toggle_btn_bg_color', array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_hex_color',
	));
	$wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'travel_tourism_resp_menu_toggle_btn_bg_color', array(
		'label'    => __('Toggle Button Bg Color', 'travel-tourism'),
		'section'  => 'travel_tourism_responsive_media',
	)));

    $wp_customize->add_setting('travel_tourism_res_menu_open_icon',array(
		'default'	=> 'fas fa-bars',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Travel_Tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_res_menu_open_icon',array(
		'label'	=> __('Add Open Menu Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_responsive_media',
		'setting'	=> 'travel_tourism_res_menu_open_icon',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting('travel_tourism_res_menu_close_icon',array(
		'default'	=> 'fas fa-times',
		'sanitize_callback'	=> 'sanitize_text_field'
	));	
	$wp_customize->add_control(new Travel_Tourism_Fontawesome_Icon_Chooser(
        $wp_customize,'travel_tourism_res_menu_close_icon',array(
		'label'	=> __('Add Close Menu Icon','travel-tourism'),
		'transport' => 'refresh',
		'section'	=> 'travel_tourism_responsive_media',
		'setting'	=> 'travel_tourism_res_menu_close_icon',
		'type'		=> 'icon'
	)));

    //Woocommerce settings
	$wp_customize->add_section('travel_tourism_woocommerce_section', array(
		'title'    => __('WooCommerce Layout', 'travel-tourism'),
		'priority' => null,
		'panel'    => 'woocommerce',
	));

    //Shop Page Featured Image
	$wp_customize->add_setting( 'travel_tourism_shop_featured_image_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_shop_featured_image_border_radius', array(
		'label'       => esc_html__( 'Shop Page Featured Image Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting( 'travel_tourism_shop_featured_image_box_shadow', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_shop_featured_image_box_shadow', array(
		'label'       => esc_html__( 'Shop Page Featured Image Box Shadow','travel-tourism' ),
		'section'     => 'travel_tourism_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) ); 

	//Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'travel_tourism_woocommerce_shop_page_sidebar', array( 'selector' => '.post-type-archive-product #sidebar', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_woocommerce_shop_page_sidebar', ) );

    //Woocommerce Shop Page Sidebar
	$wp_customize->add_setting( 'travel_tourism_woocommerce_shop_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_woocommerce_shop_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Shop Page Sidebar','travel-tourism' ),
		'section' => 'travel_tourism_woocommerce_section'
    )));

    $wp_customize->add_setting('travel_tourism_shop_page_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_shop_page_layout',array(
        'type' => 'select',
        'label' => __('Shop Page Sidebar Layout','travel-tourism'),
        'section' => 'travel_tourism_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','travel-tourism'),
            'Right Sidebar' => __('Right Sidebar','travel-tourism'),
        ),
	) );

    //Selective Refresh
	$wp_customize->selective_refresh->add_partial( 'travel_tourism_woocommerce_single_product_page_sidebar', array( 'selector' => '.single-product #sidebar', 
		'render_callback' => 'travel_tourism_customize_partial_travel_tourism_woocommerce_single_product_page_sidebar', ) );

    //Woocommerce Single Product page Sidebar
	$wp_customize->add_setting( 'travel_tourism_woocommerce_single_product_page_sidebar',array(
		'default' => 1,
		'transport' => 'refresh',
		'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_woocommerce_single_product_page_sidebar',array(
		'label' => esc_html__( 'Show / Hide Single Product Sidebar','travel-tourism' ),
		'section' => 'travel_tourism_woocommerce_section'
    )));

    $wp_customize->add_setting('travel_tourism_single_product_layout',array(
        'default' => 'Right Sidebar',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_single_product_layout',array(
        'type' => 'select',
        'label' => __('Single Product Sidebar Layout','travel-tourism'),
        'section' => 'travel_tourism_woocommerce_section',
        'choices' => array(
            'Left Sidebar' => __('Left Sidebar','travel-tourism'),
            'Right Sidebar' => __('Right Sidebar','travel-tourism'),
        ),
	) );

    //Products per page
    $wp_customize->add_setting('travel_tourism_products_per_page',array(
		'default'=> '9',
		'sanitize_callback'	=> 'travel_tourism_sanitize_float'
	));
	$wp_customize->add_control('travel_tourism_products_per_page',array(
		'label'	=> __('Products Per Page','travel-tourism'),
		'description' => __('Display on shop page','travel-tourism'),
		'input_attrs' => array(
            'step'             => 1,
			'min'              => 0,
			'max'              => 50,
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'number',
	));

    //Products per row
    $wp_customize->add_setting('travel_tourism_products_per_row',array(
		'default'=> '3',
		'sanitize_callback'	=> 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_products_per_row',array(
		'label'	=> __('Products Per Row','travel-tourism'),
		'description' => __('Display on shop page','travel-tourism'),
		'choices' => array(
            '2' => '2',
			'3' => '3',
			'4' => '4',
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'select',
	));

	//Products padding
	$wp_customize->add_setting('travel_tourism_products_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_products_padding_top_bottom',array(
		'label'	=> __('Products Padding Top Bottom','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_products_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_products_padding_left_right',array(
		'label'	=> __('Products Padding Left Right','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'text'
	));

	//Products box shadow
	$wp_customize->add_setting( 'travel_tourism_products_box_shadow', array(
		'default'              => '',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_products_box_shadow', array(
		'label'       => esc_html__( 'Products Box Shadow','travel-tourism' ),
		'section'     => 'travel_tourism_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products border radius
    $wp_customize->add_setting( 'travel_tourism_products_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_products_border_radius', array(
		'label'       => esc_html__( 'Products Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	$wp_customize->add_setting('travel_tourism_products_btn_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_products_btn_padding_top_bottom',array(
		'label'	=> __('Products Button Padding Top Bottom','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_products_btn_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_products_btn_padding_left_right',array(
		'label'	=> __('Products Button Padding Left Right','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'travel_tourism_products_button_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_products_button_border_radius', array(
		'label'       => esc_html__( 'Products Button Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

	//Products Sale Badge
	$wp_customize->add_setting('travel_tourism_woocommerce_sale_position',array(
        'default' => 'right',
        'sanitize_callback' => 'travel_tourism_sanitize_choices'
	));
	$wp_customize->add_control('travel_tourism_woocommerce_sale_position',array(
        'type' => 'select',
        'label' => __('Sale Badge Position','travel-tourism'),
        'section' => 'travel_tourism_woocommerce_section',
        'choices' => array(
            'left' => __('Left','travel-tourism'),
            'right' => __('Right','travel-tourism'),
        ),
	) );

	$wp_customize->add_setting('travel_tourism_woocommerce_sale_font_size',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_woocommerce_sale_font_size',array(
		'label'	=> __('Sale Font Size','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_woocommerce_sale_padding_top_bottom',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_woocommerce_sale_padding_top_bottom',array(
		'label'	=> __('Sale Padding Top Bottom','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('travel_tourism_woocommerce_sale_padding_left_right',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('travel_tourism_woocommerce_sale_padding_left_right',array(
		'label'	=> __('Sale Padding Left Right','travel-tourism'),
		'description'	=> __('Enter a value in pixels. Example:20px','travel-tourism'),
		'input_attrs' => array(
        'placeholder' => __( '10px', 'travel-tourism' ),
        ),
		'section'=> 'travel_tourism_woocommerce_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'travel_tourism_woocommerce_sale_border_radius', array(
		'default'              => '0',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'travel_tourism_sanitize_number_range'
	) );
	$wp_customize->add_control( 'travel_tourism_woocommerce_sale_border_radius', array(
		'label'       => esc_html__( 'Sale Border Radius','travel-tourism' ),
		'section'     => 'travel_tourism_woocommerce_section',
		'type'        => 'range',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 50,
		),
	) );

  	// Related Product
    $wp_customize->add_setting( 'travel_tourism_related_product_show_hide',array(
        'default' => 1,
        'transport' => 'refresh',
        'sanitize_callback' => 'travel_tourism_switch_sanitization'
    ) );
    $wp_customize->add_control( new Travel_Tourism_Toggle_Switch_Custom_Control( $wp_customize, 'travel_tourism_related_product_show_hide',array(
        'label' => esc_html__( 'Show / Hide Related product','travel-tourism' ),
        'section' => 'travel_tourism_woocommerce_section'
    )));

    // Has to be at the top
	$wp_customize->register_panel_type( 'Travel_Tourism_WP_Customize_Panel' );
	$wp_customize->register_section_type( 'Travel_Tourism_WP_Customize_Section' );
}

add_action( 'customize_register', 'travel_tourism_customize_register' );

load_template( trailingslashit( get_template_directory() ) . '/inc/logo/logo-resizer.php' );

if ( class_exists( 'WP_Customize_Panel' ) ) {
  	class Travel_Tourism_WP_Customize_Panel extends WP_Customize_Panel {
	    public $panel;
	    public $type = 'travel_tourism_panel';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'type', 'panel', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;
	      return $array;
    	}
  	}
}

if ( class_exists( 'WP_Customize_Section' ) ) {
  	class Travel_Tourism_WP_Customize_Section extends WP_Customize_Section {
	    public $section;
	    public $type = 'travel_tourism_section';
	    public function json() {

	      $array = wp_array_slice_assoc( (array) $this, array( 'id', 'description', 'priority', 'panel', 'type', 'description_hidden', 'section', ) );
	      $array['title'] = html_entity_decode( $this->title, ENT_QUOTES, get_bloginfo( 'charset' ) );
	      $array['content'] = $this->get_content();
	      $array['active'] = $this->active();
	      $array['instanceNumber'] = $this->instance_number;

	      if ( $this->panel ) {
	        $array['customizeAction'] = sprintf( 'Customizing &#9656; %s', esc_html( $this->manager->get_panel( $this->panel )->title ) );
	      } else {
	        $array['customizeAction'] = 'Customizing';
	      }
	      return $array;
    	}
  	}
}

// Enqueue our scripts and styles
function travel_tourism_customize_controls_scripts() {
  wp_enqueue_script( 'travel-tourism-customizer-controls', get_theme_file_uri( '/assets/js/customizer-controls.js' ), array(), '1.0', true );
}
add_action( 'customize_controls_enqueue_scripts', 'travel_tourism_customize_controls_scripts' );

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Travel_Tourism_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	*/
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Travel_Tourism_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section( new Travel_Tourism_Customize_Section_Pro( $manager,'travel_tourism_upgrade_pro_link', array(
			'priority'   => 1,
			'title'    => esc_html__( 'Travel Tourism Pro', 'travel-tourism' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'travel-tourism' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/travel-agency-wordpress-theme/'),
		)));

		$manager->add_section(new Travel_Tourism_Customize_Section_Pro($manager,'travel_tourism_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'travel-tourism' ),
			'pro_text' => esc_html__( 'DOCS', 'travel-tourism' ),
			'pro_url'  => esc_url('https://www.vwthemesdemo.com/docs/free-travel-tourism/'),
		)));
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'travel-tourism-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'travel-tourism-customize-controls', trailingslashit( esc_url(get_template_directory_uri()) ) . '/assets/css/customize-controls.css' );

		wp_localize_script(
		'travel-tourism-customize-controls',
		'travel_tourism_customizer_params',
		array(
			'ajaxurl' =>	admin_url( 'admin-ajax.php' )
		));
	}
}

// Doing this customizer thang!
Travel_Tourism_Customize::get_instance();