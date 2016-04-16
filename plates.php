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

    <a class="btn btn-primary" href="addplate.php" role="button">Add plate</a>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Plate</th>
            <th>Allow ?</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($plate->getAll() as $k => $v) : ?>
            <tr>
                <th scope="row"><?php echo $v["plate"]; ?></th>
                <td><?php if ($plate->isAllow($v["plate"])) { echo "Yes"; } else { echo "No"; } ?></td>
                <td><?php if ($plate->isAllow($v["plate"])) : ?><a class="btn btn-danger" href="changeallow.php?allow=0&plate=<?php echo $v["plate"]; ?>" role="button">Deny Access</a><?php else : ?><a class="btn btn-success" href="changeallow.php?allow=1&plate=<?php echo $v["plate"]; ?>" role="button">Allow Access</a><?php endif; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php
require_once "Require/footer.php";
?>