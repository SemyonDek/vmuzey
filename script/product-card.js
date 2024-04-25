let count = document.getElementById("countpagesslider").value;
let slider = document.getElementById("slider");
let left_btn = document.getElementById("left-button-slider");
let right_btn = document.getElementById("right-button-slider");
let pageslider = 1;

function moveslider(n) {
  slider.style.left = 197.5 - (pageslider + n - 1) * 845 + "px";
}

right_btn.onclick = function () {
  if (pageslider < count) {
    moveslider(1);

    if (pageslider == 1) {
      left_btn.classList.add("button-product-img-item-active");
    }

    pageslider++;

    if (pageslider == count) {
      right_btn.classList.remove("button-product-img-item-active");
    }
  }
};
left_btn.onclick = function () {
  if (pageslider > 1) {
    moveslider(-1);

    if (pageslider == count) {
      right_btn.classList.add("button-product-img-item-active");
    }

    pageslider--;

    if (pageslider == 1) {
      left_btn.classList.remove("button-product-img-item-active");
    }
  }
};

let favoriteButton = document.getElementById("favorite-button");
let emptyHeart = document.getElementById("empty-heart-favorite");
let fullHeart = document.getElementById("full-heart-favorite");

favoriteButton.onclick = function () {
  if (fullHeart.classList.contains("display-none")) {
    emptyHeart.classList.add("display-none");
    fullHeart.classList.remove("display-none");

    let formData = new FormData();

    var prodid = document.getElementById("prodidprod").value;
    formData.append("prodid", prodid);

    var url = "functions/favorite/add.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      console.log(xhr.response);
    };
  } else {
    fullHeart.classList.add("display-none");
    emptyHeart.classList.remove("display-none");

    let formData = new FormData();

    var prodid = document.getElementById("prodidprod").value;
    formData.append("prodid", prodid);

    var url = "functions/favorite/del.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      console.log(xhr.response);
    };
  }
};

let typeButton = document.getElementById("type-tickets-block");
let typeArrow = document.getElementById("arrow-type-tickets");
let typeMenu = document.getElementById("menu-type-tickets");

let nameMenu = document.getElementById("main-type-info");

let typeList = document.getElementsByClassName("select-menu-ticket-option");

// Стрелочка и открытие сортировки
typeButton.onclick = function () {
  if (typeArrow.classList.contains("vm-arrow--up")) {
    typeArrow.classList.remove("vm-arrow--up");
    typeMenu.classList.add("menu-filter-hidden");
  } else {
    typeArrow.classList.add("vm-arrow--up");
    typeMenu.classList.remove("menu-filter-hidden");
  }
};

var typeFunction = function (e) {
  // Присвоение сортировки
  if (
    document.getElementsByClassName("select-menu-ticket-option-active")[0] !==
    undefined
  )
    document
      .getElementsByClassName("select-menu-ticket-option-active")[0]
      .classList.remove("select-menu-ticket-option-active");
  e.currentTarget.classList.add("select-menu-ticket-option-active");
  nameMenu.innerHTML = e.currentTarget.innerHTML;

  // Закрытие сортировки
  typeArrow.classList.remove("vm-arrow--up");
  typeMenu.classList.add("menu-filter-hidden");

  // Значение сортировки (Добавить передачу переменной в генерацию фильтра)
  // console.log(e.currentTarget.querySelectorAll("input")[0].value);

  let typeid = e.currentTarget.querySelectorAll("input")[0].value;

  let formData = new FormData();
  formData.append("typeid", typeid);

  var url = "functions/basket/swipeType.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    // console.log(xhr.response);
    document.getElementById("category-tickets").innerHTML =
      xhr.response.getElementById("category-tickets").innerHTML;
  };
};

for (var i = 0; i < typeList.length; i++) {
  typeList[i].addEventListener("click", typeFunction, false);
}

function updValueTickets(value, id) {
  let inputValue = document.getElementById("valueTickets__" + id);
  let textValue = document.getElementById("value-tickets__" + id);

  if (Number(inputValue.value) + value >= 0) {
    inputValue.value = Number(inputValue.value) + value;
    textValue.innerHTML = inputValue.value;
  }
}

function addBasket(idTicket, valueTicket) {
  let formData = new FormData();
  formData.append("idTicket", idTicket);
  formData.append("valueTicket", valueTicket);

  var url = "functions/basket/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    // console.log(xhr.response);
  };
}

function continueBuy() {
  let buyBlock = document.getElementById("buy-item-block");
  let orderBlock = document.getElementById("order-item-block");

  let inputList = document.getElementsByClassName("value-tickets-input");
  let prov = false;

  for (var i = 0; i < inputList.length; i++) {
    if (Number(inputList[i].value) !== 0) {
      prov = true;
    }
  }

  if (prov) {
    for (var i = 0; i < inputList.length; i++) {
      if (Number(inputList[i].value) !== 0) {
        idTicket = Number(inputList[i].id.slice(14));
        valueTicket = Number(inputList[i].value);
        addBasket(idTicket, valueTicket);
      }
    }

    var url = "functions/basket/gener.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send();
    xhr.onload = () => {
      // console.log(xhr.response);
      document.getElementById("selected-tickets-block").innerHTML =
        xhr.response.getElementById("selected-tickets-block").innerHTML;
      document.getElementById("amount-tickets").innerHTML =
        xhr.response.getElementById("amount-tickets").innerHTML;
    };

    buyBlock.classList.add("display-none");
    orderBlock.classList.remove("display-none");
  } else {
    alert("Выберите билет");
  }
}

function backBuy() {
  var url = "functions/basket/clear.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send();
  xhr.onload = () => {
    console.log(xhr.response);
  };

  let buyBlock = document.getElementById("buy-item-block");
  let orderBlock = document.getElementById("order-item-block");
  buyBlock.classList.remove("display-none");
  orderBlock.classList.add("display-none");
}
