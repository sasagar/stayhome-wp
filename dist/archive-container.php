<?php
/**
 * Archive-container.php
 *
 * Main loop of archives for Theme.
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

<div class="container">
	<?php
	if ( have_posts() ) {
		echo '<article>';
		echo '<h1>';
		the_archive_title();
		echo '</h1>';

		while ( have_posts() ) {
			the_post();

			echo '<section>';
			echo '<h2>';
			echo '<a href="' . esc_html( get_permalink() ) . '">';
			echo esc_html( get_the_title() );
			echo '</a>';
			echo '</h2>';

			echo '<div class="article-meta-section-upper">';

			echo '	<div class="published-date">';
			echo '		<span>公開日: <time>' . esc_html( get_the_date() ) . '</time></span>';
			echo '	</div>';

			echo '</div>';

			the_excerpt();
			echo '</section>';
		}

		echo '</article>';

		if ( function_exists( 'wp_pagenavi' ) ) {
			wp_pagenavi();
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
