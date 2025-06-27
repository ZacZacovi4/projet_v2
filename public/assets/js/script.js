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

// // changement de slides utilisant le bouton
// const buttons = document.querySelectorAll(".btn__carousel");
// const slides = document.querySelectorAll(".slide__carousel");

// buttons.forEach((button) => {
//   button.addEventListener("click", (e) => {
//     const calcNextSlide = e.target.id === "next" ? 1 : -1;
//     const slideActive = document.querySelector(".active");

//     newIndex = calcNextSlide + [...slides].indexOf(slideActive);

//     if (newIndex < 0) newIndex = [...slides].length - 1;
//     if (newIndex >= [...slides].length) newIndex = 0;
//     slides[newIndex].classList.add("active");

//     slideActive.classList.remove("active");
//   });
// });

// // function pour changer les slides de façon automatique
// function autoSlide() {
//   const slideActive = document.querySelector(".active");
//   let newIndex = [...slides].indexOf(slideActive) + 1;
//   if (newIndex >= slides.length) newIndex = 0;
//   slides[newIndex].classList.add("active");
//   slideActive.classList.remove("active");
// }

// // Changer de slide toutes les 5 secondes (5000 millisecondes)
// setInterval(autoSlide, 5000);

// let btn_sidebar = document.querySelector("#sidebar__btn");
// let sidebar = document.querySelector(".user__sidebar");

// btn_sidebar.onclick = function () {
//   sidebar.classList.toggle("active");
// };

// =============================
// ==== GESTION EVENEMENTS =====
// =============================

// Gestion du formulaire d'événements

const eventCreateFormOverlayOpen = document.getElementById(
  "open__create-event-form"
);
const eventFormOverlay = document.getElementById("event__form-overlay");
const eventFormOverlayClose = document.getElementById("close__event-form");
const eventFormOverlayAnnul = document.getElementById(
  "button__annulation-event-form"
);
const eventForm = document.getElementById("event__form");

// overture du formulaire
function openEventForm(isEdit = false, eventID = null) {
  eventFormOverlay.classList.add("active");
  eventFormOverlay.setAttribute("aria-hidden", "false");
  // recuperation du premiere balise Input du formulaire et l'attribution de la valeure du event_id pour l'utilisation dans notre fonction plus tard
  if (isEdit) {
    eventFormOverlay.querySelector("input").value = eventID;
  }
  // Ecouter la touche Échap
  document.addEventListener("keydown", onEsc);
}

function AnnulEventForm(e) {
  e.preventDefault();
  eventForm.reset();
  eventFormOverlay.classList.remove("active");
  eventFormOverlay.setAttribute("aria-hidden", "true");
  document.removeEventListener("click", onEsc);
}

eventFormOverlayAnnul.addEventListener("click", AnnulEventForm);

function closeEventForm() {
  eventForm
    .querySelectorAll("input, textarea, select")
    .forEach((el) => (el.value = ""));
  deleteOptionChips();
  eventFormOverlay.classList.remove("active");
  eventFormOverlay.setAttribute("aria-hidden", "true");
  document.removeEventListener("click", onEsc);
}

// fermeture du formulaire en appuyant echape

function onEsc(e) {
  if (e.key === "Escape") {
    closeEventForm();
  }
}

eventFormOverlayClose.addEventListener("click", closeEventForm);

// création de la pré-sélection des options de liste déroullant pour le formulaire de modification
function selectDefaultOption(id, idSelect) {
  let idSelectQuerry = document.getElementById(idSelect);
  for (const option of idSelectQuerry.options) {
    if (option.value == id) {
      option.selected = true;
      break;
    }
  }
}

// Tri alphabétique des options après ajout
function trierOptionsSelect(select) {
  const options = Array.from(select.options);
  options.sort((a, b) => a.text.localeCompare(b.text));
  select.innerHTML = "";
  options.forEach((opt) => select.appendChild(opt));
}

// création de la pré-sélection des chips pour le formulaire de modification
function selectDefaultOptionChips(ids) {
  const idsArray = ids.split(",").map((id) => id.trim());
  const select = document.getElementById("event__team-selection");
  const chipsContainer = document.getElementById("event__chip-wrapper");

  idsArray.forEach((id) => {
    // transformation string en array
    const arrayOpt = Array.from(select.options);

    const option = arrayOpt.find((opt) => opt.value == id);

    if (!option) return;

    const value = option.value;
    const label = option.label;

    // Créer le chip et l’ajouter au conteneur

    const chip = document.createElement("div");
    chip.className = "event__chip";
    chip.dataset.value = value; // pour le retrouver plus tard

    const chipText = document.createElement("span");
    chipText.textContent = label;

    const btnRemove = document.createElement("button");
    btnRemove.type = "button";
    btnRemove.innerHTML = "&times;";
    btnRemove.title = "Supprimer"; // accesibilité

    const hiddenInput = document.createElement("input");
    hiddenInput.type = "hidden";
    hiddenInput.name = "teams_id[]";
    hiddenInput.value = value;
    chip.appendChild(hiddenInput);

    btnRemove.addEventListener("click", () => {
      // 3.1. Retirer le chip du DOM
      chipsContainer.removeChild(chip);

      // 3.2. Réinsérer l’option dans le mes options
      const newOption = document.createElement("option");
      newOption.value = value;
      newOption.textContent = label;
      select.appendChild(newOption);

      // trie des options dans l'ordre alphabitic
      trierOptionsSelect(select);
    });

    chip.appendChild(chipText);
    chip.appendChild(btnRemove);
    chipsContainer.appendChild(chip);

    select.removeChild(option);

    select.selectedIndex = 0;
  });
}

// nettoyage des chips en les effacant et construisant des options à la base de chips existantes

function deleteOptionChips() {
  const select = document.getElementById("event__team-selection");
  const chipsContainer = document.getElementById("event__chip-wrapper");
  const chips = document.querySelectorAll(".event__chip");

  chips.forEach((chip) => {
    const key = chip.dataset.value;
    const value = chip.querySelector("span")?.textContent.trim();

    if (key && value) {
      const newOption = document.createElement("option");
      newOption.value = key;
      newOption.textContent = value;
      select.appendChild(newOption);
    }
  });

  chipsContainer.innerHTML = "";
  trierOptionsSelect(select);
}

eventCreateFormOverlayOpen.addEventListener("click", openEventForm);

// Recuperation des valeurs de l'evenement grace au atribut data
document
  .querySelectorAll(".admin_event-table-field-modifier")
  .forEach((btn) => {
    btn.addEventListener("click", function (e) {
      e.preventDefault();

      const tr = this.closest("tr"); // La ligne de l'événement

      const eventId = tr.dataset.id;
      const eventDate = tr.dataset.date;
      const clubId = tr.dataset.clubId;
      const eventTypeId = tr.dataset.typeId;
      const capacity = tr.dataset.capacity;
      const teamsId = tr.dataset.teamsId;

      // Overture du formulaire et recuperation de la valeure du eventId
      openEventForm(true, eventId);
      // Set l'option du club d'événement par default
      selectDefaultOption(clubId, "event__club-selection");
      // Set l'option du type d'événement par default
      selectDefaultOption(eventTypeId, "event__type-selection");
      // Netoyage de valeurs
      // deleteOptionChips();
      // Set l'option des équipes d'événement par default
      selectDefaultOptionChips(teamsId);
      // Set l'option de capacité d'événement par default
      document.getElementById("event__capacity").value = capacity;
      // Set l'option de date d'événement par default
      document.getElementById("event__date").value = eventDate;
    });
  });

// Création des chips pour le formulaire d'événement

const teamSelectChoices = document.getElementById("event__team-selection");
const teamSelectChipsContainer = document.getElementById("event__chip-wrapper");

// Quand l’utilisateur choisit une option dans le <select>

teamSelectChoices.addEventListener("change", function () {
  const selectedOption = this.options[this.selectedIndex];
  const value = selectedOption.value;
  const label = selectedOption.text;

  if (!value) {
    // Option non valide
    return;
  }

  // 2. Créer le chip et l’ajouter au conteneur

  const chip = document.createElement("div");
  chip.className = "event__chip";
  chip.dataset.value = value; // pour le retrouver plus tard

  const chipText = document.createElement("span");
  chipText.textContent = label;

  const btnRemove = document.createElement("button");
  btnRemove.type = "button";
  btnRemove.innerHTML = "&times;";
  btnRemove.title = "Supprimer"; // accesibilité

  const hiddenInput = document.createElement("input");
  hiddenInput.type = "hidden";
  hiddenInput.name = "teams_id[]";
  hiddenInput.value = value;
  chip.appendChild(hiddenInput);

  btnRemove.addEventListener("click", () => {
    // 3.1. Retirer le chip du DOM
    teamSelectChipsContainer.removeChild(chip);

    // 3.2. Réinsérer l’option dans le mes options
    const newOption = document.createElement("option");
    newOption.value = value;
    newOption.textContent = label;
    teamSelectChoices.appendChild(newOption);
    trierOptionsSelect(teamSelectChoices);
  });

  chip.appendChild(chipText);
  chip.appendChild(btnRemove);
  teamSelectChipsContainer.appendChild(chip);

  teamSelectChoices.removeChild(selectedOption);

  teamSelectChoices.selectedIndex = 0;
});

async function submitEventForm(event) {
  event.preventDefault();

  const data = new FormData(event.target);
  const formData = [...data.entries()];
  let body = {};

  formData.forEach(([key, value]) => {
    if (body[key] == null) {
      body[key] = value;
    } else if (Array.isArray(body[key])) {
      body[key].push(value);
    } else {
      body[key] = [body[key], value];
    }
  });

  // verification si c'est la creation d'event ou modification en utilisant event_id
  if (body.event_id) {
    body.action = "modification";

    console.log(formData);
    console.log(body);

    const response = await fetch("index.php?page=eventManagement", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(body),
    });

    let status = await response.status;
    console.log(status);

    switch (status) {
      case 400:
        alert(
          "Un ou plusieurs champs du formulaire ne sont pas remplis correctement"
        );
        break;
      case 500:
        closeEventForm();
        location.reload();
        break;
      case 200:
        closeEventForm();
        // reload de la page pour montrer des changements dynamiquement
        location.reload();
        break;
      default:
        closeEventForm();
        alert("reponse inattendu");
    }
  } else {
    body.action = "creation";

    console.log(formData);
    console.log(body);

    const response = await fetch("index.php?page=eventManagement", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
      },
      body: JSON.stringify(body),
    });

    let status = await response.status;
    console.log(status);

    switch (status) {
      case 400:
        alert(
          "Un ou plusieurs champs du formulaire ne sont pas remplis correctement"
        );
        break;
      case 500:
        closeEventForm();
        location.reload();
        break;
      case 200:
        closeEventForm();
        // reload de la page pour montrer des changements dynamiquement
        location.reload();
        break;
      default:
        closeEventForm();
        alert("reponse inattendu");
    }
  }
}

// Formulaire de deletion d'événement

const eventDeletionFormOverlay = document.getElementById(
  "event-deletion__form-overlay"
);
const eventDeletionFormOverlayAnnul = document.getElementById(
  "button-annulation__deletion-event-form"
);
const eventDeletionForm = document.getElementById("event-deletion__form");

// overture du formulaire
function openEventDeletionForm(eventID) {
  eventDeletionFormOverlay.classList.add("active");
  eventDeletionFormOverlay.setAttribute("aria-hidden", "false");
  // recuperation du premiere balise Input du formulaire et l'attribution de la valeure du event_id pour l'utilisation dans notre fonction plus tard
  eventDeletionFormOverlay.querySelector("input").value = eventID;
}

function AnnulEventDeletionForm(e) {
  e.preventDefault();
  eventDeletionFormOverlay.classList.remove("active");
  eventDeletionFormOverlay.setAttribute("aria-hidden", "true");
}

eventDeletionFormOverlayAnnul.addEventListener("click", AnnulEventDeletionForm);

function closeEventDeletionForm() {
  eventDeletionFormOverlay.classList.remove("active");
  eventDeletionFormOverlay.setAttribute("aria-hidden", "true");
}

document.querySelectorAll(".admin_event-table-field-deleter").forEach((btn) => {
  btn.addEventListener("click", function (e) {
    e.preventDefault();

    const tr = this.closest("tr"); // La ligne de l'événement

    const eventId = tr.dataset.id;

    // Overture du formulaire et recuperation de la valeure du eventId
    openEventDeletionForm(eventId);
  });
});

async function submitEventDeletionForm(event) {
  event.preventDefault();

  const data = new FormData(event.target);
  const formData = [...data.entries()];
  let body = {};

  formData.forEach(([key, value]) => {
    if (body[key] == null) {
      body[key] = value;
    } else if (Array.isArray(body[key])) {
      body[key].push(value);
    } else {
      body[key] = [body[key], value];
    }
  });

  body.action = "deletion";

  console.log(formData);
  console.log(body);

  const response = await fetch("index.php?page=eventManagement", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(body),
  });

  let status = await response.status;
  console.log(status);

  switch (status) {
    case 400:
      alert(
        "Un ou plusieurs champs du formulaire ne sont pas remplis correctement"
      );
      break;
    case 500:
      closeEventDeletionForm();
      location.reload();
      break;
    case 200:
      closeEventDeletionForm();
      location.reload();
      break;
    default:
      closeEventDeletionForm();
      alert("reponse inattendu");
  }
}

const msg = document.getElementById("event__message-wrapper");

// Fonction de remove de flash messages
if (msg) {
  // remonter en haut de la page
  window.scrollTo({ top: 0, behavior: "smooth" });
  setTimeout(() => {
    msg.style.opacity = "0";
    msg.style.transition = "opacity 0.5s";
    setTimeout(() => msg.remove(), 500);
  }, 5000);
}
