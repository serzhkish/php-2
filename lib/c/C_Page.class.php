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
				'login' => $this->user->getLogin(),
				'countGoods' => $this->goods->getCountGoodsFromCart(),
				'title' => $this->title)
			);
		}
		
		public function action_admin() {
			$this->title = 'Администрирование';
			if ($this->user->isLogin()) {
				if (isset($_POST['titleAdd']) && ($_POST['titleAdd'] != '')) {
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
					'login' => $this->user->getLogin(),
					'countGoods' => $this->goods->getCountGoodsFromCart(),
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
				'login' => $this->user->getLogin(),
				'countGoods' => $this->goods->getCountGoodsFromCart(),
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
				if ($_POST['loginReg'] == '') {
					$regFail = "Укажите логин";
				} else {
					if ($_POST['pwdReg'] != '') {
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
				'login' => $this->user->getLogin(),
				'countGoods' => $this->goods->getCountGoodsFromCart(),
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
				'login' => $this->user->getLogin(),
				'orders' => $this->goods->getOrder($this->user->getUserId()),
				'countGoods' => $this->goods->getCountGoodsFromCart(),
				'title' => $this->title)
			);
		}

		public function action_cart() {
			$this->title = 'Корзина';
			$errOrder = false;
			if (!$this->user->isLogin()) {
				header('Location: index.php');
			}
			if (isset($_POST['idBasket1'])) {
				$this->goods->removeCart((int)$_POST['idBasket1']);
			}
			if (isset($_POST['order-sbt'])) {
				if ((isset($_POST['address'])) && ($_POST['address'] != '') && (isset($_POST['phone'])) && ($_POST['phone'] != '')) {
					$this->goods->createOrder($this->user->getUserId());
					// Удалить данные из корзины
					$this->goods->removeCartAll($this->user->getUserId());
					header('Location: index.php?act=order');
				} else {
					$errOrder = true;
				}
			}
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_cart.html',
				'isLogin' => $this->user->isLogin(),
				'isAdmin' => $this->user->isAdmin(),
				'goods' => $this->goods->getGoodsFromCart(),
				'login' => $this->user->getLogin(),
				'errOrder' => $errOrder,
				'countGoods' => $this->goods->getCountGoodsFromCart(),
				'title' => $this->title)
			);
		}

		public function action_view() {
			$this->title = 'Название продукта';
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_view.html',
				'isLogin' => $this->user->isLogin(),
				'isAdmin' => $this->user->isAdmin(),
				'goods' => $this->goods->getGoodById(),
				'login' => $this->user->getLogin(),
				'countGoods' => $this->goods->getCountGoodsFromCart(),
				'title' => $this->title)
			);
		}

		public function action_order() {
			$this->title = 'Оформить заказ';
			$this->content = $this->rend('v_main.html', array(
				'pageContent' => 'v_order.html',
				'isLogin' => $this->user->isLogin(),
				'isAdmin' => $this->user->isAdmin(),
				'goods' => $this->goods->getGoodById(),
				'login' => $this->user->getLogin(),
				'countGoods' => $this->goods->getCountGoodsFromCart(),
				'title' => $this->title)
			);
		}
	}
