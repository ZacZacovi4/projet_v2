const toggler = document.querySelector(".navbar__toggler");
const menu = document.querySelector(".navbar__menu");

toggler.addEventListener("click", () => {
  // Bascule la classe pour afficher ou masquer le menu
  menu.classList.toggle("navbar__menu--visible");

  // Met à jour l'attribut aria-expanded pour l'accessibilité
  const isExpanded = toggler.getAttribute("aria-expanded") === "true";
  toggler.setAttribute("aria-expanded", !isExpanded);
});

// Sélection du bloc hamburger
const hamburger = document.querySelector(".navbar__toggler");
const [topBar, middleBar, bottomBar] = document.querySelectorAll(
  ".hamburger__bar--top, .hamburger__bar--middle, .hamburger__bar--bottom"
);
// Fonction pour la transition de l'icone du toggle menu
function changeToCross() {
  if (hamburger.classList.contains("navbar__toggler--active")) {
    topBar.setAttribute("transform", "");
    middleBar.setAttribute("opacity", "");
    bottomBar.setAttribute("transform", "");
  } else {
    topBar.setAttribute("transform", "translate(0, 8) rotate(45, 16, 5.5)");
    middleBar.setAttribute("opacity", "0");
    bottomBar.setAttribute(
      "transform",
      "translate(0, -8) rotate(-45, 16, 21.5)"
    );
  }
  hamburger.classList.toggle("navbar__toggler--active");
}

hamburger.addEventListener("click", changeToCross);

// changement de slides utilisant le bouton
const buttons = document.querySelectorAll(".btn__carousel");
const slides = document.querySelectorAll(".slide__carousel");

buttons.forEach((button) => {
  button.addEventListener("click", (e) => {
    const calcNextSlide = e.target.id === "next" ? 1 : -1;
    const slideActive = document.querySelector(".active");

    newIndex = calcNextSlide + [...slides].indexOf(slideActive);

    if (newIndex < 0) newIndex = [...slides].length - 1;
    if (newIndex >= [...slides].length) newIndex = 0;
    slides[newIndex].classList.add("active");

    slideActive.classList.remove("active");
  });
});

// function pour changer les slides de façon automatique
function autoSlide() {
  const slideActive = document.querySelector(".active");
  let newIndex = [...slides].indexOf(slideActive) + 1;
  if (newIndex >= slides.length) newIndex = 0;
  slides[newIndex].classList.add("active");
  slideActive.classList.remove("active");
}

// Changer de slide toutes les 5 secondes (5000 millisecondes)
setInterval(autoSlide, 5000);

let btn_sidebar = document.querySelector("#sidebar__btn");
let sidebar = document.querySelector(".user__sidebar");

btn_sidebar.onclick = function () {
  sidebar.classList.toggle("active");
};

// =============================
// ==== GESTION EVENEMENTS =====
// =============================

// Gestion formulaire de creation d'evenements

const eventCreateFormOverlay = document.getElementById(
  "event-create__form-overlay"
);
const eventCreateFormOverlayOpen = document.getElementById(
  "open__create-event-form"
);
const eventCreateFormOverlayClose = document.getElementById(
  "close__create-event-form"
);
const eventCreateForm = document.getElementById("event-create__form");

// overture du formulaire
function openEventCreationForm() {
  eventCreateFormOverlay.classList.add("active");
  eventCreateFormOverlay.setAttribute("aria-hidden", "false");
  // Ecouter la touche Échap
  document.addEventListener("keydown", onEsc);
}

eventCreateFormOverlayOpen.addEventListener("click", openEventCreationForm);

function closeEventCreationForm() {
  eventCreateFormOverlay.classList.remove("active");
  eventCreateFormOverlay.setAttribute("aria-hidden", "true");
  // Unset ecouter la touche Échap
  document.removeEventListener("click", onEsc);
}

eventCreateFormOverlayClose.addEventListener("click", closeEventCreationForm);
