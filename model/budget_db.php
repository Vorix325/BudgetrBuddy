<?php

class budget_db
{
    function getAll()
    {
      $db = database::getDB();
      $query = 'SELECT * FROM Budget_Bbudget
               ';
      $statement = $db->prepare($query);
      $statement->execute();
      $total = $statement->fetchAll();
      $statement->closeCursor();
      return $total;
    }
    function getBudget($userId, $month, $year)
    {
    $db = database::getDB();
    $query = 'SELECT amount FROM Budget_Bbudget
              WHERE user_id = :userId AND SMonth = :month AND SYear = :year ';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId',$userId);
    $statement->bindValue(':month',$month);
    $statement->bindValue(':year',$year);
    $statement->execute();
    $total = $statement->fetch();
    $statement->closeCursor();
    return $total;
    }
    function addBudget($amount, $userId, $month, $year)
    {
     $db = database::getDB();
     $query = 'INSERT INTO Budget_Bbudget
              (amount, user_id, SMonth, SYear)
              VALUE
              (:amount, :userId, :month, :year)';
     $statement = $db->prepare($query);
     $statement->bindValue(':amount',$amount);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':month',$month);
     $statement->bindValue(':year',$year);
     $statement->execute();
     $statement->closeCursor();
    }
    function updateBudget($budgetId, $userId, $amount, $month, $year)
    {
     $db = database::getDB();
     $query = 'UPDATE Budget_Bbudget
              user_id = :userId, amount = :amount, SMonth = :month, SYear = :year
              WHERE budget_id = :budgetId';
     $statement = $db->prepare($query);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':amount',$amount);
     $statement->bindValue(':budgetId',$budgetId);
     $statement->bindValue(":month", $month);
     $statement->bindValue(":year",$year);
     $statement->execute();
     $statement->closeCursor();
        
    }
}

