

<div class="bottom">
	<div class="spray"></div>
		<div class="background">
			<footer id="footer" class="source-org vcard copyright">
                
			<div class="info"> <?php 
                if ( dynamic_sidebar('footer') ) : 
                else : 
                ?>
                <?php endif; ?> 
                <nav class="bottom_menu">
                <?php 
                    $args = array(
                        'theme_location' => 'bottom',
                        'depth'           => 1,
                        'items_wrap'      => '%3$s'
                    );
                    wp_nav_menu($args);
                ?>
                 <li class="menu-item popup"><a href="#">JELKOM</a>
                    <ul>
                        <li>Sede Legale e Operativa Via Valentini Giuseppe, 7 - 59100 Prato<br/>C.F - P.IVA - R.I. PO 02043360979</li>
                    </ul>
                </li>

                    <a href="http://instagram.com/crime_fashion" target="_blank" title="Crime Fashion Instagram">
                        <img src="<?php bloginfo('template_directory'); ?>/img/social/instagram.png" alt="Crime Fashion Instagram">
                    </a>
                    <a href="https://www.facebook.com/crimefashion" target="_blank" title="Crime Fashion Facebook">
                        <img src="<?php bloginfo('template_directory'); ?>/img/social/facebook.png" alt="Crime Fashion Facebook">
                    </a>
                    <a href="https://twitter.com/CrimeFashion" target="_blank" title="Crime Fashion Twitter">
                        <img src="<?php bloginfo('template_directory'); ?>/img/social/twitter.png" alt="Crime Fashion Twitter">
                    </a>
                    <a href="http://pinterest.com/crimefashion/" target="_blank" title="Crime Fashion Pinterest">
                        <img src="<?php bloginfo('template_directory'); ?>/img/social/pinterest.png" alt="Crime Fashion Pinterest">
                    </a>

            </nav>

            <!-- <img src="<?php bloginfo('template_directory'); ?>/img/jelkom_logo.png" alt="Jelkom" class="v_top"> -->
                <!-- Sede Legale e Operativa Via Valentini Giuseppe, 7 - 59100 Prato - C.F - P.IVA - R.I. PO 02043360979 -->
			</div>
            </footer>
		</div>	
	</div>

	<?php wp_footer(); ?>


<!-- here comes the javascript -->

<!-- jQuery is called via the Wordpress-friendly way via functions.php -->

<!-- this is where we put our custom functions -->
<script type="text/javascript" async data-pin-color="red" data-pin-hover="true" src="http://assets.pinterest.com/js/pinit.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.cycle.all.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.maximage.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.isotope.min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.mousewheel.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery.scrollTo-1.4.3.1-min.js" type="text/javascript" charset="utf-8"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/lightbox.js" type="text/javascript" ></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/jquery-ui-1.8.22.custom.min.js"></script>
<script src="http://vjs.zencdn.net/4.0/video.js"></script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/bigvideo.js"></script>

<script type="text/javascript" charset="utf-8">
    // Wait for window load
        $('.loader_bg').show();
        $(window).load(function() {
            // Animate loader off screen
            $('.loader_bg').fadeOut(200);
        });

	$(function(){

    var body = $('body');

    // CAMBIO L'IMMAGINE DELL PULSANTE SUBMIT NELLA PAGINA CONTACT
    $('input.wpcf7-submit').attr({
        type:'image',
        src:'<?php bloginfo('template_directory'); ?>/img/submit_c.png'
    });

    //  CENTRO IL TOP MENU
    // var header = $('.top header'),
    // header_width = $('.top_menu').width();
    // header_width += 200;

    // header.width(header_width);

    // AGGIUNGO VOCI AL MENU SELECT RESPONSIVE CHE SAREBBERO STATE NEL FOOTER
    $("select.responsiveMenuSelect").append('<option value="/store-locator">Store Locator</option><option value="/?page_id=106">Contact</option>');
    

    /*****
    /*****
    ******  Gestione dello Slideshow - Maximage
    /*****
    *****/

    //  Inizializzo maximage
    if ($('.maximage').length>0) {

        $('.maximage').maximage({
            cycleOptions: {
                fx:       'fade',         //  effetto
                speed:    800,            //  velocità
                timeout:  4000,           //  tempo per ogni slide
                prev:     '#arrow_left',
                next:     '#arrow_right'
            },
            onFirstImageLoaded: function(){
                jQuery('#cycle-loader').hide();
                jQuery('.maximage').fadeIn('fast');
            }
        });

    } else if ($('.sfondo').length>0) {

        // $('.sfondo').maximage(); 

    }



    /*****
    /*****
    ******  Gestione del Vertical Masonry
    /*****
    *****/
        var vertical_container = $('.masonry_vertical_container')
        
        //  Aspetto che le immagini siano tutte caricate
        //  per dare un altezza al vertical_container (altrimenti resta 0px)
        vertical_container.imagesLoaded( function(){
          vertical_container.isotope({
            itemSelector : 'img',
            // imposto la colonna come il vertical_container/3
            masonry: { columnWidth: vertical_container.width() / 3 }
          });
        });
        //  L'alternativa a imagesLoaded è un kludge:
        //  triggerare il resize della finestra con:
        //  $(window).resize();


        // Aggiorno la larghezza della colonna ad ogni resize della finestra
        $(window).smartresize(function(){
          vertical_container.isotope({
            itemSelector : 'img',
            // imposto la colonna come il vertical_container/3
            masonry: { columnWidth: vertical_container.width() / 3 }
          });
        });

    /*****
    /*****
    ******  Gestione dell'horizontal Masonry
    /*****
    *****/

var h_container = $('.masonry_horizontal_container');

    if (h_container.length>0 && Modernizr.mq('only all and (min-width: 800px)')) {

    var h_container_div = h_container.find('div.lookbook'),
        h_container_text = h_container.find('div.text'),
        h_container_img = h_container_div.find('img');

        h_container_text.hide();

        //  Creo una tabella attorno alle immagini per lo scroll orizzontale
        h_container.wrapInner("<table cellspacing='0' class='lookbook_table'><tr>");
        h_container_div.wrap("<td></td>");

        //  Inverto l'utilizzo dello scroll
        body.mousewheel(function(event, delta) {
            this.scrollLeft -= (delta * 30);
            event.preventDefault();
        });  

        //  Mostro on hover il test relativo al look
        h_container_div.on('mouseenter', function() {
            $(this).find('div.text').fadeIn();
            // $(this).find('img').fadeTo('fast', 0.4);
        }).on('mouseleave', function() {
            $(this).find('div.text').fadeOut();
            // $(this).find('img').fadeTo('fast', 1);
        });
        
        //  Imposto l'altezza delle immagini
        h_container.imagesLoaded( function(){
            var img_height = $(window).height()-200;
            h_container_img.height( img_height );
            // h_container_text.css({
            //     'left'  : -img_height/2+9,
            //     'top'   : img_height/2-10,
            //     'width' : img_height+1
            // });
        });

        //  Imposto l'altezza delle immagini quando viene ridimensionato il browser
        $(window).resize(function(){
            h_container.imagesLoaded( function(){
                h_container_img.height( $(window).height()-200 );
            });
        });

    

    /////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////
    //                      GESTIONE SCROLLTO ()                   //
    /////////////////////////////////////////////////////////////////
    /////////////////////////////////////////////////////////////////


    var current = 0,
        post_per_page = $('.lookbook').length;

        function scrollNext() {
            // Scrolliamo all'articolo successivo se l'articolo corrente
            // non è l'ultimo
                if (current <= post_per_page - 2) {
                    current++;
                    body.scrollTo('.lookbook:eq('+current+')', 200, { offset: 0, axis: 'x'});
                }
        }
        function scrollPrev() {
            // Scrolliamo al top della pagina se l'articolo corrente è il primo
            // aumentando l'offset a 600px
                if (current == 1) {
                        body.scrollTo('.lookbook:eq(0)', 200, { offset: -600, axis: 'x'});
                        current--;
                    }
            // Scrolliamo all'articolo precedente se l'articolo corrente è il secondo o maggiore 
                if (current > 1) {
                    current--;
                    body.scrollTo('.lookbook:eq('+current+')', 200, { offset: 0, axis: 'x'});
                }
        }

    $(document).keydown(function(e){
        // Disabilitiamo l'evento di default delle freccie su e giù
        // per evitare lo scattino fastidioso
        switch( e.keyCode ){
            case 39:        // RIGHT ARROW
                e.preventDefault();
            break;

            case 40:        // DOWN ARROW
                e.preventDefault();
            break;

            case 37:        // LEFT ARROW
                e.preventDefault();
            break;

            case 38:        //  UP ARROW 
                e.preventDefault();
            break;
        }
    });

    $(document).keyup( function(e) {

        switch( e.keyCode ){
            case 39:        // RIGHT ARROW
                scrollNext();
            break;

            case 40:        // DOWN ARROW
                scrollNext();
            break;

            case 37:        // LEFT ARROW
                scrollPrev();
            break;

            case 38:        //  UP ARROW 
                scrollPrev();
            break;
        }
    });

    $("#arrow_right").on('click', function() {
        scrollNext();
    });
    $("#arrow_left").on('click', function() {
        scrollPrev();
    });

    }   // FINE PAGINA HORIZONTAL LOOKBOOK

	});
</script>
<script src="<?php bloginfo('template_directory'); ?>/_/js/functions.js"></script>

<?php if (is_page(100)) { ?>
<script>
    // var BV = new $.BigVideo();
    //         BV.init();
    //         BV.show('http://video-js.zencoder.com/oceans-clip.mp4');
            // Use Modernizr to detect for touch devices, 
            // then serve them alternate background image content
(function($){
    if (Modernizr.mq('only all and (min-width: 800px)')) {
        $('.right_text').addClass('background');
        // Use Modernizr to detect for touch devices, 
        // then serve them alternate background image content
        var isTouch = Modernizr.touch;
        
        // vars for auto hiding
        var isShowingPlaylist = false;
        var isHidden = false;
        var autoHideTimer;
        var $showContentButton = $('<div class="touchscreen-show-button box">Back</div>')
        
        // initialize BigVideo
        var BV = new $.BigVideo({forceAutoplay:isTouch});
        BV.init();
        // show background image
        BV.show('/video/crime_fashion.mp4', {altSource:'/video/crime_fashion.ogv'});

        // Playlist button click starts video, enables autohiding
        autoHide(true);
        isShowingPlaylist = true;

        // Turn off autohiding when mouse is over the nav 
        // (not necessary for touchscreens)
        if (!isTouch) {
            $('.nav')
                .on('mouseover', function() {
                    if (isShowingPlaylist) autoHide(false);
                })
                .on('mouseout', function() {
                    if (isShowingPlaylist) autoHide(true);
                });
        } else {
            // add button to show content on touchscreen
            $('body').prepend($showContentButton);
        }

        function autoHide(enable) {
            if (enable) {
                isHidden = true;
                $('body').on('mousemove', function(event){
                    if (isHidden) {
                        isHidden = false;
                        $('.nav, .right_text').removeClass('transparent');
                    }
                    clearTimeout(autoHideTimer);
                    autoHideTimer = setTimeout(function() {
                        isHidden = true;
                        $('.right_text').addClass('transparent');
                    }, 3000);
                });    
            } else {
                clearTimeout(autoHideTimer);
                $('body').off('mousemove');
                $('.right_text').removeClass('transparent');
            }
        }
    }


})(jQuery);
</script>
<?php } ?>

<!-- Histats.com  START  (aync)-->
<script type="text/javascript">var _Hasync= _Hasync|| [];
_Hasync.push(['Histats.start', '1,2360961,4,0,0,0,00010000']);
_Hasync.push(['Histats.fasi', '1']);
_Hasync.push(['Histats.track_hits', '']);
(function() {
var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
hs.src = ('http://s10.histats.com/js15_as.js');
(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
})();</script>
<noscript><a href="http://www.histats.com" target="_blank"><img  src="http://sstatic1.histats.com/0.gif?2360961&101" alt="contatore free" border="0"></a></noscript>
<!-- Histats.com  END  -->
	
</body>

</html>
