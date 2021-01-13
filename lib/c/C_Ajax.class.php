<?
  class C_Ajax {
    private $ajaxM;
    private $user;

    public function __construct() {
      $this->ajaxM = new M_Ajax();
      $this->user = new M_User();
		}

    public function Request($action)
    {
      $this->$action();   //$this->action_index
    }

    // 0 - выполнено успешно
    // 1 - пользователь не авторизован
    public function action_addCart() {
      if ($this->user->isLogin()) {
        $this->ajaxM->addCart();
        echo '0';
      } else {
        echo '1';
      }      
    }

    public function action_removeCart() {
      if ($this->user->isLogin()) {
        $this->ajaxM->removeCart();
        echo '0';
      } else {
        echo '1';
      }      
    }
  }