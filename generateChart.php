<?php

header('Content-Type: application/json');
require 'lgs.inc.php';
$query = sprintf("SELECT team, matchname, score FROM matchscore ORDER BY matchname");

$result = $conn->query($query);

$data = array();
foreach ($result as $row) {
  $data[] = $row;
}

$result->close();

$mysqli->close();

print json_encode($data);
?>