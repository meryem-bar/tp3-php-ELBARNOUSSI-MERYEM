<?php
// Auteur : El Barnoussi Meryem
// Objectif : connexion avec session et cookies
// Date : 16/10/2026

session_start();

$message = '';
if (isset($_POST['login'])) {
    $login = trim($_POST['login']);
    if ($login == '') {
        $message = 'Veuillez saisir un login.';
    } else {
        $_SESSION['login'] = $login;
        setcookie("dernier_login", $login, time() + 86400, "/");

        $infos = ['login' => $login, 'date' => date("d/m/Y H:i")];
        setcookie("infos_connexion", json_encode($infos), time() + 86400, "/");

        header("Location: profil.php");
        exit;
    }
}

$valeur = '';
if (isset($_COOKIE['dernier_login'])) {
    $valeur = $_COOKIE['dernier_login'];
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<title>Connexion</title>
</head>
<body>

<h2>Connexion</h2>
<?php
if ($message != '') {
    echo '<p>' . $message . '</p>';
}
?>
<form action="login.php" method="post">
  <p>Login : <input type="text" name="login" value="<?= htmlspecialchars($valeur) ?>"></p>
  <p><input type="submit" value="Se connecter"></p>
</form>

<?php
if (isset($_COOKIE['infos_connexion'])) {
    $dernier = json_decode($_COOKIE['infos_connexion'], true);
    if (is_array($dernier)) {
        echo '<p>Dernière connexion : ' . htmlspecialchars($dernier['login']) . ' le ' . htmlspecialchars($dernier['date']) . '</p>';
    }
}
// Une session est stockée sur le serveur, un cookie est stocké dans le navigateur de l'utilisateur.
// setcookie() et header() envoient des en-têtes HTTP, et les en-têtes doivent partir avant le contenu de la page :
// si on a déjà affiché quelque chose, PHP donne l'erreur "headers already sent".
?>

</body>
</html>
