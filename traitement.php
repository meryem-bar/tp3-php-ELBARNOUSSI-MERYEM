<?php
// Auteur : El Barnoussi Meryem
// Objectif : vérifier la saisie, afficher un récapitulatif et l'enregistrer dans data/notes.csv
// Date : 16/10/2026

require 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Traitement</title>
</head>
<body>

<h2>Résultat de la saisie</h2>
<?php
if (!isset($_POST['nom']) || !isset($_POST['note_info']) || !isset($_POST['note_math'])) {
    echo '<p>Erreur : le formulaire n\'a pas été envoyé.</p>';
} elseif (empty(trim($_POST['nom'])) || $_POST['note_info'] === '' || $_POST['note_math'] === '') {
    echo '<p>Erreur : tous les champs sont obligatoires.</p>';
} elseif (!is_numeric($_POST['note_info']) || !is_numeric($_POST['note_math'])) {
    echo '<p>Erreur : les notes doivent être des nombres.</p>';
} elseif ($_POST['note_info'] < NOTE_MIN || $_POST['note_info'] > NOTE_MAX || $_POST['note_math'] < NOTE_MIN || $_POST['note_math'] > NOTE_MAX) {
    echo '<p>Erreur : les notes doivent être comprises entre ' . NOTE_MIN . ' et ' . NOTE_MAX . '.</p>';
} else {
    $nom = trim($_POST['nom']);
    $info = $_POST['note_info'];
    $math = $_POST['note_math'];
    $moyenne = ($info + $math) / 2;

    echo '<p>Nom : ' . htmlspecialchars($nom) . '</p>';
    echo '<p>Note info : ' . $info . '</p>';
    echo '<p>Note math : ' . $math . '</p>';
    echo '<p>Moyenne : ' . $moyenne . '</p>';

    $f = fopen('data/notes.csv', 'a');
    if ($f) {
fputcsv($f, [$nom, $info, $math], ';');
        fclose($f);
        echo '<p>Apprenant enregistré dans data/notes.csv</p>';
    } else {
        echo '<p>Erreur : impossible d\'ouvrir data/notes.csv</p>';
    }
}
echo '<p><a href="saisie.html">Retour à la saisie</a> | <a href="liste.php">Voir la liste</a></p>';

// Avec le mode "w" au lieu de "a" le fichier serait vidé à chaque ouverture : il ne resterait que la dernière ligne.
// POST est préférable pour un mot de passe car GET met les valeurs dans l'URL (visibles, gardées dans l'historique).
// $_REQUEST contient les données de $_GET et de $_POST (et $_COOKIE).
?>

</body>
</html>
