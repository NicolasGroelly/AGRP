<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

$title = "Plates";

require_once "Require/header.php";
?>

    <h1>Plates</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>id</th>
            <th>Plate</th>
            <th>Allow ?</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($user->getAll() as $k => $v) : ?>
            <tr>
                <th scope="row"><?php echo $v["plate"]; ?></th>
                <td><?php if ($plate->isAllow($v["plate"])) { echo "Yes"; } else { echo "No"; } ?></td>
                <td><?php if ($plate->isAllow($v["plate"])) : ?><a class="btn btn-danger" href="#?<?php echo $v["plate"]; ?>" role="button">Infos</a><?php else : ?><a class="btn btn-success" href="#?<?php echo $v["id"]; ?>" role="button">Delete</a><?php endif; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php
require_once "Require/footer.php";
?>