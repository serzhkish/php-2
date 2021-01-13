<?
  class M_User {
    function auth($login, $pass) {
      $query = "SELECT id_user, user_name, user_login, user_password FROM s_user WHERE user_login=:user_login AND user_password=:user_password";
      $params = [':user_login' => $login, ':user_password' => $pass];
      $result = DBPDO::getInstance()->Select($query, $params);
      if (($result[0]['user_login'] == $login) && ($result[0]['user_password'] == $pass)) {
        $_SESSION['user_login'] = $login;
        $_SESSION['id_user'] = $result[0]['id_user'];
        $_SESSION['user_name'] = $result[0]['user_name'];
        $query = "SELECT id_role FROM s_user_role WHERE id_user=:id_user";
        $params = [':id_user' => $_SESSION['id_user']];
        $result = DBPDO::getInstance()->Select($query, $params);
        if ($result[0]['id_role'] == '1') {
          $_SESSION['role'] =  '1';
        } else {
          $_SESSION['role'] =  '2';
        }
        return true;
      } else {
        return false;
      }
    }

    function reg($login, $pass) {
      $query = "SELECT id_user, user_login FROM s_user WHERE user_login=:user_login";
      $params = [':user_login' => $login];
      $result = DBPDO::getInstance()->Select($query, $params);
      if (isset($result[0]['user_login'])) {
        return false;
      } else {
        $query = "INSERT INTO s_user VALUES (null, :user_name, :user_login, :user_password, null)";
        if (isset($_POST['nameReg'])) {
          $userName = $_POST['nameReg'];
        } else {
          $userName = '';
        }
        $params = [':user_name' => $userName, ':user_login' => $login, ':user_password' => $pass];
        $result = DBPDO::getInstance()->Query($query, $params);
        $query = "SELECT id_user FROM s_user WHERE user_login=:user_login";
        $params = [':user_login' => $login];
        $result = DBPDO::getInstance()->Select($query, $params);
        $userID = $result[0]['id_user'];
        $query = "INSERT INTO s_user_role VALUES (null, :id_user, 2)";
        $params = [':id_user' => $userID];
        $result = DBPDO::getInstance()->Query($query, $params);
        $_SESSION['user_login'] = $login;
        $_SESSION['user_name'] = $userName;
        $_SESSION['id_user'] = $userID;
        $_SESSION['role'] =  '2';
        return true;
      }
    }

    function getLogin() {
      if ($_SESSION['user_login']) {
        return $_SESSION['user_login'];
      } else {
        return null;
      }
    }

    function getUserName() {
      if ($_SESSION['user_name']) {
        return $_SESSION['user_name'];
      } else {
        return null;
      }
    }

    function isLogin() {
      return $_SESSION['user_login'] ? true : false;
    }

    function isAdmin() {
      return $_SESSION['role'] == '1' ? true : false;
    }

    function logOut() {
      unset($_SESSION['user_login']);
      unset($_SESSION['user_name']);
      unset($_SESSION['id_user']);
      unset($_SESSION['role']);
    }
  }