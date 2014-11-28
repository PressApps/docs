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



/**
 * fastLiveFilter jQuery plugin 1.0.3
 * 
 * Copyright (c) 2011, Anthony Bush
 * License: <http://www.opensource.org/licenses/bsd-license.php>
 * Project Website: http://anthonybush.com/projects/jquery_fast_live_filter/
 **/

jQuery.fn.fastLiveFilter = function(list, options) {
  // Options: input, list, timeout, callback
  options = options || {};
  list = jQuery(list);
  var input = this;
  var timeout = options.timeout || 0;
  var callback = options.callback || function() {};
  
  var keyTimeout;
  
  // NOTE: because we cache lis & len here, users would need to re-init the plugin
  // if they modify the list in the DOM later.  This doesn't give us that much speed
  // boost, so perhaps it's not worth putting it here.
  var lis = list.children();
  var len = lis.length;
  var oldDisplay = len > 0 ? lis[0].style.display : "block";
  callback(len); // do a one-time callback on initialization to make sure everything's in sync
  
  input.change(function() {
    // var startTime = new Date().getTime();
    var filter = input.val().toLowerCase();
    var li;
    var numShown = 0;
    for (var i = 0; i < len; i++) {
      li = lis[i];
      if ((li.textContent || li.innerText || "").toLowerCase().indexOf(filter) >= 0) {
        if (li.style.display == "none") {
          li.style.display = oldDisplay;
        }
        numShown++;
      } else {
        if (li.style.display != "none") {
          li.style.display = "none";
        }
      }
    }
    callback(numShown);
    // var endTime = new Date().getTime();
    // console.log('Search for ' + filter + ' took: ' + (endTime - startTime) + ' (' + numShown + ' results)');
    return false;
  }).keydown(function() {
    // TODO: one point of improvement could be in here: currently the change event is
    // invoked even if a change does not occur (e.g. by pressing a modifier key or
    // something)
    clearTimeout(keyTimeout);
    keyTimeout = setTimeout(function() { input.change(); }, timeout);
  });
  return this; // maintain jQuery chainability
}

jQuery().ready(function(){
    jQuery('#searchcat').fastLiveFilter('.procedures');
});
