<?php
  $title = 'Request Appointment';
  $pageId = 'appointment';
?>
<?php include 'includes/header.php' ?>
<div class="grid-100">
  <h2>Request Appointment</h2>
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
      <h2>Confirm Request</h2>
      <form>
        <div>
          <label for="request-name">Name:</label><br>
          <input type="text" id="request-name" name="request-name">
        </div>
        <div>
          <label for="request-phone">Phone:</label><br>
          <input type="text" id="request-phone" name="request-phone">
        </div>
        <div>
          <label for="request-email">Email:</label><br>
          <input type="text" id="request-email" name="request-email">
        </div>
        <input type="hidden" id="request-appointment-date" name="request-appointment-date" value="">
        <div class="form-actions">
          <button class="btn btn-success" type="submit">Confirm Request</button>
          <button class="btn btn-danger" id="cancel-request-btn">Cancel</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script id="available-appointment-tpl" type="text/x-handlebars-template">
  <div class="available-appointment">
    <form>
      <button class="btn btn-info">Request Appointment</button>
      <strong class="display-time">{{displayTime}}</strong>
      <input type="hidden" name="available-appointment-date" class="available-appointment-date" value="{{availableDate}}">
    </form>
  </div>
</script>
<?php include 'includes/footer.php' ?>