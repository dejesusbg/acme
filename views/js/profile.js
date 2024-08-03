$(function () {
  const url = "../controllers/action/ajax_profile.php";

  // solicitar datos del usuario actual
  function profile() {
    const requestData = { js: "profile" };

    const success = (res) => {
      let usuario = $.parseJSON(res);
      fillProfile(usuario, 2);
    };

    $.post(url, requestData).done(success);
  }

  profile();
});
