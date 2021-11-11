const logout = async () => {
  console.log('logout');
  const response  = await fetch("/php/logout", {
    method: "GET",
    mode: "no-cors",
  });

  if (response.status === 200) {
    console.log(await response.text());
    formControl.redirect({
      time: 3, path: "/home"
    })
  } else {
    console.log(await response.text());
  }
};

const logoutButton = document.querySelector('.logout_button');

if (logoutButton) {
  logoutButton.addEventListener("click", logout);
};
