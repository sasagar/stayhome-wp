<?php
/**
 * Front-page.php
 *
 * Front page template for Theme.
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

<?php
echo do_shortcode( '[slick-slider design="design-1" image_size="original" image_fit="true" autoplay="true" autoplay_interval="5000" slidestoshow="1" category="10"]' );
?>

<?php
get_footer();
