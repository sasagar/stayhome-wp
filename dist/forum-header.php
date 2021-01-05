<?php
/**
 * Header section for bbPress.
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
<div class="forum-content-header">
	<div class="container">
		<h2>SHA社員専用フォーラム</h2>
	</div>
	<div class="container">
		<ul>
			<li>
				<a href="<?php echo esc_url( home_url( '/forums/' ) ); ?>">
					フォーラムトップ
				</a>
			</li>
			<li>
				<?php
				$user    = wp_get_current_user();
				$user_id = $user->user_nicename;
				?>
				<a href="<?php echo esc_url( home_url( '/forums/users/' . $user_id ) ); ?>">
					マイページ
				</a>
			</li>
		</ul>
	</div>
</div>
