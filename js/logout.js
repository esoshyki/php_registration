const logout = async () => {
  const response  = await fetch("/php/logout.php", {
    method: "GET",
    mode: "no-cors",
  });

  if (response.status === 200) {
    console.log(await response.text());
    formControl.redirect({
      time: 3, path: "/home.php"
    })
  } else {
    console.log(await response.text());
  }
};

const logoutButton = document.querySelector('.logout_button');

if (logoutButton) {
  logoutButton.addEventListener("click", logout);
};
