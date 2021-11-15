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
    signinFormControl.showSuccess("Logged in");
    return;
  }

  const errors =await response.json(); 
  console.log(errors);

  if (response.status === 400) {
    return signinFormControl.showErrors(errors);
  };

  if (response.status === 404) {
    return signinFormControl.showMessage("submit_error", errors?.[0].message);
  };
};

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("signin-form");
  form.addEventListener("submit", (e) => {e.preventDefault(); signin(form)});
  form.addEventListener("keydown", ({target}) => signinFormControl.hideError(target.name));
  form.addEventListener("keydown", () => signinFormControl.hideError("submit"));
});





