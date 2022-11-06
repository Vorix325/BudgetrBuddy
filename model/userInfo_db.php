<?php
class userInfo_db
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
  function addUser($username,$password,$fname,$lname,$email,$phone)
  {
     $db = Database::getDB();
    $query = 'INSERT INTO user
                (user_name, password, first_name, last_name, email, phone_number)
               VALUES
                 (:username, :password, :fname, :lname, :email, :phone)';
            
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->bindValue(':fname',$fname);
    $statement->bindValue(':lname',$lname);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':phone',$phone);
    $statement->execute();
    $statement->closeCursor(); 
  }
   function updateUser($username,$password,$fname,$lname,$email,$phone)
   {
       global $db;
    $query = 'UPDATE user
              SET productCode = :productCode, productName = :productName, listPrice = :Price, categoryID = :categoryId
              WHERE productID = :product_id'
               ;
    $statement = $db->prepare($query);
    $statement->bindValue(":productCode", $code);
    $statement->bindValue(":productName", $name);
    $statement->bindValue(":Price", $price);
    $statement->bindValue(":categoryId",$categoryID);
    $statement->bindValue(':product_id', $product_id);
    $statement->execute();
    $statement->closeCursor();
   }
      
 }
