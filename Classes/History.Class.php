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
}