<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package zbratheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?> class=" <?php if ( is_front_page() ) : ?><?php $header_image = get_header_image(); if ( ! empty( $header_image ) ) { ?> header-on<?php } endif;?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php wp_head(); ?>
    <script>
jQuery(window).load(function() {
jQuery('#hero').enllax();
});</script>
</head>

<body <?php body_class(); ?>>

<header>	
<?php if ( is_front_page() ) : 
$header_image = get_header_image();
if ( ! empty( $header_image ) ) { ?>
<section id="header-image">
<div class="header-image" style="background:url('<?php echo esc_url( $header_image ); ?>')">
    <div class="primary-text">
        <h1><?php echo get_theme_mod( 'welcome_textbox1', 'Welcome to The Boostrap  Theme' ); ?></h1>
    </div>
    <div class="secondary-text">
        <h3><i><?php echo get_theme_mod( 'welcome_textbox2', 'FREE RESPONSIVE, MULTIPURPOSE BUSINESS AND CORPORATE THEME PERFECT FOR ANY ONE.' ); ?></i></h3>
    </div>
    <div class="header-entry">
        <p><?php echo get_theme_mod( 'textarea_setting', 'Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet Lorem ipsum dolor sit amet conse ctetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore Lorem ipsum dolor sit amet' ); ?></p> 
        <a href="<?php echo get_theme_mod( 'welcome_button', 'http://thebootstrapthemes.com' ); ?>" title="Read More" class="btn btn-danger">Read More</a>
    </div>
</div>

</section> <!-- /.end of section -->
<?php } endif; ?>
<section class="logo-menu">
	<nav class="navbar navbar-default  <?php if (! is_home() && ! is_front_page() ) : ?>navbar-fixed-top <?php endif; ?>" id="topNav">
		<div class="container-fluid">
					<!-- Brand and toggle get grouped for better mobile display -->
				    <div class="navbar-header">
				      	<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					        <span class="sr-only">Toggle navigation</span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
					        <span class="icon-bar"></span>
				      	</button>
				      	<div class="logo-tag">
          			<?php if (get_theme_mod('logo_image') != '') : ?>	                            
                        <a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><img src="<?php echo get_theme_mod('logo_image'); ?>" alt="<?php bloginfo('name'); ?>" /></a>
                    
                    <?php else : ?>
                        <h1 class="logo"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>                            
	                    <h2 class="site-description"><?php bloginfo('description'); ?></h2>
                <?php endif; ?>
      			</div>
				    </div>

					<!-- Collect the nav links, forms, and other content for toggling -->
					<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
						<form  class="navbar-form navbar-right" role="search">
							<ul class="nav pull-right">
								<div class="main-search">
									<button class="btn btn-search" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
									  <i class="fa fa-search"></i>
									</button>
									<div class="search-box collapse" id="collapseExample">
											<div class="well search-well">
										    <form method="get" action="<?php echo esc_url( home_url( '/' ) ); ?>">
                          						<input type="text" class="form-control" placeholder="Search a keyword" value="<?php echo get_search_query(); ?>" name="s">
                          					</form>
											</div>
									</div>
								</div>
							</ul>
						</form>
  							
						<?php
				            wp_nav_menu( array(
				                'menu'              => 'primary',
				                'theme_location'    => 'primary',
				                'depth'             => 8,
				                'container'         => 'div',
				                'menu_class'        => 'nav navbar-nav navbar-right',
				                'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
				                'walker'            => new wp_bootstrap_navwalker())
				            );
				        ?>
				    </div> <!-- /.end of collaspe navbar-collaspe -->
	</div> <!-- /.end of container -->
	</nav>
</section> <!-- /.end of section -->
</header>