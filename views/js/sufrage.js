// simulación del voto
$(function () {
  const url = "../controllers/action/ajax_sufrage.php";

  let amount = $("#votes-amt");

  function fillTable(votantes) {
    $.each(votantes, (index, votante) => {
      let row = $("<tr>")
        .append($("<td>").text(votante["nombre"]))
        .append($("<td>").text(votante["id"]).addClass("student-code"));

      if (votante["estado"] == "Pendiente") {
        row.on("click", () => {
          fillProfile(votante);

          openDialog("carnet");
          accept.off("click.wait").on("click.wait", () => beforeVote(row, votante));
        });
      } else {
        afterVote(row, votante);
      }

      tableBody.append(row);
    });

    amount.text($(".student--voted").length);
  }

  let dialog = $("#carnet");
  let accept = $("#dialog-accept");

  // se da la orden de que el estudiante votó
  function afterVote(row, votante) {
    row.addClass("student--voted");
    row.on("click", null);

    accept.empty();
    accept.append($("<span>").text("Permitir").addClass("md3-btn__text"));
    accept.prop("disabled", false);

    amount.text($(".student--voted").length);

    customCloseDialog(dialog[0]);
    closeDialog();
  }

  // el jurado da la orden para que el estudiante pueda votar
  function beforeVote(row, votante) {
    let interval;

    const allowVote = () => {
      const requestData = { js: "allow", id: votante["id"] };

      const success = (res) => {
        console.log(res);
      };

      $.post(url, requestData).done(success);
    };

    const checkVote = () => {
      const requestData = { js: "check", id: votante["id"] };

      const success = (res) => {
        const done = $.parseJSON(res)["done"];
        done && clearInterval(interval);
        done && afterVote(row, votante);
      };

      $.post(url, requestData).done(success);
    };

    accept.empty();
    accept.append($("<span>").text("Esperando").addClass("md3-btn__text"));
    accept.prop("disabled", true);

    customCloseDialog(dialog[0], true);

    allowVote();
    interval = setInterval(checkVote, 1000);
    // setTimeout(() => afterVote(row, votante), 10000);
  }

  // solicitar votantes de la mesa del jurado actual
  function sufrage() {
    const requestData = { js: "sufrage" };

    const success = (res) => {
      let votantes = $.parseJSON(res);
      fillTable(votantes);
    };

    $.post(url, requestData).done(success);
  }

  const table = $("#acme-students");

  const filter = $("#filter-table");
  filter &&
    filter.on("input", () => {
      return filterTable(filter[0], table[0]);
    });

  const tableBody = $("#acme-students > tbody");
  tableBody && sufrage();
});
