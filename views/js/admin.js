$(function () {
  const AJAX_URL = "../controllers/action/ajax_admin.php";
  const query = new URL(location.href).searchParams.get("q") ?? "Usuario";

  function refresh(res) {
    const done = $.parseJSON(res)["done"];
    done && (window.location.href = "./admin");
  }

  function getTableBtn(name, fn) {
    return $("<button>")
      .addClass("md3-btn md3-btn--icon")
      .on("click", fn)
      .append($("<span>").text(name).addClass("material-symbols-rounded md3-btn__icon"));
  }

  function getTableHeader(headers, ...colspan) {
    let header,
      row = $("<tr>");

    $.each(headers, (i, e) => {
      header = $("<th>").text(e);
      if (colspan.includes(i)) header.attr("colspan", 2);
      row.append(header);
    });

    return row;
  }

  function getTableRow(data, elements) {
    let cell,
      row = $("<tr>");

    $.each(elements, (i, e) => {
      const element = typeof e === "string" ? data[e] : e;
      cell = $("<td>").append(element);
      row.append(cell);
    });

    return row;
  }

  // CRUD functions
  function edit_fn(id) {
    window.location.href = "./edit?q=" + query + "&id=" + id;
  }

  function remove_fn(id) {
    const ajax_fn = () => {
      const request = { js: "delete", query: query.toLowerCase(), id };
      $.post(AJAX_URL, request).done(refresh);
    };

    openDialog("delete");
    deleteAccept.off("click.delete").on("click.delete", ajax_fn);
  }

  // 1. Usuarios
  function usuarioFill(usuarios) {
    console.log(usuarios);
    table.addClass("acme-data--width");

    const HEADERS_NAMES = ["Foto", "Nombre", "Correo", "Fecha de nacimiento", "Grupo", "Rol", "Estado", "Acciones"];
    tableBody.append(getTableHeader(HEADERS_NAMES, 7));

    $.each(usuarios, (i, usuario) => {
      const id = usuario["id"];

      let foto = $("<img>").attr("src", usuario["foto"]).attr("alt", "Foto de perfil");

      let edit = getTableBtn("edit", () => edit_fn(id));
      let remove = getTableBtn("delete", () => remove_fn(id));

      if (usuario["rol"] != "Solo votante") {
        remove.attr("disabled", true);
      }

      const ROW_DATA = [foto, "nombre", "correo", "nacimiento", "grupo", "rol", "estado", edit, remove];
      tableBody.append(getTableRow(usuario, ROW_DATA));
    });
  }

  // 2. Grupos
  function grupoFill(grupos) {
    const HEADERS_NAMES = ["Curso", "Mesa", "Acciones"];
    tableBody.append(getTableHeader(HEADERS_NAMES, 7));

    $.each(grupos, (i, grupo) => {
      const id = grupo["id"];

      let edit = getTableBtn("edit", () => edit_fn(id));

      const ROW_DATA = ["curso", "mesa", edit];
      tableBody.append(getTableRow(grupo, ROW_DATA));
    });
  }

  // Admin: solicitud AJAX para pedir la información y llenar la tabla
  function admin() {
    title.text(query);

    const success = (res) => {
      let array = $.parseJSON(res);

      switch (query) {
        case "Usuario":
        default:
          usuarioFill(array);
          break;

        case "Grupo":
          grupoFill(array);
          break;
      }
    };

    const request = { js: "admin", query };
    $.post(AJAX_URL, request).done(success);
  }

  // HTML JQuery Elements
  // to have info
  const title = $("#acme-title");
  const table = $("#acme-data");

  // to filter
  const filter = $("#filter-table");
  filter &&
    filter.on("input", () => {
      return filterTable(filter[0], table[0]);
    });

  // to delete
  const deleteCancel = $("#delete-cancel");
  deleteCancel.on("click", () => closeDialog());

  const deleteAccept = $("#delete-accept");

  // to list
  const tableBody = $("#acme-data > tbody");
  tableBody && admin();
});
