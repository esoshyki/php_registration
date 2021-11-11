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
  if (response.status === 200) {
    console.log(await response.text());
    return;
  }
  const result =await response.json(); 
  console.log(result);
  response.status === 401 ? formControl.showErrors(result) : formControl.showSuccess(result.success);
});

form.addEventListener("keydown", ({target}) => formControl.hideError(target.name));
form.addEventListener("keydown", () => formControl.hideError("submit"));



