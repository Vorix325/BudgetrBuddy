<?php
require('../model/database.php');
require('../model/spending.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/spending_db.php');
require('../model/userInfo_db.php');

$userInfo = new userInfo_db();
$categoryDB = new category_db();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_POST, 'action');
    if ($action == NULL) {
        $action = 'showBudget';
    }
}  

switch($action)
{
    case 'showBudget':
        $userId = $userInfo->getCurrent();
        $errorMessage = "";
        $errorB = '';
        $categories = $categoryDB->getCategory(0);
        if($categories == null)
        {
            $error = "Please select 2 exactly product for compare";
            include('../errors/error.php');
            
        }
        else 
        {
           
            $caNames = [];
            $caTotals = [];
            foreach($categories as $ca)
            {
                $caNames[] = $ca->getCaName();
                $caTotals[] = $ca->getTotal();
            }
            $caName = json_encode($caNames);
            $caTotal = json_encode($caTotals);
            include('../budget_page/budget_view.php');
        }   
        break;
    case 'checkValue':
        $date = filter_input(INPUT_POST, 'date');
        $checkD = var_dump(validateDate($date)); 
        if($checkD == false || $date == null)
        {
            $errorMessage = "Date is invalid";
           // include('../budget_page/budgepage.php');
        }
        else
        {
           $errorMessage ='';
          // include('../budget_page/budgepage.php');
        }

        $budget = filter_input(INPUT_POST, 'budget',FILTER_VALIDATE_FLOAT);
        if($budget <= 0)
        {
            $errorB = 'Values cannot be empty';
           // include('../budget_page/budgepage.php');
        }
        else
        {
            $errorB = '';
           // include('../budget_page/budgepage.php');
        }
        $title = filter_input(INPUT_POST, 'title');
        $expen = filter_input(INPUT_POST,'expen',FILTER_VALIDATE_FLOAT);
        
        
        
}

function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

        
        

