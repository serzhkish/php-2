<?
  class M_Ajax {
    function addCart() {
      $query = "SELECT s_count FROM s_basket WHERE (id_good=:id_good) AND (id_user=:id_user)";
      $params = [':id_good' => $_POST['idGoods'], ':id_user' => $_SESSION['id_user']];
      $result = DBPDO::getInstance()->Select($query, $params);
      if (empty($result[0]['s_count'])) {
        $query = "INSERT INTO s_basket VALUES (null, :id_user, :id_good, :price, 0, 1)";
        $params = [':id_user' => $_SESSION['id_user'], ':id_good' => $_POST['idGoods'], ':price' => '500'];
      } else {
        $query = "UPDATE s_basket SET s_count=:s_count WHERE (id_good=:id_good) AND (id_user=:id_user)";
        $params = [':s_count' => $result[0]['s_count'] + 1, ':id_user' => $_SESSION['id_user'], ':id_good' => $_POST['idGoods']];
      }
      
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function removeCart() {
      $query = "DELETE FROM s_basket WHERE id_basket=:id_basket";
      $params = [':id_basket' => $_POST['idBasket']];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function changeCountGoodsInCart() {
      $cg = (int)$_POST['countGood'];
      $query = "UPDATE s_basket SET s_count=:s_count WHERE (id_basket=:id_basket)";
      $params = [':s_count' => (int)$_POST['countGood'], ':id_basket' => (int)$_POST['idBasket']];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }
  }