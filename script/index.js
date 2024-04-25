let count = document.getElementById("countpagesslider").value;
let slider = document.getElementById("slider");
let left_btn = document.getElementById("left-button-slider");
let right_btn = document.getElementById("right-button-slider");
let pageslider = 1;

function moveslider(n) {
  slider.style.left = "-" + (pageslider + n - 1) * 1190 + "px";
}

right_btn.onclick = function () {
  if (pageslider < count) {
    moveslider(1);

    if (pageslider == 1) {
      left_btn.classList.remove("button-slider-deactive");
    }

    pageslider++;

    if (pageslider == count) {
      right_btn.classList.add("button-slider-deactive");
    }
  }
};
left_btn.onclick = function () {
  if (pageslider > 1) {
    moveslider(-1);

    if (pageslider == count) {
      right_btn.classList.remove("button-slider-deactive");
    }

    pageslider--;

    if (pageslider == 1) {
      left_btn.classList.add("button-slider-deactive");
    }
  }
};

let countryList = document.getElementsByClassName("item-country");

var swipeCountry = function (e) {
  document
    .getElementsByClassName("active-item-country")[0]
    .classList.remove("active-item-country");
  e.currentTarget.classList.add("active-item-country");

  let formData = new FormData();

  var cityid = e.currentTarget.querySelectorAll("input")[0].value;
  formData.append("cityid", cityid);

  var url = "functions/filters/addCity.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("indexcatalog-prod").innerHTML =
      xhr.response.getElementById("indexcatalog-prod").innerHTML;
  };
};

for (var i = 0; i < countryList.length; i++) {
  countryList[i].addEventListener("click", swipeCountry, false);
}

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
};

for (var i = 0; i < sortList.length; i++) {
  sortList[i].addEventListener("click", sortFunction, false);
}
