<?php

ini_set('display_errors', 'On');
error_reporting(E_ALL);

$executionStartTime = microtime(true);

include("config.php");

header('Content-Type: application/json; charset=UTF-8');

$conn = new mysqli($cd_host, $cd_user, $cd_password, $cd_dbname, $cd_port, $cd_socket);

if (mysqli_connect_errno()) {

  $output['status']['code'] = "300";
  $output['status']['name'] = "failure";
  $output['status']['description'] = "database unavailable";
  $output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
  $output['data'] = [];

  mysqli_close($conn);

  echo json_encode($output);

  exit;
}

if (isset($_POST['locationID'])) {
  $locationID = (int)$_POST['locationID'];

  $deleteLocCountQuery = $conn->prepare("SELECT COUNT(name) as departments FROM department WHERE department.locationID = '?'");

  $deleteLocCountQuery->bind_param('i', $locationID);

  $deleteLocCountQuery->execute();

  /* fetch values */
  $data = [];

  while ($row = $deleteLocCountQuery->fetch()) {
    array_push($data, $row);
  }


  // $countResult = $deleteLocCountQuery->get_result()->fetch_all(MYSQLI_ASSOC);

  $personnel = $data[0]['departments'];

  if ($personnel > 0) {

    $output['status']['code'] = "400";
    $output['status']['name'] = "executed";
    $output['status']['description'] = "delete denied";
    $output['data'] = [];

    mysqli_close($conn);

    echo json_encode($output);

    exit;
  }
}

$deleteLocQuery = $conn->prepare("DELETE FROM location WHERE id=" . '?');
$deleteLocQuery->bind_param('i', $locationID);

$result = $deleteLocQuery->execute();

if ($result === false) {
  trigger_error($deleteLocQuery->error, E_USER_ERROR);
}

$output['status']['code'] = "200";
$output['status']['name'] = "ok";
$output['status']['description'] = "delete success";
$output['status']['returnedIn'] = (microtime(true) - $executionStartTime) / 1000 . " ms";
$output['data'] = [];

mysqli_close($conn);

echo json_encode($output);
