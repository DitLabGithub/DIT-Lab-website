<?php
/**
 * The header for our theme
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site min-h-screen flex flex-col">
	<a class="skip-link screen-reader-text" href="#primary">Naar inhoud</a>

	<?php
	$is_home = is_front_page();
	$waves   = get_template_directory_uri() . '/assets/img/waves.png';
	?>
	<header id="masthead" class="relative isolate px-4 pt-4 <?php echo $is_home ? 'pb-32' : ''; ?>">
		<?php if ( $is_home ) : ?>
			<div class="absolute inset-0 -z-10 bg-cover bg-bottom bg-no-repeat [mask-image:linear-gradient(to_bottom,black_70%,transparent)]"
				style="background-image: url('<?php echo esc_url( $waves ); ?>');"></div>
		<?php endif; ?>
		<div class="max-w-[1400px] mx-auto flex items-center justify-between gap-6 rounded-full border border-ditlab-teal/40 shadow-sm bg-white px-6 py-2">

			<!-- Logo -->
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="shrink-0">
				<?php if ( has_custom_logo() ) :
					echo wp_get_attachment_image( get_theme_mod( 'custom_logo' ), 'full', false, array( 'class' => 'h-8 w-auto' ) );
				else : ?>
					<span class="text-xl font-bold text-ditlab-blue"><?php bloginfo( 'name' ); ?></span>
				<?php endif; ?>
			</a>

			<!-- Menu -->
			<nav id="site-navigation">
				<?php
				wp_nav_menu( array(
					'theme_location' => 'menu-1',
					'menu_id'        => 'primary-menu',
					'container'      => false,
					'menu_class'     => 'flex items-center gap-8 text-sm',
				) );
				?>
			</nav>
			<!-- Contact button -->
			<a href="<?php echo esc_url( home_url( '/contact/' ) ); ?>" class="btn shrink-0">Neem contact op</a>
		</div>
	</header>