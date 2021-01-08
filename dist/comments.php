<?php
/**
 * Comments.php
 *
 * Comments section template for Theme.
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

<div id="comments" class="comments">
	<?php if ( have_comments() ) : // コメントがあったらコメントリストを表示する. ?>
	<h3>コメント</h3>
	<ol class="commets-list">
		<?php wp_list_comments( 'avatar_size=80' ); ?>
	</ol>
	<?php endif; ?>

	<?php
	$args = array(
		'title_reply'  => 'コメントする',
		// 'comment_notes_before' => '<p>コメント記入欄の上に表示するメッセージ</p>',
		// 'comment_notes_after'  => '<p>コメント記入欄の下に表示するメッセージ</p>',
		'label_submit' => 'コメントを投稿',
	);
	comment_form( $args );
	?>
</div>
<!-- #comments -->
