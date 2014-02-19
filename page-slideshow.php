<?php 
/*
Template Name: Slideshow
*/
get_header(); ?>

<?php /* $attachments = new Attachments( 'attachments' );  ?>
<?php if( $attachments->exist() ) : ?>
  <h3>Attachments</h3>
  <p>Total Attachments: <?php echo $attachments->total(); ?></p>
  <ul>
    <?php while( $attachments->get() ) : ?>
      <li>
        ID: <?php echo $attachments->id(); ?><br />
        Type: <?php echo $attachments->type(); ?><br />
        Subtype: <?php echo $attachments->subtype(); ?><br />
        URL: <?php echo $attachments->url(); ?><br />
        Image: <?php echo $attachments->image( 'thumbnail' ); ?><br />
        Source: <?php echo $attachments->src( 'full' ); ?><br />
        Size: <?php echo $attachments->filesize(); ?><br />
        Title Field: <?php echo $attachments->field( 'title' ); ?><br />
        Caption Field: <?php echo $attachments->field( 'caption' ); ?>
      </li>
    <?php endwhile; ?>
  </ul>
<?php endif; */ ?>

	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
		<a href="" id="arrow_left"><img src="<?php bloginfo('template_directory'); ?>/img/arrow_left.png" alt="Slide Left" /></a>
		<a href="" id="arrow_right"><img src="<?php bloginfo('template_directory'); ?>/img/arrow_right.png" alt="Slide Right" /></a>
		<img id="cycle-loader" src="<?php bloginfo('template_directory'); ?>/img/ajax-loader.gif" />

		 <div class="maximage">
		 	<?php $attachments = new Attachments( 'attachments' ); /* pass the instance name */ ?>
			<?php if( $attachments->exist() ) : ?>
			    <?php while( $attachments->get() ) : ?>
			        <img src="<?php echo $attachments->src( 'full' ); ?>" alt="<?php echo $attachments->field( 'title' ); ?>">
			    <?php endwhile; ?>
			<?php endif; ?>
		</div>

		<?php endwhile; endif; ?>

<?php get_footer(); ?>
