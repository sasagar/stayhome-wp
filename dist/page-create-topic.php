<?php
/**
 * Template Name: bbPress - Create Topic
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

		<?php
		while ( have_posts() ) :
			the_post();
			?>

			<div id="bbp-new-topic" class="bbp-new-topic">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">

					<?php the_content(); ?>

					<?php bbp_get_template_part( 'form', 'topic' ); ?>

				</div>
			</div><!-- #bbp-new-topic -->

		<?php endwhile; ?>

		<?php do_action( 'bbp_after_main_content' ); ?>
	</div>
</div>

<?php
get_footer();
