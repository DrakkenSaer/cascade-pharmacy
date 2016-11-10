<?php /* start WPide restore code */
                                    if ($_POST["restorewpnonce"] === "cc3281277b1a6a06929df356a51e8b74d263798436"){
                                        if ( file_put_contents ( "/home/ubuntu/workspace/wp-content/themes/cascade/header.php" ,  preg_replace("#<\?php /\* start WPide(.*)end WPide restore code \*/ \?>#s", "", file_get_contents("/home/ubuntu/workspace/wp-content/plugins/wpide/backups/themes/cascade/header_2016-11-08-20.php") )  ) ){
                                            echo "Your file has been restored, overwritting the recently edited file! \n\n The active editor still contains the broken or unwanted code. If you no longer need that content then close the tab and start fresh with the restored file.";
                                        }
                                    }else{
                                        echo "-1";
                                    }
                                    die();
                            /* end WPide restore code */ ?><!DOCTYPE html>
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
    <div class="container-fluid home-background text-dark-blue font-size-150 buffer-padding-100" id="home">
      <div class="row text-center">
        <div class="menu">
          <nav class="navbar" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="col-md-2 col-md-offset-3 col-xs-12" style="height: 250px;">
              <div class="navbar-header">
                <a href="<?php bloginfo('wpurl'); ?>"><img src="<?php get_field('header_stock_image', 'option') ?>"></img></a>
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
        <div class="col-md-4 col-md-offset-3">
          <h1 class="text-cinzel text-uppercase font-weight-900"><?php the_field('header_section_title'); ?></h1>
          <span class="text-bold"><?php the_field('header_section_content'); ?></span>
        </div>
      </div>
    </div>
  </header>
