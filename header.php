<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package Oria
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="google-site-verification" content="q40-L5wvKV0Z-i6eM-afjgtuWhpUZWa_BgSCs8Pp_AU" />
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php if ( get_theme_mod('site_favicon') ) : ?>
<link rel="shortcut icon" href="<?php echo esc_url(get_theme_mod('site_favicon')); ?>" />
<?php endif; ?>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-46711522-5"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-46711522-5');
</script>

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php

if ( ! is_customize_preview() ) :

    $oria_disable_preloader = get_theme_mod( 'oria_disable_preloader' );

    if ( isset( $oria_disable_preloader ) && ($oria_disable_preloader != 1) ) :

        echo '<div class="preloader">';
        echo '<div id="preloader-inner">';
        echo '<div class="preload">&nbsp;</div>';
        echo '</div>';
        echo '</div>';

    endif;

endif;

?>

<div id="page" class="hfeed site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'oria' ); ?></a>

	<header id="masthead" class="site-header" role="banner">

		<div class="top-bar clearfix <?php oria_sidebar_mode(); ?>">
			<?php if ( has_nav_menu( 'social' ) ) : ?>
			<nav class="social-navigation clearfix">
				<?php wp_nav_menu( array( 'theme_location' => 'social', 'link_before' => '<span class="screen-reader-text">', 'link_after' => '</span>', 'menu_class' => 'menu clearfix', 'fallback_cb' => false ) ); ?>
			</nav>
			<?php endif; ?>
		
			<?php if ( is_active_sidebar( 'sidebar-1' ) && !is_singular() ) : ?>	

			<aside id="search-top" class="widget widget_search">
				<form role="search" method="get" class="search-form" action="https://quynhlemo.com/">
					<label>
						<span class="screen-reader-text">Search for:</span>
						<input type="search" class="search-field" placeholder="Search …" value="" name="s">
					</label>
					<button type="submit" class="search-submit" value="Search">
						<i class="fa fa-search"></i>
					</button>
				</form>
			</aside>

			<div class="sidebar-toggle">
				<i class="fa fa-plus"></i>
			</div>
			<?php endif; ?>
		</div>

		<div class="container">
			<div class="site-branding">
				<?php oria_branding(); ?>
			</div><!-- .site-branding -->
		</div>

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu', 'menu_class' => 'menu clearfix', ) ); ?>
		</nav><!-- #site-navigation -->
		<nav class="mobile-nav"></nav>

	</header><!-- #masthead -->
	
	<?php if ( ( get_theme_mod('carousel_display_front') && is_front_page() ) || ( get_theme_mod('carousel_display_archives', '1') && ( is_home() || is_archive() ) ) || ( ( get_theme_mod('carousel_display_singular') && is_singular() ) ) ) : ?>
		<?php oria_slider_template(); ?>
	<?php endif; ?>

	<div id="content" class="site-content clearfix">
		<?php if ( is_singular() ) : ?>
		<div class="container content-wrapper">
		<?php endif; ?>
