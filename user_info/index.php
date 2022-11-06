<?php
require('../model/database.php');
require('../model/user.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

switch($action)
{
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $check = $userInfo->checkLogin($username);
        if($check === $password)
        {
            include('../budget_page/budgetpage.php');
        }
        else
        {
            include('../');
        }
    case 'register' :
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
        if($email == FALSE)
        {
            $errorEmail = 'Please enter a valid email';
            include('../user_info/login.php');
        }
        else
        {
            
        }
        if($phone == FALSE)
        {
            $errorPhone = 'Please enter a valid phone';
            include('../user_info/login.php');
        }
        if($username == null || $password == null || $email == null || $fname == null || $lname == null || $phone == null)
        {
            $errorEmpty = "Please enter fill out everything";
            include('../user_info/login.php');
        }
        
}