<?php
/**
 * Blog.php
 *
 * Blog page template for Theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage StayHome2021
 * @author     SASAGAWA Kiyoshi <sasagawa@kent-and-co.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://stayhome.bktsk.com/
 * @since      1.0.0
 */

/**
 * Template Name: ブログアーカイブ用テンプレート
 */

?>

<?php
$pagenation = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
get_header();
?>

<div class="content-container">
	<div class="content-header">
		<?php
			echo '<img src="' . esc_html( get_theme_mod( 'ogp_img', false ) ) . '" alt="' . esc_html( get_the_title() ) . '">';
		?>
	</div>
	<div class="container">
		<?php
		$args = array(
			'post_type' => 'post',
			'paged'     => $pagenation,
		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			echo '<article>';
			echo '<h1>ブログ</h1>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<section>';
				echo '<h2>' . esc_html( get_the_title() ) . '</h2>';
				echo '<div class="published-date">';
				echo '<span>最終更新日: <time>' . esc_html( get_the_modified_date() ) . '</time></span>';
				echo '<span>公開日: <time>' . esc_html( get_the_date() ) . '</time></span>';
				echo '</div>';
				the_excerpt();
				echo '</section>';
			}
			echo '</article>';

			if ( function_exists( 'wp_pagenavi' ) ) {
					wp_pagenavi( array( 'query' => $the_query ) );
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
