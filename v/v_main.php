<!DOCTYPE html>
<html>
<head>
	<title><?=$title?></title>
	<meta content="text/html; charset=Windows-1251" http-equiv="content-type">	
	<link rel="stylesheet" type="text/css" media="screen" href="v/style.css" /> 	
</head>
<body>
	<div id="header">
		<h1><?=$title?></h1>
	</div>
	
	<div id="menu">
		<a href="index.php">Чтение</a> |
		<a href="index.php?c=page&act=edit">Редактирование</a> |
		<?php
			if ($isLogin) :
		?>
			<a href="index.php?c=user&act=profile">Личный кабинет</a> |
			<a href="index.php?c=user&act=logout">Выйти</a>
		<?php
			else :
		?>
			<a href="index.php?c=user&act=auth">Войти</a>
		<?php
			endif;
		?>
	</div>
	
	<div id="content">
		<?=$content?>
	</div>
	
	<div id="footer">
		подвал
	</div>
</body>
</html>
