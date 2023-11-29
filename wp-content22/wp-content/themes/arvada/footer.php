<?php
/** 
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link    https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package arvada
 */

$arvada_footer_widgets_enabled = get_theme_mod('consultstreet_footer_widgets_enabled', true);  
$arvada_footer_container_size = get_theme_mod('consultstreet_footer_container_size', 'container-full');
$arvada_footer_copright_enabled = get_theme_mod('consultstreet_footer_copright_enabled', true);
$arvada_footer_copright_text = get_theme_mod('consultstreet_footer_copright_text', __('Copyright &copy; 2022 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> Arvada theme by <a target="_blank" href="//themearile.com/">ThemeArile</a>', 'arvada'));

?>
	<!--Footer-->
	<footer class="site-footer dark">

	<?php if($arvada_footer_widgets_enabled == true): ?>
		<div class="<?php echo esc_attr($arvada_footer_container_size); ?>">
			<!--Footer Widgets-->			
			<div class="row footer-sidebar">
			   <?php get_template_part('sidebar','footer');?>
			</div>
		</div>
		<!--/Footer Widgets-->
	<?php endif; ?>		
		

    <?php if($arvada_footer_copright_enabled == true): ?>
		<!--Site Info-->
		<div class="site-info text-center">
			<?php echo wp_kses_post($arvada_footer_copright_text); ?>				
		</div>
		<!--/Site Info-->			
	<?php endif; ?>	
			
	</footer>
	<!--/End of Footer-->
		<!--Page Scroll Up-->
		<div class="page-scroll-up"><a href="#totop"><i class="fa fa-angle-up"></i></a></div>
		<!--/Page Scroll Up-->
	
<?php wp_footer(); ?>

</body>
</html>