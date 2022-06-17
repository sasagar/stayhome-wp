<?php
/**
 * theme-my-login-login.php
 *
 * Theme my login plugin login template for Theme.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage StayHome2021
 * @author     SASAGAWA Kiyoshi <sasagawa@kent-and-co.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://stayhome.bktsk.com/
 * @since      1.1.0
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

				echo '<h1>社員ログイン</h1>';

				echo '<article>';
				the_content();
				echo '</article>';
			}
		} else {
			get_template_part( 'module', '404' );
		}
		?>
    </div>
</div>
<?php
get_footer();