<?php

namespace Reminder\Models;
require 'vendor/autoload.php';

use PDO;
use Reminder\Models\Helpers\Database;
use Reminder\Models\Model;

/**
 * Class User that is the representation of the user table in the database
 * This class extends Model class that is in charge of the connection to the database
 *
 */
class User extends Model
{
    private ?int $id;
    private ?string $email;
    private ?string $firstName;
    private ?string $lastName;

    public function construct(){
        parent::__construct();

    }

    /**
     * That function is used to view all the users in the database
     * @return int|null
     */
    public function viewUser(){
        $request = $this->getPDO()->query('SELECT * FROM user');
        $data = $request->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

}