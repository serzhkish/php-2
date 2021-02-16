<?php
  include_once 'config/config-db.php';

  class DBPDO {
    private static $_instance;

    private $db; // Ресурс работы с БД

    /*
    * Получаем объект для работы с БД
    */
    public static function getInstance()
    {
      if (self::$_instance == null) {
        self::$_instance = new DBPDO();
      }
      return self::$_instance;
    }

    /*
    * Запрещаем копировать объект
    */
    private function __construct() {
      $this->_instance = null;
    }
    private function __sleep() {}
    private function __wakeup() {}
    private function __clone() {}

    /*
    * Выполняем соединение с базой данных
    */
    public function Connect($drive = DB_Drive, $user = DB_User, $password = DB_Pass, $base = DB_Name, $host = DB_Host, $port = DB_Port) {
      try {
        // Формируем строку соединения с сервером
        $connectString = $drive . ':host=' . $host . ';port= ' . $port . ';dbname=' . $base . ';charset=UTF8;';
        $this->db = new PDO($connectString, $user, $password,
        [
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // возвращать ассоциативные массивы
          PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION // возвращать Exception в случае ошибки
        ]
      );
      } 
      catch (PDOException $e) {
        die('Error: '.$e->getMessage());
      }
    }

    /*
    * Выполнить запрос к БД
    $query = "SELECT * FROM usrs WHERE login=:login AND pwd=:pwd";
    $params = [':login' => $login, ':pwd' => $pwd];
    */
    public function Query($query, $params = array()) {
      $res = $this->db->prepare($query);
      $res->execute($params);
      return $res;
    }

    /*
    * Выполнить запрос с выборкой данных
    */
    public function Select($query, $params = array()) {
      $result = $this->Query($query, $params);
      if ($result) {
        return $result->fetchAll();
      }
    }
  }
