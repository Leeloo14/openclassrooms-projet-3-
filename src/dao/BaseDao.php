<?php

namespace Blog\Dao;

class BaseDao


{
    protected function dbConnect()
    {
        $dbInfo = getenv("CLEARDB_DATABASE_URL");
        $db = new \PDO('mysql:host='. $dbInfo["host"] .';dbname='. $dbInfo["path"] .';charset=utf8', $dbInfo["user"], $dbInfo["pass"]);
        return $db;
    }

    protected function Q($data){
        return "'" . $data . "'";
    }

}
