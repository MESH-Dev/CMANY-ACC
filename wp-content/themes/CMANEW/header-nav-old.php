<div class="top-head">
<div id="page-new" >
  <div id="page-right" role="main">

		<div class="top-search">
			<form method="get" id="search" action="<?php echo home_url( '/' ); ?>">
			  <input name="s" id="s" type="text" size="40" placeholder="Search Here..." />
			</form>
		</div>

		<div class="top-button">
			<a href="https://app.etapestry.com/hosted/ChildrensMuseumoftheArts/Donation.html" target="_blank">
				Donate </a>
		</div>

		<div class="top-social">
			 <a target="_blank" href="http://on.fb.me/nqqBkf"><img src="<?php bloginfo( 'template_url' )?>/images/facebook.png" /></a>
			 <a target="_blank" href="http://twitter.com/#!/CMAinNYC"><img src="<?php bloginfo( 'template_url' )?>/images/twitter.png" /></a>
			 <a target="_blank" href="http://blog.cmany.org<?php //bloginfo('rss2_url'); ?>"><img src="<?php bloginfo( 'template_url' )?>/images/blog_blue.png" /></a>
			 <a target="_blank" href="http://www.flickr.com/photos/cma_in_nyc/"><img src="<?php bloginfo( 'template_url' )?>/images/flickr.png" /></a>
		</div>
	</div><!-- #page right -->
</div><!-- #page (main container) -->
<div class="clear"></div>
</div><!-- .top-head (header container) -->



<header id="header">

      <!--PRIMARY-->
	    <div class="primary"  >
        <div id="pcontainer">
<?php
            $defaults = array(
              'menu'            => 'Main',
              'depth' => 1
            );
            wp_nav_menu($defaults);
          ?>
        </div>
      </div>



      <!--SECONDARY-->
	    <div class="secondary"  >
        <div id="scontainer">
<?php
            $defaults = array(
              'menu'            => 'Main',
              'walker'          => new menu_secondary_walker()
            );

            wp_nav_menu($defaults);
          ?>
        </div>
      </div>


</header>
    <div id="closeMenu">CLOSE</div>
