colorScheme("#2b506d", "#d83a55");
toggleDarkMode();

function voteDialog(e) {
  e.onclick = () => {
    openDialog("info-dialog");

    let btn = document.getElementById("allow-vote");
    let dialog = document.getElementById("info-dialog");

    let studentVoted = () => {
      e.classList.add("acme-table--voted");
      e.onclick = null;

      btn.innerHTML = '<span class="md3-btn__text"> Permitir </span>';
      btn.disabled = false;

      customCloseDialog(dialog);
      closeDialog();
    };

    btn.onclick = () => {
      btn.innerHTML = '<span class="md3-btn__text"> Esperando </span>';
      btn.disabled = true;

      customCloseDialog(dialog, true);
      // sistema da la orden de que el estudiante votó
      setTimeout(studentVoted, 5000);
    };
  };
}

document
  .querySelectorAll("tr:not(.acme-table--voted):nth-child(n + 2)")
  .forEach((e) => voteDialog(e));
