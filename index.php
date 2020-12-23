<?php
  require_once 'vendor/autoload.php';
  require_once 'modules/config.php';

  try{
    $loader = new Twig_Loader_Filesystem('templates');
    $twig = new Twig_Environment($loader);
    
    $header = $twig->render('header.html', array(
      'titlePage' => 'Shop'
    ));

    $result = $db->query('SELECT * FROM products ORDER BY id ASC Limit 5');
  
    if ($db->errorCode() != 0000){
      $error_array = $db->errorInfo();
      echo "SQL error: ".$error_array[2].'<br />';
    }
    $resultOutput = [];
    while ($row = $result->fetch()){
      array_push($resultOutput, $row);
    }

    $content = $twig->render('content.html', array(
      'goods' => $resultOutput
    ));

    $footer = $twig->render('footer.html', array(
      'titlePage' => 'Shop',
      'name' => 'Fabien'
    ));

    echo $header.$content.$footer;
  } catch(Exception $e) {
    die("Error: ".$e->getMessage());
  }
  