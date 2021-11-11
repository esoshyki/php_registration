const form = document.getElementById("form");

const fields = [
  "login",
  "password",
];

const signinFormControl = new FormControl(fields);

const signin = async (form) => {

  const response  = await fetch("/php/signin/", {
    method: "POST",
    mode: "no-cors",
    body: new FormData(form)
  });

  if (response.status === 200) {
    console.log(await response.text());
    return;
  }
  const result =await response.json(); 
  response.status === 401 ? signinFormControl.showErrors(result) : signinFormControl.showSuccess(result.success);
  signinFormControl.redirect({
    time: 3, path: "/home"
  })
};

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("signin-form");
  form.addEventListener("submit", (e) => {e.preventDefault(); signin(form)});
  form.addEventListener("keydown", ({target}) => signinFormControl.hideError(target.name));
  form.addEventListener("keydown", () => signinFormControl.hideError("submit"));
});





