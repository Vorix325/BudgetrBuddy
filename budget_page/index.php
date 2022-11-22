<?php
require('../model/database.php');
require('../model/spending.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/spending_db.php');
require('../model/userInfo_db.php');
require("../model/budget_db.php");
$userInfo = new userInfo_db();
$categoryDB = new category_db();
$spendingDB = new spending_db();
$budgetDB = new budget_db();
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == NULL) {
        $action = 'showSpending';
    }
}  

switch($action)
{
    case 'showSpending':
        $userId = $userInfo->getCurrent();
        
        
        $categories = $categoryDB->getCategory($userId[0]);
        if($categories == null)
        {
            $error = "Please select 2 exactly product for compare";
            include('../errors/error.php');
            
        }
        else 
        {
            /* Send data to graph */
            $dateTime = new DateTime();
            $currentM = $dateTime->format('F');
            $currentY = $dateTime->format('Y'); 
            $caNames = [];
            $caTotals = [];
            $caId = [];
            foreach($categories as $ca)
            {
                if($ca->getMonth() == $currentM && $ca->getYear() == $currentY)
                {
                 $caId[] = $ca->getCaID();
                 $caNames[] = $ca->getCaName();
                 $caTotals[] = $ca->getTotal();
                }
               
            }
            $caName = json_encode($caNames);
            $caTotal = json_encode($caTotals);

            /*Generate data for category */
            $current = filter_input(INPUT_POST, 'current');
            if($current == null)
            {
                if($caId != null)
                {
                    $current = $caId[0];
                }
                else 
                {
                    $error = 'Invalid data';
                    header('Location: ../errors/error.php?error=$error');
                }
            }
            $currentShow = $categoryDB->getId($current);
            $allSpend = $spendingDB->getSpend($currentShow);
            
            include('../budget_page/spend_view.php');
            
            
        }   
        break;
    case 'showBudget':
        $userId = $userInfo->getCurrent();
        $dateTime = new DateTime();
        $month = $dateTime->format('m');
        $year = $dateTime->format('Y');
        $currentM = $dateTime->format('F');
        $currentY = $dateTime->format('Y'); 
        $budget = $budgetDB->getBudget($userId[0], $month, $year);
        $array = $spendingDB->getSpendTime($month,$year);
        $categories = $categoryDB->getCategory($userId[0]);
        if($budget == null || $array == null || categories == null)
        {
            $budget = $month;
            $total = $year;
            $balance = $budget - $total;
            $error = "No budget Data";
            include('../budget_page/budget_view.php');
            
        }
        else
        {
            $total = 0;
            foreach($array as $t)
           {
             $total += $t;
           }
             $balance = $budget - $total;
             include('../budget_page/budget_view.php');
        }
        
       
        
        break;
        
    
    case 'addBudget' :
        $dateTime = new DateTime();
        $month = $dateTime->format('m');
        $year = $dateTime->format('Y');
        
        $amount = filter_input(INPUT_POST, 'Limit');
        $userId = filter_input(INPUT_POST, 'userId');
        $budgetDB->addBudget($amount, $userId, $month, $year);
        break;
     case 'deleteCategory' :
        $caId = filter_input(INPUT_POST, 'ca_id', 
            FILTER_VALIDATE_INT);
        $categoryDB->deleteCategory($ca_id);
        break;
    
    case 'showAddCategory':
        $dateTime = new DateTime();
        $month = $dateTime->format('m');
        $year = $dateTime->format('Y');
        $userId = filter_input(INPUT_POST, 'userId');
        $categories = $categoryDB->getCategory($userId[0]);
        include('../budget_page/budget_add.php');
        break;
    case 'addCategory' :
        $userId = filter_input(INPUT_POST, 'userId');
        $categoryName = filter_input(INPUT_POST, 'category_name');
        $limit = filter_input(INPUT_POST, 'Limit', FILTER_VALIDATE_FLOAT);
        $month = filter_input(INPUT_POST, 'month');
        $year = filter_input(INPUT_POST,'year');
        $categoryDB->addCategory($userId, $categoryName, $limit, $month, $year);
        break;
    case 'showUpCategory':
        $dateTime = new DateTime();
        $currentM = $dateTime->format('F');
        $currentY = $dateTime->format('Y'); 
        $month = $dateTime->format('m');
        $year = $dateTime->format('Y');
        $userId = filter_input(INPUT_POST, 'userId');
        $name = filter_input(INPUT_POST, 'name');
        $limit = filter_input(INPUT_POST, 'Limit', FILTER_VALIDATE_FLOAT);
        include('../budget_page/budget_edit.php');
        break;
    case 'deleteSpend' :
        $spend_id = filter_input(INPUT_POST, 'spending_id');
        $category_id = filter_input(INPUT_POST, 'category_id');
        $spendingDB->deleteSpend($spend_id,$category_id);
        break;
    case 'showAddSpend':
        $userId = $userInfo->getCurrent();
        $categories = $categoryDB->getCategory($userId[0]);
        include('../budget_page/spend_add.php');
        break;
    case 'addSpending':
        $spendName = filter_input(INPUT_POST, 'spending_Name');
        $userId = filter_input(INPUT_POST, 'userId');
        $categoryId = filter_input(INPUT_POST,'categoryId');
        $time = strtotime($_POST['time']);
        $date = date('d',$time);
        $month = date('m', $time);
        $year = date('Y', $time);
        $amount = filter_input(INPUT_POST, 'spend');
        
        $spendingDB->addSpend($userId, $categoryId, $amount, $spendName, $date, $month, $year);
        break;
    case 'showUpSpend':
        $userId = $userInfo->getCurrent();
        $categories = $categoryDB->getCategory($userId[0]);
        $name = filter_input(INPUT_POST, 'name');
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
        $date = filter_input(INPUT_POST, 'date');
        $month = filter_input(INPUT_POST, 'month');
        $nmonth = date("m", strtotime($month));
        $year = filter_input(INPUT_POST, 'year');
        $time = mktime(0, 0, 0, $nmonth, $date, $year);
        $times = date('Y-m-d',$time);
        $category_id = filter_input(INPUT_POST, 'categoryID');
        include('../budget_page/spend_edit.php');
        break;
    case 'updateSpending':
        
        $amount = filter_input(INPUT_POST, 'amount');
        $name = filter_input(INPUT_POST, 'name');
        $categoryId = filter_input(INPUT_POST,'categoryId');
        $time = strtotime($_POST['time']);
        $date = date('d',$time);
        $month = date('m', $time);
        $year = date('Y', $time);
        
        $spendingDB->updateSpend($categoryId, $amount, $spendName, $date, $month, $year);
                
}
function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

        
        

