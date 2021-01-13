<?php
  require_once 'Twig/Autoloader.php';
  Twig_Autoloader::register();

  spl_autoload_register("gbStandardAutoload");

  function gbStandardAutoload($className) {
    $dirs = [
      '',
      'c\\',
      'm\\'
      // 'lib/smarty',
      // 'lib/commands',
      // 'model/'
    ];
    $found = false;
      foreach ($dirs as $dir) {
        $fileName = __DIR__ . '\\' . $dir . $className . '.class.php';
        if (is_file($fileName)) {
          require_once($fileName);
          $found = true;
        }
      }
      
    if (!$found) {
      throw new Exception('Unable to load ' . $className);
    }
    return true;
}

// DBPDO::getInstance()->Connect(DB_User, DB_Pass, DB_Name);

