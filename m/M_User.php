<?php

  class M_User {
    function auth($login,$pass) {  
      include_once('modules/config.php');    
      $sth = $db->prepare("SELECT * FROM usrs WHERE login='$login' AND pwd='$pass'");
      $sth->execute();
      $result = $sth->fetchAll(PDO::FETCH_ASSOC);
      if (($result[0]['login'] == $login) && ($result[0]['pwd'] == $pass)) {        
        session_start();
        $_SESSION['login'] = $login;
        $_SESSION['id_usr'] = $result[0]['id'];
        return true;
      } else {
        $this->logOut();
        return false;
      }
    }

    function getLogin() {
      session_start();
      if ($_SESSION['login']) {
        return $_SESSION['login'];
      } else {
        return null;
      }
    }

    function logOut() {
      session_start();
      unset($_SESSION['login']);
      unset($_SESSION['id_usr']);
    }
  }