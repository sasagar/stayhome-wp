<?php
/**
 * Header.php
 *
 * Main header.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage StayHome2021
 * @author     SASAGAWA Kiyoshi <sasagawa@kent-and-co.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://stayhome.bktsk.com/
 * @since      1.0.0
 */

?>
<!doctype html>
<html lang="<?php bloginfo( 'language' ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
	<header>
		<div class="container">
			<?php
			if ( is_front_page() || is_home() ) {
				echo '<h1>';
			} else {
				echo '<h2>';
			}
			?>
				<a href="<?php echo esc_url( home_url() ); ?>">
					<?php
					if ( sha_get_the_logo_img_url() ) {
						echo '<img src="' . esc_url( sha_get_the_logo_img_url() ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '" class="mainlogo">';
					} else {
						bloginfo( 'name' );
					}
					?>
				</a>
				<?php
				$flag = get_option( 'va_alliance' );
				if ( $flag['chk'] ) {
					echo '<div class="vaj-logo">';
					echo '<img src="' . esc_url( get_template_directory_uri() ) . '/images/VA-JPN.svg" alt="A member of Virtual Airlines Japan" class="vaj-logo-img">';
					echo '</div>';
				}
				?>
			<?php
			if ( is_front_page() || is_home() ) {
				echo '</h1>';
			} else {
				echo '</h2>';
			}
			?>
			<div class="header-l">
				<?php
				if ( is_user_logged_in() ) {
					?>
					<a href="<?php echo esc_url( home_url( '/logout/' ) ); ?>" class="login hidesp hidetab">ログアウト</a>
					<?php
				} else {
					?>
					<a href="<?php echo esc_url( home_url( '/login/' ) ); ?>" class="login hidesp hidetab">社員ログイン</a>
					<?php
				}
				?>
				<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'global',
						'container_class' => 'menu-global-container hidesp hidetab',
					)
				);
				?>
				<div class="sp-menu-global-container hidepc">
					<div class="menu-button" id="sp-menu-toggle"></div>
					<?php
					wp_nav_menu(
						array(
							'theme_location'  => 'sp-global',
							'container_class' => 'sp-menu-global-menu',
						)
					);
					?>
				</div>
				<script>
					jQuery(function() {
						jQuery('#sp-menu-toggle').click(function() {
							jQuery(this).toggleClass('openlink');
							jQuery(this).next('.sp-menu-global-menu').slideToggle();
						});
					});
				</script>
			</div>
		</div>
	</header>
