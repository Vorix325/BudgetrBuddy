<?php
require('../model/database.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/budget_db.php');
require('../model/userInfo_db.php');
require('../model/email.php');

$userInfo = new userInfo_db;      
$budgetDB = new budget_db();
$categoryDB = new category_db();
$emailS = new emailSend();
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
        $userName = filter_input(INPUT_POST, 'name');
        $pass = filter_input(INPUT_POST, 'pass');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone');
        $nick = filter_input(INPUT_POST, 'nick');
        $typeKL = filter_input(INPUT_POST, 'type');
        $userId = filter_input(INPUT_POST, 'userId');
        include('../admin/admin_UserEdit.php');
        break;
    case 'editUser':
        $userName = filter_input(INPUT_POST, 'userName');
        $old = filter_input(INPUT_POST, 'old');
        $pass = filter_input(INPUT_POST, 'pass');
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $fname = filter_input(INPUT_POST, 'fname');
        $lname = filter_input(INPUT_POST, 'lname');
        $phone = filter_input(INPUT_POST, 'phone');
        $nick = filter_input(INPUT_POST, 'nick');
        $typeKL = filter_input(INPUT_POST, 'type');
        $userId = filter_input(INPUT_POST, 'userId');
        $userInfo->updateAdmin($userId, $userName, $pass, $fname, $lname, $email, $phone, $nick, $typeKL);
        $emailS->update($userName, $email, $old);
        
        header('Location: .?action=showUser');
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
        $user = $userInfo->getAllUser();
        $month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
        $year_10 = array('2020','2021','2022','2023','2024','2025');
        include ('../admin/admin_AddBudget.php');
        break;
    case 'addBudget':
        $userId = filter_input(INPUT_POST, 'id');
        $amount = filter_input(INPUT_POST, 'amount');
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST, 'year');
        $nmonth = date("m", strtotime($month));
        $t = $year."-".$nmonth."-1";
        $time = strtotime('+1 month', strtotime($t));
        
        $monthS = date('F',$time);
        $yearS = date('Y',$time);
        $userC = $userInfo->getCurrent();
        $emailS->sent($month,$year, 1);
        $stl = $userInfo->getEmail($userC[0]);
        $emailS->addNext($userId, $stl[0],$stl[1], $monthS, $yearS);
        $budgetDB->addBudget($amount, $userId, $month, $year);
        $bid = $budgetDB->getId($month, $year, $userId);
        $caName = array('food','cloth','utility','transportation','medical','entertainment');
        for($i = 0; $i < count($caName); $i+= 1)
        {
            $categoryDB->addCategory($userId, $caName[$i], 0, $month, $year, $bid);
        }
        header('Location: .?action=showBudget');
        break;
    case 'showEditBudget' :
        $budgetId = filter_input(INPUT_POST, 'budget_id');
        $userId = filter_input(INPUT_POST, 'id');
        $userName = filter_input(INPUT_POST, 'name');
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST, 'year');
        include('../admin/admin_EditBudget.php');
        break;
    case 'editBudget' :
        $budgetId = filter_input(INPUT_POST, 'budgetId');
        $userId = filter_input(INPUT_POST, 'userId');
        $amount = filter_input(INPUT_POST, 'amount');
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST, 'year');
        $budgetDB->updateBudget($budgetId,$userId,$amount, $month, $year);
        header('Location: .?action=showBudget');
        break;
    case 'deleteBudget' :
        $budgetId = filter_input(INPUT_POST, 'budget_id');
        $budgetDB->deleteBudget($budgetId);
        header('Location: .?action=showBudget');
        break;
    case 'report' :
      $userId = filter_input(INPUT_POST, 'id');
      $month = filter_input(INPUT_POST, 'month');
      $year = filter_input(INPUT_POST, 'year');
      $datas = $categoryDB->getReport($userId, $month, $year);
      $c90 = $categoryDB->get90($userId);
      include("../admin/report.php");
      
      
     
}