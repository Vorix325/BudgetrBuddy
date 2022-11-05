<?php
class spending_db
{
    public function getSpend($userId,$categoryId)
    {
     $db = Database::getDB();
     $query = 'SELECT spending_id, amount FROM Spending
              WHERE user_id = :userId, category_id = :categoryId ';
     $statement = $db->prepare($query);
     $statement->bindValue(':userId',$userId);
     $statement->bindVanlue('category_id',$categoryId);
     $statement->execute();
     $spending = $statement->fetchAll();
     $statement->closeCursor();
     return $spending; 
    }
    public function addSpend($userId,$categoryId,$amount)
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
    public function updateSpend($spendId,$categoryId,$amount)
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

