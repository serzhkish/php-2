$(function() {
  let prdIdOffset = 5;

  $(".load-more").click(function(){
    $.post("get-next-good.php", {offset: prdIdOffset})
    .done(function(data) {
      let dataArr = JSON.parse(data);
      for (let i=0; i<=dataArr.length-1; i++) {      
        let product = `<div class="wrp-prd">
                          <p class="prd-title">${dataArr[i].title}</p>
                          <img src="img/${dataArr[i].img}" alt="${dataArr[i].title}" class="prd-img" width="100" height="110">
                          <p class="prd-price">Price: ${dataArr[i].price} $</p>
                          <button class="prd-buy" data-id="${dataArr[i].id}">Купить</button>
                        </div>
                      `;
        document.querySelector('.wrp').insertAdjacentHTML('beforeend', product);
      }
    });
    prdIdOffset += 5;
  }); 

});