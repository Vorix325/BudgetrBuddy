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
     $category->setLimit($data['limitS']);
     $category->setTotal($data['total']);
     $category->setMonth($data['SMonth']);
     $category->setYear($data['SYear']);
     $categories[] = $category;
    }
    $statement->closeCursor();
    return $categories; 
  }
  function getCa($userId, $month, $year)
  {
    $db = database::getDB();
    $query = 'SELECT SUM(total) AS totalS FROM Category_BBudget
              WHERE user_id = :userId , SMonth = :m, $Year = :y';
    $statement = $db->prepare($query);
    $statement->bindValue(':userId',$userId);
    $statement->bindValue(':m',$month);
    $statement->bindValue(':y',$year);
    $statement->execute();
    $data = $statement->fetch(PDO::FETCH_ASSOC);
    $sum = $data['totalS'];
    return $sum;
  }
  function deleteCategory($ca_id)
  {
    $db =database::getDB();
    $query = 'DELETE FROM Category_Bbudget
              WHERE category_id = :caId';
    $statement = $db->prepare($query);
    $statement->bindValue(':caId', $ca_id);
    $statement->execute();
    $statement->closeCursor();
  }
  function addCategory($userId,$categoryName,$limit, $month, $year)
  {
    $db = database::getDB();
    $query = 'INSERT INTO category_bbudget
               (category_name, user_id, limitS , total, SMonth, SYear)
              VALUE
               (:categoryName, :userId, :limit, 0, :month, :year )';
             
    $statement = $db->prepare($query);
    $statement->bindValue(':userId',$userId);
    $statement->bindValue(':categoryName',$categoryName);
    $statement->bindValue(':limit',$limit);
    $statement->bindValue(':month',$month);
    $statement->bindValue(':year', $year);
    $statement->execute();
    $statement->closeCursor(); 
  }
  function updateCategory($categoryId, $userId,$categoryName,$limit, $month, $year)
  {
    $db = database::getDB();
    $query = 'UPDATE category_bbudget
              SET
               category_name = :categoryName, user_id = :userId, limitS = :limit , SMonth = :month, SYear = :year
              WHERE 
               category_id = :caId'
            ;
             
    $statement = $db->prepare($query);
    $statement->bindValue(':caId',$categoryId);
    $statement->bindValue(':userId',$userId);
    $statement->bindValue(':categoryName',$categoryName);
    $statement->bindValue(':limit',$limit);
    $statement->bindValue(':month',$month);
    $statement->bindValue(':year', $year);
    $statement->execute();
    $statement->closeCursor(); 
  }
  function getId($categoryName)
  {
    $db = database::getDB();
    $query = 'SELECT category_id FROM category_bbudget
              WHERE category_name = :categoryName';
             
    $statement = $db->prepare($query);
    $statement->bindValue(':categoryName',$categoryName);
    $statement->execute();
    $id = $statement->fetch();
    $statement->closeCursor();
     return $id;    
    
  }
  function checkTotal($id)
  {
    $db = database::getDB();
    $query = 'SELECT total, limits FROM category_bbudget
              WHERE category_id = :id';
             
    $statement = $db->prepare($query);
    $statement->bindValue(':id',$id);
    $statement->execute();
    $array = $statement->fetch();
    $statement->closeCursor();
    return $array;
  }
}

