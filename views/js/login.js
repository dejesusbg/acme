$(function () {
  const AJAX_URL = "../controllers/action/ajax_login.php";

  // iniciar sesión
  function login(e) {
    e.preventDefault();

    const request = {
      js: "login",
      ...form.serializeObj(),
    };

    const success = (res) => {
      const rol = $.parseJSON(res)["rol_login"];
      $(".dialog-rol").text(rol);

      rol == "Solo votante" ? (window.location.href = "./vote") : openDialog("not-votante");
    };

    const error = () => openDialog("invalid-credentials");
    const then = () => form.trigger("reset");

    $.post(AJAX_URL, request).done(success).fail(error).always(then);
  }

  // iniciar sesión si es jurado o testigo
  function customLogin(votante) {
    const requestData = {
      js: "custom_login",
      votante,
    };

    const success = (res) => {
      const rol = $.parseJSON(res)["rol_login"];

      rol == "Solo votante" ? (window.location.href = "./vote") : (window.location.href = "./sufrage");
    };

    const then = () => closeDialog();

    $.post(AJAX_URL, requestData).done(success).always(then);
  }

  // event handlers
  const form = $("#login-form");
  form.on("submit", login);

  const cancel = $("#dialog-cancel");
  cancel.on("click", () => customLogin(true));

  const accept = $("#dialog-accept");
  accept.on("click", () => customLogin(false));
});
