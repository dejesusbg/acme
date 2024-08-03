var message = $("#guess-msg"),
  input = $("#guess"),
  table = $("#attempts > tbody");

var g, c;
function createNewGame() {
  (g = []), (c = 0);

  table.empty();

  while (g.length < 4) {
    let rn = parseInt(Math.random() * 10) + "";
    !g.includes(rn) && g.push(rn);
  }
}

function gameOver(win) {
  message.text((win ? "Ganaste" : "Perdiste") + ", el número era " + g.join(""));
  openDialog("guess-dialog");

  createNewGame();
}

function validate() {
  let p, f, n;

  p = f = 0;
  n = input.val().split("");
  input.val("");

  // check if input is allowed
  if (n.length != 4 || new Set(n).size != 4) {
    message.text("Debe tener 4 cifras únicas");
    return openDialog("guess-dialog");
  }

  // process the input
  for (let i = 0; i < 4; i++) {
    if (g[i] == n[i]) f++;
    else if (n.includes(g[i])) p++;
  }

  const row = $("<tr>")
    .append($("<td>").text(++c))
    .append($("<td>").text(n.join("")))
    .append($("<td>").text(p))
    .append($("<td>").text(f));

  table.append(row);

  // check if game is over
  if (f == 4 || c == 10) return gameOver(f == 4);
}

createNewGame();
