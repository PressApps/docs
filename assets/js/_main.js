/* ========================================================================
 * DOM-based Routing
 * Based on http://goo.gl/EUTi53 by Paul Irish
 *
 * Only fires on body classes that match. If a body class contains a dash,
 * replace the dash with an underscore when adding it to the object below.
 *
 * .noConflict()
 * The routing is enclosed within an anonymous function so that you can 
 * always reference jQuery with $, even when in .noConflict() mode.
 *
 * Google CDN, Latest jQuery
 * To use the default WordPress version of jQuery, go to lib/config.php and
 * remove or comment out: add_theme_support('jquery-cdn');
 * ======================================================================== */

(function($) {

// Use this variable to set up the common and page specific functions. If you 
// rename this variable, you will also need to rename the namespace below.
var Roots = {
  // All pages
  common: {
    init: function() {
      // JavaScript to be fired on all pages
      $(".main").fitVids();

/*

$('#button').toggle( 
    function() {
        $('.banner').animate({ left: 250 }, 'slow', function() {
            $('#button').html('Close');
        });
    }, 
    function() {
        $('.banner').animate({ left: 0 }, 'slow', function() {
            $('#button').html('Menu');
        });
    }
);
*/


$(document).ready(function() {
  $('#sidebar').sidr();
});

    }
  },
  // Home page
  home: {
    init: function() {
      // JavaScript to be fired on the home page
    }
  },
  // About us page, note the change from about-us to about_us.
  about_us: {
    init: function() {
      // JavaScript to be fired on the about us page
    }
  }
};

// The routing fires all common scripts, followed by the page specific scripts.
// Add additional events for more control over timing e.g. a finalize event
var UTIL = {
  fire: function(func, funcname, args) {
    var namespace = Roots;
    funcname = (funcname === undefined) ? 'init' : funcname;
    if (func !== '' && namespace[func] && typeof namespace[func][funcname] === 'function') {
      namespace[func][funcname](args);
    }
  },
  loadEvents: function() {
    UTIL.fire('common');

    $.each(document.body.className.replace(/-/g, '_').split(/\s+/),function(i,classnm) {
      UTIL.fire(classnm);
    });
  }
};

$(document).ready(UTIL.loadEvents);

})(jQuery); // Fully reference jQuery after this point.



/***************************************************
      Docs Voting
***************************************************/
jQuery().ready(function(){
  jQuery('a.like-btn').click(function(){
    response_div = jQuery(this).parent().parent();
    jQuery.ajax({
      url         : PAAV.base_url,
      data        : {'vote_like':jQuery(this).attr('post_id')},
      beforeSend  : function(){},
      success     : function(data){
        response_div.hide().html(data).fadeIn(400);
      },
      complete    : function(){}
    });
  });
  
  jQuery('a.dislike-btn').click(function(){
    response_div = jQuery(this).parent().parent();
    jQuery.ajax({
      url         : PAAV.base_url,
      data        : {'vote_dislike':jQuery(this).attr('post_id')},
      beforeSend  : function(){},
      success     : function(data){
        response_div.hide().html(data).fadeIn(400);
      },
      complete    : function(){}
    });
  });
});

/***************************************************
      Live Search
***************************************************/
var _url = '';
jQuery(function ($) {
    'use strict';

    jQuery.Autocomplete.prototype.suggest = function () {
      
        if (this.suggestions.length === 0) {
            this.hide();
            return;
        }

        var that = this,
            formatResult = that.options.formatResult,
            value = that.getQuery(that.currentValue),
            className = that.classes.suggestion,
            classSelected = that.classes.selected,
            container = $(that.suggestionsContainer),
            html = '';
        // Build suggestions inner HTML
        $.each(that.suggestions, function (i, suggestion) {
            html += '<div class="' + className + '" data-index="' + i + '"><h4>'+suggestion.icon + formatResult(suggestion, value) + '</h4></div>';
        });

        container.html(html).show();
        that.visible = true;

        // Select first value by default:
        if (that.options.autoSelectFirst) {
            that.selectedIndex = 0;
            container.children().first().addClass(classSelected);
        }
    };
    
 // Initialize ajax autocomplete:
    $('#live').autocomplete({
        serviceUrl: _url + '/wp-admin/admin-ajax.php',
        params: {'action':'search_title'},
        minChars: 2,
        maxHeight: 450,
        onSelect: function(suggestion) {
          window.location = suggestion.data.url;
        }
    });
});

/*
22236666
jQuery(window).resize(function() {
  var path = $(this);
  var contW = path.width();
  if(contW >= 751){
    document.getElementsByClassName("sidebar-toggle")[0].style.left="250px";
  }else{
    document.getElementsByClassName("sidebar-toggle")[0].style.left="-250px";
  }
});
*/

/*
!function(){
  var e=Chart.helpers;Chart.defaults.global.responsive=!0,Chart.defaults.global.animation=!1;
  var t=document.getElementById("js-toggle-menu");
  e.addEvent(t,"click",function(){document.body.className=-1!==document.body.className.indexOf("open-menu")?"closed-menu":"open-menu"});
  var n=document.getElementsByTagName("article");

  e.each(n,function(t){if(t.id){var n=t.getElementsByTagName("canvas"),a=t.getElementsByTagName("h3"),l=t.querySelectorAll(".javascript"),i=Array.prototype.slice.call(l,0,2);
    if(articleId=t.id,list=document.createElement("ul"),navigationItem=document.getElementById("link-"+articleId),list.className="subsection-navigation",e.each(a,function(e){var t=document.createElement("li");
      e.id=articleId+"-"+e.textContent.replace(/\s+/g,"-").toLowerCase(),t.innerHTML='<a href="#'+e.id+'">'+e.textContent+"</a>",list.appendChild(t)}),a.length>0&&navigationItem.appendChild(list),n.length>0){var o="",c=[];
    e.each(n,function(e){c.push(e.getContext("2d"))}),c=c.length>1?c:c[0];
    for(var d=i.length-1;d>=0;d--)o+=i[d].textContent;
      new Function("ctx","options",o)(c)}}})}();

  */

jQuery().ready(function($){

  $('.js-toggle-menu').click(function(){
    document.body.className=-1!==document.body.className.indexOf("open-menu")?"closed-menu":"open-menu";
  });

  $(".scroll-top").hide();

  $(window).scroll(function () {
      if ($(this).scrollTop() > 500) {
          $('.scroll-top').fadeIn();
      } else {
          $('.scroll-top').fadeOut();
      }
  });

  $( '.scroll-top' ).click( function ( e ) {
    $( 'body,html' ).animate( { scrollTop: 0 }, 500 );
    e.preventDefault();
  });

});
    

jQuery().ready(function($){

  $('.menu-item-has-children').find('.sub-menu').hide();
  $('.menu-item-has-children > a').click(function(e){
    $this = $(this);
      $this.parent().find('ul').slideToggle(200);
      e.preventDefault();
  });

  $( '.menu-title a' ).each( function () {
    var destination = '';
    $( this ).click( function( e ) {
      e.preventDefault();
      var elementClicked = $( this ).attr( 'href' );
      var elementOffset = jQuery( 'body' ).find( elementClicked ).offset();
      destination = elementOffset.top;
      jQuery( 'html,body' ).animate( { scrollTop: destination - 40 }, 300 );
    } );
  });

});
