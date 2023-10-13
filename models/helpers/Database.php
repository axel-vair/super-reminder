<?php

use PDO;
use AllowDynamicProperties;
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
    public function __construct($db_name = 'superreminder', $db_user = 'root', $db_pass = 'root', $db_host = 'localhost'){
        $this->db_name = $db_name;
        $this->db_user = $db_user;
        $this->db_pass = $db_pass;
        $this->db_host = $db_host;
    }

    /**
     * @return PDO
     */
    protected function getPDO(){

        $this->pdo = new PDO('mysql:host=is100092-002.eu.clouddb.ovh.net:35613;dbname=superreminder', 'souleimane', 'Oleg4342758');
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



/**
 * Class User that is the representation of the user table in the database
 * This class extends Model class that is in charge of the connection to the database
 *
 */
#[AllowDynamicProperties] class User extends Database
{
    private ?int $id;
    private ?string $email;
    private ?string $firstName;
    private ?string $lastName;


    public function construct(){
        parent::__construct();

    }

    /**
     * That function is used to register all the users in the database
     * @return int|null
     */
 public function register($email,$password, $firstname, $lastname){
     if(!$this->verifUser($email)){
     $sql = "INSERT INTO user (email, password, firstname, lastname) VALUES (:email, :password, :firstname, :lastname)";
     $sql_insert = $this->getPDO()->prepare($sql);
     $sql_insert->execute([
         'email' => htmlspecialchars($email),
         'password' => password_hash($password, PASSWORD_DEFAULT),
         'firstname' => htmlspecialchars($firstname),
         'lastname' => htmlspecialchars($lastname)
     ]);

     if ($sql_insert) {
         echo  json_encode(["success" => 'ok']);

     } else {
         echo json_encode(["success" => 'error insert']);
     }
 } else {
         echo json_encode(["error" => 'user exist']);
     }
 }

    public function verifUser($email)
    {
        $sql = "SELECT * FROM user WHERE email = :email";
        $sql_exe = $this->getPDO()->prepare($sql);
        $sql_exe->execute([
            'email' => $email,
        ]);
        $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
        var_dump($results);
        if ($results) {
            $hashed_password = $results['password'];
            if (password_verify($_POST['password-login'], $hashed_password)) {
                session_start();
                $_SESSION = $results;
                return $this->responseCorrect();
            } else {
                return $this->responseFalse();
            }

        } else {
            return false;
        }

    }

    public function responseCorrect()
    {
        echo json_encode(["success" => 'ok']);
    }

    public function responseFalse()
    {
        echo json_encode(["error" => 'error']);
    }

    public function logout()
    {
        session_destroy();
        header('Location: index.php');
    }

}

class Todo extends Database
{
    /**
     * Function to insert a new todo in the database with the user id
     * @param $user_id
     * @param $title
     * @param $task
     * @return false|string
     */
    public function todoInsert($user_id, $title, $task)
    {
        $sql = "INSERT INTO todo (user_id, title, task, createdAt, status) VALUES (:user_id, :title, :task, NOW(), 0)";
        $sql_insert = $this->getPDO()->prepare($sql);
        $sql_insert->execute([
            'user_id' => $user_id,
            'title' => $title,
            'task' => $task
        ]);

        if ($sql_insert) {
            return  json_encode(["success" => 'ok']);
        } else {
            return json_encode(["success" => 'error insert']);
        }
    }

    /**
     *
     * Function to display all todo from the database with the user id
     * @param $user_id
     * @return false|string
     */
    public function displayTodo($user_id){
        $sql = "SELECT * FROM todo WHERE user_id = :user_id";
        $sql_select = $this->getPDO()->prepare($sql);
        $sql_select->execute([
            'user_id' => $user_id
        ]);
        $result = $sql_select->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($result);
    }

    /**
     *
     * Function to delete a todo from the database with the todo id
     * @param $id_todo
     * @return false|string
     */
    public function deleteTodo($id_todo){
        $sql = "DELETE FROM todo WHERE id = :id_todo";
        $sql_delete = $this->getPDO()->prepare($sql);
        $sql_delete->execute([
            'id_todo' => $id_todo
        ]);
        return json_encode(["suppress" => 'ok']);

    }

    /**
     * Function to update a todo from the database with the todo id
     * @param $id_todo
     * @return false|string
     */
    public function updateTodo($id_todo, $updatedAt){
        $sql = "UPDATE todo SET status = 1, updatedAt = :updatedAt WHERE id = :id_todo";
        $sql_update = $this->getPDO()->prepare($sql);
        $sql_update->execute([
            'id_todo' => $id_todo,
            'updatedAt' => $updatedAt
        ]);
        return json_encode(["update" => 'ok']);
    }
}




?>