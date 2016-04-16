<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

$user->delete($_GET["id"]);
header('Location: users.php');