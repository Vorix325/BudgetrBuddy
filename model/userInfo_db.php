<?php
class userInfo_db
{
 function checkLogin($username)
 {
    $db = database::getDB();
    $query = 'SELECT password FROM users_bbudget
              WHERE user_name = :username';
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $password = $statement->fetchAll();
    $statement->closeCursor();
    return $password; 
 }
 function updateCurrent($userId)
 {
    $db = database::getDB();
    $query = 'UPDATE currentQ
              SET user_id = :userId
              WHERE queue = 1;'
               ;
    $statement = $db->prepare($query);
    $statement->bindValue(":userId", $userId);
    $statement->execute();
    $statement->closeCursor();
 }
 
 function getCurrent()
 {
    $db = database::getDB();
    $sql = "SELECT user_id FROM currentq WHERE queue = 1;";  
    $statement = $db->prepare($sql);
    $statement->execute();
    $userId = $statement->fetch();
     if($userId == null)
        {
            $error = "Please select 2 exactly product for compare";
            include('../errors/error.php');
            
        }
    $statement->closeCursor();
    return $userId;
 }
 function getUserID($username)
 {
    $db = database::getDB();
    $query = 'SELECT user_id FROM users_bbudget
              WHERE user_name = :username'
 
              ;
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $userID = $statement->fetch();
    $statement->closeCursor();
    return $userID; 
  }
  function getUserInfo($userID)
  {
    $db = database::getDB();
    $query = 'SELECT * FROM categories
              WHERE userID = :userid'
 
              ;
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$userID);
    $statement->execute();
    $data = $statement->fetchAll();
    $user = new User();
    $user->setFname($data['first_name']);
    $user->setLname($data['last_name']);
    $user->setUser($data['user_name']);
    $user->setPhone($data['phone']);
    $user->setEmail($data['email']);
        
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
    $db = Database::getDB();
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

