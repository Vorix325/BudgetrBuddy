<?php

class category_db
{
    function getCateogry($userId)
 {
    $db = Database::getDB();
    $query = 'SELECT * FROM categories
              WHERE user_id = :userId ';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId',$userId);
    $statement->execute();
    $datas = $statement->fetchAll();
    foreach ($datas as $data) {
     $category = new Category();
     $category->setUserID($data['user_id']);
     $category->setCaID($data['category_id']);
     $category->setCaName($data['category_name']);
     $category->setTotal($data['total']);
     $category[] = $category;
    }
    $statement->closeCursor();
    return $category; 
  }
  
  function addCategory($userId,$categoryName)
  {
    $db = Database::getDB();
    $query = 'INSERT INTO categories 
               (user_id, category_name)
              VALUE
               (:userId, :categoryName)';
             
    $statement = $db->prepare($query);
    $statement->bindValue(':userId',$userId);
    $statement->bindValue(':categoryName',$categoryName);
    $statement->execute();
    $statement->closeCursor(); 
  }
}

