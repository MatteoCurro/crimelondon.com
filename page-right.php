<?php 
/*
Template Name: Fullscreen right text
*/
get_header(); ?>
<div class="page-wrap">
	<div class="content">

	<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>

		<?php if( $attachments->exist() ) : ?>

		    <?php while( $attachments->get() ) : ?>
	  			<div class="sfondo" style="background-image: url(http://www.crimelondon.com/wp-content/uploads/contact.jpg);
background-size: contain;
background-position: top left;
position: fixed;
top: 0;
left: 0;
right: 0;
bottom: 0;
background-repeat: no-repeat;
z-index: -1">
			    	<!-- <img src="<?php echo $attachments->src( 'full' ); ?>"> -->
	    		</div>
			<?php endwhile; ?>

		<?php endif; ?>

	<div class="right_text">
	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		
		<h1><?php the_title() ?></h1>
			<?php 
			$subtitle = get_post_meta(get_the_ID(), 'kldg_subtitle', true);
			if ($subtitle) {
				echo '<h2>'.$subtitle.'</h2>'; 
			}
			?>

		<div class="text_content">
			<?php the_content(); ?>
		</div>

	<?php endwhile; endif; ?>
	</div>

	</div>
</div>
<?php get_footer(); ?>
