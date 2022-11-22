<?php
class spending_db
{
    function getSpend($categoryId)
    {
     $db = database::getDB();
     $query = 'SELECT * FROM spending_bbudget
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
    function deleteSpend($spend_id,$categoryId)
    {
       $db = database::getDB();
    $query = 'DELETE FROM spending_bbudget
              WHERE $spend_id = :spend_id';
    $statement = $db->prepare($query);
    $statement->bindValue(':spend_id', $spend_id);
    $statement->execute();
    $statement->closeCursor();
    $total = $this->getTotal($categoryId);
    $this->countTotal($categoryId, $total);
    }
    function addSpend($userId,$categoryId,$amount, $name , $date, $month, $year)
    {
     
     $db = database::getDB();
     $query = 'INSERT INTO spending_bbudget
               (user_id, category_id, Samount, costName, SDate, SMonth, SYear)
              VALUE
               (:userId, :categoryId, :amount, :name, :date, :month, :year)';
             
     $statement = $db->prepare($query);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':categoryId',$categoryId);
     $statement-> bindValue(':amount', $amount);
     $statement->bindValue(':name', $name);
     $statement->bindValue(':date',$date);
     $statement->bindValue(':month',$month);
     $statement->bindValue(':year',$year);
     $statement->execute();
     $statement->closeCursor(); 
     $total = $this->getTotal($categoryId);
     $this->countTotal($categoryId, $total);
    }
    function updateSpend($spendId,$userId,$categoryId,$amount, $name, $date, $month, $year)
    {
     $db = database::getDB(); 
     $query = 'UPDATE spending_bbudget
              SET
                (user_id, costName, category_id, Samount, sDate, SMonth, SYear)
              VALUE
                 (:userId, :name, :caId, :amount, :date,:month, :year )
              WHERE spending_id = :spendId'
               ;
     $statement = $db->prepare($query);
     $statement->bindValue(':spendId',$spendId);
     $statement->bindValue(':userId',$userId);
     $statement->bindValue(':categoryId',$categoryId);
     $statement-> bindValue(':amount', $amount);
     $statement->bindValue(':name', $name);
     $statement->bindValue(':date',$date);
     $statement->bindValue(':month',$month);
     $statement->bindValue(':year',$year);
     $statement->execute();
     $statement->closeCursor();
     $total = $this->getTotal($categoryId);
     $this->countTotal($categoryId, $total);
    }
    function countTotal($category_id, $total)
    {
        
     
     $db = database::getDB(); 
     $query = 'UPDATE Category_bbudget
              SET
                (total)
              VALUE
                 (:total)
              WHERE category_id = :caId';
               
     $statement = $db->prepare($query);
     $statement->bindValue(':caId',$category_id);
     $statement->bindValue(':total', $total);
     $statement->execute();
     $statement->closeCursor();
    }
    function getTotal($category_id)
    {
     $db = database::getDB(); 
     $query = 'SELECT SUM(amount) FROM spending_bbudget
               WHERE category_id = :caId ';
               
     $statement = $db->prepare($query);
     $statement->bindValue(':caId',$category_id);
     $statement->execute();
     $total = $statement->fetch();
     $statement->closeCursor();
     return $total;
    }
}

