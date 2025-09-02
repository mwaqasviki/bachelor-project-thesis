let cat_btn = document.querySelectorAll(".cat-btn");
// $(document).ready(function () {
var activeCat = "";
filterGroup(cat_btn[0].value);
function filterGroup(group) {
  if (activeCat != group) {
    $(".C-filter")
      .filter("." + group)
      .show();
    let btn = document.querySelectorAll(".cat-btn");
    btn.forEach((box) => {
      box.classList.remove("active");
    });
    document.querySelector(".cat-" + group).classList.add("active");

    $(".C-filter")
      .filter(":not(." + group + ")")
      .hide();

    //document.querySelector(".cat-" + group).style.background = "#f7f7f7";
    activeCat = group;
  }
}

//   // $(".cat-all").click(function () {
//   //   $(".C-filter").show();
//   //   activeCat = "all";
//   // });
//   $(".cat-Combo").click(function () {
//     filterGroup("Combo");
//   });
//   $(".cat-Pizza").click(function () {
//     filterGroup("Pizza");
//   });
//   $(".cat-Burger").click(function () {
//     filterGroup("Burger");
//   });
//   $(".cat-Chicken").click(function () {
//     filterGroup("Chicken");
//   });
//   $(".cat-Dinner").click(function () {
//     filterGroup("Dinner");
//   });
//   $(".cat-Coffee").click(function () {
//     filterGroup("Coffee");
//   });
// });

// let cat_btn = document.querySelectorAll(".cat-btn");
// // console.log(cat_btn);
// cat_btn[0].classList.add("active");
for (let i = 0; i < cat_btn.length; i++) {
  cat_btn[i].addEventListener("click", cat_func);

  function cat_func() {
    //     // console.log(cat_btn);
    //     for (let j = 0; j < cat_btn.length; j++)
    //       cat_btn[j].classList.remove("active");

    //     if (!cat_btn[i].classList.contains("active")) {
    //       cat_btn[i].classList.add("active");
    filterGroup(cat_btn[i].value);
  }
}
// }
