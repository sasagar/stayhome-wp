<?php
/**
 * Index.php
 *
 * Fall back template for Theme.
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
	<div class="container">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				echo '<h1>';
				echo '<a href="' . esc_html( get_permalink() ) . '">';
				echo esc_html( get_the_title() );
				echo '</a>';
				echo '</h1>';
				the_content();
			}
		} else {
			?>
			<h1>
				Contents not found.
			</h1>
			<article>
				<p>記事が見つかりませんでした。</p>
			</article>
			<?php
		}
		?>
	</div>
</div>
<?php
get_footer();
