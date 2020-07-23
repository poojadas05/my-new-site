<?php
/**
 * The main template file.
 *
 * Used to display the homepage when home.php doesn't exist.
 */
?>
<?php get_header(); ?>
	<div id="page" class="home-page">
		<div class="article">
			<?php if ( have_posts() ) :
				$foodie_blog_full_posts = get_theme_mod('foodie_blog_full_posts');
				while ( have_posts() ) : the_post();
					foodie_blog_archive_post();
				endwhile;
				foodie_blog_post_navigation();
			endif; ?>
		</div><!-- .article -->
		<?php get_sidebar(); ?>
		</div>
		<?php get_footer(); ?>
