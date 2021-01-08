<?php
/**
 * Single.php
 *
 * Single post template for Theme.
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
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( 'full', array( 'class' => 'post-thumbnail' ) );
		} else {
			echo '<img src="' . esc_html( get_theme_mod( 'ogp_img', false ) ) . '" alt="' . esc_html( get_the_title() ) . '" class="default">';
		}
		?>
	</div>
	<div class="container">
		<?php
		if ( have_posts() ) {
			while ( have_posts() ) {
				the_post();

				echo '<h1>' . esc_html( get_the_title() ) . '</h1>';
				echo '<div class="article-meta-section-upper">';
				echo '	<div class="author">投稿者: ';
				the_author();
				echo '	</div>';
				echo '	<div class="published-date">';
				echo '		<span>最終更新日: <time>' . esc_html( get_the_modified_date() ) . '</time></span>';
				echo '		<span>公開日: <time>' . esc_html( get_the_date() ) . '</time></span>';
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

				echo '<article>';
				the_content();
				echo '</article>';

				if ( get_previous_post() || get_next_post() ) :
					echo '<div class="pagenation">';
					echo '<section>';
					if ( get_previous_post() ) :
						echo '<div class="link">';
						previous_post_link( '&laquo; %link', '前の記事: %title' );
						echo '</div>';
					else :
						echo '<div class="dummy"></div>';
					endif;
					if ( get_next_post() ) :
						echo '<div class="link">';
						next_post_link( '%link &raquo;', '次の記事: %title' );
						echo '</div>';
					else :
						echo '<div class="dummy"></div>';
					endif;
					echo '</section>';
					echo '</div>';
				endif;
			}
			comments_template();
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
