<script>
document.addEventListener("DOMContentLoaded", () => {
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.querySelector(".main-content") || document.body;
    const toggleBtn = document.createElement("button");

    toggleBtn.className = "toggle-btn";
    toggleBtn.innerHTML = "☰";
    toggleBtn.style = `
        position: fixed;
        left: ${sidebar.classList.contains("collapsed") ? "70px" : "230px"};
        top: 10px;
        background: transparent;
        border: none;
        color: #718096;
        font-size: 16px;
        cursor: pointer;
        transition: left 0.2s ease;
        z-index: 1001;
    `;
    document.body.appendChild(toggleBtn);

    if (localStorage.getItem("sidebarState") === "collapsed") {
        sidebar.classList.add("collapsed");
        mainContent.classList.add("expanded");
        toggleBtn.style.left = "70px";
    }

    toggleBtn.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
        mainContent.classList.toggle("expanded");
        toggleBtn.style.left = sidebar.classList.contains("collapsed") ? "70px" : "230px";

        localStorage.setItem("sidebarState", 
            sidebar.classList.contains("collapsed") ? "collapsed" : "expanded");
    });
});
</script>
