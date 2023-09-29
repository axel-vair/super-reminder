<?php

namespace Reminder\Models;
use Reminder\Models\Helpers\Database;

/**
 * Class Model that will be used to connect to the database.
 * Child of Database class that is in charge of the connection to the database because Database
 * can't be parent of User.
 */
abstract class Model extends Database
{
    public function __construct()
    {
        parent::__construct();
    }
}