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
}
add_action( 'wp_enqueue_scripts', 'sha_load_scripts' );

/**
 * Theme customizer.
 *
 * @param Object $wp_customize customizer instance.
 */
function sha_theme_customize_register( $wp_customize ) {
	// この中に追加していく（セクション、セッティング、コントロール）.
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
		new WP_Customize_Image_Control(
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
}
add_action( 'customize_register', 'sha_theme_customize_register' );

/**
 * Return logo img from theme customizer.
 */
function sha_get_the_logo_img_url() {
	return esc_url( get_theme_mod( 'logo_img' ) );
}

/**
 * Add nav menu.
 */
function sha_register_menus() {
	register_nav_menus(
		array(
			'global'      => 'ヘッダーグローバルナビ',
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
			'before_widget' => '<div class="widget">',
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
			'before_widget' => '<div class="widget">',
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
			'before_widget' => '<div class="widget">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}
