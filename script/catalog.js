let sortButton = document.getElementById("sort-block");
let sortArrow = document.getElementById("arrow-sort");
let sortMenu = document.getElementById("menu-sort");

let nameMenu = document.getElementById("name-sort");
let sortList = document.getElementsByClassName("vm-select-dropdown-item");

// Стрелочка и открытие сортировки
sortButton.onclick = function () {
  if (sortArrow.classList.contains("vm-arrow--up")) {
    sortArrow.classList.remove("vm-arrow--up");
    sortMenu.classList.add("menu-filter-hidden");
  } else {
    sortArrow.classList.add("vm-arrow--up");
    sortMenu.classList.remove("menu-filter-hidden");
  }
};

var sortFunction = function (e) {
  // Присвоение сортировки
  document
    .getElementsByClassName("vm-dropdown-item_selected")[0]
    .classList.remove("vm-dropdown-item_selected");
  e.currentTarget.classList.add("vm-dropdown-item_selected");
  nameMenu.innerHTML = e.currentTarget.querySelectorAll("p")[0].innerHTML;

  // Закрытие сортировки
  sortArrow.classList.remove("vm-arrow--up");
  sortMenu.classList.add("menu-filter-hidden");

  // Значение сортировки (Добавить передачу переменной в генерацию фильтра)
  console.log(e.currentTarget.querySelectorAll("input")[0].value);

  let sort = e.currentTarget.querySelectorAll("input")[0].value;
  let catid = document.getElementById("catidcatid").value;

  let formData = new FormData();

  formData.append("catid", catid);
  formData.append("sort", sort);

  var url = "functions/filters/addSort.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    document.getElementById("main-catalog-block").innerHTML =
      xhr.response.getElementById("main-catalog-block").innerHTML;
  };
};

for (var i = 0; i < sortList.length; i++) {
  sortList[i].addEventListener("click", sortFunction, false);
}
