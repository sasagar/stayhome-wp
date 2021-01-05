<?php
/**
 * Template Name: bbPress - User Login
 *
 * @package bbPress
 * @subpackage Theme
 */

// No logged in users.
bbp_logged_in_redirect();

// Begin Template.
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

			<div id="bbp-login" class="bbp-login">
				<h1 class="entry-title"><?php the_title(); ?></h1>
				<div class="entry-content">

					<?php the_content(); ?>

					<div id="bbpress-forums" class="bbpress-wrapper">

						<?php bbp_breadcrumb(); ?>

						<?php bbp_get_template_part( 'form', 'user-login' ); ?>

					</div>
				</div>
			</div><!-- #bbp-login -->

		<?php endwhile; ?>

		<?php do_action( 'bbp_after_main_content' ); ?>
	</div>
</div>

<?php
get_footer();
