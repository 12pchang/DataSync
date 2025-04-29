document.addEventListener("DOMContentLoaded", () => {
  const addRoundBtn = document.querySelector(".add-round-btn")
  const addAnotherRoundBtn = document.querySelector(".btn-add-another")
  const roundsContainer = document.getElementById("rounds-container")


  const sidebarToggle = document.getElementById("sidebarToggle")
  const sidebar = document.getElementById("sidebar")
  const mainContent = document.getElementById("mainContent")

  if (sidebarToggle && sidebar && mainContent) {
    sidebarToggle.addEventListener("click", () => {
      sidebar.classList.toggle("collapsed")
      mainContent.classList.toggle("expanded")
    })
  }

  function createRoundCard(title = "New Round", description = "", date = "", weight = "") {
    const roundCard = document.createElement("div")
    roundCard.className = "round-card mb-3"

    let detailsHtml = ""
    if (date || weight) {
      detailsHtml = `<p class="round-details mb-0"><strong>Date:</strong> ${date} | <strong>Weight:</strong> ${weight}</p>`
    }

    roundCard.innerHTML = `
        <div class="round-content">
          <div>
            <h4 class="round-title">${title}</h4>
            ${description ? `<p class="round-description mb-1">${description}</p>` : ""}
            ${detailsHtml}
          </div>
          <div class="round-actions">
            <button class="btn btn-sm btn-edit">Edit</button>
            <button class="btn btn-sm btn-delete">Delete</button>
          </div>
        </div>
      `

    const deleteBtn = roundCard.querySelector(".btn-delete")
    deleteBtn.addEventListener("click", () => {
      if (confirm("Are you sure you want to delete this round?")) {
        roundCard.remove()
      }
    })

    const editBtn = roundCard.querySelector(".btn-edit")
    editBtn.addEventListener("click", () => {
      alert("Dito pupunta yung modal for edit round")
    })

    return roundCard
  }

  if (addRoundBtn) {
    addRoundBtn.addEventListener("click", () => {
      const newRound = createRoundCard()
      roundsContainer.appendChild(newRound)
    })
  }
  if (addAnotherRoundBtn) {
    addAnotherRoundBtn.addEventListener("click", () => {
      const newRound = createRoundCard()
      roundsContainer.appendChild(newRound)
    })
  }
  document.querySelectorAll(".btn-delete").forEach((button) => {
    button.addEventListener("click", function () {
      const roundCard = this.closest(".round-card")
      if (confirm("Are you sure you want to delete this round?")) {
        roundCard.remove()
      }
    })
  })
  document.querySelectorAll(".btn-edit").forEach((button) => {
    button.addEventListener("click", () => {
      alert("Dito pupunta yung modal for edit round")
    })
  })
})

