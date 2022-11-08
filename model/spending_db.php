<?php
class spending_db
{
    function getSpend($categoryId)
    {
     $db = database::getDB();
     $query = 'SELECT spending_id, Samount , costName FROM spending_bbudget
              WHERE category_id = :categoryId ';
     $statement = $db->prepare($query);
     $statement->bindValue(':category_id',$categoryId);
     $statement->execute();
     $spending = $statement->fetchAll();
     $statement->closeCursor();
     return $spending; 
    }
    function addSpend($userId,$categoryId,$amount)
    {
     $db = Database::getDB();
     $query = 'INSERT INTO Spending
               (user_id, category_id,$amount)
              VALUE
               (:userId, :categoryId, :amount)';
             
     $statement = $db->prepare($query);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':categoryId',$categoryId);
     $statement-> bindValue(':amount', $amount);
     $statement->execute();
     $statement->closeCursor(); 
    }
    function updateSpend($spendId,$categoryId,$amount)
    {
     $db = Database::getDB(); 
     $query = 'UPDATE Spending
              SET
                (category_id,amount)
              VALUE
                 (:categoryId, :amount)
              WHERE spending_id = :spendId'
               ;
     $statement = $db->prepare($query);
     $statement->bindValue(":spendId", $spendId);
     $statement->bindValue(":amount", $amount);
     $statement->bindValue(":categoryId",$categoryId);
     $statement->execute();
     $statement->closeCursor();
    }
}

