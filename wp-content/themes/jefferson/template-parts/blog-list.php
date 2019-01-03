<div id="primary" class="content-area">
	<main id="main" class="site-main">
		<?php if ( have_posts() ) : ?>
			<?php /* Start the Loop */ ?>
			<?php while ( have_posts() ) : the_post(); ?>
				<?php
				get_template_part( 'template-parts/content', get_post_format() );
				?>
			<?php endwhile; ?>
			<?php jefferson_pagination(); ?>
		<?php else : ?>
			<?php get_template_part( 'template-parts/content', 'none' ); ?>
		<?php endif; ?>
	</main><!-- #main -->
</div><!-- #primary -->