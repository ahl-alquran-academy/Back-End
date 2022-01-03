window.onload = function () {
  //properities....
  let submitBtn = document.getElementById("submitBtn");
  let error_message = document.getElementsByClassName("error_message")[0];
  let email = document.querySelector("input[type='email']");
  let password = document.querySelector("input[type='password']");
  //attach events...
  submitBtn.addEventListener("click", formValidation);
  //methods...
  function formValidation(e) {
    email.value = email.value.trim();
    if (email.value.indexOf("@") == -1) {
      error_message.classList.remove("hidden");
      e.preventDefault();
    } else if (email.value == "" || password.value == "") {
      error_message.classList.remove("hidden");
      e.preventDefault();
    } else {
      error_message.classList.add("hidden");
    }
  }
};
