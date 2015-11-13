<div id="footer-new"  class="home-new-footer-footer">
    <div class="footer_container" >
          <footer id="colophon" role="contentinfo" class="home-new-footer-footer">

            <div class="footer-left">


              <div class="imgcol">
                <a href="http://www.cmany.org/visit-us-2/">
                  <img alt="Map of CMANY location" src="<?php bloginfo( 'template_url' )?>/images/map.png" />
                </a>
              </div>
              <div class="acol">
                  <h4>HOURS</h4>
                   M: 12-5PM <br>
                   Tu&W: CLOSED<br>
                  Th-Fr: 12-6PM<br>
                  Sa-Su: 10-5PM<br>

              </div>
              <div class="acol">
                  <h4>ADMISSION</h4>
                  Ages 1 to 65: &nbsp;&nbsp;$12<br>
                  Under 1: &nbsp;&nbsp;Free<br>
                  Ages 65 plus: &nbsp;&nbsp;Pay As You Wish<br>
                  <br>
                  Thursdays 4 to 6PM: <br>
                  Pay As You Wish<br>
              </div>
              <div class="clear">&nbsp;</div>
            </div>


        <div id="footerMenu">

<?php
            $defaults = array(
              'menu'            => 'Footer'
            );
            wp_nav_menu($defaults);
          ?>
        </div>





            <div class="footer-right">
              <h4>Follow Us!</h4>
               <a target="_blank" href="http://on.fb.me/nqqBkf"><img alt="Follow us on Facebook" src="<?php bloginfo( template_url  )?>/images/facebookg.png" /></a>
               <a target="_blank" href="http://twitter.com/#!/CMAinNYC"><img alt="Find us on Twitter" src="<?php bloginfo( 'template_url' )?>/images/twitterg.png" /></a>
               <a target="_blank" href="http://www.flickr.com/photos/cma_in_nyc/"><img alt="See our photo stream on flickr" src="<?php bloginfo( 'template_url' )?>/images/flickrg.png" /></a>
               <br><bR>
               <a target="_blank" href="http://instagram.com/cmainnyc"><img alt="Follow us on Instagram" src="<?php bloginfo( 'template_url' )?>/images/instagramg.png" /></a>
               <a target="_blank" href="http://vimeo.com/cmainnyc"><img alt="Watch our videos on Vimeo" src="<?php bloginfo( 'template_url' )?>/images/vimeog.png" /></a>
               <a target="_blank" href="http://blog.cmany.org/"><img alt="View our Blog" src="<?php bloginfo( 'template_url' )?>/images/blog_white.png" /></a>
            </div>


          <!-- #colophon -->
          </footer>

 <!--footer container   -->
 </div>


 <!-- #footer new -->
 </div>

       <div id="address_info">
           <span class="newteal" style="text-align:center">Children's Museum of the Arts &nbsp;&nbsp; | &nbsp;&nbsp; 103 Charlton St.&nbsp;&nbsp; |&nbsp;&nbsp; New York, NY 10014&nbsp;&nbsp; |&nbsp;&nbsp; 212.274.0986&nbsp;&nbsp; |&nbsp;&nbsp; Fax: 212.274.1776</span>
        </div>

<!--JAVASCRIPT -->


<?php wp_footer(); ?>

<!-- This is the cmany footer -->

<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/libs/carousel.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery.colorbox-min.js"></script>
<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/pat-script.js" defer></script>


<!--CHROME FRAME -->
<!--[if lt IE 7 ]>
  <script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  <script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
<![endif]-->

<?php //echo body_class(); ?>
<?php //print_r( debug_backtrace() ) ?>

<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-69019180-1', 'cmany.org');
  ga('send', 'pageview');

</script>


</body>
</html>
