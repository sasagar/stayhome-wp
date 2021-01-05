<?php
/**
 * ForbbPress - Topic Archive
 *
 * @package bbPress
 * @subpackage Theme
 */

get_header(); ?>

<div class="content-container">
	<?php get_template_part( 'forum', 'header' ); ?>
	<div class="container">
		<?php do_action( 'bbp_before_main_content' ); ?>

		<?php do_action( 'bbp_template_notices' ); ?>

		<div id="topic-front" class="bbp-topics-front">
			<h1 class="entry-title"><?php bbp_topic_archive_title(); ?></h1>
			<div class="entry-content">

				<?php bbp_get_template_part( 'content', 'archive-topic' ); ?>

			</div>
		</div><!-- #topics-front -->

		<?php do_action( 'bbp_after_main_content' ); ?>
	</div>
</div>

<?php
get_footer();
