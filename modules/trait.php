<?php
trait SingletonTrait{
  protected static $instance;
  protected function __clone(){}
  protected function __wakeup(){}
  public static function getInstance() {
    if (self::$instance == null){
      self::$instance = new self();
    }
    return self::$instance;
  }
}