<?php
  // class Singleton{
  //   private static $instance;
  //   private function __construct(){}
  //   private function __clone(){}
  //   private function __wakeup(){}
  //   public static function getInstance() {
  //     if (emty(self::$instance)){
  //       self::$instance = new self();
  //     }
  //     return self::$instance;
  //   }
  //   public function doAction(){}
  // }

  // Singleton::getInstance()->doAction();

  trait SingletonTrait{
    protected function __clone(){}
    protected function __wakeup(){}
    public static function getInstance() {
      if (self::$instance == null){
        self::$instance = new self();
      }
      return self::$instance;
    }
    public function doAction(){}
  }

  class Singleton{
    protected static $instance;
    use SingletonTrait;
  }

  Singleton::getInstance()->doAction();