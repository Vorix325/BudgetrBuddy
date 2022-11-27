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
    function sent($id, $status)
    {
     $db = database::getDB();
     $query = 'UPDATE EMAIL
               SET
                 editStatus = :status
               WHERE 
                 pr_id = :id
              ';
     $statement = $db->prepare($query);
     $statement->bindValue(':id',$id);
     $statement->bindValue(':status', $status);
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

