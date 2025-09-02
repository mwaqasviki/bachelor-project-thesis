let rd1 = document.querySelector(".rd1");
let rd2 = document.querySelector(".rd2");
let rd3 = document.querySelector(".rd3");
let rd = document.querySelectorAll(".rd");
rd1.addEventListener("click", function () {
  rd[0].setAttribute("checked", "true");
  rd[1].removeAttribute("checked");
  rd[2].removeAttribute("checked");
  console.log(1);
});
rd2.addEventListener("click", function () {
  rd[0].removeAttribute("checked");
  rd[1].setAttribute("checked", "true");
  rd[2].removeAttribute("checked");
  console.log(2);
});
rd3.addEventListener("click", function () {
  rd[0].removeAttribute("checked");
  rd[1].removeAttribute("checked");
  rd[2].setAttribute("checked", "true");
  console.log(3);
});
