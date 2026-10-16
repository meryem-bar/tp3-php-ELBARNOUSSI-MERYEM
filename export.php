<?php
// Auteur : El Barnoussi Meryem
// Objectif : exporter les résultats en JSON et comparer avec serialize
// Date : 16/10/2026
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Export JSON</title>
</head>
<body>

<h2>Export des résultats</h2>
<?php
$fichier = 'data/notes.csv';
if (!file_exists($fichier)) {
    echo 'Aucune note à exporter.';
    exit;
}

$resultats = [];
$f = fopen($fichier, 'r');
while (($ligne = fgetcsv($f, 1000, ';')) !== false) {
        if (count($ligne) < 3) {
        continue;
    }
    $resultats[] = [
        'nom' => $ligne[0],
        'info' => (float) $ligne[1],
        'math' => (float) $ligne[2],
        'moyenne' => ((float) $ligne[1] + (float) $ligne[2]) / 2
    ];
}
fclose($f);

$json = json_encode($resultats);
file_put_contents('data/notes.json', $json);

$lu = file_get_contents('data/notes.json');
$tableau = json_decode($lu, true);
echo '<h3>Contenu relu depuis notes.json</h3>';
echo '<pre>';
print_r($tableau);
echo '</pre>';

echo '<h3>json_encode</h3>';
echo $json;
echo '<h3>serialize</h3>';
echo serialize($resultats);

// serialize donne un format propre à PHP, json_encode donne du JSON.
// Le JSON est directement utilisable par une application JavaScript (JSON.parse).
?>

<p><a href="liste.php">Retour à la liste</a></p>

</body>
</html>
