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

<div class="slick-container">
<?php
echo do_shortcode( '[slick-carousel-slider design="design-6" centermode="true" slidestoshow="3" category="10" image_fit="true" sliderheight="300" autoplay="true" autoplay_interval="5000" speed="1000"]' );
?>
</div>

<div class="ticker-container">
	<div class="container">
		<h2 class="newsheading">
			ニュースリリース
		</h2>
		<div id="newsticker">
			<ul>
				<li>
					<time>2020-01-01</time>
					<a href='#'>タイトルがここに入ります。</a>
				</li>
				<li>
					<time>2020-01-02</time>
					<a href='#'>タイトルがここに入ります。</a>
				</li>
				<li>
					<time>2020-01-03</time>
					<a href='#'>タイトルがここに入ります。</a>
				</li>
				<li>
					<time>2020-01-04</time>
					<a href='#'>タイトルがここに入ります。</a>
				</li>
			</ul>
		</div>
	</div>
</div>
<script type="text/javascript">
jQuery(function() {
	jQuery('#newsticker').vTicker('init', {
		mousePause:false,
		pause: 5000,
		speed: 1000
	});
});
</script>

<div class="container front-about">
	<h2>
		Stay Home Airlinesについて
	</h2>
	<ul>
		<li>
			<h3>About us</h3>
			<p>
				フライトシミュレーターにおけるヴァーチャルエアラインや私たちStay Home Airlinesについてご紹介します。
			</p>
			<div class="button-container">
				<a href="#">詳しく見る</a>
			</div>
		</li>
		<li>
			<h3>Divisions</h3>
			<p>
				Stay Home Airlinesでは、社員それぞれのスキルアップを目指すため部門を分けています。各部門をご紹介します。
			</p>
			<div class="button-container">
				<a href="#">詳しく見る</a>
			</div>
		</li>
		<li>
			<h3>Events</h3>
			<p>
				過去に開催した社内イベントなどについてご報告します。社内の雰囲気などを感じて頂けたらと思います。
			</p>
			<div class="button-container">
				<a href="<?php echo esc_url( home_url( '/event/' ) ); ?>">詳しく見る</a>
			</div>
		</li>
		<li>
			<h3>Recruit</h3>
			<p>
				Stay Home Airlinesはフライトシミュレーターのスキルアップを目指す皆さんを募集しています。
			</p>
			<div class="button-container">
				<a href="#">詳しく見る</a>
			</div>
		</li>
	</ul>
</div>

<?php
get_footer();
