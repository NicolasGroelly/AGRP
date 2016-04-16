<?php
session_start();

require_once "required.php";

if (!$user->isUserLogged()) {
    header('Location: login.php');
}

$title = "History";

require_once "Require/header.php";
?>

    <h1>History</h1>

    <table class="table table-hover">
        <thead>
        <tr>
            <th>Date</th>
            <th>Time</th>
            <th>Plate</th>
            <th>Allow ?</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($history->getAll() as $k => $v) : ?>
            <tr class="<?php if ($v["status"] == 1) { echo "success"; } else { echo "danger"; } ?>">
                <td><?php echo date("d/m/Y", $v["timestamp"]); ?></td>
                <td><?php echo date("H:i", $v["timestamp"]); ?></td>
                <td><?php echo $v["plate_0"]; ?></td>
                <td><?php if ($v["status"] == 1) : ?>Allow<?php else : ?>Deny<?php endif; ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

<?php
print_r($history->getAll());
require_once "Require/footer.php";
?>