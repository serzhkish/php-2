<?
  class M_Ajax {
    function addCart() {
      $query = "INSERT INTO s_basket VALUES (null, :id_user, :id_good, :price, 0, 0)";
      $params = [':id_user' => $_SESSION['id_user'], ':id_good' => $_POST['idGoods'], ':price' => '500'];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function removeCart() {
      $query = "DELETE FROM s_basket WHERE id_basket=:id_basket";
      $params = [':id_basket' => $_POST['idBasket']];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }
  }