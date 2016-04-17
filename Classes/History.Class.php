<?php
session_start();
require_once "PdoManager.Class.php";
//
class History extends PdoManager
{
    public function getAll()
    {
        $req = $this->pdo->prepare("SELECT * FROM history");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function add($datas, $allow)
    {
        ob_start();
        print_r($datas);
        $datas = ob_get_contents();
        ob_end_clean();
        file_put_contents("plates.txt", $datas);
/*        $req = $this->pdo->prepare("INSERT INTO history (plate, plate_0, plate_1, plate_2, plate_3, plate_4, plate_5, plate_6, plate_7, plate_8, plate_9, status, image) VALUES (:plate, :plate_0, :plate_1, :plate_2, :plate_3, :plate_4, :plate_5, :plate_6, :plate_7, :plate_8, :plate_9, :status, :image)");
        $req->bindValue("plate", $datas["results"]["0"]["plate"]);
        $req->bindValue("plate_0", $datas["results"]["0"]["candidates"]["0"]["plate"]);
        $req->bindValue("plate_1", $datas["results"]["0"]["candidates"]["1"]["plate"]);
        $req->bindValue("plate_2", $datas["results"]["0"]["candidates"]["2"]["plate"]);
        $req->bindValue("plate_3", $datas["results"]["0"]["candidates"]["3"]["plate"]);
        $req->bindValue("plate_4", $datas["results"]["0"]["candidates"]["4"]["plate"]);
        $req->bindValue("plate_5", $datas["results"]["0"]["candidates"]["5"]["plate"]);
        $req->bindValue("plate_6", $datas["results"]["0"]["candidates"]["6"]["plate"]);
        $req->bindValue("plate_7", $datas["results"]["0"]["candidates"]["7"]["plate"]);
        $req->bindValue("plate_8", $datas["results"]["0"]["candidates"]["8"]["plate"]);
        $req->bindValue("plate_9", $datas["results"]["0"]["candidates"]["9"]["plate"]);
        $req->bindValue("allow", $allow);
        $req->bindValue("image", $datas["uuid"] . ".jpg");
        $req->execute();
*/    }
}