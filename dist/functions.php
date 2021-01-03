<?php
/**
 * Functions.php
 *
 * Functions for themes.
 *
 * @category   Components
 * @package    WordPress
 * @subpackage StayHome2021
 * @author     SASAGAWA Kiyoshi <sasagawa@kent-and-co.com>
 * @license    https://www.gnu.org/licenses/gpl-3.0.txt GNU/GPLv3
 * @link       https://stayhome.bktsk.com/
 * @since      1.0.0
 */

// theme supports.
add_theme_support( 'html5' );
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails' );


/**
 * Load styles and scripts.
 * */
function sha_load_scripts() {
	wp_enqueue_style( 'reboot', get_template_directory_uri() . '/reboot.css', '', filemtime( get_template_directory() . '/reboot.css' ) );
	wp_enqueue_style( 'mplus-webfont', 'https://fonts.googleapis.com/css?family=M+PLUS+1p', array( 'reboot' ), filemtime( get_template_directory() . '/style.css' ) );
	wp_enqueue_style( 'main', get_stylesheet_uri(), array( 'reboot', 'mplus-webfont' ), filemtime( get_template_directory() . '/style.css' ) );

	wp_enqueue_script( 'vticker', get_template_directory_uri() . '/js/jquery.vticker.min.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/jquery.vticker.min.css' ), false );
}
add_action( 'wp_enqueue_scripts', 'sha_load_scripts' );

/**
 * Theme customizer.
 *
 * @param Object $wp_customize customizer instance.
 */
function sha_theme_customize_register( $wp_customize ) {
	$wp_customize->add_section(
		'sha_theme_favicon_section',
		array(
			'title'    => 'Favicon設定', // 項目名.
			'priority' => 10, // 優先順位.
		)
	);

	$wp_customize->add_setting( 'favicon' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'favicon',
			array(
				'label'       => 'Favicon用画像', // 設定項目のタイトル.
				'section'     => 'sha_theme_favicon_section', // 追加するセクションのID.
				'settings'    => 'favicon', // 追加する設定項目のID.
				'description' => 'Favicon画像を設定してください。(PNG形式 512px四方)', // 設定項目の説明.
			)
		)
	);

	$wp_customize->add_section(
		'sha_theme_header_section',
		array(
			'title'    => 'ヘッダー設定', // 項目名.
			'priority' => 20, // 優先順位.
		)
	);

	$wp_customize->add_setting( 'logo_img' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'logo_img',
			array(
				'label'       => 'ロゴ画像', // 設定項目のタイトル.
				'section'     => 'sha_theme_header_section', // 追加するセクションのID.
				'settings'    => 'logo_img', // 追加する設定項目のID.
				'description' => 'ロゴ画像を設定してください。', // 設定項目の説明.
			)
		)
	);

	$wp_customize->add_setting(
		'va_alliance[chk]',
		array(
			'default' => false,
			'type'    => 'option',
		)
	);

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'va_alliance',
			array(
				'label'       => 'VA JAPAN ロゴ表示', // 設定項目のタイトル.
				'section'     => 'sha_theme_header_section', // 追加するセクションのID.
				'settings'    => 'va_alliance[chk]', // 追加する設定項目のID.
				'description' => 'Virtual Airlines Japanのロゴを表示するか選択します。', // 設定項目の説明.
				'type'        => 'checkbox',
			)
		)
	);

	$wp_customize->add_section(
		'sha_theme_ogp_section',
		array(
			'title'    => 'OGP設定', // 項目名.
			'priority' => 90, // 優先順位.
		)
	);

	$wp_customize->add_setting( 'ogp_img' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'ogp_img',
			array(
				'label'       => 'デフォルトOGP画像', // 設定項目のタイトル.
				'section'     => 'sha_theme_ogp_section', // 追加するセクションのID.
				'settings'    => 'ogp_img', // 追加する設定項目のID.
				'description' => '指定が無かったときにデフォルトで使用するOGP画像を設定してください。', // 設定項目の説明.
			)
		)
	);

	$wp_customize->add_setting( 'ogp_twaccount' );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ogp_twaccount',
			array(
				'label'       => 'Twitterアカウント', // 設定項目のタイトル.
				'section'     => 'sha_theme_ogp_section', // 追加するセクションのID.
				'settings'    => 'ogp_twaccount', // 追加する設定項目のID.
				'description' => 'Twitterアカウントを@付きで入力してください。', // 設定項目の説明.
				'type'        => 'text',
			)
		)
	);

	$wp_customize->add_setting( 'ogp_fb' );

	$wp_customize->add_control(
		new WP_Customize_Control(
			$wp_customize,
			'ogp_fb',
			array(
				'label'       => 'FB App ID', // 設定項目のタイトル.
				'section'     => 'sha_theme_ogp_section', // 追加するセクションのID.
				'settings'    => 'ogp_fb', // 追加する設定項目のID.
				'description' => 'Facebook App IDが有れば入力してください。', // 設定項目の説明.
				'type'        => 'text',
			)
		)
	);

}
add_action( 'customize_register', 'sha_theme_customize_register' );

/**
 * Return logo img from theme customizer.
 */
function sha_get_the_logo_img_url() {
	return esc_url( get_theme_mod( 'logo_img' ) );
}

/**
 * OGP output from theme customizer.
 */
function sha_ogp() {
	$og_img      = get_theme_mod( 'ogp_img', false );
	$og_twaccont = get_theme_mod( 'ogp_twaccount', false );
	$og_fb       = get_theme_mod( 'ogp_fb', false );

	if ( $og_img && $og_twaccont ) {

		if ( is_front_page() || is_home() || is_singular() ) {
			global $post;
			$ogp_title = '';
			$ogp_descr = '';
			$ogp_url   = '';
			$ogp_img   = '';
			$insert    = '';

			if ( is_singular() ) { // 記事＆固定ページ.
				setup_postdata( $post );
				$ogp_title = $post->post_title;
				$ogp_descr = mb_substr( get_the_excerpt(), 0, 100 );
				$ogp_url   = get_permalink();
				wp_reset_postdata();
			} elseif ( is_front_page() || is_home() ) { // トップページ.
				$ogp_title = get_bloginfo( 'name' );
				$ogp_descr = get_bloginfo( 'description' );
				$ogp_url   = home_url();
			}

			// og:type.
			$ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

			// og:image.
			if ( is_singular() && has_post_thumbnail() ) {
				$ps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full' );
				$ogp_img  = $ps_thumb[0];
			} else {
				$ogp_img = $og_img;
			}

			// 出力するOGPタグをまとめる.
			$insert .= '<meta property="og:title" content="' . esc_attr( $ogp_title ) . '">' . "\n";
			$insert .= '<meta property="og:description" content="' . esc_attr( $ogp_descr ) . '">' . "\n";
			$insert .= '<meta property="og:type" content="' . $ogp_type . '">' . "\n";
			$insert .= '<meta property="og:url" content="' . esc_url( $ogp_url ) . '">' . "\n";
			$insert .= '<meta property="og:image" content="' . esc_url( $ogp_img ) . '">' . "\n";
			$insert .= '<meta property="og:site_name" content="' . esc_attr( get_bloginfo( 'name' ) ) . '">' . "\n";
			$insert .= '<meta name="twitter:card" content="summary_large_image">' . "\n";
			$insert .= '<meta name="twitter:site" content="' . $og_twaccont . '">' . "\n";
			$insert .= '<meta property="og:locale" content="ja_JP">' . "\n";

			if ( $og_fb ) {
				$insert .= '<meta property="fb:app_id" content="' . $og_fb . '">' . "\n";
			}

			echo wp_kses(
				$insert,
				array(
					'meta' => array(
						'property' => array(),
						'name'     => array(),
						'content'  => array(),
					),
				)
			);
		}
	}
}

add_action( 'wp_head', 'sha_ogp' ); // headにOGPを出力.

/**
 * Favicon.
 */
function sha_favicon_insert() {
	if ( get_theme_mod( 'favicon' ) ) {
		echo '<link rel="icon" type="image/png" href="' . esc_url( get_theme_mod( 'favicon' ) ) . '">';
		echo '<link rel="apple-touch-icon" sizes="512x512" href="' . esc_url( get_theme_mod( 'favicon' ) ) . '">';
	}
}

add_action( 'wp_head', 'sha_favicon_insert' );

/**
 * Add nav menu.
 */
function sha_register_menus() {
	register_nav_menus(
		array(
			'global'      => 'ヘッダーグローバルナビ',
			'sp-global'   => 'SP用ヘッダーグローバルナビ',
			'footer-menu' => 'Footer Menu',
		)
	);
}
add_action( 'after_setup_theme', 'sha_register_menus' );


if ( function_exists( 'register_sidebar' ) ) {

	register_sidebar(
		array(
			'name'          => 'フッター左',
			'id'            => 'footer-widget-l',
			'description'   => 'フッターの左側に来るウィジェットエリアです。',
			'class'         => 'footer-left',
			'before_widget' => '<div class="widget footer-l">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'フッター中央',
			'id'            => 'footer-widget-c',
			'description'   => 'フッターの中央に来るウィジェットエリアです。',
			'class'         => 'footer-center',
			'before_widget' => '<div class="widget footer-c">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);

	register_sidebar(
		array(
			'name'          => 'フッター右',
			'id'            => 'footer-widget-r',
			'description'   => 'フッターの右に来るウィジェットエリアです。',
			'class'         => 'footer-right',
			'before_widget' => '<div class="widget footer-r">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
