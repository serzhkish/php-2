<?php
	abstract class C_Base extends C_Controller {
		protected $title;
		protected $content;
		protected $isLogin;
		protected $isAdmin;


		protected function before() {
		// 	$this->title = 'Заголовок';
		// 	$this->content = '';
		// 	$this->isLogin = false;
		// 	$this->isAdmin = false;
		}
	}
