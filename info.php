<?php
// Auteur : El Barnoussi Meryem
// Objectif : traiter le formulaire info.html envoyé en GET
// Date : 16/10/2026
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Résultat GET</title>
</head>
<body>

<?php
if (isset($_GET['nom']) && isset($_GET['prenom']) && isset($_GET['sexe'])) {
    $nom = htmlspecialchars($_GET['nom']);
    $prenom = htmlspecialchars($_GET['prenom']);
    $sexe = $_GET['sexe'];

    if ($sexe == 'F') {
        echo "Bonjour Madame $prenom $nom";
    } else {
        echo "Bonjour Monsieur $prenom $nom";
    }
} else {
    echo 'Veuillez remplir le formulaire info.html';
}
// Dans l'URL on voit info.php?nom=...&prenom=...&sexe=M : les valeurs sont visibles dans la barre d'adresse.
?>

</body>
</html>
