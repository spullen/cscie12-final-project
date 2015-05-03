<?php
  $title = 'Request Appointment';
  $pageId = 'appointment';
?>
<?php include 'includes/header.php' ?>
<div class="grid-container">
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
</div>
<?php include 'includes/footer.php' ?>