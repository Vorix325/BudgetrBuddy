<?php
class user
{
    private int $id;
    private string $username;
    private string $fname;
    private string $lname;
    private string $password;
    private string $email;
    private int $phone;
    private string $nick;
    private string $typeUser;
    

    public function __construct() {
        $this->id = 0;
        $this->fname = '';
        $this->lname = '';
        $this->password= "";
        $this->email = '';
        $this->phone= 0;
        $this->typeUser = '';
    }

    public function getID() {
        return $this->id;
    }

    public function setID(int $value) {
        $this->id = $value;
    }

    public function getUser()
    {
        return $this->username;
    }
    public function setUser($username)
    {
        $this->username = $username;
    }
    public function getFname() {
        return $this->fname;
    }

    public function setFname(string $fname) {
        $this->fname = $fname;
    }
     public function getLname() {
        return $this->lname;
    }

    public function setLname(string $lname) {
        $this->lname = $lname;
    }
    
    public function getPass() {
        return $this->password;
    }

    public function setPass(string $pass) {
        $this->password = $pass;
    }
     public function getEmail() {
        return $this->email;
    }

    public function setEmail(string $email) {
        $this->email = $email;
    }
     public function getPhone() {
        return $this->phone;
    }

    public function setPhone(int $phone) {
        $this->phone= $phone;
    }
     public function getNick() {
        return $this->nick;
    }

    public function setNick(string $nick) {
        $this->nick = $nick;
    }
}

