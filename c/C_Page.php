<?php
	include_once('m/model.php');
	include_once('m/M_User.php');

	class C_Page extends C_Base
	{		
		public function action_index(){
			$this->title .= '::Чтение';
			$text = text_get();
			$user = new M_User();
			if ($user->getLogin()) {
				$this->isLogin = true;
			}
			$this->content = $this->Template('v/v_index.php', array('text' => $text));	
		}
		
			
		public function action_edit(){
			$this->title .= '::Редактирование';
			
			if($this->isPost()) {
				text_set($_POST['text']);
				header('location: index.php');
				exit();
			}
			
			$text = text_get();
			$user = new M_User();
			if ($user->getLogin()) {
				$this->isLogin = true;
			}
			$this->content = $this->Template('v/v_edit.php', array('text' => $text));		
		}
	}
