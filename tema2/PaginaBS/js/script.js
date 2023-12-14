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

// FUNCION PARA ALTERNAR ENTRE DOS TABLAS CON BOTON
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