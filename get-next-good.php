<?php
  require_once 'modules/config.php';

  try{
    $result = $db->query('SELECT * FROM products ORDER BY id ASC Limit 5 OFFSET '.$_POST['offset']);
  
    if ($db->errorCode() != 0000){
      $error_array = $db->errorInfo();
      echo "SQL error: ".$error_array[2].'<br />';
    }
    $resultOutput = [];
    while ($row = $result->fetch()){
      array_push($resultOutput, $row);
    }
    echo json_encode($resultOutput);

  } catch(Exception $e) {
    die("Error: ".$e->getMessage());
  }