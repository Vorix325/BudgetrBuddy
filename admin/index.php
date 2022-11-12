<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db;      
$spendingDB = new spending_db();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'showBudget';
    }
}  

switch($action)
{
    case 'showUser':
        break;
}