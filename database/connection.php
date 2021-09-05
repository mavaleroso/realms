<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/config.php');

// Create connection
$conn = new mysqli(SERVER_NAME, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
