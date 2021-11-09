import "../styles/style.sass";

class App {
  constructor () {

    this.start = () => {

      const form = document.getElementById("form");

      form.addEventListener("submit", async e => {
        e.preventDefault();

        const response  = await fetch(process.env.SERVER + "/signup.php", {
          method: "POST",
          mode: "no-cors",
          body: new FormData(form)
        });
        console.log(response);
        const result = await response.json();

        console.log(result);
      });

    };
  }
};

const app = new App;

app.start();