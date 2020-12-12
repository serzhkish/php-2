<?php
  // Класс продукт
  class Product {
    private $id;
    private $title;
    private $price;

    function __construct($id, $title, $price){
      $this->id = $id;
      $this->title = $title;
      $this->price = $price;
    }

    function show() {
      echo "Продукт $this->title стоит $this->price<br>";
    }
  }

  class Chocolate extends Product {
    private $color;
    private $cal;

    function __construct($id, $title, $price, $color, $cal){
      $this->color = $color;
      $this->cal = $cal;
      parent::__construct($id, $title, $price);
    }

    function show() {
      parent::show();
      echo "Цвет $this->color, калорий $this->cal<hr>";
    }
  }

  class Phone extends Product {
    private $ram;
    private $proc;

    function __construct($id, $title, $price, $ram, $proc){
      $this->ram = $ram;
      $this->proc = $proc;
      parent::__construct($id, $title, $price);
    }

    function show() {
      parent::show();
      echo "ОЗУ $this->ram, процессор $this->proc<hr>";
    }
  }

  // наследники отличаются реализацией метода show
  // и свойствами
  $chocolate1 = new Chocolate(0, "Аленка", 100, "Темный", 200);
  $chocolate2 = new Chocolate(1, "Мишка", 300, "Белый", 100);

  $phone1 = new Phone(0, "samsung", 1000, 12, "ARM");
  $phone2 = new Phone(0, "iPhone", 1100, 4, "M1");

  $chocolate1->show();
  $chocolate2->show();

  $phone1->show();
  $phone2->show();
