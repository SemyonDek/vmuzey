function delProd() {
  let prodid = document.getElementById("prodid").value;

  let formData = new FormData();
  formData.append("prodid", prodid);

  var url = "../functions/products/del.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    window.location.replace("catalog.php");
  };
}

function updProd() {
  let form = document.getElementById("addProductForm");

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return {
        name,
        value,
      };
    });

  style_input_red = "border-color: #f23d00;";
  style_input_gray = "border-color: #e6e6eb;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/products/upd.php";

  let xhr = new XMLHttpRequest();

  // xhr.responseType = 'document';

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Товар изменен");
    // console.log(xhr.response);
  };
}

function addPhoto() {
  let form = document.getElementById("addPhotoForm");
  let file = document.getElementById("file_photo");
  let prodid = document.getElementById("prodid").value;
  if (file.value == "") {
    alert("Выберите файл");
  } else {
    let formData = new FormData(form);
    formData.append("prodid", prodid);

    var url = "../functions/products/addPhoto.php";

    let xhr = new XMLHttpRequest();

    xhr.responseType = "document";

    xhr.open("POST", url);
    xhr.send(formData);
    xhr.onload = () => {
      document.getElementById("file_photo").value = null;
      document.getElementById("PhotoBlock").innerHTML =
        xhr.response.getElementById("PhotoBlock").innerHTML;
    };
  }
}

function delPhoto(idPhoto) {
  let formData = new FormData();
  formData.append("idPhoto", idPhoto);

  var url = "../functions/products/delPhoto.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("PhotoBlock").innerHTML =
      xhr.response.getElementById("PhotoBlock").innerHTML;
  };
}

function addTypeTicketProd() {
  let prodid = document.getElementById("prodid").value;
  let nameTicketType = document.getElementById("nameTicketType");

  if (nameTicketType.value == "") {
    alert("Введите название");
    return;
  }

  let formData = new FormData();
  formData.append("prodid", prodid);
  formData.append("nameTicketType", nameTicketType.value);

  var url = "../functions/products/addTypeTicket.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    nameTicketType.value = "";
    document.getElementById("tickets-list").innerHTML =
      xhr.response.getElementById("tickets-list").innerHTML;
    document.getElementById("typeticketid").innerHTML =
      xhr.response.getElementById("typeticketid").innerHTML;
  };
}

function addCatTicketProd() {
  let form = document.getElementById("addTicketsCatForm");
  let prodid = document.getElementById("prodid").value;

  const { elements } = form;

  const data = Array.from(elements)
    .filter((item) => !!item.name)
    .map((element) => {
      const { name, value } = element;

      return {
        name,
        value,
      };
    });

  style_input_red = "border-color: #f23d00;";
  style_input_gray = "border-color: #e6e6eb;";

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      document.getElementById(element["name"]).style = style_input_red;
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);
  formData.append("prodid", prodid);

  var url = "../functions/products/addCatTicket.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    data.forEach((element) => {
      document.getElementById(element["name"]).value = "";
    });
    document.getElementById("typeticketid").value = "";
    document.getElementById("tickets-list").innerHTML =
      xhr.response.getElementById("tickets-list").innerHTML;
  };
}

function delTiketsType(idType) {
  let formData = new FormData();
  formData.append("idType", idType);

  var url = "../functions/products/delTicketType.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response.getElementById("prov").innerHTML == "0") {
      alert("Тип билета не пустой");
    }
    document.getElementById("tickets-list").innerHTML =
      xhr.response.getElementById("tickets-list").innerHTML;
    document.getElementById("typeticketid").innerHTML =
      xhr.response.getElementById("typeticketid").innerHTML;
  };
}

function delTiketsCat(idCat) {
  let formData = new FormData();
  formData.append("idCat", idCat);

  var url = "../functions/products/delTicketCat.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    document.getElementById("tickets-list").innerHTML =
      xhr.response.getElementById("tickets-list").innerHTML;
  };
}
