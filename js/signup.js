
const signupFields = [
  "login",
  "password",
  "confirm_password",
  "email",
  "name"
];

const signupFormControl = new FormControl(signupFields);

const signup = async (form) => {

  const response  = await fetch("/php/signup/", {
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

  if (response.status === 401) {
    return signupFormControl.showErrors(result);
  };
  
  signupFormControl.showSuccess(result.success);
  signupFormControl.redirect({
    time: 3, path: "/home"
  });
};


document.addEventListener("DOMContentLoaded", () => {
  const form = document.getElementById("signup-form");
  form.addEventListener("submit", (e) => {e.preventDefault(); signup(form)});
  form.addEventListener("keydown", ({target}) => signupFormControl.hideError(target.name));
  form.addEventListener("keydown", () => signupFormControl.hideError("submit"));
});




