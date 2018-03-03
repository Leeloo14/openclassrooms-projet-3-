<?php

namespace Blog\Dao;

class BaseDao
{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'dbuser', '');
        return $db;
    }
}
