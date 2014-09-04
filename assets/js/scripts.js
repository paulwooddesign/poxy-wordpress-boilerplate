// Resize
// @codekit-prepend "../../bower_components/jquery-smartresize/jquery.throttledresize.js"
// @codekit-prepend "../../bower_components/jquery-smartresize/jquery.debouncedresize.js"

// Way Points
// @codekit-prepend "../../bower_components/jquery-waypoints/waypoints.min.js"

// Easy Tabs
// @codekit-prepend "../../bower_components/jquery-hashchange/jquery.ba-hashchange.min.js"
// @codekit-prepend "../../bower_components/easytabs/lib/jquery.easytabs.min.js"

// @codekit-prepend "../../bower_components/Tabslet/jquery.tabslet.js

///////////////////////////////
//  Way Points
///////////////////////////////

function set_waypoints(){

  jQuery('.wp1').waypoint(function() {
    jQuery('.wp1').addClass('animated fadeInLeft');
  }, {
    offset: '75%'
  });
  jQuery('.wp2').waypoint(function() {
    jQuery('.wp2').addClass('animated fadeInUp');
  }, {
    offset: '75%'
  });
  jQuery('.wp3').waypoint(function() {
    jQuery('.wp3').addClass('animated fadeInRight');
  }, {
    offset: '55%'
  });
  jQuery('.wp4').waypoint(function() {
    jQuery('.wp4').addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });
  jQuery('.wp5').waypoint(function() {
    jQuery('.wp5').addClass('animated fadeInUp');
  }, {
    offset: '75%'
  });
  jQuery('.wp6').waypoint(function() {
    jQuery('.wp6').addClass('animated fadeInDown');
  }, {
    offset: '75%'
  });

}



///////////////////////////////
// Set Home Slideshow Height
///////////////////////////////

function setHomeSlideshowHeight() {
  var topOffest = (jQuery('body').hasClass('admin-bar')) ? 28 : 0;
  var headerHeight = jQuery('#header').height();
  var windowHeight = jQuery(window).height()-(topOffest+headerHeight) - 100;
  jQuery('.full-screen-slideshow .slideshow').height(windowHeight);
  jQuery('.full-screen-slideshow .copy-width').height(windowHeight);
  jQuery('.full-screen-slideshow .slideshow .slide').height(windowHeight);
  jQuery('.full-screen-slideshow').height(windowHeight);
  jQuery('.full-screen-slideshow .slideshow .flex-direction-nav').css('top', (windowHeight/2)-15 );
  jQuery('.full-screen-slideshow .slideshow .flex-control-nav').css('top', windowHeight-40 );
  jQuery('#container').css('padding-top', headerHeight );
}


//////////////////////////////////
// Initialize
//////////////////////////////////

jQuery.noConflict();

jQuery(document).ready(function(){
  setHomeSlideshowHeight();
  set_waypoints();

});


jQuery(window).load(function(){

  //resize
  jQuery(window).bind("throttledresize", function() {
    setHomeSlideshowHeight();
  });


});
