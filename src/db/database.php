<?php

$servername = "localhost";
$dbname     = "";
$username   = ""; 
$password   = "";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connexion échouée: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
