<?php

namespace Blog\Dao;

class MemberDao extends BaseDao
{
    public function getUser($mailconnect, $mdpconnect)
    {
        $db = $this->dbConnect();
        $requser = $db->prepare('SELECT * FROM member WHERE email = ' . $this->Q($mailconnect) . ' AND pass = ' . $this->Q($mdpconnect));
        $requser->execute();
        return $requser->fetch();
    }
}
