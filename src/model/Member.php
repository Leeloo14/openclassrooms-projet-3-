<?php
/**
 * Created by IntelliJ IDEA.
 * User: anneg
 * Date: 01/03/2018
 * Time: 09:19
 */

namespace Blog\Model;


class Member
{
    private $id;
    private $login;
    private $pass_md5;

    function __construct($memberData) {
        if (isset($memberData['id'])){
            $this->id = $memberData['id'];
        }

        if (isset($memberData['login'])){
            $this->login = $memberData['login'];
        }

        if (isset($memberData['pass_md5'])){
            $this->pass_md5 = $memberData['pass_md5'];
        }

  }


    // Getters //

    public function getId()
    {
        return $this->id;
    }

    public function getLogin()
    {
        return $this->login;
    }

    public function getPassMd5()
    {
        return $this->pass_md5;
    }

    // SETTERS //

    public function setId($id)
    {
        $this->id = $id;
    }

    public function setLogin($login)
    {
        $this->login = $login;
    }

    public function setPassMd5($pass_md5)
    {
        $this->pass_md5 = $pass_md5;
    }
}

