<?php
  require_once 'lib/autoload.php';

  session_start();

  DBPDO::getInstance()->Connect();

  // site.ru/index.php?act=catalog&c=user
  // site.ru/index.php?act=admin&c=user
  // site.ru/index.php?act=login&c=user
  // site.ru/index.php?act=reg&c=user
  // site.ru/index.php?act=profile&c=user

  $action = 'action_';
  $action .=(isset($_GET['act'])) ? $_GET['act'] : 'catalog';
  
  if (isset($_POST['login']) && (isset($_POST['pwd']))) {
    $action = 'action_login';
    $_GET['c'] = '';
  }

  if (isset($_POST['loginReg'])) {
    $action = 'action_reg';
    $_GET['c'] = '';
  }

  if (isset($_POST['titleAdd'])) {
    $action = 'action_admin';
    $_GET['c'] = '';
  }

  if (isset($_POST['idGoods'])) {
    $action = 'action_addCart';
    $_GET['c'] = 'ajax';
  }

  if (isset($_POST['idBasket'])) {
    $action = 'action_removeCart';
    $_GET['c'] = 'ajax';
  }

	switch ($_GET['c'])	{
		case 'user':
			$controller = new C_User();
      break;
    case 'ajax':
      $controller = new C_Ajax();
      break;
		default:
      $controller = new C_Page();
	}

	$controller->Request($action);