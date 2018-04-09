<?php

namespace Blog\Dao;

class BaseDao


{
    protected function dbConnect()
    {
        $db = new \PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }

    protected function Q($data){
        return "'" . $data . "'";
}

}
