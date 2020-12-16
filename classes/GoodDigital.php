<?php
  include_once('Good.php');
  class GoodDigital extends Good{
    function getProfit(){
      return Good::$price*$this->sellCount;
    }

    function getPrice(){
      return Good::$price;
    }

    function showInfo(){
      return 'Цена цифрового товара: '.$this->getPrice().' Доход с продаж: '.$this->getProfit().'<hr>';
    }
  }