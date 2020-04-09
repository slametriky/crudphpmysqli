<?php
$mysqli = new mysqli("localhost", "", "", "");
if ($mysqli->connect_error) {
    echo "Failed to connect to MySQL: " . $mysqli->connect_error;
}
?>
