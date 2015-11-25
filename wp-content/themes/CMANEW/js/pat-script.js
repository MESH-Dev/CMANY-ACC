

//FUNCTION
function setEqualHeight(columns){
 var tallestcolumn = 0;
 columns.each(
   function() {
   currentHeight = $(this).height();
     if(currentHeight > tallestcolumn){
      tallestcolumn  = currentHeight;
     }
   }
 );

 columns.height(tallestcolumn);

 //END FUNC
}

$(function() {
    $("#header .menu li > ul").addClass('hider').hide();

});

//READY
$(document).ready(function(){

  $('.sidr-trigger').sidr({
    name:'sidr-menu',
    renaming:false,
    source: 'header#header #pcontainer'
  })

  $('.sidr-close').click(
    function(){
      $.sidr('close', 'sidr-menu');
       console.log("Sidr should be closed");
    });

  $('.skiptocontent').click(function(){
    $('#page-container').focus();
  });

  //$('#header ul.menu > li').wrap('<div class="two columns">');

  $(".lightbox").colorbox({iframe:true,width:"80%", height:"80%" });
  $(".lightbox_content").colorbox({inline:true,width:"60%" });

  $('.pane *').attr("tabindex","0");

var bWidth = $('body').width();
console.log(bWidth);

// if ($window.matchMedia(('max-width: 767px')).matches){
//   $('*').removeClass('offset-by-one');
// }
//:::://////////////////////// Resize video  ///////////////////////////////:::://
//via https://css-tricks.com/NetMag/FluidWidthVideo/Article-FluidWidthVideo.php //

  // Find all YouTube videos
var wWidth = $(window).width();

//if (wWidth <= 500){
var $allVideos = $("iframe[src^='//www.youtube.com'], iframe[src^='//player.vimeo.com']"),

    // The element that is fluid width
    $fluidEl = $("#page-container");

// Figure out and save aspect ratio for each video
$allVideos.each(function() {

  $(this)
    .data('aspectRatio', this.height / this.width)

    // and remove the hard coded width/height
    .removeAttr('height')
    .removeAttr('width');

});

// When the window is resized
$(window).resize(function() {

  var newWidth = $fluidEl.width();

  // Resize all videos according to their own aspect ratio
  $allVideos.each(function() {

    var $el = $(this);
    $el
      //.width(newWidth)
      .height(newWidth * $el.data('aspectRatio'));

  });

// Kick off one resize to fix all videos on page load
}).resize();
//}
//:::: END :::://

//::::::::::::::  Mini Calendar Size ::::::::::::::::://

function miniCalendar(){
  var tWidth = $('#event_mini_calendar, #class_mini_calendar').width();
  var cellSize = (tWidth-2)/7;

  $('#event_mini_calendar td a, #event_mini_calendar td, #event_mini_calendar th, #class_mini_calendar td a, #class_mini_calendar td, #class_mini_calendar th')
      .css({width:cellSize, height:cellSize});
}

miniCalendar();
$(window).resize(miniCalendar);

//:::::::::::::::::::::::::::::::::::::::::::::::::::::://

//::::::::::::::  Sidebar location ::::::::::::::::::://
function sidebarMargin(){

  var windowW = $(window).width();
  var sidebarWidth = $('#sidebar-new').width();
  var margin = ((windowW - 979.992)/2)-sidebarWidth;
  
  $('.home #sidebar-new').css({marginLeft:margin});

  //console.log(sidebarWidth);
  //console.log(margin);
  //console.log(wWidth);
}

$(window).resize(sidebarMargin);
sidebarMargin();

//:::::::::::::::::::::::::::::::::::::::::::::::::::::://

  /////////////////////////////////////////TABS///////////////////////////////

	//$("ul.tabs").tabs("> .pane");

  $(".newtabs").each(function( index ) {
      var theid = $(this).attr('id');
      theid = "#" + theid;

      $(theid).tabs();
  });

  //$("#tabs1").tabs();
  //$("#tabs2").tabs();


		//<!--$("ul.tabs").tabs("> .pane", { history: true });-->

  $("ul.tabs").children('p').remove();
  $("ul.tabs").children('br').remove();

  //Adds tabindex attribut to ANY alement created inside of a tab pane.
  $('.pane *').attr("tabindex","0");


  /*
  /////////////////////////////////////////LANDING///////////////////////////////
  */

  $(".overview-item").hover(
  function(){
    $(this).find('a').stop().animate({
       top:'0'
    },400);
  // This only fires if the row is not undergoing an animation when you mouseover it
  },
  function() {
    $(this).find('a').stop().animate({
       top:'83%'
    },400);
  });

  $(".hover-image").hover(
  function(){
    $(this).find('.subtitle').stop().animate({
       top:'-185px'
    },400);
  // This only fires if the row is not undergoing an animation when you mouseover it
  },
  function() {
    $(this).find('.subtitle').stop().animate({
       top:'-30px'
    },400);
  });

    $("#event_sidebar .hover-image").hover(
  function(){
    $(this).find('.subtitle').stop().animate({
       top:'-185px'
    },400);
  // This only fires if the row is not undergoing an animation when you mouseover it
  },
  function() {
    $(this).find('.subtitle').stop().animate({
       top:'-60px'
    },400);
  });

    $(".listing-item").hover(
  function(){
    $(this).find('.subtitle').stop().animate({
       top:'-90px'
    },200);
  // This only fires if the row is not undergoing an animation when you mouseover it
  },
  function() {
    $(this).find('.subtitle').stop().animate({
       top:'-55px'
    },400);
  });



  /*
  /////////////////////////////////////////LISTING///////////////////////////////
  */



    var hash = window.location.hash.substring(1);


    if(hash != ''){

      var jhash = "." + hash;



      $('.listing-row').removeClass('show');
      $('p.learnmore').show();

      var $active_row = $(jhash).nextAll('.listing-row:first');
      var $html = $(jhash).children('.subtitle');
      $html.children('p.learnmore').hide();

      var content = $(jhash).children('.subtitle').html();

      $active_row.children('.listing-content').html(content);
      $active_row.addClass('show');

      $('html, body').animate({
        scrollTop: $(jhash).offset().top
      }, 1000);

    }


  $(".listing-item").click(function() {

      $('.listing-row').fadeOut('slow');
      $('p.learnmore').fadeIn('slow');

      var $active_row = $(this).nextAll('.listing-row:first');
      var $html = $(this).children('.subtitle');
      $html.children('p.learnmore').hide();
      var content = $(this).children('.subtitle').html();
      $active_row.children('.listing-content').html(content)



      $active_row.fadeIn('slow') ;
      ;





  });

  $('a.xclose').click(function() {

      $('.listing-row').fadeOut('slow');


  });


  /*
  ///////////////////////////////////////MAIN MENU////////////////////////////
  */
  if ($(window).width() > 767){
    //HOVER
    $("ul.menu").hover(

        //IN
        function(){

            //ANIMATE HEADER
            // $("#header").stop().animate({
            //     'height':240
            // },300);

            $('header#header div.primary').css({'overflow':'visible'}).animate({'height':344}, 300);
            
            setTimeout(function(){$('#header ul.sub-menu').show();}, 250);
            $('.close').removeClass('hide');
            //SUBMENU
            //$(".secondary").slideDown(300);

            //$("#header .menu li > ul").show();

            //LOGO
           $(".home #sidebar-new").stop().animate({'margin-top':'449px'},300);

            //IF TOUCHSCREEN
            if ('ontouchstart' in document.documentElement) {
              $("#closeMenu").fadeIn(500);
            }

        //END IN
        });

        $('.close a').click(function(){
          $('header#header div.primary').animate({'height':0}, 300);
          $('#header ul.sub-menu').hide();
          $('.close').addClass('hide');
          $('.home #sidebar-new').animate({'margin-top':'105px'},300);
        });
        //OUT
        // function(){

        //      //ANIMATE HEADER
        //     $("#header").stop().animate({
        //         'height': 48
        //     }, 300);

        //     //LOGO
        //    $("#sidebar-new").stop().animate({'margin-top': '120px'},300);

        //    $("#header .menu li > ul").hide();

        //     //IF TOUCHSCREEN
        //     if ('ontouchstart' in document.documentElement) {
        //       $("#closeMenu").fadeOut(100);
        //     }

        // //END OUT
        // }

    //END HOVER
  

    //  //FOCUS
    // $(".menu li a").keyup(

    //     //IN
    //     function(){

    //         //ANIMATE HEADER
    //         $("#header").stop().animate({
    //             'height':240
    //         },300);

    //         $(this).addClass('tabbed');

    //         //SUBMENU
    //         $(".secondary").slideDown(300);

    //         //LOGO
    //        $("#sidebar-new").stop().animate({'margin-top':'311px'},300);

    //         //IF TOUCHSCREEN
    //         if ('ontouchstart' in document.documentElement) {
    //           $("#closeMenu").fadeIn(500);
    //         }

    //     //END IN
    //     },

    //     //OUT
    //     function(){

    //          //ANIMATE HEADER
    //         $("#header").stop().animate({
    //             'height': 48
    //         }, 300);

    //         //LOGO
    //        $("#sidebar-new").stop().animate({'margin-top': '120px'},300);

    //         //IF TOUCHSCREEN
    //         if ('ontouchstart' in document.documentElement) {
    //           $("#closeMenu").fadeOut(100);
    //         }

    //     //END OUT
    //     }

    // //END FOCUS
    // );
}
    //CLICK CLOSE BUTTON
    $("#closeMenu").click(function(){

            //ANIMATE HEADER
            $("#header").stop().animate({
                'height': 50
            }, 300);

           //LOGO
           $("#sidebar-new").stop().animate({'margin-top': '120px'},300);

           //IF TOUCHSCREEN
            if ('ontouchstart' in document.documentElement) {
              $("#closeMenu").fadeOut(100);
            }

    //END CLICK
    });

    $('ul.menu').keyup(function(event){
      var key = event.which;
      if (key === 9 || (key > 36 && key < 41)) {
        //alert(key);
        //$('ul.sub-menu').show();
        $('header#header div.primary').css({'overflow':'visible'}).animate({'height':344}, 300);
        setTimeout(function(){$('ul.sub-menu').delay(10000).show();}, 250);       
        //$('header#header div.primary').css({'height':317});
        $(".home #sidebar-new").stop().animate({'margin-top':'449px'},300);
        //$('#header .menu li > ul').show();
      }
    });

//Add open button to sidr nav links
$('.sidr ul.menu > li').append('<div class="open"><i class="fa fa-fw fa-plus"></i></div>');


//Funcionality for open/close on sidr nav links
$('.sidr .open').toggle(function(){
  //Set every .sub-menu back to initial state on click
  $('ul.sub-menu')
    .slideUp()
    .removeClass('sidr-active');
  //Remove any .fa-minus classes and return to initial fa-plus class on each click
  $('.open i')
    .removeClass('fa-minus')
    .addClass('fa-plus');
  //On click find the nearest ul.sub-menu and open it
  $(this)
    .closest('li')
    .find('ul.sub-menu')
    .addClass('sidr-active')
    .slideDown();
  //On click find the .open button and change the symbol from closed to open
  $(this)
    .find('i')
    .removeClass('fa-plus')
    .addClass('fa-minus');
},
function(){
  //Close the .sub-menu
  $(this)
    .closest('li')
    .find('ul.sub-menu')
    .removeClass('sidr-active')
    .slideUp();;
  $(this).find('i')
    .removeClass('fa-minus')
    .addClass('fa-plus');

});

//Create sidebar functionality @ less than 767px
if ($(window).width() <= 767){
$('#sidebar-new #subMenu')
  .prepend('<li class="related"><span>Related <div class="open_sub"><i class="fa fa-fw fa-chevron-down"></i></span></li>') //<ul class="sub-menu-wrapper">
$('#sidebar-new #subMenu ul').addClass('sidebar-sub hide');
  //.prepend('<li>Related <div class="open_sub"><i class="fa fa-fw fa-plus"></li></li>');

$('li.related').toggle(function(){
  $('#sidebar-new #subMenu')
    .find('ul.sidebar-sub')
    .slideDown();
  $('.open_sub i')
    .removeClass('fa-chevron-down')
    .addClass('fa-chevron-up');},
    function(){
    $('#sidebar-new #subMenu')
      .find('ul.sidebar-sub')
      .slideUp();
    $('.open_sub i')
    .removeClass('fa-chevron-up')
    .addClass('fa-chevron-down');
    
});
}

if ($(window).width() <= 500){
  $('.cal_browseby').click(function(){
    ('.cal_browseby ul li ul').css({left:0});
  });
}
    /*
    //////////////////////////////////////CAROUSEL///////////////////////////////
    */

    var slider_label = function(){$('.slide').addClass('shown');};

    var $highlight = function() { 
    var $this = $("#carousel");

    var items = $this.triggerHandler("currentVisible");     //get all visible items
    $this.children().removeClass("active");                 // remove all .active classes
    items.filter(":eq(1)").addClass("active");              // add .active class to n-th item
};

    $('#carousel').carouFredSel({
          width: '100%',
          align:'center',
          pause: true,
          play: false,
          auto: false,
          //responsive: true,
          items: {
            visible: 3,
            start: -1
          },
          scroll: {
            items: 1,
            duration: 1000,
            timeoutDuration: 7000,
            pauseOnHover: true,
            onAfter: $highlight
          },
          prev: '#prev',
          next: '#next',
          
          pagination: {
            container: '#pager',
            deviation: 1
          }
        });

        $('button#pause').click(function(){
          $('#carousel').trigger("pause", true);
        })
        $('button#play').click(function(){
          $('#carousel').trigger("play", true);
        })

        $("#nextbut").click(function() {
            $("#carousel").trigger("next", 1);
        });
        $("#prevbut").click(function() {
            $("#carousel").trigger("prev", 1);
        });

        $("a.taxonomy-drilldown-reset").hide();

       // setEqualHeight($(".homecols  > .quarter"));

         /*
          $('.prinav li').hover(function(){
             $(".full-sub-nav").stop(1).slideDown();
          },function(){
             $(".full-sub-nav").stop(1).slideUp();
          });  */




//END DOC
});

$( window ).load(function(){

  $("#newslider").carouFredSel({
         pagination: {
            container: '#pager-slides',
            deviation: 1
          },
          responsive: true,
          items: {
            visible: 1,
            start: -1
          },
          auto:true,
          scroll: {
            items: 1,
            duration: 700,
            timeoutDuration: 6000,
            pauseOnHover: true,
            fx: "crossfade"
          }},{
          debug: true

    });

});

        $('button#pause').click(function(){
          $('#newslider').trigger("stop",true);
          console.log("#newslider paused");
        })
        $('button#play').click(function(){
          $('#newslider').trigger("play", true);
          console.log("#newslider playing");
        })
        // $('button#stop').click(function(){
        //   $('#newslider').trigger("stop", true);
        //   console.log("#newslider stopped");
        // })

$('#pager-slides a span').prepend('Slide ');


$(document).ready(function(){
	$repT = $('h3#filterBy span').last().text().replace(',','');
	$('h3#filterBy span').last().text($repT);

	//Single Event Ajax
	$('button.feedBack').click(function(){
		$('#calendarMain').toggleClass('active').toggleClass('fade');
		$('#calendarFeed').toggleClass('active');
		$('.calendar_main_column').height('auto');
    $('#calendarMain').focus();
		$('#event-content').empty();
	});

	$('.event_box h2 a').click(function(e){
		console.log('click');
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, "300");
		$('#loader').toggleClass('active');
		$('#calendarMain').toggleClass('fade');
		$url = $(this).attr('href');
		$newurl = $url.substring(0, $url.length - 1);
		$newurl = $url+' #event-content';
		$('#event-content').load($newurl,function(){
      $(this).attr('tabindex', '-1').focus();
      //$('#event-content h2').focus();
			$('#calendarMain').toggleClass('active');
			$('#calendarFeed').toggleClass('active');
			$('#loader').toggleClass('active');

			$(function() {
			    $( ".newtabs" ).tabs();
			  });

			setTimeout(function(){
				$('.calendar_main_column').height($('#calendarFeed').height());
				$("#newslider").carouFredSel({
			         pagination: {
			            container: '#pager-slides',
			            deviation: 1
			          },
			          items: {
			            visible: 1,
			            start: -1
			          },
			          scroll: {
			            items: 1,
			            duration: 700,
			            timeoutDuration: 6000,
			            fx: "crossfade"
			          }},{
			          debug: true

			    })
			}, 500);

		});
	});

	$('.event_box .event_content a').click(function(e){
		console.log('click');
		e.preventDefault();
		$('html, body').animate({scrollTop: 0}, "300");
		$('#loader').toggleClass('active');
		$('#calendarMain').toggleClass('fade');
		$url = $(this).attr('href');
		$newurl = $url.substring(0, $url.length - 1);
		$newurl = $url+' #event-content';
		$('#event-content').load($newurl,function(){
			$('#calendarMain').toggleClass('active');
			$('#calendarFeed').toggleClass('active');
			$('#loader').toggleClass('active');
			$(function() {
			    $( ".newtabs" ).tabs();
			  });
			setTimeout(function(){
				$('.calendar_main_column').height($('#calendarFeed').height());
				$("#newslider").carouFredSel({
			         pagination: {
			            container: '#pager-slides',
			            deviation: 1
			          },
			          items: {
			            visible: 1,
			            start: -1
			          },
			          scroll: {
			            items: 1,
			            duration: 700,
			            timeoutDuration: 6000,
			            fx: "crossfade"
			          }},{
			          debug: true

			    })
			}, 500);
		});
	});

	$(document).on("click",'.calTrig',function(i){
		console.log('you did it!');
		$curMonth = $('#event_mini_calendar h2').attr('data-month');
		$curYear  = $('#event_mini_calendar h2').attr('data-year');
		$NextPrev = $(this).attr('data-tofrom');
		$.ajax({
			type  	: "POST",
			url		:  "http://localhost:8888/cmany/wp-content/themes/CMANEW/js/widgetAJAX.php",
			data	: {curMonth: $curMonth, curYear: $curYear, reload:true, tofrom:$NextPrev}
		})
		.done(function(result) {
			console.log('success');
			console.log(result);
			$('#event_mini_calendar').html(result);
		})
		.fail(function() {
			console.log( "error" );
		})
		.always(function() {
			console.log('complete');
		});
	});

	$('.day').each(function(){
		$this = $(this);
		if($(this).children('.day_right').children('.event_box').length == 0){
			$this.hide();
		}
	});

	$(document).on("click",'.calTrigclass',function(i){
		$curMonth = $('#class_mini_calendar h2').attr('data-month');
		$curYear  = $('#class_mini_calendar h2').attr('data-year');
		$NextPrev = $(this).attr('data-tofrom');
		$.ajax({
			type  	: "POST",
			url		: templateDir+"/blocks/class_mini_calendar.php",
			data	: {curMonth: $curMonth, curYear: $curYear, reload:true, tofrom:$NextPrev}
		})
		.done(function(result) {
			console.log('success');
			console.log(result);
			$('#class_mini_calendar').html(result);
		})
		.fail(function() {
			console.log( "error" );
		})
		.always(function() {
			console.log('complete');
		});
	});

	$('.day').each(function(){
		$this = $(this);
		if($(this).children('.day_right').children('.event_box').length == 0){
			$this.hide();
		}
	});
});
