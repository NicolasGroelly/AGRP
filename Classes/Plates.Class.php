<?php
session_start();
require_once "PdoManager.Class.php";
//
class Plates extends PDOManager
{
    public function add($plate, $allow)
    {
        $req = $this->pdo->prepare("INSERT INTO plates (plate, allow) VALUES (:plate, :allow)");
        $req->bindValue("plate", $plate);
        $req->bindValue("allow", $allow);
        $req->execute();
    }

    public function getAll()
    {
        $req = $this->pdo->prepare("SELECT * FROM plates");
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isAllow($plate)
    {
        $req = $this->pdo->prepare("SELECT * FROM plates WHERE plate = :plate");
        $req->bindValue("plate", $plate);
        $req->execute();

        $res = $req->fetch(PDO::FETCH_ASSOC);

        if ($res) {
            if ($res["allow"] == 1) {
                return true;
            }
        }

        return false;
    }

    public function changeAllow($plate, $allow)
    {
        $req = $this->pdo->prepare("UPDATE plates SET allow = :allow WHERE plate = :plate");
        $req->bindValue("allow", $allow);
        $req->bindValue("plate", $plate);
        $req->execute();
    }
}