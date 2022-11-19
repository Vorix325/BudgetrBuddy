<?php
require('../model/database.php');
require('../model/spending.php');
require('../model/category.php');
require('../model/category_db.php');
require('../model/spending_db.php');
require('../model/userInfo_db.php');
$userInfo = new userInfo_db();
$categoryDB = new category_db();
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
    case 'showSpending':
        $userId = $userInfo->getCurrent();
        
        $errorMessage = "";
        $errorB = '';
        $categories = $categoryDB->getCategory($userId[0]);
        if($categories == null)
        {
            $error = "Please select 2 exactly product for compare";
            include('../errors/error.php');
            
        }
        else 
        {
            /* Send data to graph */
            $caNames = [];
            $caTotals = [];
            $caId = [];
            foreach($categories as $ca)
            {
                $caNames[] = $ca->getCaName();
                $caTotals[] = $ca->getTotal();
               
            }
            $caName = json_encode($caNames);
            $caTotal = json_encode($caTotals);
            
            /*Generate data for category */
            $current = filter_input(INPUT_POST, 'current');
            $currentShow = $categoryDB->getId($current);
            $allSpend = $spendingDB->getSpend($currentShow);
            include('../budget_page/budget_view.php');
            
            
        }   
        break;
    case 'showBudget':
        $userId = $userInfo->getCurrent();
        $categories = $categoryDB->getCategory($userId[0]);
         
         foreach($categories as $ca)
          {
             $caNames[] = $ca->getCaName();
              $caTotals[] = $ca->getTotal();
               
          }
        included('../budget_page/add_page.php');
        break;
        
    case 'addSpending':
        $spendName = filter_input(INPUT_POST, 'spendName');
        $userId = $userInfo->getCurrent();
        $costName = filter_input(INPUT_POST,'costName');
        $categoryId = filter_input(INPUT_POST,'categoryId');
        $time = strtotime($_POST['dateFrom']);
        $date = date('d',$time);
        $month = date('m', $time);
        $year = date('Y', $time);
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
        $spendingDB->addSpend($userId, $categoryId, $amount, $spendName, $time);
        break;
    case 'updateSpending':
        $spendId = filter_input(INPUT_POST,'spendId');
        $amount = filter_input(INPUT_POST, 'amount', FILTER_VALIDATE_FLOAT);
        $spendName = filter_input(INPUT_POST, 'spendName');
        $categoryId = filter_input(INPUT_POST,'categoryId');
        $time = strtotime($_POST['dateFrom']);
        $date = date('d',$time);
        $month = date('m', $time);
        $year = date('Y', $time);
        
        $spendingDB->updateSpend($spendId, $categoryId, $amount, $spendName, $time);
                
}
function validateDate($date, $format = 'Y-m-d'){
    $d = DateTime::createFromFormat($format, $date);
    return $d && $d->format($format) === $date;
}

        
        

