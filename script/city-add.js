let button = document.getElementById("add-city-button");

function addCity() {
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
      if (element["name"].startsWith("file_photo")) {
        alert("Добавьте изображение");
      } else {
        document.getElementById(element["name"]).style = style_input_red;
      }
    } else {
      document.getElementById(element["name"]).style = style_input_gray;
    }
  });

  if (!prov) return;

  let formData = new FormData(form);

  var url = "../functions/city/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Город добавлен");

    data.forEach((element) => {
      if (
        element["value"] !== "" &&
        !element["name"].startsWith("file_photo")
      ) {
        document.getElementById(element["name"]).value = "";
      }
    });

    document.getElementById("catid").value = 0;

    document.getElementById("file_photo").value = null;
  };
}

button.onclick = function () {
  addCity();
};
