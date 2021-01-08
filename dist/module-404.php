<?php
/**
 * Module-404.php
 *
 * 404 error template module for Theme.
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

<h1>
	404 error. Page not found.
</h1>
<article>
	<section>
		<p>お探しのページが見つかりませんでした。</p>
		<p>サイト内のリンクから辿っている場合は、一時的な不具合の可能性がありますので、少し時間を置いて再度お試しください。</p>
		<p>他のサイトからたどり着いた方で、このページが表示されている方は、以下のリンクから該当しそうな物があるかご確認ください。</p>
	</section>
	<section>
		<?php
		if ( is_active_sidebar( 'widget-404' ) ) :
			echo '<div class="widget-404">';
			dynamic_sidebar( 'widget-404' );
			echo '</div>';
		endif;
		?>
	</section>
</article>
