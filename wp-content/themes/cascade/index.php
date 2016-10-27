<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
<head>
<meta charset="utf-8">
  <!--<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">-->
<title><?php global $page, $paged;
  wp_title( '|', true, 'right' );
  bloginfo( 'name' );
  $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
    echo " | ". $site_description;?>
</title> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php wp_head(); ?>
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
<link href="//fonts.googleapis.com/css?family=Cinzel:400,700,900|Raleway" rel="stylesheet">
</head>
<body>
 <!--[if lt IE 8]>
  <p style="background:#000; color:#fff; font-size:17px;">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

  <header id="hero" class="clearfix">
    <div class="container-fluid home-background text-dark-blue font-size-150 text-center buffer-padding-100" id="home">
      <div class="row">
        <div class="menu">
          <nav class="navbar" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 col-md-offset-3 col-xs-12" style="height: 250px;">
              <div class="navbar-header">
                <a href="<?php bloginfo('wpurl'); ?>"><img src="<?= get_template_directory_uri(); ?>/assets/images/logo.png"></img></a>
              </div>
            </div>
        
            <div class="col-md-6 col-xs-12 buffer-padding-50">
              <!-- Collect the nav links, forms, and other content for toggling -->
              <?php
                $args = array(
                'theme_location' => 'header',
                'menu_class' => 'nav navbar-nav navbar-right text-cinzel font-weight-700',
                'menu_id' => 'navbar-items'
                );
                
                wp_nav_menu($args); 
              ?>
            </div>
          </nav>
        </div>
      </div>

      <div class="row buffer-padding-50">
        <div class="col-md-3 col-md-offset-3">
          <h1 class="text-cinzel text-uppercase font-weight-900"><?php the_field('header_section_title', get_option('page_for_posts')); ?></h1>
          <span class="text-bold"><?php the_field('header_section_content', get_option('page_for_posts')); ?></span>
        </div>
      </div>
    </div>
  </header>

<?php if ( have_posts() ) : ?>
<?php the_field('header_title'); ?>
  <div class="container no-padding buffer-margin-50">
    <?php while ( have_posts() ) : the_post(); ?>
    
      <?php if (has_post_thumbnail( $post->ID ) ): ?>
        <?php $image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'single-post-thumbnail' ); ?>

    <div class="col-md-4 col-sm-6 buffer-margin-25">
      <a href="<?php the_permalink(); ?>">
        <div class="position-relative" style="background:url('<?php echo $image[0]; ?>') 50% 50% no-repeat; background-size: cover; height: 300px;">
        	<div style="position: absolute; bottom: 0; background: rgba(0, 0, 0, 0.5); width: 100%; padding: 1em 1em 0 1em; height: 100px;">
        		<h3 class="text-white"><?php the_title(); ?></h3>
        	</div>
        </div>
      </a>
    </div>

      <?php endif; ?>

    <?php endwhile; ?>
  </div>
<?php else : ?>
    
<p>No content found</p>
    
<?php endif; ?>

<?php get_footer(); ?>
