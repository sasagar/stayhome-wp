<?php
/**
 * Single User
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

<div class="content-container">
<?php get_template_part( 'forum', 'header' ); ?>
	<div class="container">
		<?php do_action( 'bbp_before_main_content' ); ?>

		<div id="bbp-user-<?php bbp_current_user_id(); ?>" class="bbp-single-user">
			<div class="entry-content">

				<?php bbp_get_template_part( 'content', 'single-user' ); ?>

			</div><!-- .entry-content -->
		</div><!-- #bbp-user-<?php bbp_current_user_id(); ?> -->

		<?php do_action( 'bbp_after_main_content' ); ?>
	</div>
</div>

<?php
get_footer();
