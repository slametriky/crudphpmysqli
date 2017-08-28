<?php
$mysqli = new mysqli("localhost", "root", "garuda22", "biodata");
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>
