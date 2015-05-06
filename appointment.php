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
<div class="grid-100">
  <form action="availabilities.php" method="GET">
    <label for="appointment-date">Appointment Date:</label>
    <input type="text" name="appointment-date" id="appointment-date" />
  </form>

  <div id="available-appointments"></div>
</div>
<script id="available-appointment-tpl" type="text/x-handlebars-template">
  <div class="available-appointment">
    <form>
      <strong>{{displayTime}}</strong>
      <button>Request Appointment</button>
      <input type="hidden" name="appointment-date" value="{{availableDate}}">
    </form>
  </div>
</script>
<?php include 'includes/footer.php' ?>