<?php
require('../model/database.php');
require('../model/user.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}  

switch($action)
{
    case 'show_login':
        $errorMessage = "";
        include('../user_info/login.php');
        break;
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $check = $userInfo->checkLogin($username);
        if($check === $password)
        {
            $userId = $userInfo->getUserID($username, $password);
            $userInfo->updateCurrent($userId);
            include('../budget_page/budgetpage.php');
        }
        else
        {
            $errorMessage = "Please enter correct login info";
            include('../user_info/login.php');
        }
        break;
    case 'logout' :
        $userInfo->updateCurrent(0);
        include('../user_info/logout.php');
        break;
    case 'show_reg':
        
      $errorMessage = '';
      include('../user_info/register.php');
      break;
    case 'register' :
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
        $confirm = filter_input(INPUT_POST, 'confirm');
        
        if($password == $confirm)
        {
            $userInfo->addUser($username, $password, $fname, $lname, $email, $phone);
            include('../user_info/login.php');
        }
        else
        {
            $errorMessage = 'Please match the password';
            include('../user_info/register.php');
            
        }
        break;
}
