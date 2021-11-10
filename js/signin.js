const form = document.getElementById("form");

const fields = [
  "login",
  "password",
];

const formControl = new FormControl(fields);

form.addEventListener("submit", async e => {
  e.preventDefault();

  const response  = await fetch("/php/signin.php", {
    method: "POST",
    mode: "no-cors",
    body: new FormData(form)
  });
  if (response.status === 401) {
    const errors = await response.json();
    formControl.showErrors(errors);
  } else if (response.status === 200) {
    console.log('ok')
  }
});

form.addEventListener("keydown", ({target}) => formControl.hideError(target.name));


