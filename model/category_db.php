<?php

class category_db
{
  function getCategory($userId)
 {
    $db = database::getDB();
    $query = 'SELECT * FROM Category_BBudget
              WHERE user_id = :userId ';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId',$userId);
    $statement->execute();
    $datas = $statement->fetchAll();
    $categories = [];
    foreach ($datas as $data) {
     $category = new category();
     $category->setUserID($data['user_id']);
     $category->setCaID($data['category_id']);
     $category->setCaName($data['category_name']);
     $category->setTotal($data['total']);
     $categories[] = $category;
    }
    $statement->closeCursor();
    return $categories; 
  }
  
  function addCategory($userId,$categoryName)
  {
    $db = database::getDB();
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
  
  function getId($categoryName)
  {
    $db = database::getDB();
    $query = 'SELECT category_name FROM category_bbudget
              WHERE category_name = :categoryName';
             
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName',$categoryName);
    $statement->execute();
    $id = $statement->fetch();
    $statement->closeCursor();
     return $id;    
    
  }
}

