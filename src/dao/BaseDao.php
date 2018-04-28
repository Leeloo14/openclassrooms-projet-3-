<?php

namespace Blog\Dao;

class BaseDao


{
    protected function dbConnect()
    {
        $dbInfo = parse_url(getenv("CLEARDB_DATABASE_URL"));
        //$dbInfo = array("host" => "eu-cdbr-west-02.cleardb.net", "path" => "heroku_a19cc1652a3e5c5", "user" => "b2cecd77104393", "pass" => "19ade141");
        var_dump($dbInfo);
        //var_dump('mysql:host='. $dbInfo["host"] .';dbname='. $dbInfo["path"] .';charset=utf8');
        $db = new \PDO('mysql:host='. $dbInfo["host"] .';dbname='. $dbInfo["path"] .';charset=utf8', $dbInfo["user"], $dbInfo["pass"]);
        return $db;
    }

    protected function Q($data){
        return "'" . $data . "'";
    }

}
