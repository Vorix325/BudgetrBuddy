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
    function addSpend($userId,$categoryId,$amount, $name , $date)
    {
     $db = database::getDB();
     $query = 'INSERT INTO spending_bbudget
               (user_id, category_id,Samount, costName, SDate)
              VALUE
               (:userId, :categoryId, :amount, :name, :date)';
             
     $statement = $db->prepare($query);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':categoryId',$categoryId);
     $statement-> bindValue(':amount', $amount);
     $statement->bindValue(':name', $name);
     $statement->bindValue(':date',$date);
     $statement->execute();
     $statement->closeCursor(); 
    }
    function updateSpend($spendId,$categoryId,$amount, $name, $date)
    {
     $db = database::getDB(); 
     $query = 'UPDATE spending_bbudget
              SET
                (costName, category_id, Samount, sDate)
              VALUE
                 (:name, :caId, :amount, :date)
              WHERE spending_id = :spendId'
               ;
     $statement = $db->prepare($query);
     $statement->bindValue(":spendId", $spendId);
     $statement->bindValue(":caId", $categoryId);
     $statement->bindValue(":name", $name);
     $statement->bindValue(":amount", $amount);
     $statement->bindValue(":date", $date);
     $statement->execute();
     $statement->closeCursor();
    }
}

