let f_price = document.querySelectorAll(".f_price");
let f_id = document.querySelectorAll(".f_id");
// console.log(f_price.value);
for (let i = 0; i < f_price.length; i++) {
  f_price[i].addEventListener("click", addtocart);

  function addtocart() {
    // console.log(f_price[i].value);
    // console.log(f_id[i].value);
    $.ajax({
      url: "add_cart.php",

      method: "POST",

      data: { f_id: f_id[i].value, f_price: f_price[i].value },

      success: function (data) {
        // console.log(document.querySelector(".item_cart").textContent);
        if (data == false) alert("This Item is added in cart");
        else
          document.querySelector(".item_cart").innerHTML =
            "<i id='cart-btn' class='fa fa-shopping-cart fa-1.5x'></i> &nbsp;" +
            data +
            "&nbsp; Items";
        // $(".price2").text(data);
      },
    });
  }
}
