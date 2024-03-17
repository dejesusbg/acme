colorScheme("#2b506d", "#d83a55");
toggleDarkMode();

document.querySelectorAll(".acme-table tr:nth-child(n + 2)").forEach((e) => {
  e.onclick = () => openDialog("info-dialog");
});
