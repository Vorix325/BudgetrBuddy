<?php
require('../model/database.php');
require('../model/user.php');
require('../model/userInfo.php');

$userInfo = new userInfo();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'list_products';
    }
}  

switch($action)
{
    case 'login':
        $username = filter_input(INPUT_GET, 'username');
        $password = filter_input(INPUT_GET, 'password');
        $check = $userInfo->checkLogin($username);
        if($check === $password)
        {
            include();
        }
        else
        {
            
        }
    case 'register' :          
}