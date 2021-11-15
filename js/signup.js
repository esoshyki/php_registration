
const SIGNUP_FIELDS = [
  "login",
  "password",
  "confirm_password",
  "email",
  "name"
];

const signupFormControl = new FormControl(SIGNUP_FIELDS);

const signup = async (form) => {

  const response  = await fetch("/php/signup/", {
    method: "POST",
    mode: "no-cors",
    body: new FormData(form)
  });

  if (response.status === 200) {
    signupFormControl.showSuccess("User has been created");

    signupFormControl.redirect({
      time: 3, path: "/home"
    });
    return;
  }
  const errors =await response.json(); 

  if (response.status === 400) {
    return signupFormControl.showErrors(errors);
  };

  if (response.status === 500) {
    return signupFormControl.showMessage("submit_error", errors?.[0].message);
  }

};

document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("signup-form");
  form.addEventListener("submit", (e) => {e.preventDefault(); signup(form)});
  form.addEventListener("keydown", ({target}) => signupFormControl.hideError(target.name));
  form.addEventListener("keydown", () => signupFormControl.hideError("submit"));
});




