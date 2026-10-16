<?php
// Auteur : El Barnoussi Meryem
// Objectif : variables, constantes, types et chaînes de caractères
// Date : 16/10/2026

require 'config.php';
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Exercice 1 - bases</title>
</head>
<body>

<h2>Partie 0</h2>
<?php
echo 'Hello PHP';
// commentaire sur une ligne avec //
# commentaire sur une ligne avec #
/* commentaire
sur plusieurs lignes */
?>

<h2>Exercice 1.1 : noms de variables</h2>
<?php
// $x : valide, une lettre
// $_x : valide, le nom peut commencer par un souligné
// $2x : invalide, ça commence par un chiffre
// $x-y : invalide, le tiret n'est pas autorisé
// $Prix_HT : valide, lettres et souligné
// $prix ht : invalide, l'espace n'est pas autorisé
// $état : valide, les lettres accentuées sont acceptées
$x = 1;
$_x = 2;
$Prix_HT = 100;
$état = "ouvert";
echo $x . ' ' . $_x . ' ' . $Prix_HT . ' ' . $état . '<br>';

$a = 5;
$A = 10;
echo '$a = ' . $a . ' et $A = ' . $A . ' : deux variables différentes<br>';
?>

<h2>Exercice 1.2 : constantes</h2>
<?php
echo 'ETABLISSEMENT : ' . ETABLISSEMENT . '<br>';
echo 'NOTE_MIN : ' . NOTE_MIN . '<br>';
echo 'NOTE_MAX : ' . NOTE_MAX . '<br>';
echo 'SEUIL : ' . SEUIL . '<br>';

echo 'SEUIL est définie ? ';
var_dump(defined('SEUIL'));
echo '<br>INCONNUE est définie ? ';
var_dump(defined('INCONNUE'));

// Si on affiche une constante non définie, PHP renvoie une Error (Undefined constant) et le script s'arrête.
// const est définie à la compilation, donc au début du script (pas dans un if ni dans une fonction).
// define() est exécutée pendant l'exécution, on peut donc l'utiliser dans un if.
?>

<h2>Exercice 1.3 : calcul</h2>
<?php
$prix_ht = 60;
$tva = 20;
$prix_ttc = $prix_ht * (1 + $tva / 100);
echo "Le prix TTC du produit est de $prix_ttc €.";
?>

<h2>Exercice 1.4 : types et conversions</h2>
<?php
$test = 42;
$test = (string) $test;
var_dump($test);

echo '<br><br>(bool) :<br>';
// prédiction : false pour 0, 0.0, "0", "", [] et null. true pour "abc"
var_dump((bool) 0);
var_dump((bool) 0.0);
var_dump((bool) "0");
var_dump((bool) "");
var_dump((bool) "abc");
var_dump((bool) []);
var_dump((bool) null);

echo '<br><br>(int) et (float) :<br>';
// prédiction : 3, 12, 1500, 1
var_dump((int) 3.9);
var_dump((int) "12abc");
var_dump((float) "1.5e3");
var_dump((int) true);

echo '<br><br>255 en 4 notations :<br>';
$decimal = 255;
$hexa = 0xFF;
$octal = 0377;
$binaire = 0b11111111;
echo 'décimal : ' . $decimal . '<br>';
echo 'hexadécimal : ' . $hexa . '<br>';
echo 'octal : ' . $octal . '<br>';
echo 'binaire : ' . $binaire . '<br>';
// les quatre affichent 255 car PHP affiche toujours en décimal
?>

<h2>Exercice 1.5 : chaînes</h2>
<?php
$traitees = "égales à";
$ici = 2;

echo 'Ahmed a dit : "J\'ai réussi"<br>';
echo 'Voulez-vous supprimer C:\\*.*?<br>';
echo 'Ceci n\'affichera pas \n de nouvelle ligne<br>';
echo 'Les variables ne seront pas $traitees $ici<br>';
echo "Les variables seront $traitees $ici<br>";

$texte = "*Bonjour les développeurs*";
$texte = trim($texte, "*");
echo '<br>' . $texte . '<br><br>';

for ($i = 0; $i < strlen($texte); $i++) {
    echo $texte[$i] . '<br>';
}
?>

</body>
</html>
