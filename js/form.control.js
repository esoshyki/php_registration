class FormControl {
  constructor(_fields) {
    this.fields = _fields;

    this.redirect = ({time, path}) => {
      const timerNode = document.querySelector('.redirect_timer');
      if (timerNode) {
        timerNode.innerHTML = `Redirecting in ${time} s`;
        if (time >= 1) {
          setTimeout(() => this.redirect({time: time - 1, path}), 1000)
        } else {
          location.replace(path);
        }
      };
    };

    this.showErrors = (errors = {}) => {
      Object.entries(errors).map(([field, message]) => {
        const className = `${field}_error`;
        this.showMessage(className, message)
      });
    };

    this.hideError = (field) => {
      const className = `${field}_error`;
      this.hideMessage(className);
    };

    this.showSuccess = success => {
      const succesNode = document.querySelector(".alert-success");
      if (succesNode) {
        succesNode.innerText = success;
        succesNode.classList.remove("hidden");
      };
      this.redirect({time: 3, path: "/home"});
    };

    this.showMessage = (className, message) => {
      const node = document.querySelector(`.${className}`);
      if (node) {
        node.innerText = message;
        node.classList.remove("hidden");
      };
    };

    this.hideMessage = (className) => {
      const node = document.querySelector(`.${className}`);
      if (node) {
        node.innerText = "";
        node.classList.add("hidden");
      };
    };
  };
};

