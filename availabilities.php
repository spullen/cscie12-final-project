<?php

  $start = strtotime($_GET['appointmentDate'] . " 07:00");
  $end = strtotime($_GET['appointmentDate'] . " 17:00");

  $times = [];
  for($i = $start; $i <= $end; $i += 1800) {
    array_push($times, date('m/d/Y H:i:s', $i));
  }

  $timeIndices = array_rand($times, rand(5, 10));

  $availabilities = [];
  foreach($timeIndices as $i) {
    array_push($availabilities, $times[$i]);
  }

  header('Content-Type: application/json');
  http_response_code();
  echo json_encode($availabilities);
?>