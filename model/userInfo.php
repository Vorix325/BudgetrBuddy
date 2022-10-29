<?php

function checkLogin($username)
{
     global $db;
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
      global $db;
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


