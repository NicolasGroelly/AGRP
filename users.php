<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <title>AGRP | Users</title>
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
                    <li class="active"><a href="#">Home</a></li>
                    <li><a href="#about">About</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>
</div>

<div class="container">

    <h1>Bootstrap starter template</h1>
    <table class="table table-hover">
        <thead>
        <tr>
            <th>Username</th>
            <th>Name</th>
            <th>Firstname</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($user->getAll() as $k => $v) : ?>
        <tr>
            <th scope="row"><?php echo $v["id"]; ?></th>
            <th><?php echo $v["name"]; ?></th>
            <th><?php echo $v["firstname"]; ?></th>
            <th></th>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>
