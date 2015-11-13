

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

//READY
jQuery(document).ready(function($){
  console.log('hey there');

  $(".lightbox").colorbox({iframe:true,width:"80%", height:"80%" });
  $(".lightbox_content").colorbox({inline:true,width:"60%" });



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


  /*
  /////////////////////////////////////////LANDING///////////////////////////////
  */

  $(".overview-item").hover(
  function(){
    $(this).find('.subtitle').stop().animate({
       top:'-250px'
    },400);
  // This only fires if the row is not undergoing an animation when you mouseover it
  },
  function() {
    $(this).find('.subtitle').stop().animate({
       top:'-90px'
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
       top:'-90px'
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

    //HOVER
    $(".primary,.secondary").hover(

        //IN
        function(){

            //ANIMATE HEADER
            $("#header").stop().animate({
                'height':240
            },300);

            //SUBMENU
            $(".secondary").slideDown(300);

            //LOGO
           $("#sidebar-new").stop().animate({'margin-top':'311px'},300);

            //IF TOUCHSCREEN
            if ('ontouchstart' in document.documentElement) {
              $("#closeMenu").fadeIn(500);
            }

        //END IN
        },

        //OUT
        function(){

             //ANIMATE HEADER
            $("#header").stop().animate({
                'height': 48
            }, 300);

            //LOGO
           $("#sidebar-new").stop().animate({'margin-top': '120px'},300);

            //IF TOUCHSCREEN
            if ('ontouchstart' in document.documentElement) {
              $("#closeMenu").fadeOut(100);
            }

        //END OUT
        }

    //END HOVER
    );


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


    /*
    //////////////////////////////////////CAROUSEL///////////////////////////////
    */







    $('#carousel').carouFredSel({
          width: '100%',
          align:'center',
          pause: true,
          items: {
            visible: 3,
            start: -1
          },
          scroll: {
            items: 1,
            duration: 1000,
            timeoutDuration: 7000
          },
          prev: '#prev',
          next: '#next',
          pagination: {
            container: '#pager',
            deviation: 1
          }
        });

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

    });

});




jQuery(document).ready(function($){
	$repT = $('h3#filterBy span').last().text().replace(',','');
	$('h3#filterBy span').last().text($repT);

	//Single Event Ajax
	$('button.feedBack').click(function(){
		$('#calendarMain').toggleClass('active').toggleClass('fade');
		$('#calendarFeed').toggleClass('active');
		$('.calendar_main_column').height('auto');
		$('#event-content').empty();
	});

	$('.event_box h2 a').click(function(e){
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

	$('.event_box .event_content a').click(function(e){
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

	$('body').delegate('.calTrig',"click",function(i){
		$curMonth = $('#event_mini_calendar h2').attr('data-month');
		$curYear  = $('#event_mini_calendar h2').attr('data-year');
		$NextPrev = $(this).attr('data-tofrom');
		$.ajax({
			type  	: "POST",
			url		:  "http://cmany.org/wp-content/themes/CMANEW/blocks/blocks/event_mini_calendar.php",
			data	: {curMonth: $curMonth, curYear: $curYear, reload:true, tofrom:$NextPrev}
		})
		.done(function(result) {
			$('#event_mini_calendar').html(result);
		})
		.fail(function() {
		})
		.always(function() {
		});
	});

	$('.day').each(function(){
		$this = $(this);
		if($(this).children('.day_right').children('.event_box').length == 0){
			$this.hide();
		}
	});

	$('body').delegate('.calTrigclass',"click",function(i){
		$curMonth = $('#class_mini_calendar h2').attr('data-month');
		$curYear  = $('#class_mini_calendar h2').attr('data-year');
		$NextPrev = $(this).attr('data-tofrom');
		$.ajax({
			type  	: "POST",
			url		: templateDir+"/blocks/class_mini_calendar.php",
			data	: {curMonth: $curMonth, curYear: $curYear, reload:true, tofrom:$NextPrev}
		})
		.done(function(result) {
			$('#class_mini_calendar').html(result);
		})
		.fail(function() {
		})
		.always(function() {
		});
	});

	$('.day').each(function(){
		$this = $(this);
		if($(this).children('.day_right').children('.event_box').length == 0){
			$this.hide();
		}
	});
});
