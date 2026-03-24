<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="css/style_graph.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<?php include "includes/headerEnd.php"; ?>

<section class="section_graph">

    <?php
        $taux_initial = floatval($_GET['taux_initial']);
        $taux_cible = floatval($_GET['taux_cible']);
        $poids = floatval($_GET['poids']);
        $taille = floatval($_GET['taille']);
        $age = intval($_GET['age']);
        $sexe = $_GET['sexe'];

        if ($sexe === "homme") {
            $r = 0.7;
        } else {
            $r = 0.6;
        }

        if ($age < 25) {
            $k = 0.065;
        } elseif ($age < 50) {
            $k = 0.06;
        } else {
            $k = 0.055;
        }

        $k = $k * (70 / $poids);
        $delta = $taux_initial - $taux_cible;

        if ($delta <= 0) {
            echo "<h3>Vous êtes déjà en dessous du taux cible</h3>";
        } else {
            $temps = $delta / $k;
            echo "<h3>Temps estimé : " . round($temps, 2) . " heures</h3>";
        }

        $points = [];
        for ($t = 0; $t <= $temps; $t += 0.5) {
            $taux = $taux_initial - ($k * $t);
            if ($taux < 0) 
                $taux = 0;
            $points[] = ["x" => $t, "y" => $taux];
        }
    ?>

    <h2>Évolution du taux d'alcool</h2>
    <canvas id="graphique"></canvas>
    <script>
        const dataPoints = <?php echo json_encode($points); ?>;
        const tempsMax = dataPoints[dataPoints.length - 1].x;
        const limiteLegale = [
            {x: 0, y: 0.25},   
            {x: tempsMax, y: 0.25}
        ];
        const limiteJeune = [
            {x: 0, y: 0.1}, 
            {x: tempsMax, y: 0.1}  
        ];

        new Chart(document.getElementById('graphique'), {
            type: 'line',
            data: {
                datasets: [
                    {
                        label: "Taux d'alcool",
                        data: dataPoints,
                        tension: 0.4,
                        fill: true,
                        borderColor: "blue",
                        borderWidth: 3,
                        pointRadius: 0
                    },
                    {
                        label: "Limite légale",
                        data: limiteLegale,
                        borderDash: [5,5],
                        borderColor: "red",
                        borderWidth: 2,
                        pointRadius: 0,
                        fill: false
                    },
                    {
                        label: "Limite jeune permis",
                        data: limiteJeune,
                        borderDash: [5,5],
                        borderColor: "orange",
                        borderWidth: 2,
                        pointRadius: 0,
                        fill: false
                    }
                ]
            },
            options: {
                plugins: {
                    legend: {
                        labels: { color: "white" }
                    }
                },
                scales: {
                    x: {
                        type: 'linear',
                        title: { display: true, text: "Temps (heures)", color: "white" },
                        ticks: { color: "white" },
                        grid: { color: "rgba(255,255,255,0.1)" }
                    },
                    y: {
                        min: 0,
                        title: { display: true, text: "mg/L", color: "white" },
                        ticks: { color: "white" },
                        grid: { color: "rgba(255,255,255,0.1)" }
                    }
                }
            }
        });
    </script>
</section>

<?php include "includes/footer.php"; ?>