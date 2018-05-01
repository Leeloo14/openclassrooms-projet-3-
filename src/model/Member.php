<?php

namespace Blog\Model;

class Member
{
    private $id;
    private $pseudo;
    private $pass;
    private $email;

    function __construct($memberData) {
        if (isset($memberData['id'])){
            $this->id = $memberData['id'];
        }
        if (isset($memberData['pseudo'])){
            $this->pseudo = $memberData['pseudo'];
        }
        if (isset($memberData['pass'])){
            $this->pass = $memberData['pass'];
        }
        if (isset($memberData['email'])){
            $this->email = $memberData['email'];
        }
  }

    // Getters //

    public function getId()
    {
        return $this->id;
    }
    public function getPseudo()
    {
        return $this->pseudo;
    }
    public function getPass()
    {
        return $this->pass;
    }
    public function getEmail()
    {
        return $this->email;
    }

    // SETTERS //

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
    }
    public function setPass($pass)
    {
        $this->pass = $pass;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}

