<?php
class user
{
    private int $id;
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
}

