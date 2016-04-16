<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

if ($_POST) {
    $user->addUser($_POST["name"], $_POST["firstname"], $_POST["password"]);
}

$title = "Add user";

require_once "Require/header.php";
?>

    <h1>Add user</h1>

    <form class="form-signin" action="adduser.php" method="post">
        <h2 class="form-signin-heading">Add new user</h2>
        <input type="text" class="input-block-level" placeholder="Name" name="name">
        <input type="text" class="input-block-level" placeholder="Firstname" name="firstname">
        <input type="password" class="input-block-level" placeholder="Password" name="password">
        <button class="btn btn-large btn-primary" type="submit">Add</button>
    </form>

<?php
require_once "Require/footer.php";
?>