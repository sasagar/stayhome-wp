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
<body <?php body_class( $class ); ?>>
	<header>
		<div class="container">
			<h1>
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
			</h1>
			<?php
			wp_nav_menu(
				array(
					'theme_location'  => 'global',
					'container_class' => 'menu-global-container',
				)
			);
			?>
		</div>
	</header>
