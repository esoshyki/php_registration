const logoutFormControl = new FormControl([]);

const logout = async () => {
  
  const response  = await fetch("/php/logout", {
    method: "GET",
    mode: "no-cors",
  });

  if (response.status === 200) {
    logoutFormControl.redirect({
      time: 3, path: "/home"
    })
  } else {
    console.log(await response.text());
  }
};

document.addEventListener("DOMContentLoaded", () => {
  const logoutButton = document.querySelector('.logout_button');

  if (logoutButton) {
    logoutButton.addEventListener("click", logout);
  };
  
});

