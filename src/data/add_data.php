<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "ethylotest_db";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connexion échouée: " . $conn->connect_error);
    }

    if (isset($_GET['taux'])) {
        $taux = floatval($_GET['taux']);
        $sql = "INSERT INTO mesures (taux) VALUES ($taux)";
        
        if ($conn->query($sql) === TRUE) {
            echo "Données enregistrées";
        } else {
            echo "Erreur: " . $conn->error;
        }
    } else {
        echo "Aucune donnée reçue";
    }

    $conn->close();
?>
