
<?php

if (!isset($_SESSION)) {
    // No session has been started, so start a new one
    session_start();
}

$server = "localhost";
$username = "root";
$password = "";
$database = "food";
if (!defined('SITEURL')) {
    define('SITEURL', 'http://localhost/WEB/');
}
$conn = mysqli_connect("localhost", "root", "", "food");
if ($conn==false){
    die("Error". mysqli_connect_error());
}

?>