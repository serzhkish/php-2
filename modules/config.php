<?php
require_once 'trait.php';

class Singleton{
  use SingletonTrait;
  static private $connectDB;
  private function __construct(){
    define(SERVER, "localhost");
    define(DB, "php-02-03");
    define(USER, "root");
    define(PWD, "root");
    self::$connectDB = mysqli_connect(SERVER, USER, PWD, DB) or die("Could not connect: " . DB);
  }
  public function getConnectDB(){
    return self::$connectDB;
  }

  public function select($sql){
    $resultSQL = mysqli_query(self::$connectDB, $sql);
    $result = ['0'];
    if ($resultSQL) {
      if (mysqli_num_rows($resultSQL) != 0) {
        while ($data = mysqli_fetch_assoc($resultSQL)) {
          array_push($result,$data['nameImg']);
        }
      } else {
        $result = ['1'];
      }
    } else {
      $result = ['1'];
    }
    return $result;
  }

  public function insert($sql){
    $resultSQL = mysqli_query(self::$connectDB, $sql);
    return null;
  }
}