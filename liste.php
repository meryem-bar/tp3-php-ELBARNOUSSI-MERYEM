<?php
// Auteur : El Barnoussi Meryem
// Objectif : lire data/notes.csv et afficher la liste des apprenants
// Date : 16/10/2026

require 'config.php';

function mention($note) {
    if ($note >= 16) {
        return 'Très bien';
    } elseif ($note >= 14) {
        return 'Bien';
    } elseif ($note >= 12) {
        return 'Assez bien';
    } elseif ($note >= SEUIL) {
        return 'Passable';
    } else {
        return 'Ajourné';
    }
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Liste des notes</title>
</head>
<body>

<h2>Liste des notes</h2>
<?php
$fichier = 'data/notes.csv';

if (!file_exists($fichier)) {
    echo 'Aucune note enregistrée pour le moment.';
    exit;
}

$f = fopen($fichier, 'r');
if (!$f) {
    echo 'Erreur : impossible d\'ouvrir le fichier.';
    exit;
}

echo '<table border="1" cellpadding="5">';
echo '<tr><th>Nom</th><th>Info</th><th>Math</th><th>Moyenne</th><th>Mention</th></tr>';
$somme = 0;
$nb = 0;
while (($ligne = fgetcsv($f, 1000, ';')) !== false) {
                if (count($ligne) < 3) {
        continue;
    }
    $moyenne = ($ligne[1] + $ligne[2]) / 2;
    echo '<tr>';
    echo '<td>' . htmlspecialchars($ligne[0]) . '</td>';
    echo '<td>' . $ligne[1] . '</td>';
    echo '<td>' . $ligne[2] . '</td>';
    echo '<td>' . $moyenne . '</td>';
    echo '<td>' . mention($moyenne) . '</td>';
    echo '</tr>';
    $somme += $moyenne;
    $nb++;
}
echo '</table>';
fclose($f);

if ($nb > 0) {
    echo '<p>Moyenne générale de la classe : ' . round($somme / $nb, 2) . '</p>';
}
?>

<h2>Lecture avec fgets et explode</h2>
<?php
$f = fopen($fichier, 'r');
while (!feof($f)) {
    $ligne = fgets($f);
    if ($ligne === false) {
        break;
    }
    $champs = explode(';', trim($ligne));
    echo $champs[0] . ' | ' . $champs[1] . ' | ' . $champs[2] . '<br>';
}
fclose($f);

// fgetcsv donne directement un tableau et enlève les guillemets, fgets + explode est plus manuel :
// on doit faire trim pour le retour à la ligne et les noms avec espace gardent leurs guillemets.
// explode casse aussi si le nom contient un ";". Par contre fgets + explode est simple à comprendre.
?>

<p><a href="saisie.html">Saisir un apprenant</a></p>

</body>
</html>
