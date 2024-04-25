let button = document.getElementById("addQuestionButton");

function addQuestion() {
  let form = document.getElementById("addQuestionForm");
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

  var url = "functions/question/add.php";

  let xhr = new XMLHttpRequest();

  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    alert("Вопрос отправлен");
    console.log(xhr.response);

    data.forEach((element) => {
      document.getElementById(element["name"]).value = "";
    });
  };
}

button.onclick = function () {
  addQuestion();
};
