<?php
// Auteur : El Barnoussi Meryem
// Objectif : pied de page avec les dates (date du jour, jours restants, checkdate)
// Date : 16/10/2026
?>
<hr>
<p>Date du jour : <?= date("d/m/Y") ?></p>
<?php
$aujourdhui = new DateTime('today');
$fin = new DateTime('2027-01-31');
$diff = $aujourdhui->diff($fin);
echo '<p>Il reste ' . $diff->days . ' jours avant la fin du semestre (31/01/2027).</p>';
?>
<form method="post">
  <p>Vérifier une date : jour <input type="text" name="jour" size="3">
  mois <input type="text" name="mois" size="3">
  année <input type="text" name="annee" size="5">
  <input type="submit" value="Vérifier"></p>
</form>
<?php
if (isset($_POST['jour']) && isset($_POST['mois']) && isset($_POST['annee'])) {
    $jour = (int) $_POST['jour'];
    $mois = (int) $_POST['mois'];
    $annee = (int) $_POST['annee'];
    if (checkdate($mois, $jour, $annee)) {
        echo "<p>$jour/$mois/$annee est une date valide.</p>";
    } else {
        echo "<p>$jour/$mois/$annee n'est pas une date valide.</p>";
    }
}
?>
</body>
</html>
