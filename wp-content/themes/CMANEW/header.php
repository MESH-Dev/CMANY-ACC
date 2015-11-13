<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js ie6 oldie" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 7]><html class="no-js ie7 oldie" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if IE 8]><html class="no-js ie8 oldie" lang="<?php language_attributes(); ?>"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="<?php language_attributes(); ?>">
<!--<![endif]-->
<head>

<!-- ///// TITLE-->
<title><?php
	/*
	 * Print the <title> tag based on what is being viewed.
	 */
	global $page, $paged;

	wp_title( '/', true, 'right' );

	// Add the blog name.
	bloginfo( 'name' );

	// Add the blog description for the home/front page.
	$site_description = get_bloginfo( 'description', 'display' );
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	// Add a page number if necessary:
	if ( $paged >= 2 || $page >= 2 )
		echo ' | ' . sprintf( __( 'Page %s', 'twentyeleven' ), max( $paged, $page ) );

	?></title>

<!--META-->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta charset="<?php bloginfo( 'charset' ); ?>">



	    <!--CSS-->
	    <link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/style.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php bloginfo( 'template_url' ); ?>/js/colorbox.css" />
		<!--
		<link rel="stylesheet" type="text/css" media="all" href="<?php //bloginfo( 'template_url' ); ?>/css/fonts.css" />
		<link rel="stylesheet" type="text/css" media="all" href="<?php //bloginfo( 'template_url' ); ?>/css/color.css" media="all">

		<link rel="pingback" href="<?php //bloginfo( 'pingback_url' ); ?>" />
		-->

		<!--JAVASCRIPT-->
		<script type='text/javascript'>
			var templateDir = "<?php bloginfo('template_directory') ?>";
		</script>
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
		<script type="text/javascript" src="<?php bloginfo( 'template_url' ); ?>/js/jquery-ui-1.10.3.custom.min.js"></script>
		<script type="text/javascript">var _gaq=_gaq||[];_gaq.push(["_setAccount","UA-9261915-1"]);_gaq.push(["_trackPageview"]);(function(){var e=document.createElement("script");e.type="text/javascript";e.async=true;e.src=("https:"==document.location.protocol?"https://ssl":"http://www")+".google-analytics.com/ga.js";var t=document.getElementsByTagName("script")[0];t.parentNode.insertBefore(e,t)})();</script>
		<script type="text/javascript">var small="width=device-width, initial-scale=.33, maximum-scale=1";var large="width=device-width, initial-scale=.66, maximum-scale=1";var viewPort=document.createElement("meta");viewPort.id="viewport";viewPort.name="viewport";if(window.outerWidth<500){viewPort.content=small}else{viewPort.content=large}document.getElementsByTagName("HEAD")[0].appendChild(viewPort);</script>


<?php	wp_head();?>

 <!--[if lt IE 9]>
<script src="<?php bloginfo( 'template_url' ); ?>/js/html5.js" type="text/javascript"></script>
<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
<link rel="stylesheet" media="screen" href="<?php bloginfo( 'template_url' ); ?>/css/ie.css" />
<![endif]-->
<meta name="google-site-verification" content="IgyERgUFS5ccnEs0twEQ7KVwhMw-o9xBEljrP-fpzYc" />

<?php if (is_page(6587)) {//visit-us
		echo '<script src="//load.sumome.com/" data-sumo-site-id="a3a17e98bc3f1ff9c80d3cbf4da82c609160ddd886bc82efb613d8f7e7c7b72b" async="async"></script>';
	}
	elseif (is_page('events')){ //events page
		echo '<script src="//load.sumome.com/" data-sumo-site-id="53ade6799ea829919a8b56476eaf0eace77d111d67034146c02a6f5dc0cc0611" async="async"></script>';
	}
	elseif (is_page(40)){ //classes
		echo '<script src="//load.sumome.com/" data-sumo-site-id="174c7b9b64f456d52433f3172257d56ab1258d80b60eddc9a08bb329bb371c9e" async="async"></script>';
	}
	elseif (is_page(71)){ //schools-and-community
		echo '<script src="//load.sumome.com/" data-sumo-site-id="66fd6780c5fabad9c84b8949762f4023bcfd67b2d90e4c305f771614d063dd48" async="async"></script>';
	}
	elseif (is_page(472)){ //rentals
		echo '<script src="//load.sumome.com/" data-sumo-site-id="7c1224c391b9919b3a8be99f31db4c2569ec8ef664536dda9e9c3f0f7c2de704" async="async"></script>';
	}
	elseif (is_front_page()){ //home
		echo '<script src="//load.sumome.com/" data-sumo-site-id="796039e81af1fd6d9f69625f4904b3d2a74c34856b8d641782b35b0f165dc9d1" async="async"></script>';
	}
	

	if (is_front_page() || is_page(436)){
		?>
		<!-- Facebook Pixel Code -->

		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','//connect.facebook.net/en_US/fbevents.js');
		fbq('init', '906580689437201');
		fbq('track', "PageView");</script>
		<noscript><img height="1" width="1" style="display:none"
		src="https://www.facebook.com/tr?id=906580689437201&amp;ev=PageView&amp;noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->

				<?php
				}
	?>

</head>
<body <?php body_class(); ?>>

<div class="skiptocontent">
	<a href="#page-container">Skip to main content</a>
</div>
