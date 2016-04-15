<?php
//
class PdoManager
{
    private $host = "10.255.0.6";
    private $port = 3306;
    private $username = "agrp";
    private $password = "agrp";
    private $database = "agrp";
    protected $pdo;

    public function __construct()
    {
        $dsn = "mysql:host=" . $this->host . ":" . $this->port . ";dbname=" . $this->database;
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            die("");
        }
    }
}