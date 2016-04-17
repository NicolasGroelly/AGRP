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

    public function add($datas, $allow, $p)
    {
        $req = $this->pdo->prepare(" INSERT INTO history (plate, status, image) VALUES (:plate, :status, :image) ");
        $req->bindValue("plate", $datas["results"]["0"]["candidates"]["$p"]["plate"]);
        $req->bindValue("status", $allow);
        $req->bindValue("image", $datas["uuid"] . ".jpg");
        $req->execute();
    }
}