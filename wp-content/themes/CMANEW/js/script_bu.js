/*
 * Modernizr v1.6.1 (with innerShiv)
 * http://www.modernizr.com
 *
 * Developed by:
 * - Faruk Ates  http://farukat.es/
 * - Paul Irish  http://paulirish.com/
 *
 * Copyright (c) 2009-2010
 * Dual-licensed under the BSD or MIT licenses.
 * http://www.modernizr.com/license/
 */
window.Modernizr=function(l,e,q){function v(a,b){return typeof a===b}function E(a,b){for(var c in a)if(k[a[c]]!==q&&(!b||b(a[c],F)))return true}function r(a,b){var c=a.charAt(0).toUpperCase()+a.substr(1);c=(a+" "+G.join(c+" ")+c).split(" ");return!!E(c,b)}function V(){h.input=function(a){for(var b=0,c=a.length;b<c;b++)K[a[b]]=!!(a[b]in j);return K}("autocomplete autofocus list placeholder max min multiple pattern required step".split(" "));h.inputtypes=function(a){for(var b=0,c,i=a.length;b<i;b++){j.setAttribute("type",
a[b]);if(c=j.type!=="text"){j.value=L;if(/^range$/.test(j.type)&&j.style.WebkitAppearance!==q){n.appendChild(j);c=e.defaultView;c=c.getComputedStyle&&c.getComputedStyle(j,null).WebkitAppearance!=="textfield"&&j.offsetHeight!==0;n.removeChild(j)}else/^(search|tel)$/.test(j.type)||(c=/^(url|email)$/.test(j.type)?j.checkValidity&&j.checkValidity()===false:j.value!=L)}M[a[b]]=!!c}return M}("search tel url email datetime date month week time datetime-local number range color".split(" "))}var h={},n=e.documentElement,
N=e.head||e.getElementsByTagName("head")[0],F=e.createElement("modernizr"),k=F.style,j=e.createElement("input"),L=":)",O=Object.prototype.toString,t=" -webkit- -moz- -o- -ms- -khtml- ".split(" "),G="Webkit Moz O ms Khtml".split(" "),z={svg:"http://www.w3.org/2000/svg"},d={},M={},K={},P=[],A,Q=function(a){var b=e.createElement("style"),c=e.createElement("div");b.textContent=a+"{#modernizr{height:3px}}";N.appendChild(b);c.id="modernizr";n.appendChild(c);a=c.offsetHeight===3;b.parentNode.removeChild(b);
c.parentNode.removeChild(c);return!!a},H=function(){var a={select:"input",change:"input",submit:"form",reset:"form",error:"img",load:"img",abort:"img"};return function(b,c){c=c||e.createElement(a[b]||"div");b="on"+b;var i=b in c;if(!i){c.setAttribute||(c=e.createElement("div"));if(c.setAttribute&&c.removeAttribute){c.setAttribute(b,"");i=v(c[b],"function");v(c[b],q)||(c[b]=q);c.removeAttribute(b)}}return i}}(),I={}.hasOwnProperty,R;R=!v(I,q)&&!v(I.call,q)?function(a,b){return I.call(a,b)}:function(a,
b){return b in a&&v(a.constructor.prototype[b],q)};d.flexbox=function(){var a=e.createElement("div"),b=e.createElement("div");(function(i,g,p,w){g+=":";i.style.cssText=(g+t.join(p+";"+g)).slice(0,-g.length)+(w||"")})(a,"display","box","width:42px;padding:0;");b.style.cssText=t.join("box-flex:1;")+"width:10px;";a.appendChild(b);n.appendChild(a);var c=b.offsetWidth===42;a.removeChild(b);n.removeChild(a);return c};d.canvas=function(){var a=e.createElement("canvas");return!!(a.getContext&&a.getContext("2d"))};
d.canvastext=function(){return!!(h.canvas&&v(e.createElement("canvas").getContext("2d").fillText,"function"))};d.webgl=function(){var a=e.createElement("canvas");try{if(a.getContext("webgl"))return true}catch(b){}try{if(a.getContext("experimental-webgl"))return true}catch(c){}return false};d.touch=function(){return"ontouchstart"in l||Q("@media ("+t.join("touch-enabled),(")+"modernizr)")};d.geolocation=function(){return!!navigator.geolocation};d.postmessage=function(){return!!l.postMessage};d.websqldatabase=
function(){return!!l.openDatabase};d.indexedDB=function(){for(var a=-1,b=G.length;++a<b;){var c=G[a].toLowerCase();if(l[c+"_indexedDB"]||l[c+"IndexedDB"])return true}return false};d.hashchange=function(){return H("hashchange",l)&&(e.documentMode===q||e.documentMode>7)};d.history=function(){return!!(l.history&&history.pushState)};d.draganddrop=function(){return H("dragstart")&&H("drop")};d.websockets=function(){return"WebSocket"in l};d.rgba=function(){k.cssText="background-color:rgba(150,255,150,.5)";
return(""+k.backgroundColor).indexOf("rgba")!==-1};d.hsla=function(){k.cssText="background-color:hsla(120,40%,100%,.5)";return(""+k.backgroundColor).indexOf("rgba")!==-1||(""+k.backgroundColor).indexOf("hsla")!==-1};d.multiplebgs=function(){k.cssText="background:url(//:),url(//:),red url(//:)";return/(url\s*\(.*?){3}/.test(k.background)};d.backgroundsize=function(){return r("backgroundSize")};d.borderimage=function(){return r("borderImage")};d.borderradius=function(){return r("borderRadius","",function(a){return(""+
a).indexOf("orderRadius")!==-1})};d.boxshadow=function(){return r("boxShadow")};d.textshadow=function(){return e.createElement("div").style.textShadow===""};d.opacity=function(){var a=t.join("opacity:.55;")+"";k.cssText=a;return/^0.55$/.test(k.opacity)};d.cssanimations=function(){return r("animationName")};d.csscolumns=function(){return r("columnCount")};d.cssgradients=function(){var a=("background-image:"+t.join("gradient(linear,left top,right bottom,from(#9f9),to(white));background-image:")+t.join("linear-gradient(left top,#9f9, white);background-image:")).slice(0,
-17);k.cssText=a;return(""+k.backgroundImage).indexOf("gradient")!==-1};d.cssreflections=function(){return r("boxReflect")};d.csstransforms=function(){return!!E(["transformProperty","WebkitTransform","MozTransform","OTransform","msTransform"])};d.csstransforms3d=function(){var a=!!E(["perspectiveProperty","WebkitPerspective","MozPerspective","OPerspective","msPerspective"]);if(a&&"webkitPerspective"in n.style)a=Q("@media ("+t.join("transform-3d),(")+"modernizr)");return a};d.csstransitions=function(){return r("transitionProperty")};
d.fontface=function(){var a,b,c=N||n,i=e.createElement("style");b=e.implementation||{hasFeature:function(){return false}};i.type="text/css";c.insertBefore(i,c.firstChild);a=i.sheet||i.styleSheet;b=(b.hasFeature("CSS2","")?function(g){if(!(a&&g))return false;var p=false;try{a.insertRule(g,0);p=!/unknown/i.test(a.cssRules[0].cssText);a.deleteRule(a.cssRules.length-1)}catch(w){}return p}:function(g){if(!(a&&g))return false;a.cssText=g;return a.cssText.length!==0&&!/unknown/i.test(a.cssText)&&a.cssText.replace(/\r+|\n+/g,
"").indexOf(g.split(" ")[0])===0})('@font-face { font-family: "font"; src: "font.ttf"; }');c.removeChild(i);return b};d.video=function(){var a=e.createElement("video"),b=!!a.canPlayType;if(b){b=new Boolean(b);b.ogg=a.canPlayType('video/ogg; codecs="theora"');b.h264=a.canPlayType('video/mp4; codecs="avc1.42E01E"')||a.canPlayType('video/mp4; codecs="avc1.42E01E, mp4a.40.2"');b.webm=a.canPlayType('video/webm; codecs="vp8, vorbis"')}return b};d.audio=function(){var a=e.createElement("audio"),b=!!a.canPlayType;
if(b){b=new Boolean(b);b.ogg=a.canPlayType('audio/ogg; codecs="vorbis"');b.mp3=a.canPlayType("audio/mpeg;");b.wav=a.canPlayType('audio/wav; codecs="1"');b.m4a=a.canPlayType("audio/x-m4a;")||a.canPlayType("audio/aac;")}return b};d.localstorage=function(){try{return!!localStorage.getItem}catch(a){return false}};d.sessionstorage=function(){try{return!!sessionStorage.getItem}catch(a){return false}};d.webWorkers=function(){return!!l.Worker};d.applicationcache=function(){return!!l.applicationCache};d.svg=
function(){return!!e.createElementNS&&!!e.createElementNS(z.svg,"svg").createSVGRect};d.inlinesvg=function(){var a=e.createElement("div");a.innerHTML="<svg/>";return(a.firstChild&&a.firstChild.namespaceURI)==z.svg};d.smil=function(){return!!e.createElementNS&&/SVG/.test(O.call(e.createElementNS(z.svg,"animate")))};d.svgclippaths=function(){return!!e.createElementNS&&/SVG/.test(O.call(e.createElementNS(z.svg,"clipPath")))};for(var J in d)if(R(d,J)){A=J.toLowerCase();h[A]=d[J]();P.push((h[A]?"":"no-")+
A)}h.input||V();h.crosswindowmessaging=h.postmessage;h.historymanagement=h.history;h.addTest=function(a,b){a=a.toLowerCase();if(!h[a]){b=!!b();n.className+=" "+(b?"":"no-")+a;h[a]=b;return h}};k.cssText="";F=f=null;l.attachEvent&&function(){var a=e.createElement("div");a.innerHTML="<elem></elem>";return a.childNodes.length!==1}()&&function(a,b){function c(s){for(var m=-1;++m<p;)s.createElement(g[m])}function i(s,m){for(var u=-1,o=s.length,B,S=[];++u<o;){B=s[u];if((m=B.media||m)!="screen")S.push(i(B.imports,
m),B.cssText)}return S.join("")}var g="abbr|article|aside|audio|canvas|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video".split("|"),p=g.length,w=RegExp("(^|\\s)(abbr|article|aside|audio|canvas|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video)","gi"),W=RegExp("<(/*)(abbr|article|aside|audio|canvas|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video)",
"gi"),X=RegExp("(^|[^\\n]*?\\s)(abbr|article|aside|audio|canvas|details|figcaption|figure|footer|header|hgroup|mark|meter|nav|output|progress|section|summary|time|video)([^\\n]*)({[\\n\\w\\W]*?})","gi"),T=b.createDocumentFragment(),C=b.documentElement,U=C.firstChild,y=b.createElement("body"),D=b.createElement("style"),x;c(b);c(T);U.insertBefore(D,U.firstChild);D.media="print";a.attachEvent("onbeforeprint",function(){var s=-1,m=i(b.styleSheets,"all"),u=[],o;for(x=x||b.body;(o=X.exec(m))!=null;)u.push((o[1]+
o[2]+o[3]).replace(w,"$1.iepp_$2")+o[4]);for(D.styleSheet.cssText=u.join("\n");++s<p;){m=b.getElementsByTagName(g[s]);u=m.length;for(o=-1;++o<u;)if(m[o].className.indexOf("iepp_")<0)m[o].className+=" iepp_"+g[s]}T.appendChild(x);C.appendChild(y);y.className=x.className;y.innerHTML=x.innerHTML.replace(W,"<$1font")});a.attachEvent("onafterprint",function(){y.innerHTML="";C.removeChild(y);C.appendChild(x);D.styleSheet.cssText=""})}(l,e);h.shiv=function(){var a,b;return function(c,i){if(!a){a=e.createElement("div");
b=e.createDocumentFragment()}var g=a.cloneNode(true);g.innerHTML=c.replace(/^\s\s*/,"").replace(/\s\s*$/,"");if(i===false)return g.childNodes;for(var p=b.cloneNode(true),w=g.childNodes.length;w--;)p.appendChild(g.firstChild);return p}}();h._enableHTML5=true;h._version="1.6";n.className=n.className.replace(/\bno-js\b/,"")+" js";n.className+=" "+P.join(" ");return h}(this,this.document);

/******MAIN MENU******/

//READY
$(function(){

  // Secondary navigation start
  {

      var header = $('#header');
      var primaryNav = $('#header div.primary');
      var secondaryNav = $('#header div.secondary');
      var cookieBlockHeight =   0;
      var secondaryNavHeight = 200;

      // Update position of secondary nav to line up with primary
      var primaryNavList = $('#header div.primary ul');
      var secondaryNavList = $('#header div.secondary ul');
      for(var i=0;i<primaryNavList.children().length;i++) {
        var primaryNavChild = $(primaryNavList.children()[i]);
        var secondaryNavChild = $(secondaryNavList.children()[i]);

        if(primaryNavChild.hasClass('search')) { // Reached search, stop
          break;
        }

        primaryNavChild.hover(
          function() {
            var rel = $(this).find('a').attr('rel')
            $('#header .secondary a[rel="' + rel + '"]').addClass('active');
          },
          function() {
            var rel = $(this).find('a').attr('rel')
            $('#header .secondary a[rel="' + rel + '"]').removeClass('active');
          }
        );

        secondaryNavChild.find('a').each(function() {
          var path = window.location.pathname;
          if($(this).attr('href') == path) {
            var rel = $(this).attr('rel');
            $('#header .primary a[rel="' + rel + '"]').addClass('active');
          }
        });

        //secondaryNavChild.css('left', primaryNavChild.position().left);
        secondaryNavChild.hover(
          function() {
            var rel = $(this).find('a').attr('rel')
            $('#header .primary a[rel="' + rel + '"]').addClass('sactive');
            $('#header .secondary a[rel="' + rel + '"]').addClass('active');
          },
          function() {
            var rel = $(this).find('a').attr('rel')
            $('#header .primary a[rel="' + rel + '"]').removeClass('sactive');
            $('#header .secondary a[rel="' + rel + '"]').removeClass('active');
          }
        );
      }

      // Initial position of priamry and secondary nav
      primaryNav.css('top', cookieBlockHeight);

      secondaryNav.height(secondaryNavHeight);
      secondaryNav.css('top', -(secondaryNav.outerHeight()-primaryNav.outerHeight()))

      var headerShadowHeight = 0; // Account for the shadow
      var headerCollapsedHeight = primaryNav.outerHeight() + headerShadowHeight;
      var headerExpandedHeight = primaryNav.outerHeight()+secondaryNav.outerHeight() + headerShadowHeight;
      header.height(headerCollapsedHeight);

  

      // Add hover state to the primary nav
      if( Modernizr.touch == false) {

        primaryNav.find('li').each(function() {
          $('#header').mouseenter(
             function() {

               // If secondary disabled, just return, do not show secondary menu
               if($(this).hasClass('secondary-disabled')) {
                 return;
               }

               cookieBlockHeight =  0;

               //header.height(headerExpandedHeight);

               secondaryNav.show();
               secondaryNav.stop().animate({
                 top:primaryNav.outerHeight() + cookieBlockHeight
               }, 400);

            /*  
            $('#wrapper').stop().animate({
                 'marginTop': '+=175px'
               }, 400);

            $('#sidebar-new').stop().animate({
                 'marginTop': '+=175px'
               }, 400);*/
              
             }
          );
        });

        $('#header').mouseleave(
          function() {
            //header.height(headerCollapsedHeight);

            secondaryNav.stop().animate({
              top:-(secondaryNav.outerHeight()-primaryNav.outerHeight()) + cookieBlockHeight
            }, 400);
            
            /*
            $('#wrapper').stop().animate({
                 'marginTop': '-=175px'
               }, 400);
             $('#sidebar-new').stop().animate({
                 'marginTop': '-=175px'
               }, 400); */

          }
        );
      }
      else {

        primaryNav.find('li').each(function() {
          $(this).click(
            function() {

              // If secondary disabled, just go to link
              if($(this).hasClass('secondary-disabled')) {
                return true;
              }

              // Continue to link
              if(secondaryNav.is(":visible")) {
                return true;
              }
              // Show secondary nav
              else {

                header.height(headerExpandedHeight);

                secondaryNav.show();
                secondaryNav.stop().animate({
                  top:primaryNav.outerHeight()
                }, 'slow');

                $('#content').stop().animate({
                  top:secondaryNav.outerHeight()
                }, 'slow');

                return false;
              }
            }
          );
        });

      }

  }
  // Secondary navigation end
 

 

//END DOC
});