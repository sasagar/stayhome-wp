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
	wp_enqueue_style( 'mplus-webfont', 'https://fonts.googleapis.com/css?family=M+PLUS+1p:400,700&display=swap', array( 'reboot' ), filemtime( get_template_directory() . '/style.css' ) );
	wp_enqueue_style( 'main', get_stylesheet_uri(), array( 'reboot', 'mplus-webfont' ), filemtime( get_template_directory() . '/style.css' ) );

	wp_enqueue_script( 'vticker', get_template_directory_uri() . '/js/jquery.vticker.min.js', array( 'jquery' ), filemtime( get_template_directory() . '/js/jquery.vticker.min.js' ), false );
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
				'description' => 'Favicon画像を設定してください。(PNG形式)', // 設定項目の説明.
			)
		)
	);

	$wp_customize->add_setting( 'apple-icon' );

	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'apple-icon',
			array(
				'label'       => 'iOS用ホームスクリーンアイコン画像', // 設定項目のタイトル.
				'section'     => 'sha_theme_favicon_section', // 追加するセクションのID.
				'settings'    => 'apple-icon', // 追加する設定項目のID.
				'description' => 'iOSのホームスクリーンに追加したときに表示される画像を設定してください。(PNG形式 512px四方)', // 設定項目の説明.
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

	$wp_customize->add_section(
		'sha_theme_archive_section',
		array(
			'title'    => 'アーカイブヘッダー設定', // 項目名.
			'priority' => 25, // 優先順位.
		)
	);

	$post_types = array_diff(
		get_post_types(
			array( 'public' => true )
		),
		cptui_reserved_post_types(),
		array( 'forum', 'topic', 'reply' )
	);

	foreach ( $post_types as $type ) {
		$post_type_obj = get_post_type_object( $type );

		$wp_customize->add_setting( $type . '-archive-img' );

		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				$type . '-archive-img',
				array(
					'label'       => $post_type_obj->labels->name . 'アーカイブ用画像', // 設定項目のタイトル.
					'section'     => 'sha_theme_archive_section', // 追加するセクションのID.
					'settings'    => $type . '-archive-img', // 追加する設定項目のID.
					'description' => $post_type_obj->labels->name . '(' . $type . ')のアーカイブ用ヘッダー画像を選択してください。', // 設定項目の説明.
				)
			)
		);
	}

}
add_action( 'customize_register', 'sha_theme_customize_register' );

/**
 * Return logo img from theme customizer.
 */
function sha_get_the_logo_img_url() {
	return esc_url( get_theme_mod( 'logo_img' ) );
}

/**
 * Change archive title.
 *
 * @param String $title Title string.
 */
function sha_archive_title( $title ) {
	if ( is_category() ) {
		$title = single_cat_title( '', false );
	} elseif ( is_tag() ) {
		$title = single_tag_title( '', false );
	} elseif ( is_tax() ) {
		$title = single_term_title( '', false );
	} elseif ( is_post_type_archive() ) {
		$title = post_type_archive_title( '', false );
	} elseif ( is_date() ) {
		$title = get_the_time( '<time datetime="Y-m">Y年n月</time>' );
	} elseif ( is_search() ) {
		$title = '検索結果：' . esc_html( get_search_query( false ) );
	} elseif ( is_404() ) {
		$title = '「404」ページが見つかりません';
	}
	return $title;
};
add_filter( 'get_the_archive_title', 'sha_archive_title' );

/**
 * Favicon.
 */
function sha_favicon_insert() {
	if ( get_theme_mod( 'favicon' ) ) {
		echo '<link rel="icon" type="image/png" href="' . esc_url( get_theme_mod( 'favicon' ) ) . '">';
	}
	if ( get_theme_mod( 'apple-icon' ) ) {
		echo '<link rel="apple-touch-icon" sizes="512x512" href="' . esc_url( get_theme_mod( 'apple-icon' ) ) . '">';
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

	register_sidebar(
		array(
			'name'          => '404エラーページ用リンク',
			'id'            => 'widget-404',
			'description'   => '404エラーページの案内下に配置されるセクションです',
			'class'         => 'widget-404-section',
			'before_widget' => '<div class="widget widget-404">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3>',
			'after_title'   => '</h3>',
		)
	);
}

/**
 *
 * Plugin Name:       CF7 to Webhook - Discord Integration
 * Description:       Format data to send a webhook to discord
 * Version:           1.0.0
 * Author:            Mário Valney
 * Author URI:        https://mariovalney.com
 * Text Domain:       cf7-to-webhook-discord-integration
 *
 * @param Object $args Plugin object.
 */
function discord_ctz_post_request_args( $args ) {
	if ( empty( $args['body'] ) ) {
		return $args;
	}

	$body = json_decode( $args['body'], true );

	// Validate data. Add your own validation to change only this form.
	if ( $body['checkbox-recruitagreement'] ) {
		if ( $body['checkbox-recruitagreement'] ) {
			$agreement = '同意する';
		} else {
			$agreement = '同意しない';
		}

		$discord_body = array(
			'content' => '新規の入社申請が届きました。',
			'embeds'  => array(
				array(
					'title'       => '送信内容',
					'description' => '以下の内容で届いています。',
					'color'       => 34404,
					'fields'      => array(
						array(
							'name'  => 'ハンドルネーム',
							'value' => $body['your-hn'],
						),
						array(
							'name'  => '配信時の名前',
							'value' => $body['your-ytname'],
						),
						array(
							'name'  => 'Discordユーザー名',
							'value' => $body['your-discordtag'],
						),
						array(
							'name'  => '意気込み',
							'value' => $body['your-message'],
						),
						array(
							'name'  => '規約同意',
							'value' => $agreement,
						),
					),
				),
			),
		);
	} elseif ( $body['acceptance-contact'] ) {
		$discord_body = array(
			'content' => 'お問い合わせが届きました。',
			'embeds'  => array(
				array(
					'title'       => '送信内容',
					'description' => '以下の内容で届いています。',
					'color'       => 34404,
					'fields'      => array(
						array(
							'name'  => 'お名前',
							'value' => $body['your-name'],
						),
						array(
							'name'  => 'メールアドレス',
							'value' => $body['your-email'],
						),
						array(
							'name'  => 'タイトル',
							'value' => $body['your-subject'],
						),
						array(
							'name'  => '本文',
							'value' => $body['your-message'],
						),
					),
				),
			),
		);
	} elseif ( empty( $body ) || empty( $body['your-name'] ) || empty( $body['your-discordtag'] ) || empty( $body['your-email'] ) || empty( $body['your-message'] ) ) {
		return $args;
	}

	$args['body'] = wp_json_encode( $discord_body );

	return $args;
}

add_filter( 'ctz_post_request_args', 'discord_ctz_post_request_args' );

/**
 * Remove reCaptcha from except some pages.
 */
add_action(
	'wp_enqueue_scripts',
	function() {
		if ( is_page( array( 'contact', 'recruit' ) ) ) {
			return;
		}
		wp_deregister_script( 'google-recaptcha' );
	}
);

/**
 * Add redirection to home when login.
 *
 * @param String $redirect_to Redirect URL.
 * @return String $redirect_to Redirect URL.
 */
function sha_login_redirect( $redirect_to ) {
	$redirect_to = home_url( '/' );
	return $redirect_to;
}
add_action( 'login_redirect', 'sha_login_redirect' );

/**
 * Add redirection to home when logout.
 *
 * @param String $redirect_to Redirect URL.
 * @return String $redirect_to Redirect URL.
 */
function sha_logout_redirect( $redirect_to ) {
	$redirect_to = home_url( '/' );
	return $redirect_to;
}
add_action( 'logout_redirect', 'sha_logout_redirect' );

/**
 * Function to get the archive title.
 */
function sha_get_archive_title() {
	// アーカイブページじゃない場合、 false を返す.
	if ( ! is_archive() ) {
		return false;
	}

	// 日付アーカイブページなら.
	if ( is_date() ) {
		if ( is_year() ) {
			$date_name = get_query_var( 'year' ) . '年';
		} elseif ( is_month() ) {
			$date_name = get_query_var( 'year' ) . '年' . get_query_var( 'monthnum' ) . '月';
		} else {
			$date_name = get_query_var( 'year' ) . '年' . get_query_var( 'monthnum' ) . '月' . get_query_var( 'day' ) . '日';
		}

		// 日付アーカイブページかつ、投稿タイプアーカイブページでもある場合.
		if ( is_post_type_archive() ) {
			return $date_name . 'の' . post_type_archive_title( '', false );
		}
		return $date_name;
	}

	// 投稿タイプのアーカイブページなら.
	if ( is_post_type_archive() ) {
		return post_type_archive_title( '', false );
	}

	// 投稿者アーカイブページなら.
	if ( is_author() ) {
		return '投稿者' . get_queried_object()->data->display_name;
	}

	// それ以外(カテゴリ・タグ・タクソノミーアーカイブページ).
	return single_term_title( '', false );
}

/**
 * Manifest filter for PWA plugin.
 */
add_filter(
	'web_app_manifest',
	function( $manifest ) {
		$manifest['icons']      = array(
			array(
				'src'     => get_template_directory_uri() . '/images/pwa-icon.png',
				'sizes'   => '512x512',
				'type'    => 'image/png',
				'purpose' => 'any',
			),
			array(
				'src'     => get_template_directory_uri() . '/images/pwa-icon-maskable.png',
				'sizes'   => '465x465',
				'type'    => 'image/png',
				'purpose' => 'maskable',
			),
		);
		$manifest['short_name'] = 'StayHomeAir';
		$manifest['display']    = 'standalone';
		return $manifest;
	}
);

/**
 * Remove admin bar from frontend.
 */
add_filter( 'show_admin_bar', 'is_blog_admin' );
