$(document).ready(function() {
  $('.patients-slideshow').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2250,
    speed: 1500
  });
  
  var pageId = $('body').attr('id');
  if(pageId !== '') {
    $('#nav-' + pageId).addClass('nav-selected');
  }

  $('.fancybox').fancybox();

  

  if($('#map-container').length) {
    initializeMap();
  }
});

function initializeMap() {
  var myLatlng = new google.maps.LatLng(42.376181, -71.11575700000003);

  var mapOptions = {
    zoom: 15,
    center: myLatlng
  }

  var map = new google.maps.Map(document.getElementById('map-container'), mapOptions);

  var marker = new google.maps.Marker({
      position: myLatlng,
      map: map,
      title: 'Pediatric Dentist Office'
  });
}