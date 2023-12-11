window.onload = function () {
  document.getElementById("introVideo").scrollIntoView();
};

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
    document.getElementById("alertModal").classList.add("fade-out");
  }, 3000);
});

function validarFormulario() {
  var nombre = document.getElementById("nombre").value;
  var correo = document.getElementById("correo").value;
  var comentarios = document.getElementById("comentarios").value;
  var alerta = document.getElementById("alertModal");

  if (!nombre || !correo || !comentarios) {
    alerta.classList.remove("d-none");
  } else {
    alerta.classList.add("d-none");
  }
}

var tooltipTriggerList = [].slice.call(
  document.querySelectorAll('[data-bs-toggle="tooltip"]')
);
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl);
});

// Código para la barra de progreso
document.addEventListener("scroll", function () {
  var progressBar = document.querySelector(".progress-bar");
  var sections = document.querySelectorAll(".section");
  var pageHeight = document.body.scrollHeight - window.innerHeight;
  var scrollPosition = window.scrollY;
  var progress = (scrollPosition / pageHeight) * 100;
  progressBar.style.width = progress + "%";
  progressBar.setAttribute("aria-valuenow", progress);
});

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
