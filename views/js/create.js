$(function () {
  const AJAX_URL = "../controllers/action/ajax_create.php";
  const query = new URL(location.href).searchParams.get("q") ?? "Usuario";

  const getInput = (name, type, placeholder, opt = []) => {
    const firstUpper = name.charAt(0).toUpperCase() + name.slice(1);

    const label = $("<label>")
      .attr("for", "student-" + name)
      .text(firstUpper + ":");

    let input;
    if (opt.length == 0) {
      input = $("<input>")
        .attr("id", "student-" + name)
        .attr("name", name)
        .attr("type", type)
        .attr("placeholder", placeholder);

      if (type != "file") input.addClass("md3-input--text").prop("required", true);
      else input.addClass("md3-input--file");

      if (type == "date") input.addClass("md3-input--date");
    } else {
      input = $("<select>")
        .addClass("md3-input")
        .attr("id", "student-" + name)
        .attr("name", name)
        .prop("required", true);

      $.each(opt, (i, val) => {
        let option = $("<option>").attr("value", val["key"]).text(val["value"]);
        input.append(option);
      });
    }

    const div = $("<div>").append(label, input);
    return div;
  };

  // 1. Usuarios
  function usuarioFill(grupos, roles) {
    const foto = getInput("foto", "file", "Foto de Perfil"),
      nombre = getInput("nombre", "text", "Usuario ACME"),
      correo = getInput("correo", "email", "example@acme.com"),
      clave = getInput("clave", "text", "password"),
      nacimiento = getInput("nacimiento", "date", ""),
      grupo = getInput("grupo", "select", "", grupos),
      rol = getInput("rol", "select", "", roles);

    createForm.prepend(...foto, ...nombre, ...correo, ...clave, ...nacimiento, ...grupo, ...rol);
    createForm.on("submit", usuarioCreate);
  }

  function usuarioCreate(e) {
    e.preventDefault();
    const foto = $("#student-foto").prop("files")[0];

    let request = new FormData();
    request.append("js", "create");
    request.append("foto", foto);
    request.append("query", query);

    form = createForm.serializeObj();
    $.each(form, (key, value) => request.append(key, value));

    $.ajax({
      url: AJAX_URL,
      type: "POST",
      data: request,
      processData: false,
      contentType: false,
      success: (res) => (window.location.href = "./admin"),
    });
  }

  // Admin: solicitud AJAX para pedir la información y llenar el form
  function admin() {
    title.text(query);

    const success = (res) => {
      res = $.parseJSON(res);

      let grupos = res["grupos"],
        roles = res["roles"];

      switch (query) {
        case "Usuario":
        default:
          usuarioFill(grupos, roles);
          break;
      }
    };

    const request = { js: "get" };
    $.post(AJAX_URL, request).done(success);
  }

  // HTML JQuery Elements
  // to have info
  const title = $("#acme-title");

  // to edit
  const createForm = $("#create-form");
  createForm && admin();
});
