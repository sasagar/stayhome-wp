<?php
/**
 * Template Name: bbPress - Forums (Index)
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

			<div id="forum-front" class="bbp-forum-front">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">

					<?php the_content(); ?>

					<?php bbp_get_template_part( 'content', 'archive-forum' ); ?>

				</div>
			</div><!-- #forum-front -->

		<?php endwhile; ?>

		<?php do_action( 'bbp_after_main_content' ); ?>
	</div>
</div>

<?php
get_footer();
