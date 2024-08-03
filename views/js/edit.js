$(function () {
  const AJAX_URL = "../controllers/action/ajax_edit.php";
  const query = new URL(location.href).searchParams.get("q") ?? "Usuario";
  const id = new URL(location.href).searchParams.get("id") ?? 0;

  const getInput = (item, name, type, placeholder, opt = []) => {
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

      if (type != "file") input.addClass("md3-input--text").val(item[name]).prop("required", true);
      else input.addClass("md3-input--file");

      if (type == "date") input.addClass("md3-input--date");
    } else {
      input = $("<select>")
        .addClass("md3-input")
        .attr("id", "student-" + name)
        .attr("name", name)
        .prop("required", true);

      $.each(opt, (i, val) => {
        let option = $("<option>")
          .attr("value", val["key"])
          .text(val["value"]);

        if (val["value"] == item[name]) {
          option.attr("selected", true);
        }

        input.append(option);
      });
    }

    const div = $("<div>").append(label, input);
    return div;
  };

  function edit(e) {
    e.preventDefault();

    const success = (res) => {
      window.location.href = "./admin?q=" + query;
    }

    const request = {
      js: "edit",
      query,
      id,
      ...editForm.serializeObj()
    };

    $.post(AJAX_URL, request).done(success);
  }

  // 1. Usuarios
  function usuarioFill(usuario, grupos, roles) {
    const foto = getInput(usuario, "foto", "file", "Foto de Perfil"),
      nombre = getInput(usuario, "nombre", "text", "Usuario ACME"),
      correo = getInput(usuario, "correo", "email", "example@acme.com"),
      clave = getInput(usuario, "clave", "text", "password"),
      nacimiento = getInput(usuario, "nacimiento", "date", ""),
      grupo = getInput(usuario, "grupo", "select", "", grupos),
      rol = getInput(usuario, "rol", "select", "", roles);

    editForm.prepend(...foto, ...nombre, ...correo, ...clave, ...nacimiento, ...grupo, ...rol);
    editForm.on("submit", usuarioEdit);
  }

  function usuarioEdit(e) {
    e.preventDefault();
    const foto = $("#student-foto").prop("files")[0];

    let request = new FormData();
    request.append("js", "edit");
    request.append("id", id);
    request.append("foto", foto);
    request.append("query", query);

    form = editForm.serializeObj();
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

  // 2. Grupos
  function grupoFill(grupo, mesas) {
    const nombre = getInput(grupo, "grupo", "text", ""),
      mesa = getInput(grupo, "mesa", "select", "", mesas);

    editForm.prepend(...nombre, ...mesa);
    editForm.on("submit", edit);
  }

  // Admin: solicitud AJAX para pedir la información y llenar el form
  function admin() {
    title.text(query);

    const success = (res) => {
      res = $.parseJSON(res);

      let array = res["data"],
        grupos = res["grupos"],
        roles = res["roles"],
        mesas = res["mesas"];

      switch (query) {
        case "Usuario":
        default:
          usuarioFill(array, grupos, roles);
          break;

        case "Grupo":
          grupoFill(array, mesas);
          break;
      }
    };

    const request = { js: "get", query, id };
    $.post(AJAX_URL, request).done(success);
  }

  // HTML JQuery Elements
  // to have info
  const title = $("#acme-title");

  // to edit
  const editForm = $("#edit-form");
  editForm && admin();
});
