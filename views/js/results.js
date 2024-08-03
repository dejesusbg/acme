$(function () {
  const url = "../controllers/action/ajax_results.php";

  function fillGraph(results, max) {
    personeroTable.empty();
    contralorTable.empty();

    $.each(results["stats"], (index, result) => {
      console.log(result);

      let votos = result["votos"];
      let size = "--size: calc(" + votos + " / " + max + ")";

      let row = $("<tr>")
        .append(
          $("<th>").attr("scope", "row").text(result["numero"].replace("#", ""))
        )
        .append(
          $("<td>")
            .attr("style", size)
            .append($("<span>").addClass("data").text(votos))
        );

      if (result["categoria"] == "Personero") personeroTable.append(row);
      else if (result["categoria"] == "Contralor") contralorTable.append(row);
    });
  }

  function fillResults(results) {
    let authorized = $("#authorized"),
      voted = $("#voted"),
      personero = $("#personero"),
      contralor = $("#contralor");

    authorized.text(results["habilitados"]);
    voted.text(results["recibidos"] + "/" + results["habilitados"] * 2);

    let winnerP, winnerC;
    winnerP = winnerC = {
      numero: "n/a",
      categoria: "Personero",
      votos: 0,
    };

    let max = 0;
    $.each(results["stats"], (index, result) => {
      if (max < result["votos"]) max = result["votos"];

      if (
        result["categoria"] == "Personero" &&
        winnerP["votos"] < result["votos"]
      )
        winnerP = result;
      else if (
        result["categoria"] == "Contralor" &&
        winnerC["votos"] < result["votos"]
      )
        winnerC = result;
    });

    personero.text(winnerP["numero"]);
    contralor.text(winnerC["numero"]);

    fillGraph(results, max);
  }

  // solicitar votos
  function results() {
    const requestData = { js: "results" };

    const success = (res) => {
      let votos = $.parseJSON(res);
      fillResults(votos);
    };

    $.post(url, requestData).done(success);
  }

  const refresh = $("#refresh");
  refresh.on("click", results);

  const personeroTable = $("#personero-table > tbody"),
    contralorTable = $("#contralor-table > tbody");

  results();
});
