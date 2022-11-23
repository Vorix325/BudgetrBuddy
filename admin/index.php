<?php
require('../model/database.php');
require('../model/category.php');
require('../model/budget_db.php');
require('../model/user.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db;      
$budgetDB = new budget_db();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'showUser';
    }
}  

switch($action)
{
    case 'showUser' :
        $datas = $userInfo->getAll();
        include('../admin/admin_UserView.php');
        break;
    case 'showEditUser':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
        $pass = filter_input(INPUT_POST, 'password');
        $nick = filter_input(INPUT_POST, 'nick');
        $type = filter_input(INPUT_POST, 'type');
        $userId = filter_input(INPUT_POST, 'userId');
        include('../admin/admin/admin_UserEdit.php');
        break;
    case 'editUser':
        $username = filter_input(INPUT_POST, 'username');
        $password = filter_input(INPUT_POST, 'password');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);
        $nick = filter_input(INPUT_POST, 'nick');
        $type = filter_input(INPUT_POST, 'type');
        $userId = filter_input(INPUT_POST, 'userId');
        $userInfo->updateAdmin($userId, $username, $password, $fname, $lname, $email, $phone, $nick, $type);
        header('Location: ./index.php?action=showUser');
        break;
    case 'deleteUser':
        $userId = filter_input(INPUT_POST, 'id');
        $userInfo->deleteUser($userId);
        header('Location: ./index.php?action=showUser');
        break;
    case 'showBudget':
        $main = $budgetDB->getAll();
        include('../admin/admin_All.php');
        break;
    case 'showAddBudget':
        $user = $userDB->getAllUser();
        $month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $year_10 = array('2020','2021','2022','2023','2024','2025');
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
    case 'showEditBudget' :
        $userId = filter_input(INPUT_POST, 'id');
        $username = filter_input(INPUT_POST, 'name');
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST, 'year');
        include('../admin/admin_EditBudget');
        break;
    case 'editBudget' :
        $budgetId = filter_input(INPUT_POST, 'budgetId');
        $userId = filter_input(INPUT_POST, 'userId');
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST, 'year');
        $budgetDB->updateBudget($amount, $userId, $month, $year);
        header('Location: ./index.php?action=showBudget');
        break;
}