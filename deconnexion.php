<?php
// Auteur : El Barnoussi Meryem
// Objectif : fermer la session et retourner à la page de connexion
// Date : 16/10/2026

session_start();
session_unset();
session_destroy();
header("Location: login.php");
exit;
