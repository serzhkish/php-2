$(".good-btn").on("click", function(el) {
  $.post("index.php", {'idGoods': el.currentTarget.dataset.id})
    .done(function(outData) {
      if (outData == '0') {
        console.log('ok');
      } else if (outData == '1') {
        console.log('не авторизован');
      } else {
        console.log(outData);
      }      
    });
});

$(".good-cart-btn").on("click", function(el) {
  $.post("index.php", {'idBasket': el.currentTarget.dataset.id})
    .done(function(outData) {
      if (outData == '0') {
        console.log('ok');
        console.log(el.currentTarget.parentNode);
        el.currentTarget.parentNode.remove();
      } else if (outData == '1') {
        console.log('не авторизован');
      } else {
        console.log(outData);
      }      
    });
});