<?php include "includes/header.php"; ?>
<link rel="stylesheet" href="css/style_conduire.css">
<?php include "includes/headerEnd.php"; ?>

<section class="section_conduire">
    <article>
        <form action="conduire_graph.php" method="GET">
            <label>Taux actuel (mg/L) :</label>
            <input 
                type="number" 
                name="taux_initial" 
                placeholder="0.12" 
                step="0.01" 
                required
            >
            <br>
            <label>Poids (kg) :</label>
            <input 
                type="number" 
                name="poids" 
                placeholder="80" 
                required
            >
            <br>
            <label>Taille (cm) :</label>
            <input 
                type="number" 
                name="taille" 
                placeholder="175" 
                required
            >
            <br>
            <label>Âge :</label>
            <input 
                type="number" 
                name="age" 
                placeholder="20" 
                required
            >
            <br>
            <label>Sexe :</label>
            <select name="sexe" required>
                <option value="homme">Homme</option>
                <option value="femme">Femme</option>
            </select>
            <br><br>
            <label>Taux cible :</label><br>
            <button 
                type="submit" name="taux_cible" 
                formaction="conduire_graph.php" 
                value="0.25">
                0.25 mg/L ( permis )
            </button>
            <button 
                type="submit" name="taux_cible" 
                formaction="conduire_graph.php" 
                value="0.1">
                0.1 mg/L ( jeune permis )
            </button>
            <button 
                type="submit" 
                name="taux_cible" 
                formaction="conduire_graph.php" 
                value="0">
                0 mg/L
            </button>
        </form>
    </article>
</section>

<?php include "includes/footer.php"; ?>