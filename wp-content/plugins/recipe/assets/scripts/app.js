// RIPPLER
// ---------------------------------------------------
jQuery(document).ready(function() {
  jQuery(".rippler").rippler({
    effectClass      :  'rippler-effect'
    ,effectSize      :  16      // Default size (width & height)
    ,addElement      :  'div'   // e.g. 'svg'(feature)
    ,duration        :  800
  });
});

// DOTDOTDOT
// ---------------------------------------------------
jQuery(function() {
	jQuery('.dots').dotdotdot();
});

// TOOLTIPS
// ---------------------------------------------------
!function (jQuery) {
  jQuery(function(){

    // tooltip demo
    jQuery("[data-toggle=tooltip]").tooltip();

    // popover demo
    jQuery("[data-toggle=popover]").popover();
    
    // swipebox
    jQuery('.swipebox').swipebox();

  })
}(window.jQuery)

// SCROLL CONTENT
// ---------------------------------------------------
jQuery(window).load(function() {
    jQuery('.scroll-content').slimScroll({
        height: '250px'
    });
});

// GMAPS
// ---------------------------------------------------
!function (jQuery) {

    // -------------------------
    // Map Style definition
    // -------------------------

    // Custom core styles
    // Get more styles from http://snazzymaps.com/style/29/light-monochrome
    // - Just replace and assign to "MapStyles" the new style array
    var MapStyles = [{"featureType":"administrative.locality","elementType":"all","stylers":[{"hue":"#2c2e33"},{"saturation":7},{"lightness":19},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"simplified"}]},{"featureType":"poi","elementType":"all","stylers":[{"hue":"#ffffff"},{"saturation":-100},{"lightness":100},{"visibility":"off"}]},{"featureType":"road","elementType":"geometry","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"simplified"}]},{"featureType":"road","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":31},{"visibility":"on"}]},{"featureType":"road.arterial","elementType":"labels","stylers":[{"hue":"#bbc0c4"},{"saturation":-93},{"lightness":-2},{"visibility":"simplified"}]},{"featureType":"road.local","elementType":"geometry","stylers":[{"hue":"#e9ebed"},{"saturation":-90},{"lightness":-8},{"visibility":"simplified"}]},{"featureType":"transit","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":10},{"lightness":69},{"visibility":"on"}]},{"featureType":"water","elementType":"all","stylers":[{"hue":"#e9ebed"},{"saturation":-78},{"lightness":67},{"visibility":"simplified"}]}];


    // -------------------------
    // Custom Script
    // -------------------------

    var mapSelector = '[data-toggle="gmap"]';

    if(jQuery.fn.gMap) {
        var gMapRefs = [];
        
        jQuery(mapSelector).each(function(){
            
            var jQuerythis   = jQuery(this),
                addresses = jQuerythis.data('address') && jQuerythis.data('address').split(';'),
                titles    = jQuerythis.data('title') && jQuerythis.data('title').split(';'),
                zoom      = jQuerythis.data('zoom') || 14,
                maptype   = jQuerythis.data('maptype') || 'ROADMAP', // or 'TERRAIN'
                markers   = [];

            if(addresses) {
              for(var a in addresses)  {
                  if(typeof addresses[a] == 'string') {
                      markers.push({
                          address:  addresses[a],
                          html:     (titles && titles[a]) || '',
                          popup:    true   /* Always popup */
                        });
                  }
              }

              var options = {
                  controls: {
                         panControl:         true,
                         zoomControl:        true,
                         mapTypeControl:     true,
                         scaleControl:       true,
                         streetViewControl:  true,
                         overviewMapControl: true
                     },
                  scrollwheel: false,
                  maptype: maptype,
                  markers: markers,
                  zoom: zoom,
                  icon: {
			        image: "images/marker.png",
			        iconsize: [36, 50],
			        shadowsize: [37, 34],
			        iconanchor: [9, 34],
			        shadowanchor: [19, 34]
			    }
                  // More options https://github.com/marioestrada/jQuery-gMap
              };

              var gMap = jQuerythis.gMap(options);

              var ref = gMap.data('gMap.reference');
              // save in the map references list
              gMapRefs.push(ref);

              // set the styles
              if(jQuerythis.data('styled') !== undefined) {
                
                ref.setOptions({
                  styles: MapStyles
                });

              }
            }

        }); //each
    }
    
    // Center Map marker on resolution change
    jQuery(window).resize(function() {

        if(gMapRefs && gMapRefs.length) {
            for( var r in gMapRefs) {
              var mapRef = gMapRefs[r];
              var currMapCenter = mapRef.getCenter();
              if(mapRef && currMapCenter) {
                  google.maps.event.trigger(mapRef, "resize");
                  mapRef.setCenter(currMapCenter);
              }
            }
        }
    });


}(window.jQuery)