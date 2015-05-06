<?php
  $title = 'Request Appointment';
  $pageId = 'appointment';
?>
<?php include 'includes/header.php' ?>
<div class="grid-100">
  <h1>Request Appointment</h1>
  <p>
    <strong>Note:</strong> requesting an appointment does not guarantee that you will get one. 
    After submitting you will receive confirmation either by email or phone within 1 business day.
  </p>
</div>
<div class="grid-100" id="appointment-container">
  <div id="appointment-notification"></div>
  
  <form id="appointment-availability-form" action="availabilities.php" method="GET">
    <label for="appointment-date">Appointment Date:</label>
    <input type="text" name="appointment-date" id="appointment-date" />
  </form>
  <div id="available-appointments"></div>

  <div class="hidden">
    <div id="confirm-request">
      <h2>Confirm Request<h2>
      
      <form>
        <div>
          <label for="request-name">Name:</label>
          <input type="text" id="request-name" name="request-name">
        </div>
        <div>
          <label for="request-phone">Phone:</label>
          <input type="text" id="request-phone" name="request-phone">
        </div>
        <div>
          <label for="request-email">Email:</label>
          <input type="text" id="request-email" name="request-email">
        </div>
        <div>
          <input type="submit" value="Confirm">
        </div>
      </form>
    </div>
  </div>
</div>
<script id="available-appointment-tpl" type="text/x-handlebars-template">
  <div class="available-appointment">
    <form>
      <strong class="display-time">{{displayTime}}</strong>
      <button class="request-btn">Request Appointment</button>
      <input type="hidden" name="available-appointment-date" class="available-appointment-date" value="{{availableDate}}">
    </form>
  </div>
</script>
<?php include 'includes/footer.php' ?>