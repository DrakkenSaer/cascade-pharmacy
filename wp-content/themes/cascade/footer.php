    <footer class="container-fluid background-grey text-uppercase text-center text-cinzel">
      <div class="col-xs-12 text-bold font-size-130 buffer-padding-20 text-white">
        Follow us on social media
      </div>
      <div class="col-sm-4 col-sm-offset-4 col-xs-12 social">
        <?php $sms = get_field('social_media_profiles', 'option'); foreach ($sms as $sm) { ?>
        <div class="font-size-300 col-sm-4 col-xs-12">
          <a href="<?php echo $sm['url']; ?>" target="_blank" class="border-white-1 buffer-padding-5 buffer-margin-10 border-radius-50-percent inline-block" style="height: 70px; width: 70px;"><?php echo $sm['icon']; ?></a>
        </div>
        <?php } ?>
      </div>
      <div class="col-sm-12 col-xs-12 text-bold buffer-padding-20 text-white">
        all rights reserved &copy; 2016 cascade natural health pharmacy
      </div>
    </footer>

    <?php wp_footer(); ?>
    </body>
</html>
