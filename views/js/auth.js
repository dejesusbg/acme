$(function () {
  const url = "../controllers/action/ajax_auth.php";

  // admin authentication through mail
  function auth(e) {
    e.preventDefault();
    
    const email = form.serializeArray()[0]["value"];

    const requestData = {
      js: "auth",
      email: email,
      to: "Administrador",
      subject: "Admin Login Auth",
      body: "../../views/templates/mail_auth.php",
      alt: "",
    };

    const success = (res) => {
      console.log(res);
      openDialog("mailto-admin");
    };

    $.post(url, requestData).done(success);
  }

  function authLogin() {
    const id = new URL(location.href).searchParams.get("id");

    const requestData = { js: "auth-login", id };

    const success = (res) => {
      window.location.href = "./admin";
    };

    $.post(url, requestData).done(success);
  }

  is_auth && authLogin();

  const form = $("#admin-form");
  form && form.on("submit", auth);
});
