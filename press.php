<?php

/* Template Name: Press */

get_header(); ?>
<div class="page-wrap"><!-- not needed? up to you: http://camendesign.com/code/developpeurs_sans_frontieres -->
  <div class="content clearfix">
    <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
        
  <?php
    $press = new Pod('press');
    $press->findRecords('date DESC');       
    $total_press = $press->getTotalRows();
  ?>
  
  <?php if( $total_press>0 ) : ?>
    <?php while ( $press->fetchRecord() ) : ?>
      
      <?php
        // set our variables
        $press_name        = $press->get_field('press_name');
        $press_url        = $press->get_field('press_url');
        $press_image      = $press->get_field('press_image');
        $press_box_image      = $press->get_field('press_box_image');
      ?>
      
      <div class="single_press">
        <a href="<?php echo $press_box_image[0]['guid'] ?>" rel="lightbox" title="<?php echo $press_url; ?>"><?php echo wp_get_attachment_image( $press_image[0]['ID'], 'press', FALSE, array('alt' => $press_name) ); ?></a>
      </div>
      <!-- /member -->
      
    <?php endwhile ?>
  <?php endif ?>

<?php endwhile; endif; ?>

  </div>
</div>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/_/js/prototype.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/_/js/scriptaculous.js?load=effects,builder"></script>
<?php get_footer(); ?>