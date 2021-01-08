<?php
/**
 * Tag.php
 *
 * Tag archive template for Theme.
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

<?php
get_header();

?>

<div class="content-container">
	<div class="content-header">
		<?php
		if ( is_post_type_archive() ) {
			$archive_post_type = get_query_var( 'post_type' );
			$cover_url         = get_theme_mod( $archive_post_type . '-archive-img' );

			if ( $cover_url ) {
				echo '<img src="' . esc_html( $cover_url ) . '" alt="' . esc_html( get_the_title() ) . '">';
			} else {
				echo '<img src="' . esc_html( get_theme_mod( 'ogp_img', false ) ) . '" alt="' . esc_html( get_the_title() ) . '">';
			}
		} else {
			echo '<img src="' . esc_html( get_theme_mod( 'ogp_img', false ) ) . '" alt="' . esc_html( get_the_title() ) . '">';
		}
		?>
	</div>
	<?php get_template_part( 'archive', 'container' ); ?>
</div>
<?php
get_footer();
