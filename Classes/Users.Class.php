<?php
session_start();
require_once "PdoManager.Class.php";
//
class Users extends PdoManager
{
    
    public function login($username, $password)
    {
        $password = hash("sha512", $password);

        $req = $this->pdo->prepare("SELECT * FROM users WHERE id = :id AND password = :password");
        $req->bindValue("id", $username);
        $req->bindValue("password", $password);
        $req->execute();

        $res = $req->fetch();

        if ($res) {
            $_SESSION["user"] = $res;
            return true;
        } else {
            return false;
        }
    }

    public function addUser($name, $firstname, $password)
    {
        $username = strtolower($firstname) . "." . strtolower($name);
        $password = hash("sha512", $password);

        $req = $this->pdo->prepare("INSERT INTO users (id, name, firstname, password) VALUES (:id, :name, :firstname, :password)");
        $req->bindValue("id", $username);
        $req->bindValue("name", $name);
        $req->bindValue("firstname", $firstname);
        $req->bindValue("password", $password);
        $req->execute();
    }
}