let buttonUpdPhoto = document.getElementById("upd-photo-button");
let buttonUpdCity = document.getElementById("upd-city-button");
let buttonDelCity = document.getElementById("del-city-button");

function updPhoto() {
  let form = document.getElementById("PhotoCityForm");
  let catid = document.getElementById("cityid").value;

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

  prov = true;

  data.forEach((element) => {
    if (element["value"] == "") {
      prov = false;
      alert("Добавьте изображение");
    }
  });

  if (!prov) return;

  let formData = new FormData(form);
  formData.append("cityid", catid);

  var url = "../functions/city/updPhoto.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Фотография изменена");
    console.log(xhr.response);
    document.getElementById("file_photo").value = null;
    document.getElementById("mainPhotoCat").innerHTML =
      xhr.response.getElementById("mainPhotoCat").innerHTML;
  };
}

function updCity() {
  let form = document.getElementById("addCityForm");

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

  var url = "../functions/city/upd.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Город изменен");
    console.log(xhr.response);
  };
}

function delCity() {
  let cityid = document.getElementById("cityid").value;
  let formData = new FormData();
  formData.append("cityid", cityid);

  var url = "../functions/city/del.php";

  let xhr = new XMLHttpRequest();

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    if (xhr.response == "") {
      alert("Город удален");
      window.location.replace("city-list.php");
    } else {
      alert(xhr.response);
    }
  };
}

buttonUpdPhoto.onclick = function () {
  updPhoto();
};

buttonUpdCity.onclick = function () {
  updCity();
};

buttonDelCity.onclick = function () {
  delCity();
};
