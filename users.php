<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

$title = "Users";

require_once "Require/header.php";
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
            <td><?php echo $v["name"]; ?></td>
            <td><?php echo $v["firstname"]; ?></td>
            <td><a class="btn btn-info" href="#?<?php echo $v["id"]; ?>" role="button">Infos</a> <a class="btn btn-danger" href="#?<?php echo $v["id"]; ?>" role="button">Delete</a></td>
        </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php
require_once "Require/footer.php";
?>