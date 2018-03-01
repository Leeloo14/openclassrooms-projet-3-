<?php
/**
 * Created by IntelliJ IDEA.
 * User: anneg
 * Date: 01/03/2018
 * Time: 09:19
 */

namespace testAnne\blog\model;


class member
{
    private $_id;
    private $_login;
    private $_pass_md5;

    // Getters //

    public function getId()
    {
        return $this->_id;
    }

    public function getLogin()
    {
        return $this->_login;
    }

    public function getPassMd5()
    {
        return $this->_pass_md5;
    }

    // SETTERS //

    public function setId($id)
    {
        $this->_id = $id;
    }

    public function setLogin($login)
    {
        $this->_login = $login;
    }

    public function setPassMd5($pass_md5)
    {
        $this->_pass_md5 = $pass_md5;
    }
}

?>