<?php
require('../model/database.php');
require('../model/category.php');
require('../model/budget_db.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db;      
$budgetDB = new budget_db();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'showBudget';
    }
}  

switch($action)
{
    case 'showBudget':
        $main = $budgetDB->getAll();
        include('../admin/admin_All.php');
        break;
    case 'showAdd':
        include ('../admin/admin_AddBudget');
        break;
    case 'addBudget':
        $userId = filter_input(INPUT_POST, 'id');
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST, 'year');
        $budgetDB->addBudget($amount, $userId, $month, $year);
        header('Location: ./index.php?action=showBudget');
        break;
}