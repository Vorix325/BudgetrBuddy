<?php
require('../model/database.php');
require('../model/user.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'show_login';
    }
}  

switch($action)
{
    case 'show_login':
        $errorMessage = "";
        $as = $userInfo->getCurrent();
        include('../user_info/login.php');
        break;
    case 'login':
        $username = filter_input(INPUT_POST, 'username');
        $password = trim(filter_input(INPUT_POST, 'password'));
        $checkCall = $userInfo->checkLogin($username);
        
        $check = password_hash('guest1', PASSWORD_DEFAULT);
        if(password_verify($password, $check))
        {
            $errorMessage = '';
            $userId = $userInfo->getUserID($username);
            $userInfo->updateCurrent($userId[0]);
            header("Location: http://localhost/ex_starts/BudgetBuddy/BudgetBuddy/budget_page/index.php");
            break;
        }
        else
        {
            $errorMessage = "Please enter correct login info";
            include('../user_info/login.php');
            break;
        }
    case 'logout':
        $userInfo->updateCurrent(0);
        include('../user_info/logout.php');
        break;
    case 'show_reg':
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
            header("Location: ../index.php");
        }
        else
        {
            $error = 'Please match the password';
            include('../errors/error/php');
            
        }
        break;
    case 'show_profile' :
        $id = $userInfo->getCurrent();
        $info = $userInfo->getUserInfo($id[0]);
        if($info == null || $info == false)
        {
            $info = new user();
        }
        include('../user_info/profile.php');
        
}
