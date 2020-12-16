<?php
  include_once('Good.php');
  class GoodWeight extends Good{
    function getProfit(){
      return $this->getWeightPrice()*$this->sellCount;
    }

    private function getWeightPrice(){
      if (($this->sellCount >= 0) && ($this->sellCount < 10)){
        return Good::$price;
      }elseif (($this->sellCount >= 10) && ($this->sellCount < 100)){
        return (Good::$price)*0.9;
      }else{
        return (Good::$price)*0.8;
      }
    }

    function getPrice(){
      return $this->getWeightPrice();
    }

    function showInfo(){
      return 'Цена весового товара: '.$this->getPrice().' Доход с продаж: '.$this->getProfit().'<hr>';
    }
  }