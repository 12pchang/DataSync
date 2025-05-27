  const allParticipants = [
    {
      rank: 1,
      name: "Ronalyn Molera",
      scores: [98, 97.5, 97],
      total: 292.5,
      average: 97.5,
      status: "top-1",
    },
    {
      rank: 2,
      name: "Sophia Santos",
      scores: [95, 94, 96],
      total: 285,
      average: 95.0,
      status: "top-2",
    },
    {
      rank: 3,
      name: "Maria Clara",
      scores: [93, 92.5, 93],
      total: 278.5,
      average: 92.8,
      status: "top-3",
    },
    {
      rank: 4,
      name: "Ella Loresca",
      scores: [88, 90, 89],
      total: 267,
      average: 89.0,
      status: "top-4",
    },
    {
      rank: 5,
      name: "John Ricardo",
      scores: [87, 86, 88],
      total: 261,
      average: 87.0,
      status: "top-5",
    },
  ]
  
  document.addEventListener("DOMContentLoaded", () => {
    const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    if (window.bootstrap) {
      tooltipTriggerList.map((tooltipTriggerEl) => new bootstrap.Tooltip(tooltipTriggerEl))
    }
  
    const filterBtn = document.querySelector(".filter-btn")
    filterBtn.addEventListener("click", () => {
      const filterModal = new bootstrap.Modal(document.getElementById("filterModal"))
      filterModal.show()
    })
  
    const scoreRangeFilter = document.getElementById("scoreRangeFilter")
    const scoreValue = document.getElementById("scoreValue")
  
    scoreRangeFilter.addEventListener("input", function () {
      scoreValue.textContent = this.value
    })
  
    const applyFilterBtn = document.getElementById("applyFilterBtn")
    applyFilterBtn.addEventListener("click", () => {
      const bootstrap = window.bootstrap
      const filterModal = bootstrap.Modal.getInstance(document.getElementById("filterModal"))
      filterModal.hide()
  
      const category = document.getElementById("categoryFilter").value
      const judge = document.getElementById("judgeFilter").value
      const minScore = document.getElementById("scoreRangeFilter").value
  
      showLoadingState()
  
      setTimeout(() => {
        updateTable(category, judge, minScore)
  
        showToast("Filters applied successfully!", "success")
      }, 800)
    })
  
    // Export PDF button
    document.getElementById("exportPdfBtn").addEventListener("click", () => {
      exportToPDF()
    })
  
    // Export Excel button
    document.getElementById("exportExcelBtn").addEventListener("click", () => {
      exportToExcel()
    })
  
    // Print button
    document.getElementById("printBtn").addEventListener("click", () => {
      showToast("Preparing print view...", "info")
  
      // Simulate print preparation
      setTimeout(() => {
        window.print()
      }, 1000)
    })
  
    const searchInput = document.querySelector(".search-input")
    searchInput.addEventListener("input", function () {
      const searchTerm = this.value.toLowerCase()
  
      let filteredParticipants = allParticipants
  
      if (searchTerm.length > 0) {
        filteredParticipants = allParticipants.filter((participant) => {
          const name = participant.name.toLowerCase()
          return name.includes(searchTerm) || (searchTerm.length === 1 && name.charAt(0) === searchTerm)
        })
      }
  
      displayFilteredResults(filteredParticipants, searchTerm)
    })
  
    document.getElementById("addReportBtn").addEventListener("click", () => {
      showToast("Redirecting to report generation page...", "info")
  
      setTimeout(() => {
        showToast("This feature is coming soon!", "warning")
      }, 1500)
    })
  
    const menuToggle = document.querySelector(".menu-toggle")
    if (menuToggle) {
      menuToggle.addEventListener("click", () => {
        const sidebar = document.querySelector(".sidebar")
        const mainContent = document.querySelector(".main-content")
  
        if (sidebar.style.width === "250px" || !sidebar.style.width) {
          sidebar.style.width = "70px"
          mainContent.style.marginLeft = "70px"
  
          document.querySelector(".app-name").style.display = "none"
          document.querySelectorAll(".menu-item span").forEach((span) => {
            span.style.display = "none"
          })
          document.querySelectorAll(".menu-item").forEach((item) => {
            item.style.justifyContent = "center"
            item.style.padding = "12px"
          })
  
          document.querySelectorAll(".menu-item i").forEach((icon) => {
            icon.style.marginRight = "0"
          })
        } else {
          sidebar.style.width = "250px"
          mainContent.style.marginLeft = "250px"
  
          document.querySelector(".app-name").style.display = "block"
          document.querySelectorAll(".menu-item span").forEach((span) => {
            span.style.display = "block"
          })
  
          document.querySelectorAll(".menu-item").forEach((item) => {
            item.style.justifyContent = "flex-start"
            item.style.padding = "12px 15px"
          })
  
          document.querySelectorAll(".menu-item i").forEach((icon) => {
            icon.style.marginRight = "10px"
          })
        }
      })
    }
  })
  
  function displayFilteredResults(filteredParticipants, searchTerm) {
    const tbody = document.querySelector("tbody")
    tbody.innerHTML = ""
  
    if (filteredParticipants.length === 0) {
      const noResultsRow = document.createElement("tr")
      noResultsRow.id = "noResultsRow"
      noResultsRow.innerHTML = `
        <td colspan="8" class="text-center py-4">
          <i class="bi bi-search" style="font-size: 2rem; color: #dee2e6;"></i>
          <p class="mt-2 mb-0">No participants found matching "${searchTerm}"</p>
        </td>
      `
      tbody.appendChild(noResultsRow)
      document.querySelector(".pagination-info").textContent = `No participants found`
    } else {
      filteredParticipants.forEach((item) => {
        const row = document.createElement("tr")
        row.innerHTML = `
          <td>${item.rank}</td>
          <td>${item.name}</td>
          <td>${item.scores[0]}</td>
          <td>${item.scores[1]}</td>
          <td>${item.scores[2]}</td>
          <td>${item.total}</td>
          <td>${item.average}</td>
          <td><span class="status-badge ${item.status}">${getStatusText(item.status)}</span></td>
        `
        tbody.appendChild(row)
      })
  
      document.querySelector(".pagination-info").textContent =
        `Showing ${filteredParticipants.length} of 5 participants ${searchTerm ? "(filtered)" : ""}`
    }
  }
  function showLoadingState() {
    const tbody = document.querySelector("tbody")
    tbody.innerHTML = `
      <tr>
        <td colspan="8" class="text-center py-5">
          <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
          </div>
          <p class="mt-3 mb-0">Loading results...</p>
        </td>
      </tr>
    `
  }
  
  function resetTable() {
    updateTableWithData(allParticipants)
  
    document.querySelector(".pagination-info").textContent = `Showing all 5 participants`
  }
  
  function updateTable(category, judge, minScore) {
    resetTable()
  
    let filterInfo = "Filters applied: "
    if (category !== "all") filterInfo += `Category: ${category}, `
    if (judge !== "all") filterInfo += `Judge: ${judge}, `
    filterInfo += `Min Score: ${minScore}`
  
    showToast(filterInfo, "info")
  }
  function updateTableWithData(data) {
    const tbody = document.querySelector("tbody")
    tbody.innerHTML = ""
  
    data.forEach((item) => {
      const row = document.createElement("tr")
  
      row.innerHTML = `
        <td>${item.rank}</td>
        <td>${item.name}</td>
        <td>${item.scores[0]}</td>
        <td>${item.scores[1]}</td>
        <td>${item.scores[2]}</td>
        <td>${item.total}</td>
        <td>${item.average}</td>
        <td><span class="status-badge ${item.status}">${getStatusText(item.status)}</span></td>
      `
  
      tbody.appendChild(row)
    })
  }
  
  function getStatusText(status) {
    switch (status) {
      case "top-1":
        return "Top 1"
      case "top-2":
        return "Top 2"
            case "top-3":
        return "Top 3"
            case "top-4":
        return "Top 4"
      case "top-5":
        return "Top 5"
      default:
        return "-"
    }
  }
  
  function showToast(message, type = "info") {
  
    let toastContainer = document.querySelector(".toast-container")
    if (!toastContainer) {
      toastContainer = document.createElement("div")
      toastContainer.className = "toast-container position-fixed bottom-0 end-0 p-3"
      document.body.appendChild(toastContainer)
    }
  
    const toastEl = document.createElement("div")
    toastEl.className = `toast align-items-center text-white bg-${type} border-0`
    toastEl.setAttribute("role", "alert")
    toastEl.setAttribute("aria-live", "assertive")
    toastEl.setAttribute("aria-atomic", "true")
  
    toastEl.innerHTML = `
      <div class="d-flex">
        <div class="toast-body">
          ${message}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
      </div>
    `
  
    toastContainer.appendChild(toastEl)
  
    const bootstrap = window.bootstrap
    const toast = new bootstrap.Toast(toastEl, { autohide: true, delay: 3000 })
    toast.show()
  
    toastEl.addEventListener("hidden.bs.toast", () => {
      toastEl.remove()
    })
  }
  
  function exportToPDF() {
    showToast("Generating PDF report...", "info")
  
    setTimeout(() => {
      try {
        const { jsPDF } = window.jspdf
        const doc = new jsPDF()
  
        doc.setFontSize(18)
        doc.text("Tabulation Report", 14, 22)
  
        doc.setFontSize(12)
        doc.text("Mr. & Ms. STI College Alabang 2025", 14, 30)
  
        const today = new Date()
        doc.setFontSize(10)
        doc.text(`Generated on: ${today.toLocaleDateString()} ${today.toLocaleTimeString()}`, 14, 38)
  
    
        const tableColumn = ["Rank", "Name", "Judge 1", "Judge 2", "Judge 3", "Total", "Average", "Status"]
        const tableRows = []
  
        allParticipants.forEach((participant) => {
          const status = getStatusText(participant.status)
          const participantData = [
            participant.rank,
            participant.name,
            participant.scores[0],
            participant.scores[1],
            participant.scores[2],
            participant.total,
            participant.average,
            status,
          ]
          tableRows.push(participantData)
        })
  
        doc.autoTable({
          head: [tableColumn],
          body: tableRows,
          startY: 45,
          theme: "grid",
          styles: {
            fontSize: 9,
            cellPadding: 3,
          },
          headStyles: {
            fillColor: [41, 128, 185],
            textColor: 255,
            fontStyle: "bold",
          },
          alternateRowStyles: {
            fillColor: [240, 240, 240],
          },
        })
  
        doc.save("tabulation-report.pdf")
  
        showToast("PDF report generated successfully!", "success")
      } catch (error) {
        console.error("PDF generation error:", error)
        showToast("Error generating PDF. Please try again.", "danger")
      }
    }, 1000)
  }
  
  function exportToExcel() {
    showToast("Generating Excel report...", "info")
  
    setTimeout(() => {
      try {
        const XLSX = window.XLSX
  
        if (typeof XLSX === "undefined") {
          showToast("XLSX library is not loaded. Please ensure it is included in your HTML.", "danger")
          return
        }
  
        const wsData = [
          ["Tabulation Report - Mr. & Ms. STI College Alabang 2025"],
          ["Generated on: " + new Date().toLocaleString()],
          [],
          ["Rank", "Name", "Judge 1", "Judge 2", "Judge 3", "Total Score", "Average", "Status"],
        ]
        allParticipants.forEach((participant) => {
          const status = getStatusText(participant.status)
          wsData.push([
            participant.rank,
            participant.name,
            participant.scores[0],
            participant.scores[1],
            participant.scores[2],
            participant.total,
            participant.average,
            status,
          ])
        })
  
        const ws = XLSX.utils.aoa_to_sheet(wsData)
  
        const colWidths = [
          { wch: 5 }, // Rank
          { wch: 20 }, // Name
          { wch: 10 }, // Judge 1
          { wch: 10 }, // Judge 2
          { wch: 10 }, // Judge 3
          { wch: 12 }, // Total Score
          { wch: 10 }, // Average
          { wch: 10 }, // Status
        ]
        ws["!cols"] = colWidths
  
        const wb = XLSX.utils.book_new()
        XLSX.utils.book_append_sheet(wb, ws, "Tabulation Report")
  
        XLSX.writeFile(wb, "tabulation-report.xlsx")
  
        showToast("Excel report generated successfully!", "success")
      } catch (error) {
        console.error("Excel generation error:", error)
        showToast("Error generating Excel. Please try again.", "danger")
      }
    }, 1000)
  }
  