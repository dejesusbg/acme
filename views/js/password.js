$(function () {
  const url = "../controllers/action/ajax_password.php";

  // cambiar contraseña de usuario
  function password(e) {
    e.preventDefault();

    const requestData = {
      js: "password",
      ...form.serializeObj(),
    };

    const success = (res) => {
      const done = $.parseJSON(res)["done"];
      done && (window.location.href = "./profile");
    };

    $.post(url, requestData).done(success);
  }

  // event handlers
  const form = $("#password-form");
  form.on("submit", password);
});
