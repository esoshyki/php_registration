class FormControl {
  constructor(_fields) {
    this.fields = _fields;

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
