<!-- exmple d'affichage simple -->
<table border="1">
<tr><th>ID</th><th>Valeur</th><th>Date</th></tr>

<?php
while($row = $result->fetch_assoc()) {
  echo "<tr>
          <td>".$row['id']."</td>
          <td>".$row['valeur']."</td>
          <td>".$row['date']."</td>
        </tr>";
}
?>

</table>
