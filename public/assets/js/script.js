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

async function submitEventCreationForm(event) {
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
      closeEventCreationForm();
      document
        .getElementById("event__creation-message-wrapper")
        .classList.add("active");
      errorDBO = document.getElementById("500").classList.add("active");
      break;
    case 200:
      closeEventCreationForm();
      // il faut finir le reload pour que l'événement soit directement accessible dans mon tableau d'événement
      // location.reload();
      document
        .getElementById("event__creation-message-wrapper")
        .classList.add("active");
      document.getElementById("200").classList.add("active");
      break;
    default:
      closeEventCreationForm();
      alert("reponse inattendu");
  }
}

eventCreateFormOverlayOpen.addEventListener("click", openEventCreationForm);

function closeEventCreationForm() {
  eventCreateFormOverlay.classList.remove("active");
  eventCreateFormOverlay.setAttribute("aria-hidden", "true");
  document.removeEventListener("click", onEsc);
}

eventCreateFormOverlayClose.addEventListener("click", closeEventCreationForm);

// fermeture du formulaire en appuyant echape

function onEsc(e) {
  if (e.key === "Escape") {
    closeEventCreationForm();
  }
}

// === Gestion des chips du champ de selection d'equipes ===

const teamSelectChoices = document.getElementById(
  "creation-event-team-selection"
);
const teamSelectChipsContainer = document.getElementById(
  "event-creation__chip-wrapper"
);

// 1. Quand l’utilisateur choisit une option dans le <select>

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
  chip.className = "event-creation__chip";
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
  });

  chip.appendChild(chipText);
  chip.appendChild(btnRemove);
  teamSelectChipsContainer.appendChild(chip);

  teamSelectChoices.removeChild(selectedOption);

  teamSelectChoices.selectedIndex = 0;
});

// Formulaire de modification d'événement

const eventModificationFormOverlay = document.getElementById(
  "event-modification__form-overlay"
);
const eventModificationFormOverlayOpen = document.getElementById(
  "admin_event-table-field-modifier"
);
const eventModificationFormOverlayClose = document.getElementById(
  "close__modification-event-form"
);
const eventModificationForm = document.getElementById(
  "event-modification__form"
);

// overture du formulaire
function openEventModificationForm() {
  eventModificationFormOverlay.classList.add("active");
  eventModificationFormOverlay.setAttribute("aria-hidden", "false");
  // Ecouter la touche Échap
  document.addEventListener("keydown", onEsc);
}

// eventModificationFormOverlayOpen.addEventListener(
//   "click",
//   openEventModificationForm
//   // selectDefaultOption(clubId, "modification-event-club-selection")
// );

function closeEventModificationForm() {
  eventModificationFormOverlay.classList.remove("active");
  eventModificationFormOverlay.setAttribute("aria-hidden", "true");
  document.removeEventListener("click", onEsc);
}

eventModificationFormOverlayClose.addEventListener(
  "click",
  closeEventModificationForm
);

// fermeture du formulaire en appuyant echape

function onEsc(e) {
  if (e.key === "Escape") {
    closeEventModificationForm();
  }
}
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
// création de la pré-sélection des chips pour le formulaire de modification
function selectDefaultOptionChips(ids) {
  // const idsArray = ids.split();
  // const idsArray = ids;
  console.log(ids);
  const Select = document.getElementById("modification-event-team-selection");
  const ChipsContainer = document.getElementById(
    "event-modification__chip-wrapper"
  );

  ids.forEach((id) => {
    const arrayOpt = Array.from(Select.options);
    const option = arrayOpt.find((opt) => opt.value == id);

    console.log(id);
    console.log(arrayOpt);

    console.log(option);
    if (!option) return;
    console.log(id);

    const value = option.value;
    const label = option.label;

    // Créer le chip et l’ajouter au conteneur

    const chip = document.createElement("div");
    chip.className = "event-modification__chip";
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
      ChipsContainer.removeChild(chip);

      // 3.2. Réinsérer l’option dans le mes options
      const newOption = document.createElement("option");
      newOption.value = value;
      newOption.textContent = label;
      Select.appendChild(newOption);
    });

    chip.appendChild(chipText);
    chip.appendChild(btnRemove);
    ChipsContainer.appendChild(chip);

    Select.removeChild(option);

    Select.selectedIndex = 0;
  });
}

// Recuperation des valeurs de l'evenement grace au atribut data
document
  .querySelectorAll(".admin_event-table-field-modifier")
  .forEach((btn) => {
    btn.addEventListener("click", function (e) {
      // e.preventDefault();
      openEventModificationForm();
      const tr = this.closest("tr"); // La ligne de l'événement

      const eventId = tr.dataset.id;
      const eventDate = tr.dataset.date;
      const clubId = tr.dataset.clubId;
      const clubName = tr.dataset.clubName;
      const eventTypeId = tr.dataset.typeId;
      const eventTypeName = tr.dataset.typeName;
      const capacity = tr.dataset.capacity;
      const teamsId = tr.dataset.teamsId;
      const teamsName = tr.dataset.teamsName;

      let teamsIdArray = teamsId.split(",").map((id) => id.trim());

      // Set l'option du club d'événement par default
      selectDefaultOption(clubId, "modification-event-club-selection");
      // Set l'option du type d'événement par default
      selectDefaultOption(
        eventTypeId,
        "modification-event-event_type-selection"
      );
      // Set l'option des équipes d'événement par default
      selectDefaultOptionChips(teamsIdArray);
      // Set l'option de capacité d'événement par default
      document.getElementById("modification-event-event_capacity").value =
        capacity;
      // Set l'option de date d'événement par default
      document.getElementById("modification-event-event_date").value =
        eventDate;
    });
  });

// Création des chips

const modificationTeamSelectChoices = document.getElementById(
  "modification-event-team-selection"
);
const modificationTeamSelectChipsContainer = document.getElementById(
  "event-modification__chip-wrapper"
);

// 1. Quand l’utilisateur choisit une option dans le <select>

modificationTeamSelectChoices.addEventListener("change", function () {
  const selectedOption = this.options[this.selectedIndex];
  const value = selectedOption.value;
  const label = selectedOption.text;

  if (!value) {
    // Option non valide
    return;
  }

  // 2. Créer le chip et l’ajouter au conteneur

  const chip = document.createElement("div");
  chip.className = "event-modification__chip";
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
    modificationTeamSelectChipsContainer.removeChild(chip);

    // 3.2. Réinsérer l’option dans le mes options
    const newOption = document.createElement("option");
    newOption.value = value;
    newOption.textContent = label;
    modificationTeamSelectChoices.appendChild(newOption);
  });

  chip.appendChild(chipText);
  chip.appendChild(btnRemove);
  modificationTeamSelectChipsContainer.appendChild(chip);

  modificationTeamSelectChoices.removeChild(selectedOption);

  modificationTeamSelectChoices.selectedIndex = 0;
});
