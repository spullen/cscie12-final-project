<?php
  /*
    Note: This will just return random set of data. In a real application this would
    be determined by data from the database. This is just to illustrate the interaction
    between the frontend and backend.
   */

  $start = strtotime($_GET['appointmentDate'] . " 07:00");
  $end = strtotime($_GET['appointmentDate'] . " 17:00");

  $times = array();
  for($i = $start; $i <= $end; $i += 1800) {
    array_push($times, date('m/d/Y H:i:s', $i));
  }

  $timeIndices = array_rand($times, rand(2, 7));

  $availabilities = array();
  foreach($timeIndices as $i) {
    array_push($availabilities, $times[$i]);
  }

  header('Content-Type: application/json');
  echo json_encode($availabilities);
?>