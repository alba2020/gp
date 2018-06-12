<?php

function connectToDatabase($db) {
  $server = 'localhost';
  $user = 'root';
  $password = '';
  $database = $db;

  $mysqli = new mysqli($server, $user, $password, $database);

  if ($mysqli->connect_errno) {
    echo "Error: Failed to make a MySQL connection, here is why: \n";
    echo "Errno: " . $mysqli->connect_errno . "\n";
    echo "Error: " . $mysqli->connect_error . "\n";
    exit;
  }

  return $mysqli;
}