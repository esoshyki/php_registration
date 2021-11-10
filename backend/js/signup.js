console.log("SIGNUP")

const form = document.getElementById("form");

form.addEventListener("submit", async (e) => {
  e.preventDefault();

  const res = await fetch("sign.php", {
    method: "POST",
    body: new FormData(form)
  });

  console.log(await res.json());
})