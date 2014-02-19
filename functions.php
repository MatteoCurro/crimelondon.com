<?php
        // Translations can be filed in the /languages/ directory
        load_theme_textdomain( 'html5reset', TEMPLATEPATH . '/languages' );
 
        $locale = get_locale();
        $locale_file = TEMPLATEPATH . "/languages/$locale.php";
        if ( is_readable($locale_file) )
            require_once($locale_file);
	
	// Add RSS links to <head> section
	automatic_feed_links();
	
	// Load jQuery
	if ( !function_exists(core_mods) ) {
		function core_mods() {
			if ( !is_admin() ) {
				wp_deregister_script('jquery');
				wp_register_script('jquery', ("//code.jquery.com/jquery-1.9.1.min.js"), false);
				wp_enqueue_script('jquery');
			}
		}
		core_mods();
	}

	// Clean up the <head>
	function removeHeadLinks() {
    	remove_action('wp_head', 'rsd_link');
    	remove_action('wp_head', 'wlwmanifest_link');
    }
    add_action('init', 'removeHeadLinks');
    remove_action('wp_head', 'wp_generator');
    
    if (function_exists('register_sidebar')) {
    	register_sidebar(array(
    		'name' => __('Sidebar Widgets','html5reset' ),
    		'id'   => 'sidebar-widgets',
    		'description'   => __( 'These are widgets for the sidebar.','html5reset' ),
    		'before_widget' => '<div id="%1$s" class="widget %2$s">',
    		'after_widget'  => '</div>',
    		'before_title'  => '<h2>',
    		'after_title'   => '</h2>'
    	));
    }
    
    add_theme_support( 'post-formats', array('aside', 'gallery', 'link', 'image', 'quote', 'status', 'audio', 'chat', 'video')); // Add 3.1 post format theme support.

    if (function_exists(register_nav_menus)) {
        register_nav_menus(
            array('primary' => 'Men&ugrave; principale')
        );
        register_nav_menus(
            array('bottom' => 'Men&ugrave; bottom')
        );
    };

    if ( function_exists( 'add_image_size' ) ) { 
        add_image_size( '600', 600, 9999, false );
        add_image_size( 'press', 184, 240, true );
    }



    // CREAZIONE DEL SOTTOTITOLO
    //verifichiamo che la funzione venga lanciata al momento appropriato
    add_action('add_meta_boxes', function() {
      add_meta_box(
      'kldg_subtitle', // id della meta box
      'Sottotitolo', // titolo della meta box
      'kldg_subtitle_cb', //nome della callback function da eseguire nella metabox
      'page', // nome del post type al quale aggiungere la meta box
      'normal', // dove posizionare la metabox (normal, advanced o side)
      'high' // priorità della MB, dove verrà posizionata (high, core, default o low)
      );
    });

    function kldg_subtitle_cb() { 
        // recupero del informazioni del post corrente
        global $post;
        //ottengo il valore del meta box se già salvato
        $subtitle = get_post_meta($post->ID, 'kldg_subtitle', true);
        // proteggo la sessione aggiungendo dei campi nascosti
        wp_nonce_field(__FILE__, 'kldg_nonce');
        ?>
        <label for="kldg_subtitle">Sottotitolo</label>
        <input type="text" name="kldg_subtitle" id="kldg_subtitle" class="widefat" value="<?php echo $subtitle; ?>">
        <?php
    }

    // verifichiamo che la funzione venga lanciata solamente al momento del salvataggio
    add_action('save_post', function () {
      // ottengo le informazioni relative al post
      global $post;
      // non salvare la metabox con l'autosalvataggio di wordpress
      if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) { 
        return; 
      }

      // check per la sicurezza:
      // verifichiamo che i campi nascosti inseriti con wp_nonce_field()
      // siano corretti, in caso contrario non effettuiamo il salvataggio
      if ($_POST && wp_verify_nonce($_POST['kldg_nonce'], __FILE__) ) {
        // verifico che sia stato inserito un valore nel form
        if ( isset($_POST['kldg_subtitle']) ) {
          // salvo le informazioni contenute nella MB
          update_post_meta($post->ID, 'kldg_subtitle', $_POST['kldg_subtitle']);
        }
      } 
    });

   /**
   * Register our sidebars and widgetized areas.
   *
   */
  function kldg_sidebars() {

    register_sidebar( array(
      'name' => 'Footer sidebar',
      'id' => 'footer',
      'before_widget' => '<div class="footer_sidebar">',
      'after_widget' => '</div>',
      'before_title' => '<h3>',
      'after_title' => '</h3>',
    ) );
  }
  add_action( 'widgets_init', 'kldg_sidebars' );
          
?>