<?php
	abstract class C_Base extends C_Controller {
		protected $title;
		protected $content;
		protected $keyWords;
		protected $isLogin;


		protected function before() {
			$this->title = 'Заголовок';
			$this->content = '';
			$this->keyWords = "...";
			$this->isLogin = false;
		}

		public function render() {
			$vars = array('title' => $this->title, 'content' => $this->content,'kw' => $this->keyWords,'isLogin' => $this->isLogin);
			$page = $this->Template('v/v_main.php', $vars);				
			echo $page;
		}
	}
