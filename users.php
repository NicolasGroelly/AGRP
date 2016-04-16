<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

$title = "Users";

require_once "require/header.php";
?>

    <h1>Users</h1>

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

<?php
require_once "require/footer.php";
?>