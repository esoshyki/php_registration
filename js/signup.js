const form = document.getElementById("form");

const fields = [
  "login",
  "password",
  "confirm_password",
  "email",
  "name"
];

const formControl = new FormControl(fields);

form.addEventListener("submit", async e => {
  e.preventDefault();

  const response  = await fetch("/registration.php", {
    method: "POST",
    mode: "no-cors",
    body: new FormData(form)
  });
  if (response.status === 401) {
    const errors = await response.json();
    console.log(errors);
    formControl.showErrors(errors);
  } else if (response.status === 200) {
    console.log('ok')
  }
});

form.addEventListener("keydown", ({target}) => formControl.hideError(target.name));


