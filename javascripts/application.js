$(document).ready(function() {
  $('.patients-slideshow').slick({
    arrows: false,
    autoplay: true,
    autoplaySpeed: 2250,
    speed: 1500
  });
  // prevents the images from showing up for a split second when the page is rendered, but before slick takes over.
  $('.patients-slideshow div').show();

  var pageId = $('body').attr('id');
  if(pageId !== '') {
    $('#nav-' + pageId).addClass('nav-selected');
  }

  $('.fancybox').fancybox();

  if($('#map-container').length) {
    initializeMap();
  }

  var $appointmentDate = $('#appointment-date');
  if($appointmentDate.length) {
    $appointmentDate.datepicker({
      dateFormat: 'mm/dd/yy'
    });

    $appointmentDate.on('change', requestAvailabilities);

    $('#available-appointments').on('click', '.request-btn', function(e) {
      e.preventDefault();

      var $form = $(e.target).parent();

      var requestedTime = new Date($form.find('.available-appointment-date').val());

      $('#confirm-request form')[0].reset();
      
      $.fancybox({
          href: '#confirm-request', 
          autoSize: false,
          width: '25%',
          height: 'auto'
      });
    });

    $('#confirm-request form').on('submit', function(e) {
      e.preventDefault();

      var $nameEl = $('#request-name'),
          $phoneEl = $('#request-phone'),
          $emailEl = $('#request-email');

      var name = $nameEl.val(),
          phone = $phoneEl.val(),
          email = $emailEl.val();

      var hasErrors = false;

      if(name === undefined || name === '') {
        hasErrors = true;
        $nameEl.parent().addClass('error');
      }

      if(phone === undefined || phone === '') {
        hasErrors = true;
        $phoneEl.parent().addClass('error');
      }

      if(!hasErrors) {
        $.fancybox.close();

        $('#appointment-availability-form').hide();
        $('#available-appointments').empty();

        $('#appointment-notification').noty({
          text: 'Successfully submitted request. You should receive notification confirming your appointment within 1 business day. If not please call.',
          theme: 'relax',
          type: 'success'
        });
      }
    });
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

function requestAvailabilities(e) {
  var currentDate = new Date(),
      appointmentDateStr = e.target.value,
      appointmentDate = new Date(appointmentDateStr);

  currentDate.setHours(0, 0, 0, 0);

  $.noty.closeAll();
  $availableAppointments = $('#available-appointments');
  $availableAppointments.empty();

  if(appointmentDate < currentDate) {
    $('#appointment-notification').noty({
      text: 'Appointment date must be in the future',
      theme: 'relax',
      type: 'error',
      timeout: 5000
    });
  } else {
    $.ajax({
      url: 'availabilities.php',
      data: {
        appointmentDate: appointmentDateStr
      }
    }).done(function(response) {
      var tpl = Handlebars.compile($('#available-appointment-tpl').html());

      $availableAppointments.append('<h3>Available Appointments</h3>');

      $.each(response, function(i, time) {
        time = new Date(time);

        var hours = time.getHours(),
            mins = time.getMinutes();

        var ampm = 'AM';
        if(hours >= 12) {
          ampm = 'PM'
        }

        if(mins < 10) {
          mins = '0' + mins;
        }

        hours = hours % 12 || 12;

        var displayTime = hours + ':' + mins + ' ' + ampm;
        
        var html = tpl({displayTime: displayTime, availableDate: time});

        $availableAppointments.append(html);
      });
    });
  }
}