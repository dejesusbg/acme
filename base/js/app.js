colorScheme("#2b506d", "#d83a55");
document.body.classList.add("light");
document.body.classList.remove("dark");

// Simulación del voto
function voteDialog(e) {
  e.onclick = () => {
    let info = document.getElementById("acme-student-info");
    info.innerHTML =
      e.children[0].innerHTML + "<br />" + e.children[1].innerHTML + " (9°)";

    openDialog("info-dialog");

    let btn = document.getElementById("allow-vote");
    let dialog = document.getElementById("info-dialog");
    let nVotes = document.getElementById("acme-votes-amt");

    let studentVoted = () => {
      e.classList.add("acme-table--voted");
      e.onclick = null;

      btn.innerHTML = '<span class="md3-btn__text"> Permitir </span>';
      btn.disabled = false;

      nVotes.innerHTML =
        document.getElementsByClassName("acme-table--voted").length;

      customCloseDialog(dialog);
      closeDialog();
    };

    btn.onclick = () => {
      btn.innerHTML = '<span class="md3-btn__text"> Esperando </span>';
      btn.disabled = true;

      customCloseDialog(dialog, true);
      // Sistema da la orden de que el estudiante votó
      setTimeout(studentVoted, 10000);
    };
  };
}

document
  .querySelectorAll("tr:not(.acme-table--voted):nth-child(n + 2)")
  .forEach((e) => voteDialog(e));

// Leer descripción de la noticia
let news = document.getElementsByClassName("acme-news");
Array.from(news).forEach((n) => {
  n.onclick = () => {
    Array.from(news).forEach((nr) => {
      n != nr && nr.classList.remove("acme-news--read");
    });

    n.classList.toggle("acme-news--read");
  };
});

// Iniciar sesión como Estudiante o Jurado
var loginForm = document.getElementById("acme-login-form"),
  loginRole = false;

if (loginForm) {
  function userRole() {
    const queryString = window.location.search,
      urlParams = new URLSearchParams(queryString);

    if (urlParams.size && urlParams.get("userType") == "1") {
      loginRole = true;
    }

    let loginText = document.getElementById("acme-login-txt");
    loginText.innerHTML += loginRole ? " jurado" : " estudiante";
  }

  loginForm.onsubmit = () => {
    loginForm.action = loginRole ? "./sufrage.html" : "./vote.html";
    return true;
  };

  userRole();
}

// Filtrar tabla de sufragantes
function filterTable(input) {
  let filter, table, tr, td, txtValue;
  filter = input.value.toUpperCase();
  table = document.getElementById("acme-students");
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    for (j = 0; j < 2; j++) {
      td = tr[i].getElementsByTagName("td")[j];
      if (td) {
        txtValue = td.textContent || td.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
          tr[i].style.display = "table-row";
          break;
        } else {
          tr[i].style.display = "none";
        }
      }
    }
  }

  return true;
}

// Obtener fecha de API o local
var date,
  time = document.getElementById("acme-time");

if (time) {
  function getDate() {
    const url =
        "https://cors-anywhere.herokuapp.com/https://www.timeapi.io/api/Time/current/zone?timeZone=America/Bogota",
      options = {};

    let localDate = {
      hour: ("0" + new Date().getHours()).slice(-2),
      min: ("0" + new Date().getMinutes()).slice(-2),
    };

    date = localDate.hour + ":" + localDate.min;

    try {
      fetch(url, options)
        .then((res) => res.json())
        .then((obj) => {
          date = obj.time;
        });
    } catch (err) {}

    setTimeout(() => {
      time.innerHTML = date;
    }, 1000);
  }

  getDate();
  setInterval(getDate, 30000);
}
