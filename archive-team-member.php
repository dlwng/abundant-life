<?php
/**
 * The template for displaying archive pages
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Abundant_Life
 */

get_header(); ?>

<div id="primary" class="content-area">
	<main id="main" class="main-container">

		<?php
		if ( have_posts() ) : ?>

		<header class="page-header">
			<h1>Team Members</h1>
		</header><!-- .page-header -->

		<?php
		/* Start the Loop */
			while ( have_posts() ) : the_post();

				$name = get_the_title();
				$position = types_render_field( "position" , array( ) );
				$phone = types_render_field( "phone", array( ) );
				$email = types_render_field( "email", array( ) );
				$id = get_the_ID();
				?>

				<div class="entry-content">
					<div class="headshot grid__col--1-of-3">
						<a href="<?php echo esc_url( get_permalink() ); ?>">
							<?php $headshot=the_post_thumbnail();
							echo $headshot;
							?>
						</a>
					</div>
					<div class="bio grid__col--2-of-3">
						<h1 class="name"><?php echo $name; ?></h1>
						<h2 class="position"><?php echo $position; ?></h2>
						<p class="phone"><?php echo $phone; ?></p>
						<p class="email"><?php echo $email; ?></p>
					</div>
				</div>


				<?php
					endwhile;

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
		</div><!-- #primary -->

		<?php
		get_footer();
