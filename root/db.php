<?php

require_once 'config.php';

class DB {

    private $db;

    function __construct() {
        $mysql_host = "localhost";
        $mysql_database = "UMZO";
        $mysql_user = "root";
        $mysql_password = "";
        $db_prefix = "UMZO";

        $dsn = "mysql:dbname=$mysql_database;host=$mysql_host";
        $db = null;
        try {
            $this->db = new PDO($dsn, $mysql_user, $mysql_password);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
        }
    }

    function connected() {
        return ($this->db !== null);
    }

    function query($sql, $param = null) {
        $task = $this->db->prepare($sql);
        if ($param != null)
            foreach ($param as $k => $v)
                $task->bindValue($k, $v);
        $task->execute();
        return $task->fetchAll(PDO::FETCH_ASSOC);
    }

}

$db     = new DB();

?>