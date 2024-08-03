// leer descripción de la noticia
$(function () {
  const news = $(".acme-news");

  news.each(function () {
    const item = $(this);

    item.on("click", () => {
      $(".acme-news").not(item).removeClass("acme-news--read");
      item.toggleClass("acme-news--read");
    });
  });

  $("#toggle-view").on("click", () => {
    $("#container").toggleClass("list");
  });

  is_logged && !is_allowed && openSnackbar("not-allowed");
});
