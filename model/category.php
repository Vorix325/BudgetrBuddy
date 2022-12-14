<?php
class category
{
    private int $userId;
    private string $categoryName;
    private int $categoryId;
    private float $total;
    private float $limit;
    private string $month;
    private string $year;
    private int $budgetId;
            
    
     public function __construct() 
     {
        $this->userId = 0;
        $this->categoryId = 0;
        $this->categoryName = '';
        $this->total = 0;
        $this->budgetId = 0;
        $this->month = 'January';
        $this->year = '2022';
     }
     public function getBId()
     {
         return $this->budgetId;
     }
     public function setBId($budgetId)
     {
         $this->budgetId = $budgetId;
     }
     public function getMonth()
     {
         return $this->month;
     }
     public function setMonth($month)
     {
         $this->month = $month;
     }
      public function getYear()
     {
         return $this->year;
     }
     public function setYear($year)
     {
         $this->year = $year;
     }
    public function getLimit()
    {
        return $this->limit;
    }
    public function setLimit($limit)
    {
        $this->limit = $limit;
    }
    public function getUserID() {
        return $this->userId;
    }

    public function setUserID(int $userId) {
        $this->userId = $userId;
    }
    
    public function getCaID() {
        return $this->categoryId;
    }

    public function setCaID(int $caId) {
        $this->categoryId = $caId;
    }
    
    public function getCaName() {
        return $this->categoryName;
    }

    public function setCaName(string $caName) {
        $this->categoryName = $caName;
    }
    
    public function getTotal() {
        return $this->total;
    }
    public function setTotal($amount) {
        if($amount == null)
        {
            $amount = 0;
        }
         $this->total = $amount;
    }
    
    
}


