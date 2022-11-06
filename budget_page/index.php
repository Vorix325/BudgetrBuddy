<?php
require('../model/database.php');
require('../model/spending.php');
require('../model/category_db.php');
require('../model/spending_db');

$userInfo = new userInfo();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'showSpend';
    }
}  

switch($action)
{
    case 'showSpend':
       
        if($check === $password)
        {
            include('../user_info/login.php');
        }
        else
        {
            include('../');
        }
    case 'addSpend' :
        
        
        
}