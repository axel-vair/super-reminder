<?php

namespace Reminder\Models\Helpers;

use PDO;

class Database {

    private $db_name;
    private $db_user;
    private $db_pass;
    private $db_host;
    private $pdo;
    public function __construct($db_name = 'superReminder', $db_user = 'root', $db_pass = 'root', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    private function getPDO(){

        $this->pdo = new PDO('mysql:host=localhost;dbname=superReminder', 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }

    public function query($statement){
        $request = $this->getPDO()->query($statement);
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

?>