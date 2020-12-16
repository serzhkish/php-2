<?php
  function __autoload($name){
    include_once("classes/$name.php");
  }

  $goodDigital1 = new GoodDigital(10);
  $goodPiece1 = new GoodPiece(20);
  $goodWeight1 = new GoodWeight(9);

  echo $goodDigital1->showInfo();
  echo $goodPiece1->showInfo();
  echo $goodWeight1->showInfo();
  Good::setPrice(10);

  echo $goodDigital1->getPrice().'<hr>';
  echo $goodPiece1->getPrice().'<hr>';
  echo $goodWeight1->getPrice().'<br><br>';