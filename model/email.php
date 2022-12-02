<?php

class emailSend
{
    function getInfo()
    {
     $db = database::getDB();
     $query = 'SELECT * FROM email
              ';
     $statement = $db->prepare($query);
     $statement->execute();
     $info = $statement->fetchAll();
     $statement->closeCursor();
     return $info; 
    }
    function sent($month,$year, $status)
    {
     $db = database::getDB();
     $query = 'UPDATE EMAIL
               SET
                 editStatus = :status
               WHERE 
                 monthS = :month AND yearS = :year
              ';
     $statement = $db->prepare($query);
     $statement->bindValue(':month',$month);
     $statement->bindValue(':year',$year);
     $statement->bindValue(':status', $status);
     $statement->execute();
     $statement->closeCursor();

    }
    function update($name, $email, $old)
    {
         $db = database::getDB();
     $query = 'UPDATE EMAIL
               SET
                 adminN = :name, email = :email
               WHERE 
                 adminN = :old;
              ';
     $statement = $db->prepare($query);
     $statement->bindValue(':name',$name);
     $statement->bindValue(':email',$email);
     $statement->bindValue(':old', $old);
     $statement->execute();
     $statement->closeCursor();
    }
    function addNext($user_id, $aName, $email, $month, $year)
    {
     $status = 0;
     $db = database::getDB();
     $query = 'INSERT INTO EMAIL 
               (user_id, adminN, email, editStatus, monthS, yearS)
               VALUE
               (:id    ,:name  ,:email, :status, :month, :year)
               
              ';
     $statement = $db->prepare($query);
     $statement->bindValue(':id',$user_id);
     $statement->bindValue(':email',$email);
     $statement->bindValue(':status', $status);
     $statement->bindValue(':name',$aName);
     $statement->bindValue(':month', $month);
     $statement->bindValue(':year', $year);
     $statement->execute();
     $statement->closeCursor();
    }
}

