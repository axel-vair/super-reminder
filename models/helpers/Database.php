<?php

namespace Reminder\Models\Helpers;

use PDO;
/**
 * Class Database that will be used to connect to the database
 * @package Reminder\Models\Helpers
 */

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

    /**
     * @return PDO
     */
    protected function getPDO(){

        $this->pdo = new PDO('mysql:host=localhost;dbname=superreminder', 'root', 'root');
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $this->pdo;
    }

    /**
     * @param $statement
     * @return array|false
     */
    public function query($statement){
        $request = $this->getPDO()->query($statement);
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
}

?>