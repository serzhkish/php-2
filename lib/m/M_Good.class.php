<?
  class M_Good {
    function addGood() {
      $uploaddir = 'img/';
      $uploadfile = $uploaddir . basename($_FILES['fileAdd']['name']);
      $fileName = basename($_FILES['fileAdd']['name']);
      if ((isset($_FILES['fileAdd']['name'])) && ($_FILES['fileAdd']['name'] == null)) {
        $fileName = '';
      } else {
        move_uploaded_file($_FILES['fileAdd']['tmp_name'], $uploadfile);
      }
      $query = "INSERT INTO s_goods VALUES (null, :name, :price, :id_category, 0, :img_name)";
      $params = [
        ':name' => $_POST['titleAdd'], 
        ':price' => $_POST['priceAdd'], 
        ':id_category' => $_POST['categoryAdd'],
        ':img_name' => $fileName
      ];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function getGoods() {
      $query = "SELECT * FROM s_goods";
      $params = [];
      $result = DBPDO::getInstance()->Select($query, $params);
      return $result;
    }

    function getGoodById() {
      $query = "SELECT * FROM s_goods WHERE id_good=:id_good";
      $params = [':id_good' => $_GET['prod']];
      $result = DBPDO::getInstance()->Select($query, $params);
      return $result;
    }

    function getGoodsFromCart() {
      $query = "SELECT b.id_basket, b.id_user, g.name, g.price, b.s_count FROM s_basket b JOIN s_goods g USING (id_good) WHERE id_user=:id_user";
      $params = [':id_user' => $_SESSION['id_user']];
      $result = DBPDO::getInstance()->Select($query, $params);
      return $result;
    }

    function getCountGoodsFromCart() {
      $query = "SELECT SUM(s_count) FROM s_basket WHERE id_user=:id_user";
      $params = [':id_user' => $_SESSION['id_user']];
      $result = DBPDO::getInstance()->Select($query, $params);
      if ($result[0]['SUM(s_count)'])
        return $result[0]['SUM(s_count)'];
      else
        return 0;
    }

    function removeCart($idBasket) {
      $query = "DELETE FROM s_basket WHERE id_basket=:id_basket";
      $params = [':id_basket' => $idBasket];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function removeCartAll($idUser) {
      $query = "DELETE FROM s_basket WHERE id_user=:id_user";
      $params = [':id_user' => $idUser];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function createOrder($idUser) {
      $query = "INSERT INTO s_order VALUES (null, :id_user, :amount, DEFAULT, 0)";
      $params = [
        ':id_user' => $idUser, 
        ':amount' => 10
      ];
      $result = DBPDO::getInstance()->Query($query, $params);
      return true;
    }

    function getOrder($idUser) {
      $query = "SELECT id_order FROM s_order WHERE id_user=:id_user";
      $params = [':id_user' => $idUser];
      $result = DBPDO::getInstance()->Select($query, $params);
      if ($result[0]['id_order'])
        return $result;
      else
        return 0;
    }
  }