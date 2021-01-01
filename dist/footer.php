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

?>

<footer>
	<div class="upper">
		<div class="container">
		<?php
		if ( is_active_sidebar( 'footer-widget-l' ) ) :
			dynamic_sidebar( 'footer-widget-l' );
		endif;
		if ( is_active_sidebar( 'footer-widget-c' ) ) :
			dynamic_sidebar( 'footer-widget-c' );
		endif;
		if ( is_active_sidebar( 'footer-widget-r' ) ) :
			dynamic_sidebar( 'footer-widget-r' );
		endif;
		?>
		</div>
	</div>
	<div class="lower">
		<div class="container">
			<div class="copyright"><small>&copy; 2021 Stay Home Airlines.<small></div>
		</div>
	</div>
</footer>
<?php
wp_footer();
?>
</body>
</html>
