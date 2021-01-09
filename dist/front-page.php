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
	<div class="slick-inner-container">
	<?php
	echo do_shortcode( '[slick-carousel-slider design="design-6" centermode="true" slidestoshow="3" category="10" image_fit="true" sliderheight="300" autoplay="true" autoplay_interval="5000" speed="1000" extra_class="skip-lazy" lazyload="ondemand"]' );
	?>
	</div>
</div>

<div class="ticker-container">
	<div class="container">
		<h2 class="newsheading">
			ニュースリリース
		</h2>
		<div id="newsticker">
			<ul>
				<?php
				$args = array(
					'post_type'      => 'news',
					'posts_per_page' => 4,
				);

				$news_query = new WP_Query( $args );

				if ( $news_query->have_posts() ) {
					while ( $news_query->have_posts() ) {
						$news_query->the_post();
						echo '<li>';
						the_date( 'Y-m-d', '<time>', '</time>' );
						echo '<a href="' . esc_url( get_permalink() ) . '">' . esc_html( get_the_title() ) . '</a>';
						echo '</li>';
					}
				} else {
					echo '<li>';
					echo '<a href="#">Coming soon.</a>';
					echo '</li>';
				}
				wp_reset_postdata();
				?>
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

<?php
if ( is_user_logged_in() ) :
	$user         = wp_get_current_user();
	$display_name = $user->display_name;
	?>
	<div class="front-logged-in-container">
		<div class="container front-logged-in">
			<h2>
				Welcome back, <?php echo esc_html( $display_name ); ?>!
			</h2>
			<ul>
				<li>
					<h3>社員専用フォーラム</h3>
					<p>
						社員用のフォーラムはこちらから入る事ができます。
					</p>
					<div class="button-container">
						<a href="/forums/">フォーラムへ</a>
					</div>
				</li>
				<li>
					<h3>マイページ</h3>
					<p>
						フォーラムのマイページはこちらから入る事ができます。
					</p>
					<div class="button-container">
					<?php
					$user    = wp_get_current_user();
					$user_id = $user->user_nicename;
					?>
						<a href="<?php echo esc_url( home_url( '/forums/users/' . $user_id ) ); ?>">
							マイページ
						</a>
					</div>
				</li>
				<?php
				if ( current_user_can( 'administrator' ) || current_user_can( 'editor' ) || current_user_can( 'author' ) || current_user_can( 'contributor' ) ) :
					?>
					<li>
						<h3>管理画面</h3>
						<p>
							ブログ投稿・フォーラム設置などの画面です。（権限別で表示内容が変わります。）
						</p>
						<div class="button-container">
							<a href="<?php echo esc_url( site_url( '/wp-admin/' ) ); ?>">
								管理画面
							</a>
						</div>
					</li>
					<?php
				endif;
				?>
			</ul>
		</div>
		<!-- <img class="bg-logo" src="<?php echo esc_url( get_template_directory_uri() ); ?>/images/hp-hol-ol.svg" alt="SHAロゴ" aria-hidden="true"> -->
	</div>
	<?php
endif;
?>

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
				<a href="/about-us/">詳しく見る</a>
			</div>
		</li>
		<li>
			<h3>Divisions</h3>
			<p>
				Stay Home Airlinesでは、社員それぞれのスキルアップを目指すため部門を分けています。各部門をご紹介します。
			</p>
			<div class="button-container">
				<a href="/division/">詳しく見る</a>
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
				<a href="/recruit/">詳しく見る</a>
			</div>
		</li>
	</ul>
</div>

<div class="front-blog-container">
	<div class="container front-blog">
		<h2>
			ブログ
		</h2>

		<ul>
		<?php

		$args = array(
			'post_type'      => 'post',
			'posts_per_page' => 4,
		);

		$blog_query = new WP_Query( $args );

		if ( $blog_query->have_posts() ) {
			while ( $blog_query->have_posts() ) {
				$blog_query->the_post();
				?>
			<li>
				<h3><?php the_title(); ?></h3>
				<?php the_excerpt(); ?>
				<div class="button-container">
					<a href="<?php the_permalink(); ?>">続きを読む</a>
				</div>
			</li>

				<?php
			}

			$blog_count = $blog_query->post_count;
			if ( 4 > $blog_count ) {
				while ( 4 > $blog_count ) {
					$blog_count++;
					?>
					<li>
						<h3>Coming Soon</h3>
						<p>
							他のブログ公開までお待ちください！
						</p>
					</li>
					<?php
				}
			}
		} else {
			$blog_count = 0;
			if ( 4 > $blog_count ) {
				while ( 4 > $blog_count ) {
					$blog_count++;
					?>
					<li>
						<h3>Coming Soon</h3>
						<p>
							他のブログ公開までお待ちください！
						</p>
					</li>
					<?php
				}
			}
		}

		wp_reset_postdata();
		?>
		</ul>
	</div>
</div>

<div class="front-event-container">
	<div class="container front-event">
		<h2>
			イベント
		</h2>

		<ul>
		<?php

		$args = array(
			'post_type'      => 'event',
			'posts_per_page' => 4,
		);

		$event_query = new WP_Query( $args );

		if ( $event_query->have_posts() ) {
			while ( $event_query->have_posts() ) {
				$event_query->the_post();
				?>
			<li>
				<?php
				$terms = get_the_terms( $post->ID, 'event_taxonomy' );
				foreach ( $terms as $eterm ) {
					echo '<div class="event-tax">';
					echo esc_html( $eterm->name );
					echo '</div>';
				}
				?>
				<h3><?php the_title(); ?></h3>
					<?php the_excerpt(); ?>
				<div class="button-container">
					<a href="<?php the_permalink(); ?>">続きを読む</a>
				</div>
			</li>

				<?php
			}

			$event_count = $event_query->post_count;
			if ( 4 > $event_count ) {
				while ( 4 > $event_count ) {
					$event_count++;
					?>
					<li>
						<h3>Coming Soon</h3>
						<p>
							他のイベント情報・報告の公開までお待ちください！
						</p>
					</li>
					<?php
				}
			}
		} else {
			$event_count = 0;
			if ( 4 > $event_count ) {
				while ( 4 > $event_count ) {
					$event_count++;
					?>
					<li>
						<h3>Coming Soon</h3>
						<p>
							他のイベント情報・報告までお待ちください！
						</p>
					</li>
					<?php
				}
			}
		}

		wp_reset_postdata();
		?>
		</ul>
	</div>
</div>
<?php
get_footer();
