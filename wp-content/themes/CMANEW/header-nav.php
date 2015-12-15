<div class="top-head">
  <div class="mobile-logo desktop-hide">
    <a href="<?php echo site_url(); ?>">  <img alt="Return to CMANY home" src="<?php bloginfo( 'template_url' ) ?>/images/cma-logo.jpg" /> </a>
  </div>
<div id="page-new" >
  <div class="top-content container">
  <div id="page-right" role="main">
		<div class="top-search">
			<form method="get" id="search" action="<?php echo home_url( '/' ); ?>">
        <label for="s" class="sr-only">Search</label>
			  <input name="s" id="s" type="text" size="40" placeholder="Search CMANY.org..." />
			</form>
		</div>
    <div class="top-gateway">
      <div class="top-social">
       <a target="_blank" href="http://on.fb.me/nqqBkf"><img alt="Check us out on Facebook" src="<?php bloginfo( 'template_url' )?>/images/facebook.png" /><span class="sr-only">External link, opens in a new window</span></a>
       <a target="_blank" href="http://twitter.com/#!/CMAinNYC"><img alt="Find us on Twitter" src="<?php bloginfo( 'template_url' )?>/images/twitter.png" /><span class="sr-only">External link, opens in a new window</span></a>
       <a target="_blank" href="http://blog.cmany.org<?php //bloginfo('rss2_url'); ?>"><img alt="Read our blog" src="<?php bloginfo( 'template_url' )?>/images/blog_blue.png" /><span class="sr-only">External link, opens in a new window</span></a>
       <a target="_blank" href="http://www.flickr.com/photos/cma_in_nyc/"><img alt="See our photo stream on flickr"  src="<?php bloginfo( 'template_url' )?>/images/flickr.png" /><span class="sr-only">External link, opens in a new window</span></a>
    </div>
		
    <div class="top-button">
			<a href="https://app.etapestry.com/hosted/ChildrensMuseumoftheArts/Donation.html" target="_blank">
				Donate <span class="sr-only">External link, opens in a new window</span> </a>
		</div>

		
  </div>
	</div><!-- #page right -->
</div>
</div><!-- #page (main container) -->
<div class="clear" aria-hidden="true"></div>
</div><!-- .top-head (header container) -->


<div class="row">
<header id="header">

      <!--PRIMARY-->
	    <div class="primary"  >
        <div id="pcontainer">
          <div class="sidr-close">CLOSE <i class="fa fa-fw fa-close"></i></div>
          <div class="container nav_main">
<?php
            $defaults = array(
              'menu'            => 'Main',
              'depth' => 0,                       
              'items_wrap' => '<ul aria-haspopup="true" id="%1$s" class="%2$s">%3$s</ul>'
            );
            wp_nav_menu($defaults);
          ?>
          <!-- <div tabindex="0" class="close hide"><a href="#">[ Close ]</a></div> -->
          
        </div><!-- end .container -->
        </div><!-- end #pcontainer -->
        
      </div><!-- end .primary -->
<div class="container nav_close">
  <div tabindex="0" class="close hide" aria-label="Close navigation">
    Close <i class="fa fa-fw fa-close"></i>
  </div>
</div>


      <!--SECONDARY-->
	    <!-- <div class="secondary"  >
        <div id="scontainer">
<?php
            // $defaults = array(
            //   'menu'            => 'Main',
            //   'walker'          => new menu_secondary_walker()
            // );

            // wp_nav_menu($defaults);
          ?>
        </div>
      </div> -->


</header>

</div>


    <!-- <div id="closeMenu">CLOSE</div> -->
