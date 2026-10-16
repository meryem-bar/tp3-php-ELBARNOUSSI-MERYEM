<?php
// Auteur : El Barnoussi Meryem
// Objectif : page protégée, accessible seulement si on est connecté
// Date : 16/10/2026

session_start();

if (!isset($_SESSION['login'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Profil</title>
</head>
<body>

<h2>Profil</h2>
<p>Bienvenue <?= htmlspecialchars($_SESSION['login']) ?> !</p>
<p><a href="deconnexion.php">Se déconnecter</a></p>

</body>
</html>
