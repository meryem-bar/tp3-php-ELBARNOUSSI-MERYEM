<?php
// Auteur : El Barnoussi Meryem
// Objectif : tableaux indexés et associatifs, statistiques, tris et opérateurs
// Date : 16/10/2026

require 'config.php';
require 'includes/entete_inc.php';
require 'includes/menu_inc.php';

// Expérience 1 : avec un fichier qui n'existe pas
// include : un Warning s'affiche mais le reste du script s'exécute.
// require : Warning puis Fatal error, le script s'arrête.
// Expérience 2 : si on inclut menu_inc.php deux fois
// avec include le menu s'affiche deux fois, avec include_once il s'affiche une seule fois.

$notes = [
    "Mohamed" => 16, "Ahmed" => 14, "Hind" => 13, "Aicha" => 15,
    "Samir" => 13, "Zakaria" => 13, "Rafik" => 10, "Ilham" => 9,
    "Hamza" => 7, "Sami" => 7, "Noura" => 14
];
$modules = ["Structures de données", "Programmation Web 2", "Système d'exploitation 1"];

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

function afficher($tab) {
    foreach ($tab as $cle => $valeur) {
        echo $cle . ' : ' . $valeur . '<br>';
    }
}
?>

<h2>Exercice 3.1 : création</h2>
<p>Modules avec foreach :</p>
<?php
foreach ($modules as $m) {
    echo $m . '<br>';
}
echo '<p>Modules avec les indices :</p>';
for ($i = 0; $i < count($modules); $i++) {
    echo $i . ' : ' . $modules[$i] . '<br>';
}
?>

<h2>Exercice 3.2 : affichage HTML</h2>
<table border="1" cellpadding="5">
<tr><th>Nom</th><th>Note</th><th>Mention</th></tr>
<?php
foreach ($notes as $nom => $note) {
    if ($note < SEUIL) {
        echo '<tr style="color:red">';
    } else {
        echo '<tr>';
    }
    echo '<td>' . $nom . '</td><td>' . $note . '</td><td>' . mention($note) . '</td></tr>';
}
?>
</table>

<h2>Exercice 3.3 : statistiques</h2>
<?php
$somme = 0;
$nb = 0;
$meilleure = NOTE_MIN;
$faible = NOTE_MAX;
foreach ($notes as $note) {
    $somme += $note;
    $nb++;
    if ($note > $meilleure) {
        $meilleure = $note;
    }
    if ($note < $faible) {
        $faible = $note;
    }
}
$moyenne = $somme / $nb;
echo "Avec la boucle : somme = $somme, moyenne = " . round($moyenne, 2) . ", meilleure = $meilleure, plus faible = $faible<br>";
echo 'Avec les fonctions : somme = ' . array_sum($notes) . ', moyenne = ' . round(array_sum($notes) / count($notes), 2) . ', meilleure = ' . max($notes) . ', plus faible = ' . min($notes) . '<br>';

$effectifs = [];
foreach ($notes as $note) {
    $m = mention($note);
    if (!isset($effectifs[$m])) {
        $effectifs[$m] = 0;
    }
    $effectifs[$m]++;
}
echo '<p>Effectifs par mention :</p>';
afficher($effectifs);
?>

<h2>Exercice 3.4 : tri</h2>
<?php
$tri = $notes;
ksort($tri);
echo '<h4>Noms croissants (ksort)</h4>';
afficher($tri);

$tri = $notes;
arsort($tri);
echo '<h4>Notes décroissantes (arsort)</h4>';
afficher($tri);

$tri = $notes;
krsort($tri);
echo '<h4>Noms décroissants (krsort)</h4>';
afficher($tri);

$tri = $notes;
asort($tri);
echo '<h4>Notes croissantes (asort)</h4>';
afficher($tri);

// Pour un tableau indexé comme $modules on utilise sort() (ou rsort() pour l'ordre inverse).
?>

<h2>Exercice 3.5 : opérateurs de tableaux</h2>
<?php
$a = ["x" => 1, "y" => 2];
$b = ["y" => 2, "x" => 1];
echo '<pre>';
print_r($a + $b);
var_dump($a == $b);
var_dump($a === $b);
echo '</pre>';
// $a + $b : l'union, on garde les éléments de $a et on ajoute ceux de $b dont la clé n'existe pas, ici rien à ajouter.
// $a == $b : true, mêmes paires clé/valeur.
// $a === $b : false, les paires sont les mêmes mais pas dans le même ordre.
?>

<?php require 'includes/pied_inc.php'; ?>
