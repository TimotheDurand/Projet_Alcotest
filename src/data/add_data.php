<?php
// a modifier dans db.php
$conn = new mysqli("localhost","user","password","ethylo_db");

if ($conn->connect_error) {
    die("Connection failed");
}

// ------- partie securite a verfifier 
if($_GET['key'] != "123ABC") {
   die("Access denied");
}
// dans l'esp32 -----  String url = "https://monsite.com/add_data.php?key=123ABC&alcool=" + String(valeur);

if(isset($_GET['alcool'])) {

    $alcool = $_GET['alcool'];

    $sql = "INSERT INTO mesures (valeur) VALUES ('$alcool')";
    $conn->query($sql);

    echo "OK";
}

$conn->close();
?>
