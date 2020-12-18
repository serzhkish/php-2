<?php
  // подгружаем и активируем авто-загрузчик Twig-а
  require_once 'Twig/Autoloader.php';
  require_once 'modules/config.php';
  require_once 'modules/classSimpleImage.php';

  Twig_Autoloader::register();

  try {
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');
    
    // инициализируем Twig
    $twig = new Twig_Environment($loader);
    
    // подгружаем шаблон
    $template = $twig->loadTemplate('gallary-all.tmpl');
    
    // передаём в шаблон переменные и значения
    // выводим сформированное содержание
    $DBCon = Singleton::getInstance()->getConnectDB();
    
    if (!empty($_FILES["pic"]["tmp_name"])){
      $tmp_name = $_FILES["pic"]["tmp_name"];
      $name = basename($_FILES["pic"]["name"]);
      $path = "img/big/$name";
      $pathSmall = "img/small/$name";
      if (move_uploaded_file($tmp_name, $path)) {
        $image = new SimpleImage();
        $image->load($path);
        $image->resize(200, 100);
        $image->save($pathSmall);
        if (count(Singleton::getInstance()->select("SELECT nameImg FROM imgs WHERE nameImg='$name'")) == 1) {
          Singleton::getInstance()->insert("INSERT into imgs (nameImg) VALUES ('$name')");
        }
      }
    }

    $lsImg = Singleton::getInstance()->select('SELECT nameImg FROM imgs');

    $path = 'img/small';
    if ($lsImg[0] == '0') {
      $lsImg = array_slice($lsImg, 1, count($lsImg));
    }
    // if (is_dir($path)){
    //   $lsImg = array_slice(scandir($path), 2, count(scandir($path)));
    // }

    $content = $template->render(array(
      'lsImg' => $lsImg,
    ));
    echo $content;
    
  } catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
  }
?>