<?php 
/* 
Template name: Home Layout Template
*/

get_header(); ?>

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>

  <main>
    <?php if( have_rows('about_carousel_items') ): ?>
    
    <div class="container-fluid background-green buffer-padding-50" id="about">
      <div class="row">
        <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2 col-xs-12 text-center">
          <h2 class="text-white text-cinzel font-weight-900 text-uppercase"><?php the_field('about_title'); ?></h2>
          <span><?php the_field('about_content'); ?></span>
        </div>
        <?php if(get_field('about_section_image')): ?>
        <div class="text-center col-xs-12">
          <img src="<?php the_field('about_section_image'); ?>" height="200"></img>
        </div>
        <?php endif ?>
      </div>
    </div>

    <div class="container-fluid border-top-grey-10">
      <div class="row">
        <div id="about-carousel" class="carousel slide buffer-padding-100" data-ride="carousel">
          <!-- Wrapper for slides -->
          <div class="carousel-inner" role="listbox">
            <?php $index = 0; ?>
            <?php while ( have_rows('about_carousel_items') ) : the_row(); $index ++; ?>
            <div class="item <?php if( $index == 1 ) { echo("active"); } ?>">
              <div class="col-sm-3 col-sm-offset-2 col-xs-12 text-center">
                <img src="<?php the_sub_field('image'); ?>" height="200"></img>
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
      <div class="row hidden-xs background-grey">
        <div class="col-xs-12">
          <!-- Indicators -->
          <ol class="list-unstyled list-inline text-center col-md-10 col-md-offset-1 col-xs-12">
            <?php $index = 0; ?>
            <?php while ( have_rows('about_carousel_items') ) : the_row(); $index ++; ?>
            <li data-target="#about-carousel" data-slide-to="<?php { echo($index - 1); } ?>" class="col-sm-3 <?php if( $index == 1 ) { echo("active"); } ?>">
              <div class="center-block buffer-padding-20" style="width: 60px;">
                <div class="fa-3x text-blue background-sky-blue border-radius-50-percent box-shadow-down-small cursor-pointer"><?php the_sub_field('icon'); ?></div>
              </div>
              <h5 class="text-cinzel text-uppercase text-green" style="word-wrap: break-word;"><?php the_sub_field('title'); ?></h5>
            </li>
            <?php endwhile; ?>
          </ol>
        </div>
      </div>
    </div>

    <?php endif; ?>

    <div class="container-fluid border-top-green-10">
      <div class="row buffer-padding-50">
        <div class="col-md-5 col-md-offset-1">
          <h2 class="text-green text-cinzel font-weight-900 text-uppercase font-size-250"><?php the_field('promo_section_title'); ?></h2>
          <h2 class="text-green text-cinzel font-weight-900 text-uppercase"><?php the_field('promo_section_subtitle'); ?></h2>
          <p class="text-dark-blue text-bold font-size-120"><?php the_field('promo_section_content'); ?></p>
          <a href="<?php the_field('promo_section_cta_url'); ?>" class="text-green text-cinzel text-bold text-uppercase font-size-150"><?php the_field('promo_section_cta'); ?></a>
        </div>
        <div class="col-md-5 text-center">
           <img src="<?php the_field('promo_section_image'); ?>" height="300"></img>
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
          
          <div class="col-md-4 col-sm-6 col-xs-12 text-center buffer-margin-20" id="team-item-<?php echo($index); ?>">
            <image src="<?php the_sub_field('image'); ?>" height="150" width="150" class="border-radius-50-percent border-white-2 buffer-padding-10 buffer-padding-10-horizontal"></image>
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
            <div class="col-xs-12 buffer-margin-30 buffer-padding-10">
              <img src="<?php the_sub_field('image'); ?>" height="200"></img>
              <div class="buffer-margin-50 no-margin-bottom">
                <i class="fa fa-quote-left text-white"></i>
                <p class="buffer-padding-20 font-size-120"><?php the_sub_field('text'); ?></p>
                <p class="text-white font-size-150 text-bold"><?php the_sub_field('author'); ?></p>
              </div>
            </div>
          </div>
          
          <?php endwhile; ?>
        </div>
      </div>
      <?php endif; ?>
      
    </div>
    
    <div class="container-fluid no-padding background-sky-blue text-blue" id="contact">
      <div class="col-xs-12">
        <h2 class="text-cinzel text-center font-weight-900 buffer-margin-50"><?php the_field('contact_section_title'); ?></h2>
      </div>

      <div class="col-md-4 col-md-offset-1 col-xs-12 buffer-margin-50">
        <div id="map" style="height: 400px;"></div>
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
      </div>
      
      <div class="col-md-2 col-xs-12">
        <?php if( have_rows('contact_section_items') ): $index = 0; ?>
        <ul class="list-unstyled text-center">
          <?php while ( have_rows('contact_section_items') ) : the_row(); $index ++; ?>
          
          <li id="contact-item-<?php echo($index); ?>">
            <h3 class="font-size-300"><?php the_sub_field('icon'); ?></h3>
            <h4><?php the_sub_field('title'); ?></h4>
            <?php the_sub_field('text'); ?>
          </li>
          
          <?php endwhile; ?>
        </ul>
        <?php endif; ?>
      </div>

      <div class="col-md-5 col-xs-12 buffer-padding-50-horizontal buffer-padding-40">
        <div class="row">
          <p class="text-bold"><?php the_field('contact_section_sub-text'); ?></p>
        </div>

          
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
