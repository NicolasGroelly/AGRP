<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

$plate->changeAllow($_GET["plate"], $_GET["allow"]);
header('Location: plates.php');