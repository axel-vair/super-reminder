<?php

namespace Reminder\Models;
require 'vendor/autoload.php';

use AllowDynamicProperties;
use PDO;
use Reminder\Models\Helpers\Database;
use Reminder\Models\Model;

/**
 * Class User that is the representation of the user table in the database
 * This class extends Model class that is in charge of the connection to the database
 *
 */
#[AllowDynamicProperties] class User extends Model
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
         'email' => $email,
         'password' => $password,
         'firstname' => $firstname,
         'lastname' => $lastname
     ]);

     if ($sql_insert) {
         return true;
     } else {
         return false;
     }
 } else {
         return false;
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
        if ($results) {
            return true;
        } else {
            return false;
        }
    }
}
