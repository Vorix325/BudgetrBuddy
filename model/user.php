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
    private string $typeUser;
    

    public function __construct() {
        $this->id = 0;
        $this->fname = '';
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

    public function setPhone(string $phone) {
        $this->phone= $phone;
    }
}

