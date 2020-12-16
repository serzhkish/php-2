<?php
  include_once('Good.php');
  class GoodPiece extends Good{
    function getProfit(){
      return Good::$price*2*$this->sellCount;
    }

    function getPrice(){
      return Good::$price*2;
    }

    function showInfo(){
      return 'Цена штучного товара: '.$this->getPrice().' Доход с продаж: '.$this->getProfit().'<hr>';
    }
  }