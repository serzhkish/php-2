<?
  class M_Good {
    function addGood() {
      $query = "INSERT INTO s_goods VALUES (null, :name, :price, :id_category, 0)";
      $params = [':name' => $_POST['titleAdd'], ':price' => $_POST['priceAdd'], ':id_category' => $_POST['categoryAdd']];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function getGoods() {
      $query = "SELECT * FROM s_goods";
      $params = [];
      $result = DBPDO::getInstance()->Select($query, $params);
      return $result;
    }

    function getGoodsFromCart() {
      $query = "SELECT id_basket, id_user, name, g.price FROM s_basket b JOIN s_goods g USING (id_good) WHERE id_user=:id_user";
      $params = [':id_user' => $_SESSION['id_user']];
      $result = DBPDO::getInstance()->Select($query, $params);
      return $result;
    }
  }