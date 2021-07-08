<?php
// Database credentials.
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'SideHustle');
define('DB_PASSWORD', 'SideHustle');
define('DB_NAME', 'task_manager');

// Connect to MySql database.
$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection.
if($mysqli === false) {
    die('ERROR: Could not establish a connection. ' . $mysqli->connect_error());
}
?>