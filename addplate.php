<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

if ($_POST) {
    $plate->add($_POST["plate"], $_POST["allow"]);
}

$title = "Add plate";

require_once "Require/header.php";
?>

    <h1>Add plate</h1>

    <form class="form-signin" action="addplate.php" method="post">
        <h2 class="form-signin-heading">Add new plate</h2>
        <input type="text" class="input-block-level" placeholder="Plate" name="plate">
        <select class="form-control" name="allow">
            <option value="1" selected>Allow</option>
            <option value="0">Deny</option>
        </select>
        <button class="btn btn-large btn-primary" type="submit">Add</button>
    </form>

<?php
require_once "Require/footer.php";
?>