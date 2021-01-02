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
<html lang="<?php bloginfo( 'lang' ); ?>">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( $class ); ?>>
	<header>
		<div class="container">
			<h1>
				<?php
				if ( sha_get_the_logo_img_url() ) {
					echo '<img src="' . esc_url( sha_get_the_logo_img_url() ) . '" alt="' . esc_html( get_bloginfo( 'name' ) ) . '">';
				} else {
					bloginfo( 'name' );
				}
				?>
			</h1>
			<?php
			wp_nav_menu(
				array(
					'theme_location' => 'main-menu',
				)
			);
			?>
		</div>
	</header>
