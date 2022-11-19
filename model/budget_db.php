<?php

class budget_db
{
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
}
