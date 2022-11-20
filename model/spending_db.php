<?php
class spending_db
{
    function getSpend($categoryId)
    {
     $db = database::getDB();
     $query = 'SELECT spending_id, Samount , costName FROM spending_bbudget
              WHERE category_id = :categoryId';
     $statement = $db->prepare($query);
     $statement->bindValue(':categoryId',$categoryId);
     $statement->execute();
     $spending = $statement->fetchAll();
     $statement->closeCursor();
     return $spending; 
    }
    function getSpendTime($month , $year)
    {
        $db = database::getDB();
     $query = 'SELECT  Samount  FROM spending_bbudget
              WHERE SMonth = :month AND SYear = :year';
     $statement = $db->prepare($query);
     $statement->bindValue(':month',$month);
     $statement->bindValue(':year', $year);
     $statement->execute();
     $spending = $statement->fetchAll();
     $statement->closeCursor();
     return $spending; 
    }
    function addSpend($userId,$categoryId,$amount, $name , $time, $date, $month, $year)
    {
     $db = database::getDB();
     $query = 'INSERT INTO spending_bbudget
               (user_id, category_id, Samount, costName, timeS, SDate, SMonth, SYear)
              VALUE
               (:userId, :categoryId, :amount, :name, :time, :date, :month, :year)';
             
     $statement = $db->prepare($query);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':categoryId',$categoryId);
     $statement-> bindValue(':amount', $amount);
     $statement->bindValue(':name', $name);
     $statement->bindValue(':time',$time);
     $statement->bindValue(':date',$date);
     $statement->bindValue(':month',$month);
     $statement->bindValue(':year',$year);
     $statement->execute();
     $statement->closeCursor(); 
    }
    function updateSpend($spendId,$userId,$categoryId,$amount, $name,$time, $date, $month, $year)
    {
     $db = database::getDB(); 
     $query = 'UPDATE spending_bbudget
              SET
                (user_id, costName, category_id, Samount, timeS, sDate, SMonth, SYear)
              VALUE
                 (:userId, :name, :caId, :amount, :time, :date,:month, :year )
              WHERE spending_id = :spendId'
               ;
     $statement = $db->prepare($query);
     $statement->bindValue(':spendId',$spendId);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':categoryId',$categoryId);
     $statement-> bindValue(':amount', $amount);
     $statement->bindValue(':name', $name);
     $statement->bindValue(':time',$time);
     $statement->bindValue(':date',$date);
     $statement->bindValue(':month',$month);
     $statement->bindValue(':year',$year);
     $statement->execute();
     $statement->closeCursor();
    }
}

