<?php
  include_once('m/M_User.php');

  class M_LastPages {
    function saveCurrentPage() {
      $user = new M_User();
      if ($user->getLogin()) {
        include('modules/config.php');
        if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
          $url = "https://";
        else
          $url = "http://"; 
        $url.= $_SERVER['HTTP_HOST']; 
        $url.= $_SERVER['REQUEST_URI'];
        $now = date("Y-m-d H:i:s");
        $tmp1 = $_SESSION['id_usr'];
        $sth = $db->prepare("SELECT * FROM last_pages WHERE id_usr=$tmp1 ORDER BY date");
        $sth->execute();
        $result = $sth->fetchAll(PDO::FETCH_ASSOC);
        if (count($result) >= 5) {
          $tmp = $result[0]['id'];
          $sth = $db->prepare("UPDATE last_pages SET page='$url', date='$now', id_usr='$tmp1' WHERE id=$tmp");
        } else {
          $sth = $db->prepare("INSERT INTO last_pages VALUES (null, '$url', '$now', '$tmp1')");
        }
        $sth->execute();
      }
    }

    function getLastPages() {
      include('modules/config.php');
      $user = new M_User();
      if ($user->getLogin()) {
        $tmp1 = $_SESSION['id_usr'];
        $sth = $db->prepare("SELECT * FROM last_pages WHERE id_usr=$tmp1 ORDER BY date");
        $sth->execute();
        return $sth->fetchAll(PDO::FETCH_ASSOC);
      }
    }
  }