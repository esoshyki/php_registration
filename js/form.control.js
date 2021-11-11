class FormControl {
  constructor(_fields) {
    this.fields = _fields;

    this.showErrors = (errors = {}) => {
      Object.entries(errors).map(([field, message]) => {
        const errorNode = document.querySelector(`.${field}_error`)
        if (errorNode) {
          errorNode.innerText = message;
          errorNode.classList.remove("hidden");
        };
      });
    };

    this.hideError = (field) => {
      const errorNode = document.querySelector(`.${field}_error`);
      if (errorNode) {
        errorNode.innerText = "";
        errorNode.classList.add("hidden");
      };
    };

    this.showSuccess = success => {
      const succesNode = document.querySelector(".alert-success");
      if (succesNode) {
        succesNode.innerText = success;
        succesNode.classList.remove("hidden");
      };
    };
  };
};
