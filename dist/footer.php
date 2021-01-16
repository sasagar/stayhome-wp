<?php
/**
 * Footer.php
 *
 * Main footer.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage StayHome2021
 * @author     SASAGAWA Kiyoshi <sasagawa@kent-and-co.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://stayhome.bktsk.com/
 * @since      1.0.0
 */

$locale_now = get_locale();
?>

<footer>
	<div class="upper">
		<div class="container">
		<?php
		if ( is_active_sidebar( 'footer-widget-l' ) ) :
			echo '<div class="footer-widget-l">';
			dynamic_sidebar( 'footer-widget-l' );
			echo '</div>';
		endif;
		if ( is_active_sidebar( 'footer-widget-c' ) ) :
			echo '<div class="footer-widget-c">';
			dynamic_sidebar( 'footer-widget-c' );
			echo '</div>';
		endif;
		if ( is_active_sidebar( 'footer-widget-r' ) ) :
			echo '<div class="footer-widget-r">';
			dynamic_sidebar( 'footer-widget-r' );
			echo '</div>';
		endif;
		?>
		</div>
	</div>
	<div class="lower">
		<div class="container">
			<div class="discraimer">
				<?php if ( 'en_US' === $locale_now ) : ?>
					All trademarks and logos are the properties of their respective holders. We don't put any &reg; or &trade; for each properties.<br>
					For inquiries regarding the content of each trademark, please contact from the trademark holder via <a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">contact form</a>.
				<?php else : ?>
					サイト内で用いられる会社名、システム名、製品名は、一般に各社の登録商標または商標です。<br>
					なお、サイト内では&reg;・&trade;などは記していません。各商標に関する記載内容のお問い合わせは、商標権をお持ちの方より<a href="<?php echo esc_url( home_url( '/contact' ) ); ?>">お問い合わせフォーム</a>からご連絡ください。
				<?php endif; ?>
			</div>
			<div class="copyright"><small>&copy; 2021 Stay Home Airlines.</small></div>
		</div>
	</div>
</footer>
<?php
wp_footer();
?>
</body>
</html>
