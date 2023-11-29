<?php

/*---------------------------First highlight color-------------------*/

	$travel_tourism_first_color = get_theme_mod('travel_tourism_first_color');

	$travel_tourism_custom_css= "";

	if($travel_tourism_first_color != false){
		$travel_tourism_custom_css .='input[type="submit"], .read-btn a, .more-btn a,input[type="submit"],#sidebar h3,.search-box i,.scrollup i,#footer a.custom_read_more, #sidebar a.custom_read_more,#sidebar .custom-social-icons i, #footer .custom-social-icons i,.pagination span, .pagination a,#footer-2,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.widget_product_search button,#comments input[type="submit"],#comments a.comment-reply-link,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,nav.woocommerce-MyAccount-navigation ul li,.toggle-nav i, .top-bar p i, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, button.owl-next i:hover, button.owl-prev i:hover, .inner-box:hover, .woocommerce nav.woocommerce-pagination ul li a, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label,.bradcrumbs a:hover, .bradcrumbs span, .post-categories li a:hover{';
			$travel_tourism_custom_css .='background: '.esc_attr($travel_tourism_first_color).';';
		$travel_tourism_custom_css .='}';
	}
	if($travel_tourism_first_color != false){
		$travel_tourism_custom_css .='a, .main-navigation a:hover,.main-navigation ul.sub-menu a:hover,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,#slider .inner_carousel h1 a,.heading-text p,#sidebar ul li a:hover,#footer li a:hover, .heading-text i, .top-bar .custom-social-icons i:hover, .post-main-box:hover h3 a, .post-navigation a:hover .post-title, .post-navigation a:focus .post-title, .post-navigation a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info a, .post-info:hover a, .top-bar p a:hover, .logo .site-title a:hover, #content-vw a{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_first_color).';';
		$travel_tourism_custom_css .='}';
	}	
	if($travel_tourism_first_color != false){
		$travel_tourism_custom_css .='.main-navigation ul ul, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, button.owl-next i:hover, button.owl-prev i:hover{';
			$travel_tourism_custom_css .='border-color: '.esc_attr($travel_tourism_first_color).';';
		$travel_tourism_custom_css .='}';
	}
	
	/*------------------second highlight color-------------------*/

	$travel_tourism_second_color = get_theme_mod('travel_tourism_second_color');

	if($travel_tourism_second_color != false){
		$travel_tourism_custom_css .='.read-btn a:hover, .more-btn a:hover,input[type="submit"]:hover,#sidebar a.custom_read_more:hover, #footer a.custom_read_more:hover,#sidebar .custom-social-icons i:hover, #footer .custom-social-icons i:hover,.pagination .current,.pagination a:hover,#sidebar .tagcloud a:hover,#footer .tagcloud a:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, .top-bar, #comments input[type="submit"]:hover, #comments a.comment-reply-link:hover{';
			$travel_tourism_custom_css .='background: '.esc_attr($travel_tourism_second_color).';';
		$travel_tourism_custom_css .='}';
	}

	if($travel_tourism_second_color != false){
		$travel_tourism_custom_css .='input[type="submit"], p.site-title a, .logo h1 a, p.site-description, .top-bar p i, #slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover, button.owl-next i:hover, button.owl-prev i:hover, .read-btn a, .more-btn a, .inner-box h3 a, .copyright p, .copyright p a, #comments input[type="submit"], #sidebar h3, .pagination span, .pagination a, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, nav.woocommerce-MyAccount-navigation ul li a, .toggle-nav i, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_second_color).';';
		$travel_tourism_custom_css .='}';
	}

	/*---------------------------Width Layout -------------------*/

	$travel_tourism_theme_lay = get_theme_mod( 'travel_tourism_width_option','Full Width');
    if($travel_tourism_theme_lay == 'Boxed'){
		$travel_tourism_custom_css .='body{';
			$travel_tourism_custom_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$travel_tourism_custom_css .='}';
		$travel_tourism_custom_css .='#slider{';
			$travel_tourism_custom_css .='right: 1%;';
		$travel_tourism_custom_css .='}';
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='right: 100px;';
		$travel_tourism_custom_css .='}';
		$travel_tourism_custom_css .='.scrollup.left i{';
			$travel_tourism_custom_css .='left: 100px;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_theme_lay == 'Wide Width'){
		$travel_tourism_custom_css .='body{';
			$travel_tourism_custom_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$travel_tourism_custom_css .='}';
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='right: 30px;';
		$travel_tourism_custom_css .='}';
		$travel_tourism_custom_css .='.scrollup.left i{';
			$travel_tourism_custom_css .='left: 30px;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_theme_lay == 'Full Width'){
		$travel_tourism_custom_css .='body{';
			$travel_tourism_custom_css .='max-width: 100%;';
		$travel_tourism_custom_css .='}';
	}

	/*--------------------Slider Content Layout -------------------*/

	$travel_tourism_theme_lay = get_theme_mod( 'travel_tourism_slider_content_option','Center');
    if($travel_tourism_theme_lay == 'Left'){
		$travel_tourism_custom_css .='#slider .carousel-caption{';
			$travel_tourism_custom_css .='text-align:left;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_theme_lay == 'Center'){
		$travel_tourism_custom_css .='#slider .carousel-caption{';
			$travel_tourism_custom_css .='text-align:center;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_theme_lay == 'Right'){
		$travel_tourism_custom_css .='#slider .carousel-caption{';
			$travel_tourism_custom_css .='text-align:right;';
		$travel_tourism_custom_css .='}';
	}

	/*------------- Slider Content Padding Settings ------------------*/

	$travel_tourism_slider_content_padding_top_bottom = get_theme_mod('travel_tourism_slider_content_padding_top_bottom');
	$travel_tourism_slider_content_padding_left_right = get_theme_mod('travel_tourism_slider_content_padding_left_right');
	if($travel_tourism_slider_content_padding_top_bottom != false || $travel_tourism_slider_content_padding_left_right != false){
		$travel_tourism_custom_css .='#slider .carousel-caption{';
			$travel_tourism_custom_css .='top: '.esc_attr($travel_tourism_slider_content_padding_top_bottom).'; bottom: '.esc_attr($travel_tourism_slider_content_padding_top_bottom).';left: '.esc_attr($travel_tourism_slider_content_padding_left_right).';right: '.esc_attr($travel_tourism_slider_content_padding_left_right).';';
		$travel_tourism_custom_css .='}';
	}

	/*---------------------------Slider Height ------------*/

	$travel_tourism_slider_height = get_theme_mod('travel_tourism_slider_height');
	if($travel_tourism_slider_height != false){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='height: '.esc_attr($travel_tourism_slider_height).';';
		$travel_tourism_custom_css .='}';
	}

	/*--------------------------- Slider -------------------*/

	$travel_tourism_slider = get_theme_mod('travel_tourism_slider_arrows');
	if($travel_tourism_slider == false){
		$travel_tourism_custom_css .='#services-sec{';
			$travel_tourism_custom_css .='padding: 8% 0;';
		$travel_tourism_custom_css .='}';
	}

		/*--------------------------- Slider Opacity -------------------*/

	$travel_tourism_theme_lay = get_theme_mod( 'travel_tourism_slider_opacity_color','0.4');
	if($travel_tourism_theme_lay == '0'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.1'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.1';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.2'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.2';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.3'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.3';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.4'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.4';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.5'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.5';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.6'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.6';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.7'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.7';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.8'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.8';
		$travel_tourism_custom_css .='}';
		}else if($travel_tourism_theme_lay == '0.9'){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:0.9';
		$travel_tourism_custom_css .='}';
		}

	/*---------------------- Slider Image Overlay ------------------------*/

	$travel_tourism_slider_image_overlay = get_theme_mod('travel_tourism_slider_image_overlay', true);
	if($travel_tourism_slider_image_overlay == false){
		$travel_tourism_custom_css .='#slider img{';
			$travel_tourism_custom_css .='opacity:1;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_slider_image_overlay_color = get_theme_mod('travel_tourism_slider_image_overlay_color', true);
	if($travel_tourism_slider_image_overlay_color != false){
		$travel_tourism_custom_css .='#slider{';
			$travel_tourism_custom_css .='background-color: '.esc_attr($travel_tourism_slider_image_overlay_color).';';
		$travel_tourism_custom_css .='}';
	}

	/*---------------------------Blog Layout -------------------*/

	$travel_tourism_theme_lay = get_theme_mod( 'travel_tourism_blog_layout_option','Default');
    if($travel_tourism_theme_lay == 'Default'){
		$travel_tourism_custom_css .='.post-main-box{';
			$travel_tourism_custom_css .='';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_theme_lay == 'Center'){
		$travel_tourism_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p{';
			$travel_tourism_custom_css .='text-align:center;';
		$travel_tourism_custom_css .='}';
		$travel_tourism_custom_css .='.post-info{';
			$travel_tourism_custom_css .='margin-top:10px;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_theme_lay == 'Left'){
		$travel_tourism_custom_css .='.post-main-box, .post-main-box h2, .post-info, .new-text p, #our-services p{';
			$travel_tourism_custom_css .='text-align:Left;';
		$travel_tourism_custom_css .='}';
		$travel_tourism_custom_css .='.post-main-box h2{';
			$travel_tourism_custom_css .='margin-top:10px;';
		$travel_tourism_custom_css .='}';
	}

	// featured image dimention
	$travel_tourism_blog_post_featured_image_dimension = get_theme_mod('travel_tourism_blog_post_featured_image_dimension', 'default');
	$travel_tourism_blog_post_featured_image_custom_width = get_theme_mod('travel_tourism_blog_post_featured_image_custom_width',250);
	$travel_tourism_blog_post_featured_image_custom_height = get_theme_mod('travel_tourism_blog_post_featured_image_custom_height',250);
	if($travel_tourism_blog_post_featured_image_dimension == 'custom'){
		$travel_tourism_custom_css .='.post-main-box img{';
			$travel_tourism_custom_css .='width: '.esc_attr($travel_tourism_blog_post_featured_image_custom_width).'; height: '.esc_attr($travel_tourism_blog_post_featured_image_custom_height).';';
		$travel_tourism_custom_css .='}';
	}
	/*--------------------- Blog Page Posts -------------------*/

	$travel_tourism_blog_page_posts_settings = get_theme_mod( 'travel_tourism_blog_page_posts_settings','Into Blocks');
    if($travel_tourism_blog_page_posts_settings == 'Without Blocks'){
		$travel_tourism_custom_css .='.post-main-box{';
			$travel_tourism_custom_css .='box-shadow: none; border: none; margin:30px 0;';
		$travel_tourism_custom_css .='}';
	}

	/*----------------Responsive Media -----------------------*/

	$travel_tourism_resp_slider = get_theme_mod( 'travel_tourism_resp_slider_hide_show',false);
	if($travel_tourism_resp_slider == true && get_theme_mod( 'travel_tourism_slider_arrows', false) == false){
    	$travel_tourism_custom_css .='#slider{';
			$travel_tourism_custom_css .='display:none;';
		$travel_tourism_custom_css .='} ';
	}
    if($travel_tourism_resp_slider == true){
    	$travel_tourism_custom_css .='@media screen and (max-width:575px) {';
		$travel_tourism_custom_css .='#slider{';
			$travel_tourism_custom_css .='display:block;';
		$travel_tourism_custom_css .='} }';
	}else if($travel_tourism_resp_slider == false){
		$travel_tourism_custom_css .='@media screen and (max-width:575px) {';
		$travel_tourism_custom_css .='#slider{';
			$travel_tourism_custom_css .='display:none;';
		$travel_tourism_custom_css .='} }';
	}

	$travel_tourism_resp_sidebar = get_theme_mod( 'travel_tourism_sidebar_hide_show',true);
    if($travel_tourism_resp_sidebar == true){
    	$travel_tourism_custom_css .='@media screen and (max-width:575px) {';
		$travel_tourism_custom_css .='#sidebar{';
			$travel_tourism_custom_css .='display:block;';
		$travel_tourism_custom_css .='} }';
	}else if($travel_tourism_resp_sidebar == false){
		$travel_tourism_custom_css .='@media screen and (max-width:575px) {';
		$travel_tourism_custom_css .='#sidebar{';
			$travel_tourism_custom_css .='display:none;';
		$travel_tourism_custom_css .='} }';
	}

	$travel_tourism_resp_scroll_top = get_theme_mod( 'travel_tourism_resp_scroll_top_hide_show',true);
	if($travel_tourism_resp_scroll_top == true && get_theme_mod( 'travel_tourism_footer_scroll',true) != true){
    	$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='visibility:hidden !important;';
		$travel_tourism_custom_css .='} ';
	}
    if($travel_tourism_resp_scroll_top == true){
    	$travel_tourism_custom_css .='@media screen and (max-width:575px) {';
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='visibility:visible !important;';
		$travel_tourism_custom_css .='} }';
	}else if($travel_tourism_resp_scroll_top == false){
		$travel_tourism_custom_css .='@media screen and (max-width:575px){';
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='visibility:hidden !important;';
		$travel_tourism_custom_css .='} }';
	}

	$travel_tourism_resp_menu_toggle_btn_bg_color = get_theme_mod('travel_tourism_resp_menu_toggle_btn_bg_color');
	if($travel_tourism_resp_menu_toggle_btn_bg_color != false){
		$travel_tourism_custom_css .='.toggle-nav i{';
			$travel_tourism_custom_css .='background-color: '.esc_attr($travel_tourism_resp_menu_toggle_btn_bg_color).';';
		$travel_tourism_custom_css .='}';
	}

	/*---------------- Blog Post Settings ------------------*/

	$travel_tourism_featured_image_border_radius = get_theme_mod('travel_tourism_featured_image_border_radius', 0);
	if($travel_tourism_featured_image_border_radius != false){
		$travel_tourism_custom_css .='.box-image img, .feature-box img{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_featured_image_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_featured_image_box_shadow = get_theme_mod('travel_tourism_featured_image_box_shadow',0);
	if($travel_tourism_featured_image_box_shadow != false){
		$travel_tourism_custom_css .='.box-image img, .feature-box img, #content-vw img{';
			$travel_tourism_custom_css .='box-shadow: '.esc_attr($travel_tourism_featured_image_box_shadow).'px '.esc_attr($travel_tourism_featured_image_box_shadow).'px '.esc_attr($travel_tourism_featured_image_box_shadow).'px #cccccc;';
		$travel_tourism_custom_css .='}';
	}

	/*---------------- Single Post Settings ------------------*/

	$travel_tourism_single_blog_comment_title = get_theme_mod('travel_tourism_single_blog_comment_title', 'Leave a Reply');
	if($travel_tourism_single_blog_comment_title == ''){
		$travel_tourism_custom_css .='#comments h2#reply-title {';
			$travel_tourism_custom_css .='display: none;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_single_blog_comment_button_text = get_theme_mod('travel_tourism_single_blog_comment_button_text', 'Post Comment');
	if($travel_tourism_single_blog_comment_button_text == ''){
		$travel_tourism_custom_css .='#comments p.form-submit {';
			$travel_tourism_custom_css .='display: none;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_comment_width = get_theme_mod('travel_tourism_single_blog_comment_width');
	if($travel_tourism_comment_width != false){
		$travel_tourism_custom_css .='#comments textarea{';
			$travel_tourism_custom_css .='width: '.esc_attr($travel_tourism_comment_width).';';
		$travel_tourism_custom_css .='}';
	}

	/*---------------- Button Settings ------------------*/

	$travel_tourism_button_padding_top_bottom = get_theme_mod('travel_tourism_button_padding_top_bottom');
	$travel_tourism_button_padding_left_right = get_theme_mod('travel_tourism_button_padding_left_right');
	if($travel_tourism_button_padding_top_bottom != false || $travel_tourism_button_padding_left_right != false){
		$travel_tourism_custom_css .='.post-main-box .more-btn a{';
			$travel_tourism_custom_css .='padding-top: '.esc_attr($travel_tourism_button_padding_top_bottom).'; padding-bottom: '.esc_attr($travel_tourism_button_padding_top_bottom).';padding-left: '.esc_attr($travel_tourism_button_padding_left_right).';padding-right: '.esc_attr($travel_tourism_button_padding_left_right).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_button_border_radius = get_theme_mod('travel_tourism_button_border_radius');
	if($travel_tourism_button_border_radius != false){
		$travel_tourism_custom_css .='.post-main-box .more-btn a{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_button_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

		$travel_tourism_button_font_size = get_theme_mod('travel_tourism_button_font_size',14);
	$travel_tourism_custom_css .='.post-main-box .more-btn a{';
		$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_button_font_size).';';
	$travel_tourism_custom_css .='}';

	$travel_tourism_theme_lay = get_theme_mod( 'travel_tourism_button_text_transform','Uppercase');
	if($travel_tourism_theme_lay == 'Capitalize'){
		$travel_tourism_custom_css .='.post-main-box .more-btn a{';
			$travel_tourism_custom_css .='text-transform:Capitalize;';
		$travel_tourism_custom_css .='}';
	}
	if($travel_tourism_theme_lay == 'Lowercase'){
		$travel_tourism_custom_css .='.post-main-box .more-btn a{';
			$travel_tourism_custom_css .='text-transform:Lowercase;';
		$travel_tourism_custom_css .='}';
	}
	if($travel_tourism_theme_lay == 'Uppercase'){ 
		$travel_tourism_custom_css .='.post-main-box .more-btn a{';
			$travel_tourism_custom_css .='text-transform:Uppercase;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_button_letter_spacing = get_theme_mod('travel_tourism_button_letter_spacing',14);
	$travel_tourism_custom_css .='.post-main-box .more-btn a{';
		$travel_tourism_custom_css .='letter-spacing: '.esc_attr($travel_tourism_button_letter_spacing).';';
	$travel_tourism_custom_css .='}';

	/*-------------- Copyright Alignment ----------------*/
	
	$travel_tourism_copyright_background_color = get_theme_mod('travel_tourism_copyright_background_color');
	if($travel_tourism_copyright_background_color != false){
		$travel_tourism_custom_css .='#footer-2{';
			$travel_tourism_custom_css .='background-color: '.esc_attr($travel_tourism_copyright_background_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_footer_background_color = get_theme_mod('travel_tourism_footer_background_color');
	if($travel_tourism_footer_background_color != false){
		$travel_tourism_custom_css .='#footer{';
			$travel_tourism_custom_css .='background-color: '.esc_attr($travel_tourism_footer_background_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_footer_widgets_heading = get_theme_mod( 'travel_tourism_footer_widgets_heading','Left');
    if($travel_tourism_footer_widgets_heading == 'Left'){
		$travel_tourism_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
		$travel_tourism_custom_css .='text-align: left;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_footer_widgets_heading == 'Center'){
		$travel_tourism_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$travel_tourism_custom_css .='text-align: center;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_footer_widgets_heading == 'Right'){
		$travel_tourism_custom_css .='#footer h3, #footer .wp-block-search .wp-block-search__label{';
			$travel_tourism_custom_css .='text-align: right;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_footer_widgets_content = get_theme_mod( 'travel_tourism_footer_widgets_content','Left');
    if($travel_tourism_footer_widgets_content == 'Left'){
		$travel_tourism_custom_css .='#footer .widget{';
		$travel_tourism_custom_css .='text-align: left;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_footer_widgets_content == 'Center'){
		$travel_tourism_custom_css .='#footer .widget{';
			$travel_tourism_custom_css .='text-align: center;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_footer_widgets_content == 'Right'){
		$travel_tourism_custom_css .='#footer .widget{';
			$travel_tourism_custom_css .='text-align: right;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_copyright_font_size = get_theme_mod('travel_tourism_copyright_font_size');
	if($travel_tourism_copyright_font_size != false){
		$travel_tourism_custom_css .='.copyright p, .copyright p a{';
			$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_copyright_font_size).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_copyright_padding_top_bottom = get_theme_mod('travel_tourism_copyright_padding_top_bottom');
	if($travel_tourism_copyright_padding_top_bottom != false){
		$travel_tourism_custom_css .='#footer-2{';
			$travel_tourism_custom_css .='padding-top: '.esc_attr($travel_tourism_copyright_padding_top_bottom).'; padding-bottom: '.esc_attr($travel_tourism_copyright_padding_top_bottom).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_copyright_alignment = get_theme_mod('travel_tourism_copyright_alignment');
	if($travel_tourism_copyright_alignment != false){
		$travel_tourism_custom_css .='.copyright p{';
			$travel_tourism_custom_css .='text-align: '.esc_attr($travel_tourism_copyright_alignment).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_footer_padding = get_theme_mod('travel_tourism_footer_padding');
	if($travel_tourism_footer_padding != false){
		$travel_tourism_custom_css .='#footer{';
			$travel_tourism_custom_css .='padding: '.esc_attr($travel_tourism_footer_padding).' 0;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_footer_icon = get_theme_mod('travel_tourism_footer_icon');
	if($travel_tourism_footer_icon == false){
		$travel_tourism_custom_css .='.copyright p{';
			$travel_tourism_custom_css .='width:100%; text-align:center; float:none;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_footer_background_image = get_theme_mod('travel_tourism_footer_background_image');
	if($travel_tourism_footer_background_image != false){
		$travel_tourism_custom_css .='#footer{';
			$travel_tourism_custom_css .='background: url('.esc_attr($travel_tourism_footer_background_image).');';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_theme_lay = get_theme_mod( 'travel_tourism_img_footer','scroll');
	if($travel_tourism_theme_lay == 'fixed'){
		$travel_tourism_custom_css .='#footer{';
			$travel_tourism_custom_css .='background-attachment: fixed !important;';
		$travel_tourism_custom_css .='}';
	}elseif ($travel_tourism_theme_lay == 'scroll'){
		$travel_tourism_custom_css .='#footer{';
			$travel_tourism_custom_css .='background-attachment: scroll !important;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_footer_img_position = get_theme_mod('travel_tourism_footer_img_position','center center');
	if($travel_tourism_footer_img_position != false){
		$travel_tourism_custom_css .='#footer{';
			$travel_tourism_custom_css .='background-position: '.esc_attr($travel_tourism_footer_img_position).'!important;';
		$travel_tourism_custom_css .='}';
	} 

	/*----------------Sroll to top Settings ------------------*/

	$travel_tourism_scroll_to_top_font_size = get_theme_mod('travel_tourism_scroll_to_top_font_size');
	if($travel_tourism_scroll_to_top_font_size != false){
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_scroll_to_top_font_size).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_scroll_to_top_padding = get_theme_mod('travel_tourism_scroll_to_top_padding');
	$travel_tourism_scroll_to_top_padding = get_theme_mod('travel_tourism_scroll_to_top_padding');
	if($travel_tourism_scroll_to_top_padding != false){
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='padding-top: '.esc_attr($travel_tourism_scroll_to_top_padding).';padding-bottom: '.esc_attr($travel_tourism_scroll_to_top_padding).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_scroll_to_top_width = get_theme_mod('travel_tourism_scroll_to_top_width');
	if($travel_tourism_scroll_to_top_width != false){
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='width: '.esc_attr($travel_tourism_scroll_to_top_width).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_scroll_to_top_height = get_theme_mod('travel_tourism_scroll_to_top_height');
	if($travel_tourism_scroll_to_top_height != false){
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='height: '.esc_attr($travel_tourism_scroll_to_top_height).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_scroll_to_top_border_radius = get_theme_mod('travel_tourism_scroll_to_top_border_radius');
	if($travel_tourism_scroll_to_top_border_radius != false){
		$travel_tourism_custom_css .='.scrollup i{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_scroll_to_top_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

	/*----------------Social Icons Settings ------------------*/

	$travel_tourism_social_icon_font_size = get_theme_mod('travel_tourism_social_icon_font_size');
	if($travel_tourism_social_icon_font_size != false){
		$travel_tourism_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_social_icon_font_size).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_social_icon_padding = get_theme_mod('travel_tourism_social_icon_padding');
	if($travel_tourism_social_icon_padding != false){
		$travel_tourism_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$travel_tourism_custom_css .='padding: '.esc_attr($travel_tourism_social_icon_padding).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_social_icon_width = get_theme_mod('travel_tourism_social_icon_width');
	if($travel_tourism_social_icon_width != false){
		$travel_tourism_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$travel_tourism_custom_css .='width: '.esc_attr($travel_tourism_social_icon_width).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_social_icon_height = get_theme_mod('travel_tourism_social_icon_height');
	if($travel_tourism_social_icon_height != false){
		$travel_tourism_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$travel_tourism_custom_css .='height: '.esc_attr($travel_tourism_social_icon_height).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_social_icon_border_radius = get_theme_mod('travel_tourism_social_icon_border_radius');
	if($travel_tourism_social_icon_border_radius != false){
		$travel_tourism_custom_css .='#sidebar .custom-social-icons i, #footer .custom-social-icons i{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_social_icon_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

	/*----------------Woocommerce Products Settings ------------------*/

	$travel_tourism_related_product_show_hide = get_theme_mod('travel_tourism_related_product_show_hide',true);
	if($travel_tourism_related_product_show_hide != true){
		$travel_tourism_custom_css .='.related.products{';
			$travel_tourism_custom_css .='display: none;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_products_padding_top_bottom = get_theme_mod('travel_tourism_products_padding_top_bottom');
	if($travel_tourism_products_padding_top_bottom != false){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_tourism_custom_css .='padding-top: '.esc_attr($travel_tourism_products_padding_top_bottom).'!important; padding-bottom: '.esc_attr($travel_tourism_products_padding_top_bottom).'!important;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_products_padding_left_right = get_theme_mod('travel_tourism_products_padding_left_right');
	if($travel_tourism_products_padding_left_right != false){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_tourism_custom_css .='padding-left: '.esc_attr($travel_tourism_products_padding_left_right).'!important; padding-right: '.esc_attr($travel_tourism_products_padding_left_right).'!important;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_products_box_shadow = get_theme_mod('travel_tourism_products_box_shadow');
	if($travel_tourism_products_box_shadow != false){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
				$travel_tourism_custom_css .='box-shadow: '.esc_attr($travel_tourism_products_box_shadow).'px '.esc_attr($travel_tourism_products_box_shadow).'px '.esc_attr($travel_tourism_products_box_shadow).'px #ddd;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_products_border_radius = get_theme_mod('travel_tourism_products_border_radius', 0);
	if($travel_tourism_products_border_radius != false){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product, .woocommerce-page ul.products li.product{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_products_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_products_btn_padding_top_bottom = get_theme_mod('travel_tourism_products_btn_padding_top_bottom');
	if($travel_tourism_products_btn_padding_top_bottom != false){
		$travel_tourism_custom_css .='.woocommerce a.button{';
			$travel_tourism_custom_css .='padding-top: '.esc_attr($travel_tourism_products_btn_padding_top_bottom).' !important; padding-bottom: '.esc_attr($travel_tourism_products_btn_padding_top_bottom).' !important;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_products_btn_padding_left_right = get_theme_mod('travel_tourism_products_btn_padding_left_right');
	if($travel_tourism_products_btn_padding_left_right != false){
		$travel_tourism_custom_css .='.woocommerce a.button{';
			$travel_tourism_custom_css .='padding-left: '.esc_attr($travel_tourism_products_btn_padding_left_right).' !important; padding-right: '.esc_attr($travel_tourism_products_btn_padding_left_right).' !important;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_products_button_border_radius = get_theme_mod('travel_tourism_products_button_border_radius', 0);
	if($travel_tourism_products_button_border_radius != false){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product .button, a.checkout-button.button.alt.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_products_button_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_woocommerce_sale_position = get_theme_mod( 'travel_tourism_woocommerce_sale_position','right');
    if($travel_tourism_woocommerce_sale_position == 'left'){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product .onsale{';
			$travel_tourism_custom_css .='left: -10px; right: auto;';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_woocommerce_sale_position == 'right'){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product .onsale{';
			$travel_tourism_custom_css .='left: auto; right: 0;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_woocommerce_sale_font_size = get_theme_mod('travel_tourism_woocommerce_sale_font_size');
	if($travel_tourism_woocommerce_sale_font_size != false){
		$travel_tourism_custom_css .='.woocommerce span.onsale{';
			$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_woocommerce_sale_font_size).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_woocommerce_sale_padding_top_bottom = get_theme_mod('travel_tourism_woocommerce_sale_padding_top_bottom');
	if($travel_tourism_woocommerce_sale_padding_top_bottom != false){
		$travel_tourism_custom_css .='.woocommerce span.onsale{';
			$travel_tourism_custom_css .='padding-top: '.esc_attr($travel_tourism_woocommerce_sale_padding_top_bottom).'; padding-bottom: '.esc_attr($travel_tourism_woocommerce_sale_padding_top_bottom).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_woocommerce_sale_padding_left_right = get_theme_mod('travel_tourism_woocommerce_sale_padding_left_right');
	if($travel_tourism_woocommerce_sale_padding_left_right != false){
		$travel_tourism_custom_css .='.woocommerce span.onsale{';
			$travel_tourism_custom_css .='padding-left: '.esc_attr($travel_tourism_woocommerce_sale_padding_left_right).'; padding-right: '.esc_attr($travel_tourism_woocommerce_sale_padding_left_right).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_woocommerce_sale_border_radius = get_theme_mod('travel_tourism_woocommerce_sale_border_radius', 0);
	if($travel_tourism_woocommerce_sale_border_radius != false){
		$travel_tourism_custom_css .='.woocommerce span.onsale{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_woocommerce_sale_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

	/*------------------ Logo  -------------------*/

	// Site title Font Size
	$travel_tourism_site_title_font_size = get_theme_mod('travel_tourism_site_title_font_size');
	if($travel_tourism_site_title_font_size != false){
		$travel_tourism_custom_css .='.logo p.site-title, .logo h1{';
			$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_site_title_font_size).';';
		$travel_tourism_custom_css .='}';
	}

	// Site tagline Font Size
	$travel_tourism_site_tagline_font_size = get_theme_mod('travel_tourism_site_tagline_font_size');
	if($travel_tourism_site_tagline_font_size != false){
		$travel_tourism_custom_css .='.logo p.site-description{';
			$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_site_tagline_font_size).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_navigation_menu_font_size = get_theme_mod('travel_tourism_navigation_menu_font_size');
	if($travel_tourism_navigation_menu_font_size != false){
		$travel_tourism_custom_css .='.main-navigation a{';
			$travel_tourism_custom_css .='font-size: '.esc_attr($travel_tourism_navigation_menu_font_size).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_navigation_menu_font_weight = get_theme_mod('travel_tourism_navigation_menu_font_weight','700');
	if($travel_tourism_navigation_menu_font_weight != false){
		$travel_tourism_custom_css .='.main-navigation a{';
			$travel_tourism_custom_css .='font-weight: '.esc_attr($travel_tourism_navigation_menu_font_weight).';';
		$travel_tourism_custom_css .='}';
	}


	$travel_tourism_site_title_color = get_theme_mod('travel_tourism_site_title_color');
	if($travel_tourism_site_title_color != false){
		$travel_tourism_custom_css .='p.site-title a{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_site_title_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_site_tagline_color = get_theme_mod('travel_tourism_site_tagline_color');
	if($travel_tourism_site_tagline_color != false){
		$travel_tourism_custom_css .='.logo p.site-description{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_site_tagline_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_logo_width = get_theme_mod('travel_tourism_logo_width');
	if($travel_tourism_logo_width != false){
		$travel_tourism_custom_css .='.logo img{';
			$travel_tourism_custom_css .='width: '.esc_attr($travel_tourism_logo_width).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_logo_height = get_theme_mod('travel_tourism_logo_height');
	if($travel_tourism_logo_height != false){
		$travel_tourism_custom_css .='.logo img{';
			$travel_tourism_custom_css .='height: '.esc_attr($travel_tourism_logo_height).';';
		$travel_tourism_custom_css .='}';
	}

	// Woocommerce img

	$travel_tourism_shop_featured_image_border_radius = get_theme_mod('travel_tourism_shop_featured_image_border_radius', 0);
	if($travel_tourism_shop_featured_image_border_radius != false){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product a img{';
			$travel_tourism_custom_css .='border-radius: '.esc_attr($travel_tourism_shop_featured_image_border_radius).'px;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_shop_featured_image_box_shadow = get_theme_mod('travel_tourism_shop_featured_image_box_shadow',0);
	if($travel_tourism_shop_featured_image_box_shadow != false){
		$travel_tourism_custom_css .='.woocommerce ul.products li.product a img{';
			$travel_tourism_custom_css .='box-shadow: '.esc_attr($travel_tourism_shop_featured_image_box_shadow).'px '.esc_attr($travel_tourism_shop_featured_image_box_shadow).'px '.esc_attr($travel_tourism_shop_featured_image_box_shadow).'px #ddd;';
		$travel_tourism_custom_css .='}';
	}
	
	$travel_tourism_theme_lay = get_theme_mod( 'travel_tourism_menu_text_transform','Uppercase');
	if($travel_tourism_theme_lay == 'Capitalize'){
		$travel_tourism_custom_css .='.main-navigation a{';
			$travel_tourism_custom_css .='text-transform:Capitalize;';
		$travel_tourism_custom_css .='}';
	}
	if($travel_tourism_theme_lay == 'Lowercase'){
		$travel_tourism_custom_css .='.main-navigation a{';
			$travel_tourism_custom_css .='text-transform:Lowercase;';
		$travel_tourism_custom_css .='}';
	}
	if($travel_tourism_theme_lay == 'Uppercase'){
		$travel_tourism_custom_css .='.main-navigation a{';
			$travel_tourism_custom_css .='text-transform:Uppercase;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_logo_padding = get_theme_mod('travel_tourism_logo_padding');
	if($travel_tourism_logo_padding != false){
		$travel_tourism_custom_css .='.logo{';
			$travel_tourism_custom_css .='padding: '.esc_attr($travel_tourism_logo_padding).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_logo_margin = get_theme_mod('travel_tourism_logo_margin');
	if($travel_tourism_logo_margin != false){
		$travel_tourism_custom_css .='.logo{';
			$travel_tourism_custom_css .='margin: '.esc_attr($travel_tourism_logo_margin).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_menus_item = get_theme_mod( 'travel_tourism_menus_item_style','None');
    if($travel_tourism_menus_item == 'None'){
		$travel_tourism_custom_css .='.main-navigation a{';
			$travel_tourism_custom_css .='';
		$travel_tourism_custom_css .='}';
	}else if($travel_tourism_menus_item == 'Zoom In'){
		$travel_tourism_custom_css .='.main-navigation a:hover{';
			$travel_tourism_custom_css .='transition: all 0.3s ease-in-out !important; transform: scale(1.2) !important; color: #ffcc05;';
		$travel_tourism_custom_css .='}';
	}

	/*--------------- Preloader Background Color  -------------------*/

	$travel_tourism_preloader_bg_color = get_theme_mod('travel_tourism_preloader_bg_color');
	if($travel_tourism_preloader_bg_color != false){
		$travel_tourism_custom_css .='#preloader{';
			$travel_tourism_custom_css .='background-color: '.esc_attr($travel_tourism_preloader_bg_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_preloader_border_color = get_theme_mod('travel_tourism_preloader_border_color');
	if($travel_tourism_preloader_border_color != false){
		$travel_tourism_custom_css .='.loader-line{';
			$travel_tourism_custom_css .='border-color: '.esc_attr($travel_tourism_preloader_border_color).'!important;';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_preloader_bg_img = get_theme_mod('travel_tourism_preloader_bg_img');
	if($travel_tourism_preloader_bg_img != false){
		$travel_tourism_custom_css .='#preloader{';
			$travel_tourism_custom_css .='background: url('.esc_attr($travel_tourism_preloader_bg_img).');-webkit-background-size: cover; -moz-background-size: cover; -o-background-size: cover; background-size: cover;';
		$travel_tourism_custom_css .='}';
	} 

	// Header Background Color

	$travel_tourism_header_background_color = get_theme_mod('travel_tourism_header_background_color');
	if($travel_tourism_header_background_color != false){
		$travel_tourism_custom_css .='.page-template-custom-home-page #header, #header, .logo{';
			$travel_tourism_custom_css .='background-color: '.esc_attr($travel_tourism_header_background_color).' !important;';
		$travel_tourism_custom_css .='}';
	}

	/*--------------- menu settings -------------------*/

	$travel_tourism_header_menus_color = get_theme_mod('travel_tourism_header_menus_color');
	if($travel_tourism_header_menus_color != false){
		$travel_tourism_custom_css .='.main-navigation a{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_header_menus_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_header_menus_hover_color = get_theme_mod('travel_tourism_header_menus_hover_color');
	if($travel_tourism_header_menus_hover_color != false){
		$travel_tourism_custom_css .='.main-navigation a:hover{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_header_menus_hover_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_header_submenus_color = get_theme_mod('travel_tourism_header_submenus_color');
	if($travel_tourism_header_submenus_color != false){
		$travel_tourism_custom_css .='.main-navigation ul ul a{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_header_submenus_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_header_submenus_hover_color = get_theme_mod('travel_tourism_header_submenus_hover_color');
	if($travel_tourism_header_submenus_hover_color != false){
		$travel_tourism_custom_css .='.main-navigation ul.sub-menu a:hover{';
			$travel_tourism_custom_css .='color: '.esc_attr($travel_tourism_header_submenus_hover_color).';';
		$travel_tourism_custom_css .='}';
	}

	$travel_tourism_single_blog_post_navigation_show_hide = get_theme_mod('travel_tourism_single_blog_post_navigation_show_hide',true);
	if($travel_tourism_single_blog_post_navigation_show_hide != true){
		$travel_tourism_custom_css .='.post-navigation{';
			$travel_tourism_custom_css .='display: none;';
		$travel_tourism_custom_css .='}';
	}