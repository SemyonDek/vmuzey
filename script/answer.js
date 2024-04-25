let listQuestion = document.getElementsByClassName("question-item");

var openQuestion = function (e) {
  if (
    e.currentTarget.nextSibling.nextSibling.classList.contains(
      "open-answer-item"
    )
  ) {
    e.currentTarget
      .getElementsByClassName("vm-arrow")[0]
      .classList.remove("vm-arrow--up");
    e.currentTarget.nextSibling.nextSibling.classList.remove(
      "open-answer-item"
    );
  } else {
    e.currentTarget
      .getElementsByClassName("vm-arrow")[0]
      .classList.add("vm-arrow--up");
    e.currentTarget.nextSibling.nextSibling.classList.add("open-answer-item");
  }
};

for (i = 0; i < listQuestion.length; i++) {
  listQuestion[i].addEventListener("click", openQuestion, false);
}

let modalQuestion = document.getElementById("modal-add-question");

function openModalQuestion() {
  if (modalQuestion.classList.contains("active-modal-add-question")) {
    modalQuestion.classList.remove("active-modal-add-question");
  } else {
    modalQuestion.classList.add("active-modal-add-question");
  }
}
