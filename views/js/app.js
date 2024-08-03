$.fn.extend({
  serializeObj: function () {
    return this.serializeArray().reduce((acc, { name, value }) => ({ ...acc, [name]: value }), {});
  },
});

/**
 * @param type updates text with 0: element.text(), 1: element.val(), 2: element.append(),
 */
function fillProfile(usuario, type) {
  usuario &&
    $.each(usuario, (key, value) => {
      if (Object.hasOwnProperty.call(usuario, key)) {
        let element = $("#student-" + key);

        switch (type) {
          case 0:
          default:
            element.text(value);
            break;
          case 1:
            element.val(value);
            break;
          case 2:
            element.append(value);
            break;
        }

        if (key == "foto") element.attr("src", value);
      }
    });
}

// filtrar tablas
function filterTable(input, table) {
  let filter, tr, td, txtValue;
  filter = input.value.toUpperCase();
  tr = table.getElementsByTagName("tr");

  for (i = 0; i < tr.length; i++) {
    row = tr[i].getElementsByTagName("td");
    for (j = 0; j < row.length; j++) {
      td = row[j];
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

function getTheme() {
  const setDefaultItem = (key, def) => {
    const value = JSON.parse(localStorage.getItem(key)) ?? def;
    localStorage.setItem(key, JSON.stringify(value));
    return value;
  };

  const mediaQueryDarkMode = window.matchMedia && window.matchMedia("(prefers-color-scheme: dark)"),
    prefersDarkMode = setDefaultItem("prefersDarkMode", mediaQueryDarkMode.matches);

  $("body").addClass(prefersDarkMode ? "dark" : "light");
  $("body").removeClass(!prefersDarkMode ? "dark" : "light");
}

function setTheme() {
  toggleDarkMode();
  const newDarkMode = !JSON.parse(localStorage.getItem("prefersDarkMode"));
  localStorage.setItem("prefersDarkMode", newDarkMode);
}

getTheme();

function colorSchemeImg(path) {
  let i = document.createElement("img");
  i.crossOrigin = "Anonymous";
  i.setAttribute("src", path);

  let s, v, m;
  i.addEventListener("load", function () {
    s = new Vibrant(i).swatches();
    v = (s.Vibrant ?? s.DarkVibrant ?? s.LightVibrant).getHex();
    m = s.Muted ?? s.DarkMuted ?? s.LightMuted ?? null;
    m = m ? m.getHex() : null;
    colorScheme(v, m);
  });
}

$(function () {
  if (img == null || img == "" || img == "./img/pfps/0.png") {
    colorScheme("#2b506d", "#d83a55");
  } else {
    colorSchemeImg(img);
  }
});
