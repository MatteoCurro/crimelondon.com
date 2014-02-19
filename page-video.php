<?php 
/*
Template Name: Video right text
*/
get_header(); ?>
<div class="page-wrap">
	<div class="content">

	<div class="right_text">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<h1><?php the_title() ?></h1>
			<?php 
			$subtitle = get_post_meta(get_the_ID(), 'kldg_subtitle', true);
			if ($subtitle) {
				echo '<h2>'.$subtitle.'</h2>'; 
			}
			?>

		<div class="text_content video">
			<?php the_content(); ?>
			<!-- This version of the embed code is no longer supported. Learn more: https://vimeo.com/help/faq/embedding --> <object width="500" height="281"><param name="allowfullscreen" value="true" /><param name="allowscriptaccess" value="always" /><param name="movie" value="http://vimeo.com/moogaloop.swf?clip_id=67805249&amp;force_embed=1&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=ffffff&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" /><embed src="http://vimeo.com/moogaloop.swf?clip_id=67805249&amp;force_embed=1&amp;server=vimeo.com&amp;show_title=0&amp;show_byline=0&amp;show_portrait=0&amp;color=ffffff&amp;fullscreen=1&amp;autoplay=0&amp;loop=0" type="application/x-shockwave-flash" allowfullscreen="true" allowscriptaccess="always" ></embed></object>		</div>

	<?php endwhile; endif; ?>
	</div>

	</div>
</div>

<?php get_footer(); ?>

