<?php
class category
{
    private int $userId;
    private string $categoryName;
    private int $categoryId;
    private float $total;
    private float $limit;
    
     public function __construct() 
     {
        $this->userId = 0;
        $this->categoryId = 0;
        $this->categoryName = '';
        $this->total = 0;
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
    public function setTotal(float $amount) {
         $this->total = $amount;
    }
    
    
}


