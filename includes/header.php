

<header class="app-header">
  <div class="position-absolute top-0 end-0"> <!-- Add a container for the header content -->
    <nav class="navbar navbar-expand-lg navbar-light ">
      <div class="container-fluid d-flex justify-content-between w-100"> <!-- Ensures full width and flexbox layout -->

        <div class="dropdown ms-auto"> 
          <a href="#" class="d-flex align-items-center text-decoration-none " id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
            <i class="bi bi-person-circle fs-4 me-2"></i>
            <!-- The username is now non-clickable -->
          </a>
          <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
            <li><a class="dropdown-item" href="profile.php"><?php echo htmlspecialchars($_SESSION['user_name']); ?></a></li>
            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="../../includes/logout.php">Logout</a></li>
          </ul>
        </div>
      
    </nav>
  </div>
</header>



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
