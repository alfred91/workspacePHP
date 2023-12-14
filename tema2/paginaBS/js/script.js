<<<<<<< HEAD
window.onload = function () {
  document.getElementById("introVideo").scrollIntoView();
};

let scroll = new SmoothScroll('a[href*="#"]', {
  speed: 800,
  speedAsDuration: true,
  offset: function (anchor, toggle) {
    let href = anchor.getAttribute("href");
=======
// BARRA DE PROGRESO ANIMADA AL DESPLAZARSE
document.addEventListener("scroll", function () {
  var winScroll = document.body.scrollTop || document.documentElement.scrollTop;
  var height =
    document.documentElement.scrollHeight -
    document.documentElement.clientHeight;
  var scrolled = (winScroll / height) * 100;
  var progressBar = document.querySelector(".progress-bar");
  progressBar.style.width = scrolled + "%";
  progressBar.setAttribute("aria-valuenow", scrolled);
});
>>>>>>> e37168c (1)

// ACTIVAR ENLACES DE NAVEGACIÓN SEGÚN LA SECCION
document.addEventListener("DOMContentLoaded", (event) => {
  updateNavLinks();
});

window.addEventListener("scroll", updateNavLinks);
function updateNavLinks() {
  const sections = document.querySelectorAll("section");
  const navLinks = document.querySelectorAll(".navbar-nav .nav-link");
  let currentSection = "";
  sections.forEach((section) => {
    const sectionTop = section.offsetTop;
    const sectionHeight = section.offsetHeight;
    if (pageYOffset >= sectionTop - sectionHeight / 3) {
      currentSection = section.getAttribute("id");
    }
  });
  
  navLinks.forEach((link) => {
    link.classList.remove("active");
    if (link.getAttribute("href") === "#" + currentSection) {
      link.classList.add("active");
    }
  });
}

<<<<<<< HEAD
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

=======
// FUNCION PARA ALTERNAR ENTRE DOS TABLAS CON BOTON
>>>>>>> e37168c (1)
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
