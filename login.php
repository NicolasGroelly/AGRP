<?php
session_start();
require_once "required.php";

if ($_POST) {
    if ($user->login($_POST[username], $_POST[password])) {
        header('Location: index.php');
    } else {
        $error = "Identifiants inconnue";
    }
}

?><!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>AGRP | Login</title>
    <meta name="author" content="Nicolas Groelly">

    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap-responsive.min.css" />
</head>

<body>

<div class="container">
<?php if ($error) : ?>
    <div class="alert alert-error">
        Identifiants inconnues
    </div>
<?php endif; ?>
    <form class="form-signin" action="login.php" method="post">
        <h2 class="form-signin-heading">Please sign in</h2>
        <input type="text" class="input-block-level" placeholder="Username" name="username">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <button class="btn btn-large btn-primary" type="submit">Login</button>
    </form>

</div>
<?php
print_r($_SESSION);
print_r($_POST);
print_r($user->login($_POST[username], $_POST[password]));
?>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
