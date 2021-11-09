const form = document.getElementById("form");
const loginInput = document.getElementById("loginInput");

form.addEventListener("submit", async e => {
  e.preventDefault();

  const response  = await fetch("/registration.php", {
    method: "POST",
    mode: "no-cors",
    body: new FormData(form)
  });
  if (response.status === 200) {
    console.log('ok')
  };
  if (response.status === 400) {
    console.log('bad');
  }

});


