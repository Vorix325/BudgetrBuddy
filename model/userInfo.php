<?php
class userInfo
{
 function checkLogin($username)
 {
    $db = Database::getDB();
    $query = 'SELECT password FROM categories
              WHERE username = :username, ';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $password = $statement->fetchAll();
    $statement->closeCursor();
    return $password; 
  }
 function getUserID($username,$password)
 {
    $db = Database::getDB();
    $query = 'SELECT userID FROM categories
              WHERE username = :username, password = :password'
 
              ;
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->execute();
    $userID = $statement->fetchAll();
    $statement->closeCursor();
    return $userID; 
 }
 function getUserInfo($userID)
 {
    $db = Database::getDB();
    $query = 'SELECT * FROM categories
              WHERE userID = :userid'
 
              ;
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$userID);
    $statement->execute();
    $user = $statement->fetchAll();
    $statement->closeCursor();
    return $user; 
 }
}

