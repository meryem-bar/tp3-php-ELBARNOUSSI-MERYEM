<?php
// Auteur : El Barnoussi Meryem
// Objectif : structures de contrôle et boucles
// Date : 16/10/2026

require 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Exercice 2 - flux</title>
</head>
<body>

<h2>Exercice 2.1 : mention</h2>
<?php
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

$notes_test = [18, 15, 13, 11, 9];
foreach ($notes_test as $n) {
    echo $n . ' : ' . mention($n) . '<br>';
}
?>

<h2>Exercice 2.2 : switch</h2>
<?php
$numeroMois = date("m");
switch ($numeroMois) {
    case 1: $mois = 'Janvier'; break;
    case 2: $mois = 'Février'; break;
    case 3: $mois = 'Mars'; break;
    case 4: $mois = 'Avril'; break;
    case 5: $mois = 'Mai'; break;
    case 6: $mois = 'Juin'; break;
    case 7: $mois = 'Juillet'; break;
    case 8: $mois = 'Août'; break;
    case 9: $mois = 'Septembre'; break;
    case 10: $mois = 'Octobre'; break;
    case 11: $mois = 'Novembre'; break;
    case 12: $mois = 'Décembre'; break;
    default: $mois = 'mois inconnu';
}
echo "Nous sommes au mois de $mois";
// Si on oublie un break, PHP continue et exécute aussi les case suivants jusqu'au prochain break.
?>

<h2>Exercice 2.3 : boucles</h2>
<h3>1. Triangle</h3>
<?php
for ($i = 1; $i <= 6; $i++) {
    for ($j = 1; $j <= $i; $j++) {
        echo '*';
    }
    echo '<br>';
}
?>

<h3>2. while de 0 à 20 par pas de 2</h3>
<?php
$k = 0;
while ($k <= 20) {
    if ($k == 10) {
        echo '<strong>' . $k . '</strong>';
    } else {
        echo $k;
    }
    echo '<br>';
    $k += 2;
}
?>

<h3>3. Nombres pairs de 0 à 10 avec continue</h3>
<?php
for ($i = 0; $i <= 10; $i++) {
    if ($i % 2) {
        continue;
    }
    echo $i . ' ';
}
?>

<h3>4. while, switch et break 2</h3>
<?php
$i = 0;
while (++$i) {
    switch ($i) {
        case 5:
            echo 'At 5<br>';
            break 1;
        case 10:
            echo 'At 10; quitting<br>';
            break 2;
        default:
            break;
    }
}
?>

<h3>5. Même chose avec do-while</h3>
<?php
$k = 0;
do {
    if ($k == 10) {
        echo '<strong>' . $k . '</strong>';
    } else {
        echo $k;
    }
    echo '<br>';
    $k += 2;
} while ($k <= 20);
// Différence : avec do-while le corps s'exécute au moins une fois, la condition est testée après.
// Avec while la condition est testée avant, donc le corps peut ne jamais s'exécuter.
?>

</body>
</html>
