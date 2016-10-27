<?php 
/* 
Template name: Home Layout Template
*/

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

  <main>
    <?php if( have_rows('about_carousel_items') ): $index = 0; ?>
    
    <div class="container-fluid background-grey buffer-padding-50" id="about">
      <div class="row">
        <div class="col-md-3 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
          <h2 class="text-green text-cinzel font-weight-900 text-uppercase"><?php the_field('about_title'); ?></h2>
          <span class="text-white"><?php the_field('about_content'); ?></span>
        </div>
      </div>
      
      <div class="row hidden-xs">
        <div class="col-md-7 col-md-offset-3 col-sm-10 col-sm-offset-1 col-xs-12">
          <!-- Indicators -->
          <ol class="list-unstyled list-inline">
            <?php while ( have_rows('about_carousel_items') ) : the_row(); $index ++; ?>
            <li data-target="#about-carousel" data-slide-to="<?php { echo($index - 1); } ?>" class="col-md-2 col-sm-3 <?php if( $index == 1 ) { echo("active"); } ?>">
              <div class="text-center buffer-padding-20" style="width: 105px;">
                <div class="fa-5x text-blue background-sky-blue border-radius-50-percent box-shadow-down-small cursor-pointer"><?php the_sub_field('icon'); ?></div>
                <h3 class="text-cinzel text-uppercase text-green"><?php the_sub_field('title'); ?></h3>
              </div>
            </li>
            <?php endwhile; ?>
          </ol>
        </div>
      </div>
    </div>

    <div class="container-fluid border-top-green-10">
      <div class="row">
        <div id="about-carousel" class="carousel slide buffer-padding-100" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php $index = 0; ?>
            <?php while ( have_rows('about_carousel_items') ) : the_row(); $index ++; ?>
            <div class="item <?php if( $index == 1 ) { echo("active"); } ?>">
              <div class="col-sm-3 col-sm-offset-2 col-xs-12 text-center text-dark-blue buffer-padding-100">
                <span class="fa-5x"><?php the_sub_field('icon'); ?></span>
              </div>
              <div class="col-sm-4 col-sm-offset-0 col-xs-8 col-xs-offset-2 text-grey">
                <h2 class="text-cinzel font-weight-900 text-uppercase"><?php the_sub_field('title'); ?></h2>
                <?php the_sub_field('content'); ?>
              </div>
            </div>
            <?php endwhile; ?>
          </div>
        
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#about-carousel" role="button" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#about-carousel" role="button" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
    </div>

    <?php endif; ?>

    <div class="container-fluid border-top-green-10">
      <div class="row buffer-padding-50">
        <div class="col-md-4">
          <h2 class="text-green text-center text-cinzel font-weight-900 text-uppercase font-size-280"><?php the_field('promo_section_title'); ?></h2>
        </div>
        <div class="col-md-4 text-center">
           <img src="<?php the_field('promo_section_image'); ?>" height="300"></img>
        </div>
        <div class="col-md-4">
          <h2 class="text-green text-cinzel font-weight-900 text-uppercase"><?php the_field('promo_section_subtitle'); ?></h2>
          <p class="text-dark-blue text-bold font-size-120"><?php the_field('promo_section_content'); ?></p>
          <a href="<?php the_field('promo_section_cta_url'); ?>" class="text-green text-cinzel text-bold text-uppercase font-size-150"><?php the_field('promo_section_cta'); ?></a>
        </div>
      </div>
    </div>


    <div class="container-fluid background-grey border-bottom-white-10 border-top-green-10">
      <div class="row">
        <h2 class="text-white text-center text-cinzel font-weight-900 text-uppercase"><?php the_field('team_section_title'); ?></h2>
      </div>

      <?php if( have_rows('team_section_items') ): $index = 0; ?>
      <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-12">
          <?php while ( have_rows('team_section_items') ) : the_row(); $index ++; ?>
          
          <div class="col-md-4 col-sm-6 col-xs-12 text-center" id="team-item-<?php echo($index); ?>">
            <image src="<?php the_sub_field('image'); ?>" height="250" width="250" class="border-radius-50-percent border-white-2 buffer-padding-10 buffer-padding-10-horizontal"></image>
            <h3 class="text-green text-bold text-cinzel text-uppercase"><?php the_sub_field('name'); ?></h3>
            <h4 class="text-white text-cinzel"><?php the_sub_field('position'); ?></h4>
          </div>
          
          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>
      
    </div>
    
    <div class="container-fluid background-green buffer-padding-50" id="reviews">
      <div class="row">
        <h2 class="text-white text-center text-cinzel text-uppercase font-weight-900"><?php the_field('reviews_section_title'); ?></h2>
      </div>

      <?php if( have_rows('reviews_section_items') ): $index = 0; ?>
      <div class="row">
        <div class="col-md-offset-2 col-md-8 col-xs-12">
          <?php while ( have_rows('reviews_section_items') ) : the_row(); $index ++; ?>
          
          <div class="col-sm-4 col-xs-12" id="reviews-item-<?php echo($index); ?>">
            <div class="border-white-2 col-xs-12 buffer-margin-30 buffer-padding-10">
              <i class="fa fa-quote-left text-white"></i>
              <p class="buffer-padding-20 buffer-padding-10-horizontal font-size-120"><?php the_sub_field('text'); ?></p>
              <p class="text-white font-size-150 text-bold"><?php the_sub_field('author'); ?></p>
            </div>
          </div>
          
          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>
      
    </div>
    
    <div class="container-fluid no-padding background-sky-blue" id="contact">
      <div id="map" class="col-md-7 col-xs-12 no-padding" style="height: 940px;"></div>
      <script>
        var geocoder;
        var map;
        function initialize() {
          geocoder = new google.maps.Geocoder();
          var latlng = new google.maps.LatLng(42.426865, -122.850341);
          var mapOptions = {
            zoom: 18,
            center: latlng,
            scrollwheel: false,
            draggable: !("ontouchend" in document),
            zoomControl: true,
            mapTypeControl: true,
            scaleControl: true,
            streetViewControl: true,
            rotateControl: true,
            fullscreenControl: true
          }
          map = new google.maps.Map(document.getElementById('map'), mapOptions);

          var placeId = 'ChIJXfTZ6t9iz1QRwYju-IhMTJ4';
          geocoder.geocode( { 'placeId': placeId}, function(results, status) {
            if (status == 'OK') {
              map.setCenter(results[0].geometry.location);
              var marker = new google.maps.Marker({
                  map: map,
                  position: results[0].geometry.location
              });
            } else {
              alert('Geocode was not successful for the following reason: ' + status);
            }
          });
        }
      </script>
      <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDfJAptlqAKlO5nd8HaudRFm8uSlQL10vs&callback=initialize"></script>

      <div class="col-md-5 col-xs-12 buffer-padding-50-horizontal buffer-padding-40 text-blue">
        <div class="row">
          <h2 class="text-cinzel font-weight-900"><?php the_field('contact_section_title'); ?></h2>
        </div>
        <div class="row">
          <p class="text-bold"><?php the_field('contact_section_sub-text'); ?></p>
        </div>

        <?php if( have_rows('contact_section_items') ): $index = 0; ?>
        <div class="row text-center">
          <?php while ( have_rows('contact_section_items') ) : the_row(); $index ++; ?>
          
          <div class="col-sm-4 col-xs-12 no-padding" id="contact-item-<?php echo($index); ?>">
            <h3 class="font-size-300"><?php the_sub_field('icon'); ?></h3>
            <h4><?php the_sub_field('title'); ?></h4>
            <?php the_sub_field('text'); ?>
          </div>
          
          <?php endwhile; ?>
        </div>
        <?php endif; ?>
          
        <div class="row buffer-margin-20">
          <?php the_field('contact_section_main_content'); ?>
        </div>
      </div>
    </div>
  </main>

    <?php endwhile; ?>
<?php else : ?>
    
<p>No content found</p>
    
<?php endif; ?>

<?php get_footer(); ?>
