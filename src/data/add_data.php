<?php
    include './db/database.php';

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
