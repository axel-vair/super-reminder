<?php
class Connect {
    private $host = "is100092-002.eu.clouddb.ovh.net:35613";
    private $username = "souleimane";
    private $password = "Oleg4342758";
    private $dbname = "superreminder";
    protected $db;
    private $stmt;
    public function __construct() {
        $this->db = new PDO("mysql:host=$this->host;dbname=$this->dbname", $this->username, $this->password);
        $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    public function getDB() {
        return $this->db;
    }

    public function emailExist($email): int {
        $this->stmt = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $this->stmt->execute([':email' => $email]);
        return $this->stmt->fetchColumn();
    }

    public function getPassword(string $email) {
        $this->stmt = $this->db->prepare('SELECT * FROM user WHERE email = :email');
        $this->stmt->execute([':email' => $email]);
        return $this->stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function insertUser(object $user) {
        $hashedPassword = $user->hashPassword();
        $this->stmt = $this->db->prepare('INSERT INTO user (email, firstname, lastname, password) VALUES (:email, :firstname, :lastname, :password)');
        return ($this->stmt->execute([':email' => $user->getEmail(),
        ':firstname' => $user->getFirstname(),
        ':lastname' => $user->getLastname(),
        ':password' => $hashedPassword]));
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
    }
    public function closeStmt() {
        $this->stmt = null;
    }
    
    public function closeDb() {
        $this->db = null;
    }
}