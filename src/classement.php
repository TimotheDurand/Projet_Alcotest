<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="css/style_classement.css">
<?php include "includes/headerEnd.php"; ?>

<section class="section_classement">
    <h2>Classement des tests</h2>
    
<?php
    include './db/database.php';

    $result = $conn->query("SELECT * FROM mesures ORDER BY date DESC");

    echo "<h1>Mesures d'alcool</h1>";
    echo "<table><tr><th>Nom</th><th>Taux</th><th>Date</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row['pseudo']."</td><td>".$row['taux']."</td><td>".$row['date']."</td></tr>";
    }

    echo "</table>";
    $conn->close();
?>

</section>

<?php include "includes/footer.php"; ?>
