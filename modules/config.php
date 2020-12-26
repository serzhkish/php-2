<?php
  define('DB_Drive', 'mysql');
  define('DB_Host', 'localhost');
  define('DB_Name', 'mvc');
  define('DB_User', 'root');
  define('DB_Pass', 'root');

  try{
    $connect_str = DB_Drive.':host='.DB_Host.';dbname='.DB_Name;
    $db = new PDO($connect_str, DB_User, DB_Pass);
  } catch (PDOException $e) {
    die('Error: '.$e->getMessage());
  }