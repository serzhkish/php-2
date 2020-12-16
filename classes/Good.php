<?php
  abstract class Good{
    static protected $price;
    protected $sellCount;
    
    function __construct(int $sellCount){
      $this->sellCount = $sellCount;
      Good::$price = 180;
    }

    function setSellCount(int $sellCount){
      $this->sellCount = $sellCount;
    }

    static function setPrice(int $price){
      self::$price = $price;
    }

    abstract function getProfit();
    abstract function getPrice();
    abstract function showInfo();
  }