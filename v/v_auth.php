<form method="post">
  <label for="usr">Имя пользователя:</label>
	<input type="text" name="usr" id="usr"><br/>
  <label for="pwd">Пароль:</label>
	<input type="password" name="pwd" id="pwd"><br/>
	<input type="submit" value="Войти" />
  <p><?= $info ?></p>
</form>