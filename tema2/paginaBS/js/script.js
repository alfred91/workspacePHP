let scroll = new SmoothScroll('a[href*="#"]', {
  speed: 800,
  speedAsDuration: true,
  offset: function (anchor, toggle) {
    let href = anchor.getAttribute("href");

    if (href === "#introVideo") {
      return 0;
    } else {
      return 50;
    }
  },
});

$(document).ready(function () {
  $(".nav-link").on("click", function () {
    $(".nav-link").removeClass("active");
    $(this).addClass("active");
  });
});

$(document).ready(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

document.addEventListener("DOMContentLoaded", function () {
  setTimeout(function () {
    document.getElementById("welcomeMessage").classList.add("fade-out");
  }, 3000);
});

window.onload = function () {
  document.getElementById("introVideo").scrollIntoView();
};
function mostrarTabla(tablaId) {
  var tabla1 = document.getElementById("tabla1");
  var tabla2 = document.getElementById("tabla2");

  if (tablaId === "tabla1") {
    tabla1.style.display = "";
    tabla2.style.display = "none";
  } else {
    tabla1.style.display = "none";
    tabla2.style.display = "";
  }
}