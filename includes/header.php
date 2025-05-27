<header class="app-header fixed-top bg-white shadow-sm d-flex align-items-center px-3" style="height: 56px; z-index: 1050;">
  <!-- Burger Toggle -->
  <button id="sidebarToggle" class="btn  me-3 d-flex justify-content-center align-items-center shadow-sm" aria-label="Toggle sidebar" style="width: 40px; height: 40px;">
    <i class="bi bi-list" style="font-size: 1.25rem;"></i>
  </button>

  <!-- Spacer -->
  <div class="flex-grow-1"></div>

  <!-- Notification Bell -->
  <button class="btn position-relative me-3 p-0 border-0 bg-transparent text-muted" aria-label="Notifications">
    <i class="bi bi-bell fs-5"></i>
    <!-- Optional Badge -->
    <!-- <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">3</span> -->
  </button>

  <!-- User Dropdown -->
  <div class="dropdown">
    <a href="#" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false" class="d-flex align-items-center text-decoration-none text-dark">
      <i class="bi bi-person-circle fs-4 me-2"></i>
      <!-- Optional: Username -->
      <!-- <span class="fw-semibold d-none d-md-inline"><?php echo htmlspecialchars($_SESSION['user_name']); ?></span> -->
    </a>
    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0 mt-2" aria-labelledby="userDropdown" id="userDropdownMenu">
      <li>
        <a class="dropdown-item" href="profile.php">
          <i class="bi bi-person me-2"></i><?php echo htmlspecialchars($_SESSION['user_name']); ?>
        </a>
      </li>
      <li>
        <a class="dropdown-item" href="profile.php">
          <i class="bi bi-gear me-2"></i>Profile
        </a>
      </li>
      <li><hr class="dropdown-divider"></li>
      <li>
        <a class="dropdown-item text-danger" href="../../includes/logout.php">
          <i class="bi bi-box-arrow-right me-2"></i>Logout
        </a>
      </li>
    </ul>
  </div>
</header>

<style>
.app-header {
  top: 0;
  left: 230px; /* default sidebar width */
  right: 0;
  height: 56px;
  background-color: #ffffff;
  border-bottom: 1px solid #e2e8f0;
  transition: left 0.3s ease;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
}

.app-header.sidebar-collapsed {
  left: 70px;
}

.dropdown-menu a.dropdown-item:hover {
  background-color: #f1f5f9;
}

.btn-outline-secondary:hover {
  background-color: #e2e8f0;
  border-color: #cbd5e0;
}
</style>

<script>
document.addEventListener("DOMContentLoaded", () => {
  const sidebar = document.getElementById("sidebar");
  const mainContent = document.querySelector(".main-content") || document.body;
  const toggleBtn = document.getElementById("sidebarToggle");
  const header = document.querySelector(".app-header");

  if (localStorage.getItem("sidebarState") === "collapsed") {
    sidebar.classList.add("collapsed");
    mainContent.classList.add("expanded");
    header.classList.add("sidebar-collapsed");
  }

  toggleBtn.addEventListener("click", () => {
    const collapsed = sidebar.classList.toggle("collapsed");
    mainContent.classList.toggle("expanded");
    header.classList.toggle("sidebar-collapsed", collapsed);
    localStorage.setItem("sidebarState", collapsed ? "collapsed" : "expanded");
  });
});
</script>
