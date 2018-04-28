<?php

namespace Blog\Dao;

class BaseDao


{
    protected function dbConnect()
    {
        $dbInfo = parse_url(getenv("CLEARDB_DATABASE_URL"));
        $server = $dbInfo["host"];
        $username = $dbInfo["user"];
        $password = $dbInfo["pass"];
        $db = substr($dbInfo["path"], 1);
        return new \PDO('mysql:host='. $server .';dbname='. $db .';charset=utf8', $username, $password);
    }

    protected function Q($data){
        return "'" . $data . "'";
    }

}
