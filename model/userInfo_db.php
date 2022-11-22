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
    $password = $statement->fetch();
    $statement->closeCursor();
    return $password; 
 }
 function updateCurrent($userId, $type)
 {
    $db = database::getDB();
    $query = 'UPDATE currentQ SET user_id = :userId, typeof_user = :type WHERE queue = 1';   
    $statement = $db->prepare($query);
    $statement->bindValue(':userId', $userId);
    $statement->bindValue(':type',$type);
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
    $statement->closeCursor();
    return $userId;
 }
 function getUserID($username)
 {
    $db = database::getDB();
    $query = 'SELECT user_id, typeof_user FROM users_bbudget
              WHERE user_name = :username'
 
              ;
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->execute();
    $user = $statement->fetch();
    $statement->closeCursor();
    return $user; 
  }
 function getAllUser()
 {
     $db = database::getDB();
    $query = 'SELECT user_id, user_name FROM users_bbudget'
              
 
              ;
    $statement = $db->prepare($query);
    $statement->execute();
    $data = $statement->fetchAll();
    return $data;
 }
  function getUserInfo($userID)
  {
    $db = database::getDB();
    $query = 'SELECT * FROM users_bbudget
              WHERE user_id = :userid'
 
              ;
    $statement = $db->prepare($query);
    $statement->bindValue(':userid',$userID);
    $statement->execute();
    $data = $statement->fetch();
    $user = new User();
    if($data == null)
    {
            $error = "Please select 2 exactly product for compare";
            header('Location: http://localhost/ex_starts/BudgetBuddy/BudgetBuddy/errors/error.php');
            
    }
     else 
    {
      
      $user->setFname($data[1]);
      $user->setLname($data[2]);
      $user->setUser($data[0]);
      $user->setPhone($data[4]);
      $user->setEmail($data[3]);
      $user->setNick($data[5]);
     
    }
   
        
    $statement->closeCursor();
    return $user; 
  }
  function addUser($username,$password,$fname,$lname,$email,$phone)
  {
    $type = "reg";
    $nickname = $username;
    $db = database::getDB();
    $query = 'INSERT INTO users_bbudget
                (user_name, first_name, last_name, email, phone_number, nick_name, typeof_user, password)
               VALUES
                 (:username,:fname,     :lname,    :email, :phone, :nick, :type, :password)';
            
    $statement = $db->prepare($query);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->bindValue(':fname',$fname);
    $statement->bindValue(':lname',$lname);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':phone',$phone);
    $statement->bindValue(':nick', $nickname);
    $statement->bindValue(':type', $type);
    $statement->execute();
    $statement->closeCursor(); 
  }
   function updateUser($id, $username,$password,$fname,$lname,$email,$phone, $nickname)
   {
    $db = database::getDB();
    $query = 'UPDATE users_bbudget
              SET user_name = :username, password = :password, fname = :fname, lname = :lname , email = :email, phone = :phone
              WHERE user_id = :id'
               ;
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $id);
    $statement->bindValue(':username',$username);
    $statement->bindValue(':password',$password);
    $statement->bindValue(':fname',$fname);
    $statement->bindValue(':lname',$lname);
    $statement->bindValue(':email',$email);
    $statement->bindValue(':phone',$phone);
    $statement->bindValue(':nick', $nickname);
    $statement->execute();
    $statement->closeCursor();
   }
   function getName($user_id)
   {
        $db = database::getDB();
    $query = 'SELECT user_name FROM users_bbudget
              WHERE user_id = :id'
               ;
    $statement = $db->prepare($query);
    $statement->bindValue(':id', $user_id);
    $statement->execute();
    $name = $statement->fetch();
    $statement->closeCursor();
    return $name;
   }
   function getAll()
   {
       $db = Database::getDB();
       $query = 'SELECT * FROM users_bbudget'
               ;
       $statement = $db->prepare($query);
       $statement->execute();
       $datas = $statement->fetchAll();
       $users = [];
      foreach($datas as $data) 
      {
         $user = new User();
         $user->setFname($data[1]);
         $user->setLname($data[2]);
         $user->setUser($data[0]);
         $user->setPhone($data[4]);
         $user->setEmail($data[3]);
         $user->setNick($data[5]);
         $users[] = $user;
      }
       $statement->closeCursor();
       return $users;
   }
      
 }

