<?php
/**
 * Englishlog.php
 *
 * Blog page english version template for Theme.
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
 * Template Name: 英文ブログアーカイブ用テンプレート
 */

?>

<?php
$pagenation = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
get_header();
?>

<div class="content-container">
	<div class="content-header">
	<?php
	if ( has_post_thumbnail() ) {
		the_post_thumbnail();
	} else {
		echo '<img src="' . esc_html( get_theme_mod( 'ogp_img', false ) ) . '" alt="' . esc_html( get_the_title() ) . '">';
	}
	?>
	</div>
	<div class="container">
		<?php
		$args = array(
			'post_type' => 'post',
			'paged'     => $pagenation,
			'lang'      => 'en',
		);

		$the_query = new WP_Query( $args );

		if ( $the_query->have_posts() ) {
			echo '<article>';
			echo '<h1>Blog</h1>';
			while ( $the_query->have_posts() ) {
				$the_query->the_post();
				echo '<section>';

				echo '<h2>';
				echo '<a href="' . esc_html( get_permalink() ) . '">';
				echo esc_html( get_the_title() );
				echo '</a>';
				echo '</h2>';

				echo '<div class="article-meta-section-upper">';

				echo '	<div class="author">Author: ';
				the_author();
				echo '	</div>';

				echo '	<div class="published-date">';
				echo '		<span>Last update on: <time>' . esc_html( get_the_modified_date() ) . '</time></span>';
				echo '		<span>Published on: <time>' . esc_html( get_the_date() ) . '</time></span>';
				echo '	</div>';

				echo '</div>';

				echo '<div class="article-meta-section-lower">';

				echo '	<div class="categories">';
				echo '		<span>';
				the_category( '</span><span>' );
				echo '		</span>';
				echo '	</div>';

				the_tags( '<div class="tags"><span>', '</span><span>', '</span></div>' );

				echo '</div>';

				the_excerpt();

				echo '</section>';
			}
			echo '</article>';

			if ( function_exists( 'wp_pagenavi' ) ) {
					wp_pagenavi( array( 'query' => $the_query ) );
			}
		} else {
			get_template_part( 'module', '404' );
		}
		?>
	</div>
</div>
<?php
get_footer();
