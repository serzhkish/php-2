<?php
  // подгружаем и активируем авто-загрузчик Twig-а
  require_once 'Twig/Autoloader.php';
  require_once 'modules/config.php';

  Twig_Autoloader::register();

  if (empty($_GET["n"])){
    header("Location: ./2-ok-all.php");
  }

  try {
    // указывае где хранятся шаблоны
    $loader = new Twig_Loader_Filesystem('templates');
    
    // инициализируем Twig
    $twig = new Twig_Environment($loader);
    
    // подгружаем шаблон
    $template = $twig->loadTemplate('gallary-1.tmpl');
    
    // передаём в шаблон переменные и значения
    // выводим сформированное содержание

    $content = $template->render(array(
      'item' => $_GET["n"],
    ));
    echo $content;
    
  } catch (Exception $e) {
    die ('ERROR: ' . $e->getMessage());
  }
?>