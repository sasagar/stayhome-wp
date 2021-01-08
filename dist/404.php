<?php
/**
 * 404.php
 *
 * 404 error template for Theme.
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
		<?php get_template_part( 'module', '404' ); ?>
	</div>
</div>
<?php
get_footer();
