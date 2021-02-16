$(".good-btn").on("click", function(el) {
  $.post("index.php", {'idGoods': el.currentTarget.dataset.id})
    .done(function(outData) {
      if (outData == '0') {
        console.log('ok');
        let countCart = 0;
        if ($(".menu-item-count").text() !== '') {
          countCart = parseInt($(".menu-item-count").text()) + 1;
        } else {
          countCart = 1;
        }
        $(".menu-item-count").text(countCart);
      } else if (outData == '1') {
        console.log('не авторизован');
      } else {
        console.log(outData);
      }      
    });
    console.log('ok');
        console.log($(".menu-item-count").val());
});

$(".good-cart-btn").on("click", function(el) {
  $.post("index.php", {'idBasket': el.currentTarget.dataset.id})
    .done(function(outData) {
      if (outData == '0') {
        console.log('ok');
        console.log(el.currentTarget.parentNode.parentNode);
        el.currentTarget.parentNode.parentNode.remove();
      } else if (outData == '1') {
        console.log('не авторизован');
      } else {
        console.log(outData);
      }      
    });
});

// $(".good-count-cart").on("change", function(el) {
//   console.log($(this).val());
//   $.post("index.php", {'countGood': $(this).val()})
//     .done(function(outData) {
//       if (outData == '0') {
//         console.log('ok');
//       } else if (outData == '1') {
//         console.log('не авторизован');
//       } else {
//         console.log(outData);
//       }      
//     });
// });

document.querySelectorAll(".good-count-cart").forEach(element => {
  element.addEventListener("change", function(el){
      let formData = new FormData();
      formData.append('countGood', this.value);
      formData.append('idBasket', this.parentNode.parentNode.dataset.id);
      fetch('index.php', {
        method: 'POST',
        body: formData
      })
      .then(response => response.text())
      .then(result => console.log(result))
      //.then(result => console.log(JSON.stringify(result, null, 2)))
    });
});



// $(document).ready(function(){
//   $("#form_error_message_frontend + div > div:last-child label").addClass("last");
// });

// document.addEventListener('DOMContentLoaded', function(){

// });