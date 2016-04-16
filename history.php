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
                <td><?php $d = date_parse($v["timestamp"]); echo $d["day"] . "/" . $d["month"] . "/" . $d["year"]; ?></td>
                <td><?php echo $d["hour"] . ":" . $d["minute"]; ?></td>
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