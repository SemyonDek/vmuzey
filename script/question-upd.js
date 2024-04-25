function addAnswer() {
  let answer = document.getElementById("answer").value;
  let idQuestion = document.getElementById("idQuestion").value;

  let formData = new FormData();
  formData.append("answer", answer);
  formData.append("idQuestion", idQuestion);

  var url = "../functions/question/addAnswer.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    alert("Ответ отправлен");
  };
}

function updQuestion() {
  let statusQuestion = document.getElementById("visible").value;
  let idQuestion = document.getElementById("idQuestion").value;

  let formData = new FormData();
  formData.append("statusQuestion", statusQuestion);
  formData.append("idQuestion", idQuestion);

  var url = "../functions/question/upd.php";

  let xhr = new XMLHttpRequest();
  xhr.responseType = "document";

  xhr.open("POST", url);
  xhr.send(formData);
  xhr.onload = () => {
    console.log(xhr.response);
    alert("Видимость изменена");
  };
}
