<?php

namespace core;

use app\Config;

abstract class Model
{

    // Connecting the database to the project.
    protected static function getDB()
    {
        static $db = null;
        if ($db === null) {
            $db = mysqli_connect(Config::DB_HOST, Config::DB_USER, Config::DB_PASSWORD, Config::DB_NAME);
            if (mysqli_connect_errno()) {
                throw new \Exception('Failed to connect to MySQL: ' . mysqli_connect_error());
            }
        }

        return $db;
    }
}
