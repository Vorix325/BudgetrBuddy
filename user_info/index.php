<?php
require('../model/database.php');

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
        $userName = filter_input(INPUT_POST, 'userName');
        $pass = trim(filter_input(INPUT_POST, 'pass'));
        $checkCall = $userInfo->checkLogin($userName);
        
        $check = password_hash($checkCall[0], PASSWORD_DEFAULT);
        if(password_verify($pass, $check))
        {
            
            $user = $userInfo->getUserID($userName);
            if($user == null)
            {
                
                include('../errors/test.php');
            }
            else 
            {
                $userInfo->updateCurrent($user[0], $user[1]);
                
                header("Location: ../index.php");
            }
            
            break;
        }
        else
        {
            $errorName = "Incorrect User Info";
            $error = "Please enter correct login info";
            include('../errors/error.php');
            break;
        }
    case 'logout':
        $x = null;
        $y = null;
        $userInfo->updateCurrent($x,$y);
        include('../user_info/logout.php');
        break;
    case 'show_reg':
      include('../user_info/register.php');
      break;
    case 'register' :
        $userName = filter_input(INPUT_POST, 'userName');
        $pass = filter_input(INPUT_POST, 'pass');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone');
        $confirm = filter_input(INPUT_POST, 'confirm');
       
        
        if($pass == $confirm)
        {
            $userInfo->addUser($userName, $pass, $fname, $lname, $email, $phone);
            header("Location: ../index.php");
        }
        else
        {
            $errorName = "Wrong password";
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
        break;
    case 'showEdit' :
        $userId= filter_input(INPUT_POST, 'userId');
        $userName = filter_input(INPUT_POST, 'userName');
        $pass = filter_input(INPUT_POST, 'pass');
        $email = filter_input(INPUT_POST, 'email');
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone');
        $nick = filter_input(INPUT_POST, 'nick');
        include('../user_info/edit-profile.php');
        break;
    case 'editProfile' :
        $userId= filter_input(INPUT_POST, 'userId');
        $userName = filter_input(INPUT_POST, 'userName');
        $pass = filter_input(INPUT_POST, 'pass');
        $email = filter_input(INPUT_POST, 'email');
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone');
        $nick = filter_input(INPUT_POST, 'nick');
        $userInfo->updateUser($userId,$userName,$pass, $fname, $lname, $email,$phone, $nick);
        
        header('Location: .?action=show_profile');
        break;
        
}
