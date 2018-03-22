<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package _tk
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	

	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<header id="header_wrapper" class="site-header" role="banner">
<?php // substitute the class "container-fluid" below if you want a wider content area ?>

	<div class="container clearfix">
		<div class="float-left">				
				<div class="contactinfo">
				  <ul class="">
						<li><i class="fa fa-phone"></i> <a href="tel:022828342">022828342</a>, <a href="tel:0840887176">0840887176</a></li>
						<li><a href="mailto:gertexthailand@gmail.com"><i class="fa fa-envelope"></i> gertexthailand@gmail.com</a>                </li>
				  </ul>
				</div>
		</div>
		  
		<div class="float-right">
				<div class="social-icons-top">
					<ul class="">
						<li><a title="" data-placement="bottom" data-toggle="tooltip" href="http://www.facebook.com/gertexhealthshop" class="circle-button" data-original-title="Facebook">
						<!--i class="fa fa-facebook"></i-->
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook_24.png">
						</a></li>
						<li><a title="" data-placement="bottom" data-toggle="tooltip" href="MAP.html" data-original-title="�Դ������"><!--i class="fa fa-map-marker"></i--><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Google-Maps-icon.png"></a></li>
						<li><a title="" data-placement="bottom" data-toggle="tooltip" href="p-line.html" data-original-title="Line"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/Line-24.png"></a>
						</li>
					</ul>
				</div>
		</div>
	
</div>
	</div><!-- .container -->

	<div class="container">
		<div class="">

			<!-- Start Nav -->
			<nav class="navbar navbar-expand-sm navbar-dark">
				
				<!-- nav logo -->
				<a class="navbar-brand" href="#"><img width="57" height="55" id="GERTEXlogo" name="GERTEXlogo" alt="GERTEX LOGO" src="<?php echo get_template_directory_uri(); ?>/assets/images/gertex-logo2.png"></a>
				
				<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation" >
					<span class="navbar-toggler-icon"></span>
				</button>

				
				<!-- The WordPress Menu goes here -->
				<?php 
				wp_nav_menu( array(
									'container'			=> 'div',
									'container_class'	=> 'navbar-collapse collapse',
									'container_id'      => 'navbarCollapse',
									'theme_location'	=> 'header-menu',
									'theme_location' => 'primary',
									'menu_class'     => 'primary-menu navbar-nav ml-auto',
									'fallback_cb'     => 'bs4navwalker::fallback',
									'walker'          => new bs4navwalker()
									));
				?>
					
						

			</nav>
		</div>
				
	</div>

</header>
<!-- Content Top -->
<?php if ( is_active_sidebar( 'content-top1' )) : ?>
	<section ><?php dynamic_sidebar( 'content-top1' ); ?></section>
<?php endif; ?>