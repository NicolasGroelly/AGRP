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
        $dsn = "mysql:$this->host:$this->port;$this->database";
        try {
            $this->pdo = new PDO($dsn, $this->username, $this->password);
        } catch (PDOException $e) {
            die("");
        }
    }
}