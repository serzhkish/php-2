<?php
	include_once('m/M_User.php');
	include_once('m/M_LastPages.php');

	class C_User extends C_Base {
		public function action_auth() {
			$this->title .= '::Аутентификация';
			$user = new M_User();
			if ($user->getLogin()) {
				header('location: index.php?act=profile&c=user');
				exit();
			}
			$info = "Аутентификация не пройдена";
			if ($_POST['usr']) {
				if ($user->auth($_POST['usr'],$_POST['pwd'])) {
					header('location: index.php?act=profile&c=user');
					exit();
					// $this->content = $this->Template('v/v_auth.php', array('info' => $info));
				} else {
					$this->content = $this->Template('v/v_auth.php', array('info' => $info));
				}
			} else {
				$info = '';
				$this->content = $this->Template('v/v_auth.php', array('info' => $info));
			}
		}

		public function action_profile() {
			$this->title .= '::Личный кабинет';
			$user = new M_User();
			if ($user->getLogin()) {
				$this->isLogin = true;
				$lastPages = new M_LastPages();				
				$this->content = $this->Template('v/v_profile.php', array('usr' => $user->getLogin(), 'lastPages' => $lastPages->getLastPages()));
			} else {
				header('location: index.php?act=auth&c=user');
				exit();
			}
			
		}

		public function action_logout() {
			$user = new M_User();
			$user->logOut();
			header('location: index.php');
			exit();
		}
	}
