<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

if ($_POST) {
    $user->addUser($_POST["name"], $_POST["firstname"], $_POST["password"]);
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>AGRP | New user</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Nicolas Groelly">

    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />
    <link type="text/css" rel="stylesheet" href="css/bootstrap-responsive.min.css" />
</head>

<body>

<div class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-inner">
        <div class="container">
            <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="brand" href="#">AGRP</a>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="adduser.php">Users</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    <h1>Add new user</h1>
    <form class="form-signin" action="adduser.php" method="post">
        <h2 class="form-signin-heading">Add new user</h2>
        <input type="text" class="input-block-level" placeholder="Name" name="name">
        <input type="text" class="input-block-level" placeholder="Firstname" name="firstname">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <button class="btn btn-large btn-primary" type="submit">Add</button>
    </form>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>