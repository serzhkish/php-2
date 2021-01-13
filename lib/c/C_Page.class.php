<?php
	class C_Page extends C_Base {
		private $user;
		private $goods;

		public function __construct() {
			$this->user = new M_User();
			$this->goods = new M_Good();
		}

		public function action_catalog() {
			$this->title = 'Каталог';
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_catalog.html',
				'isLogin' => $this->user->isLogin(),
				'isAdmin' => $this->user->isAdmin(),
				'goods' => $this->goods->getGoods(),
				'title' => $this->title)
			);
		}
		
		public function action_admin() {
			$this->title = 'Администрирование';
			if ($this->user->isLogin()) {
				if (isset($_POST['titleAdd'])) {
					$errAdd = '';
					if ($_POST['titleAdd'] != null) {
						if ($_POST['priceAdd'] != null) {
							if ($_POST['categoryAdd'] != null) {
								$this->goods->addGood();
								$errAdd = 'Товар добавлен';
							} else {
								$errAdd = 'Выберите категорию';
							}							
						} else {
							$errAdd = 'Заполните цену';
						}						
					} else {
						$errAdd = 'Заполните название';
					}					
				}
				$this->content = $this->rend('v_main.html', array(
					'pageContent' => 'v_admin.html',
					'isLogin' => $this->user->isLogin(),
					'isAdmin' => $this->user->isAdmin(),
					'errAdd' => $errAdd,
					'title' => $this->title)
				);
			} else {
				header('location: index.php');
			}
		}

		public function action_login() {
			$this->title = 'Вход';
			$authFail = '';
			if (isset($_POST['login']) && (isset($_POST['pwd']))) {
				if ($this->user->auth($_POST['login'], $_POST['pwd'])) {
					header('Location: index.php');
				} else {
					$authFail = 'Неправильный логин или пароль';
				}
			}			
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_login.html',
				'authFail' => $authFail,
				'title' => $this->title)
			);
		}

		public function action_logout() {
			$this->user->logOut();
			header('Location: index.php');
		}

		public function action_reg() {
			$this->title = 'Регистрация';
			$regFail = '';
			if (isset($_POST['loginReg'])) {
				if ($_POST['loginReg'] == null) {
					$regFail = "Укажите логин";
				} else {
					if ($_POST['pwdReg'] != null) {
						if ($this->user->reg($_POST['loginReg'], $_POST['pwdReg'])) {
							header('Location: index.php');
						} else {
							$regFail = 'Логин занят, выберите другой';
						}
					} else {
						$regFail = 'Пустой пароль запрещен';
					}
				}
			}			
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_reg.html',
				'regFail' => $regFail,
				'title' => $this->title)
			);
		}

		public function action_profile() {
			$this->title = 'Профиль';
			if (!$this->user->isLogin()) {
				header('Location: index.php');
			}
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_profile.html',
				'isLogin' => $this->user->isLogin(),
				'isAdmin' => $this->user->isAdmin(),
				'userName' => $this->user->getUserName(),
				'title' => $this->title)
			);
		}

		public function action_cart() {
			$this->title = 'Корзина';
			if (!$this->user->isLogin()) {
				header('Location: index.php');
			}
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_cart.html',
				'isLogin' => $this->user->isLogin(),
				'isAdmin' => $this->user->isAdmin(),
				'goods' => $this->goods->getGoodsFromCart(),
				'title' => $this->title)
			);
		}
	}
