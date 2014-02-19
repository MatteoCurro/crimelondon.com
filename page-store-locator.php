<?php 
/*
Template Name: Store Locator
*/
get_header(); ?>



	<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <?php endwhile; endif; ?>
     <div id="store-locator-container">
      
      <div id="form-container">
        <form id="user-location" method="post" action="#">
            <div id="form-input">
              <label for="address">Enter Address or Zip Code:</label>
              <input type="text" id="address" name="address" />
             </div>
            
            <div id="submit-btn"><input type="image" id="submit" name="submit" src="<?php bloginfo('template_directory'); ?>/img/submit.jpg" alt="Submit" /></div>
        </form>
      </div>

        <div id="loc-list">
            <ul id="list"></ul>
        </div>

      <div class="map-container">

        <div id="map"></div>
      </div>
    </div>



<?php get_footer(); ?>
