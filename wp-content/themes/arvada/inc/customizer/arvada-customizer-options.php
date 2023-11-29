<?php
/**
 * Customizer section options.
 *
 * @package arvada
 *
 */

function arvada_customizer_theme_settings( $wp_customize ){
	
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';	
		
		$wp_customize->add_setting(
			'consultstreet_footer_copright_text',
			array(
				'sanitize_callback' =>  'arvada_sanitize_text',
				'default' => __('Copyright &copy; 2022 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Arvada theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'arvada'),
				'transport'         => $selective_refresh,
			)	
		);
		$wp_customize->add_control('consultstreet_footer_copright_text', array(
				'label' => esc_html__('Footer Copyright','arvada'),
				'section' => 'consultstreet_footer_copyright',
				'priority'        => 10,
				'type'    =>  'textarea'
		));

}
add_action( 'customize_register', 'arvada_customizer_theme_settings' );

function arvada_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}