$(function () {
  // llenar tarjetón con los candidatos recibidos
  function fillBallot(candidatos, type) {
    let titulo = $("#ballot-type");
    titulo.text("Tarjetón " + type);

    form.find("div:not(.md3-card)").remove();
    let container = $("<div>");

    $.each(candidatos, (index, candidato) => {
      let input = $("<input>")
        .attr("type", "radio")
        .attr("name", "choice")
        .attr("id", candidato["numero"])
        .attr("value", candidato["id"]);

      let card = $("<label>")
        .attr("for", candidato["numero"])
        .append(
          $("<div>")
            .addClass("md3-card md3-card--filled")
            .append($("<img>").attr("src", candidato["foto"]))
            .append($("<span>").text(candidato["nombre"]).addClass("choice-nombre"))
            .append($("<span>").text(candidato["numero"]).addClass("choice-numero"))
        );

      container.prepend(input, card);
    });

    form.prepend(container);
  }

  var voteObj = { personero: false, contralor: false };
  const url = "../controllers/action/ajax_ballot.php";

  // enviar voto cuando haya terminado
  function vote(e) {
    e.preventDefault();

    const value = $("input[name='choice']:checked").val() ?? false;

    if (value) {
      if (voteObj["personero"]) {
        // guardar voto por contralor
        voteObj["contralor"] = value;

        // enviar voto
        const requestData = { js: "vote", ...voteObj };
        const success = (res) => {
          window.location.href = "./home";
        };

        $.post(url, requestData).done(success);
      } else {
        // guardar voto por personero
        voteObj["personero"] = value;
        form && ballot("Contralor");
      }
    }
  }

  // solicitar candidatos del tarjeton actual
  function ballot(type) {
    const requestData = { js: "ballot", type };

    const success = (res) => {
      let candidatos = $.parseJSON(res).reverse();
      fillBallot(candidatos, type);
    };

    $.post(url, requestData).done(success);
  }

  const form = $("#vote-form");

  form && ballot("Personero");
  form.on("submit", vote);
});
