$(function () {
  const url = "../controllers/action/ajax_forgot.php";

  // user authentication through mail
  function forgot(e) {
    e.preventDefault();

    const email = form.serializeArray()[0]["value"];

    const requestData = {
      js: "forgot",
      email: email,
      to: "Estudiante",
      subject: "Recuperar contraseña",
      body: "../../views/templates/mail_forgot.php",
      alt: "",
    };

    const success = (res) => {
      console.log(res);
      openDialog("mailto-login");
    };

    $.post(url, requestData).done(success);
  }

  function forgotLogin() {
    const id = new URL(location.href).searchParams.get("id");

    const requestData = { js: "forgot-login", id };

    const success = (res) => {
      window.location.href = "./password";
    };

    $.post(url, requestData).done(success);
  }

  has_forgot && forgotLogin();

  const form = $("#forgot-form");
  form && form.on("submit", forgot);
});
