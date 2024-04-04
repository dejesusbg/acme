colorScheme("#2b506d", "#d83a55");
// toggleDarkMode();

// sufrage list
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
      // sistema da la orden de que el estudiante votó
      setTimeout(studentVoted, 10000);
    };
  };
}

document
  .querySelectorAll("tr:not(.acme-table--voted):nth-child(n + 2)")
  .forEach((e) => voteDialog(e));

// read more on news
let news = document.getElementsByClassName("acme-news");
Array.from(news).forEach((n) => {
  n.onclick = () => {
    Array.from(news).forEach((nr) => {
      n != nr && nr.classList.remove("acme-news--read");
    });

    n.classList.toggle("acme-news--read");
  };
});

// log in as estudiante or jurado
function login(form) {
  const queryString = window.location.search,
    urlParams = new URLSearchParams(queryString);

  let userType = 0;
  if (urlParams.size) {
    userType = urlParams.get("userType");
  }

  let userEmail = document.getElementById("user");
  let nextPage = userType == "1" ? "./sufrage.html" : "./vote.html";

  // form.action = nextPage + "?u=" + userEmail.value;
  form.action = nextPage;
  return true;
}

// filter table
function filterTable(input) {
  let filter, table, tr, td, i, txtValue;
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

// get date + fallback
function getDate(){
  const url = "https://cors-anywhere.herokuapp.com/https://www.timeapi.io/api/Time/current/zone?timeZone=America/Bogota",
    options = {};

  let date;

  try {
    fetch(url, options)
      .then( res => res.json() )
      .then( d => {date = d} );
  } catch (error) {
    date = new Date();
  }
}
