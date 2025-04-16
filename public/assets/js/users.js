document.addEventListener("DOMContentLoaded", () => {
    const sidebarToggle = document.getElementById("sidebarToggle");
    const sidebar = document.getElementById("sidebar");
    const mainContent = document.getElementById("mainContent");
  
    if (sidebarToggle && sidebar && mainContent) {
      sidebarToggle.addEventListener("click", () => {
        sidebar.classList.toggle("collapsed");
        mainContent.classList.toggle("expanded");
      });
    }
  
    // Sample users data
    const usersData = [
      {
        id: 1,
        name: "Admin User",
        email: "admin@example.com",
        role: "Admin",
        status: "Active",
        lastLogin: "2023-03-28 09:15:22"
      },
      {
        id: 2,
        name: "Judge",
        email: "judge1@example.com",
        role: "Judge",
        status: "Active",
        lastLogin: "2023-03-27 14:30:45"
      },
      {
        id: 3,
        name: "Judge",
        email: "judge2@example.com",
        role: "Judge",
        status: "Active",
        lastLogin: "2023-03-26 10:20:15"
      },
      {
        id: 4,
        name: "Judge",
        email: "score@example.com",
        role: "Judge",
        status: "Inactive",
        lastLogin: "2023-03-25 16:45:30"
      },
      {
        id: 5,
        name: "Admin",
        email: "viewer@example.com",
        role: "Admin",
        status: "Active",
        lastLogin: "2023-03-20 11:10:05"
      }
    ];
  
    let filteredUsers = [...usersData];
  
    // Render users table
    function renderUsersTable() {
      const tableBody = document.getElementById("usersTableBody");
      tableBody.innerHTML = "";
  
      filteredUsers.forEach((user) => {
        const row = document.createElement("tr");
        const formattedDate = new Date(user.lastLogin).toLocaleString();
        
        let statusBadgeClass = "bg-success";
        if (user.status === "Inactive") {
          statusBadgeClass = "bg-danger";
        }
        
        row.innerHTML = `
          <td>${user.name}</td>
          <td>${user.email}</td>
          <td>${user.role}</td>
          <td><span class="badge ${statusBadgeClass}">${user.status}</span></td>
          <td>${formattedDate}</td>
          <td>
            <div class="d-flex gap-2">
              <button class="btn btn-sm btn-outline-primary edit-user-btn" data-id="${user.id}">
                <i class="bi bi-pencil"></i>
              </button>
              <button class="btn btn-sm btn-outline-danger delete-user-btn" data-id="${user.id}">
                <i class="bi bi-trash"></i>
              </button>
            </div>
          </td>
        `;
        tableBody.appendChild(row);
      });
  
      // Add event listeners to edit and delete buttons
      document.querySelectorAll(".edit-user-btn").forEach((button) => {
        button.addEventListener("click", function() {
          const userId = parseInt(this.getAttribute("data-id"));
          const user = usersData.find(u => u.id === userId);
          if (user) {
            alert(`Edit user: ${user.name}`);
          }
        });
      });
  
      document.querySelectorAll(".delete-user-btn").forEach((button) => {
        button.addEventListener("click", function() {
          const userId = parseInt(this.getAttribute("data-id"));
          const user = usersData.find(u => u.id === userId);
          if (user && confirm(`Are you sure you want to delete user: ${user.name}?`)) {
            const index = usersData.findIndex(u => u.id === userId);
            if (index !== -1) {
              usersData.splice(index, 1);
              applyFilters();
              renderUsersTable();
            }
          }
        });
      });
    }

    function applyFilters() {
      const roleFilter = document.getElementById("filterRole").value;
      const statusFilter = document.getElementById("filterStatus").value;
      const searchTerm = document.getElementById("searchUsers").value.toLowerCase();
      
      filteredUsers = usersData.filter((user) => {
        if (roleFilter && user.role !== roleFilter) {
          return false;
        }
        if (statusFilter && user.status !== statusFilter) {
          return false;
        }
        if (
          searchTerm &&
          !user.name.toLowerCase().includes(searchTerm) &&
          !user.email.toLowerCase().includes(searchTerm) &&
          !user.role.toLowerCase().includes(searchTerm)
        ) {
          return false;
        }
        return true;
      });
    }
  

    function validateName(name) {

      return !/\d/.test(name);
    }
    
    function validateEmail(email) {

      const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
      return emailRegex.test(email);
    }
    
    function validatePassword(password) {
  
      return password.length >= 8;
    }
    
    function validatePasswordMatch(password, confirmPassword) {
      return password === confirmPassword;
    }
  
    const nameInput = document.getElementById("userName");
    if (nameInput) {
      nameInput.addEventListener("input", function() {
        const isValid = validateName(this.value);
        if (!isValid && this.value.trim() !== "") {
          this.classList.add("is-invalid");
          this.nextElementSibling.style.display = "block";
        } else {
          this.classList.remove("is-invalid");
          this.nextElementSibling.style.display = "none";
        }
      });
    }
    
    const emailInput = document.getElementById("userEmail");
    if (emailInput) {
      emailInput.addEventListener("input", function() {
        const isValid = validateEmail(this.value);
        if (!isValid && this.value.trim() !== "") {
          this.classList.add("is-invalid");
          this.nextElementSibling.style.display = "block";
        } else {
          this.classList.remove("is-invalid");
          this.nextElementSibling.style.display = "none";
        }
      });
    }
    
    const passwordInput = document.getElementById("userPassword");
    const confirmPasswordInput = document.getElementById("userConfirmPassword");
    
    if (passwordInput) {
      passwordInput.addEventListener("input", function() {
        const isValid = validatePassword(this.value);
        if (!isValid && this.value.trim() !== "") {
          this.classList.add("is-invalid");
          this.nextElementSibling.style.display = "block";
        } else {
          this.classList.remove("is-invalid");
          this.nextElementSibling.style.display = "none";
        }
        
        if (confirmPasswordInput.value.trim() !== "") {
          const passwordsMatch = validatePasswordMatch(this.value, confirmPasswordInput.value);
          if (!passwordsMatch) {
            confirmPasswordInput.classList.add("is-invalid");
            confirmPasswordInput.nextElementSibling.style.display = "block";
          } else {
            confirmPasswordInput.classList.remove("is-invalid");
            confirmPasswordInput.nextElementSibling.style.display = "none";
          }
        }
      });
    }
    
    if (confirmPasswordInput) {
      confirmPasswordInput.addEventListener("input", function() {
        const passwordsMatch = validatePasswordMatch(passwordInput.value, this.value);
        if (!passwordsMatch && this.value.trim() !== "") {
          this.classList.add("is-invalid");
          this.nextElementSibling.style.display = "block";
        } else {
          this.classList.remove("is-invalid");
          this.nextElementSibling.style.display = "none";
        }
      });
    }
  
    const addUserBtn = document.getElementById("addUserBtn");
    if (addUserBtn) {
      addUserBtn.addEventListener("click", () => {
        document.getElementById("userName").value = "";
        document.getElementById("userEmail").value = "";
        document.getElementById("userRole").value = "";
        document.getElementById("userPassword").value = "";
        document.getElementById("userConfirmPassword").value = "";
        
        document.getElementById("userName").classList.remove("is-invalid");
        document.getElementById("userEmail").classList.remove("is-invalid");
        document.getElementById("userPassword").classList.remove("is-invalid");
        document.getElementById("userConfirmPassword").classList.remove("is-invalid");
        
        document.getElementById("userName").nextElementSibling.style.display = "none";
        document.getElementById("userEmail").nextElementSibling.style.display = "none";
        document.getElementById("userPassword").nextElementSibling.style.display = "none";
        document.getElementById("userConfirmPassword").nextElementSibling.style.display = "none";
        
        const addUserModal = new bootstrap.Modal(document.getElementById("addUserModal"));
        addUserModal.show();
      });
    }
  
    const saveUserBtn = document.getElementById("saveUserBtn");
    if (saveUserBtn) {
      saveUserBtn.addEventListener("click", () => {
        const name = document.getElementById("userName").value.trim();
        const email = document.getElementById("userEmail").value.trim();
        const role = document.getElementById("userRole").value;
        const password = document.getElementById("userPassword").value;
        const confirmPassword = document.getElementById("userConfirmPassword").value;
        
        let isValid = true;
        
        if (name === "") {
          alert("Please enter a name");
          return;
        }
        
        if (!validateName(name)) {
          document.getElementById("userName").classList.add("is-invalid");
          document.getElementById("userName").nextElementSibling.style.display = "block";
          isValid = false;
        }
        
        if (email === "") {
          alert("Please enter an email address");
          return;
        }
        
        if (!validateEmail(email)) {
          document.getElementById("userEmail").classList.add("is-invalid");
          document.getElementById("userEmail").nextElementSibling.style.display = "block";
          isValid = false;
        }
        
        if (role === "") {
          alert("Please select a role");
          return;
        }
        
        if (password === "") {
          alert("Please enter a password");
          return;
        }
        
        if (!validatePassword(password)) {
          document.getElementById("userPassword").classList.add("is-invalid");
          document.getElementById("userPassword").nextElementSibling.style.display = "block";
          isValid = false;
        }
        
        if (confirmPassword === "") {
          alert("Please confirm your password");
          return;
        }
        
        if (!validatePasswordMatch(password, confirmPassword)) {
          document.getElementById("userConfirmPassword").classList.add("is-invalid");
          document.getElementById("userConfirmPassword").nextElementSibling.style.display = "block";
          isValid = false;
        }
        
        if (!isValid) {
          return;
        }
        
        const newUser = {
          id: usersData.length > 0 ? Math.max(...usersData.map(u => u.id)) + 1 : 1,
          name,
          email,
          role,
          status: "Active",
          lastLogin: new Date().toISOString()
        };
        
        usersData.push(newUser);
        applyFilters();
        renderUsersTable();
        
        const addUserModalElement = document.getElementById("addUserModal");
        const addUserModal = bootstrap.Modal.getInstance(addUserModalElement);
        addUserModal.hide();
      });
    }
  
    const filterUsersBtn = document.getElementById("filterUsersBtn");
    if (filterUsersBtn) {
      filterUsersBtn.addEventListener("click", () => {
        const filterUsersModal = new bootstrap.Modal(document.getElementById("filterUsersModal"));
        filterUsersModal.show();
      });
    }

    const applyUserFilterBtn = document.getElementById("applyUserFilterBtn");
    if (applyUserFilterBtn) {
      applyUserFilterBtn.addEventListener("click", () => {
        applyFilters();
        renderUsersTable();
        
        const filterUsersModalElement = document.getElementById("filterUsersModal");
        const filterUsersModal = bootstrap.Modal.getInstance(filterUsersModalElement);
        filterUsersModal.hide();
      });
    }

    const searchInput = document.getElementById("searchUsers");
    if (searchInput) {
      searchInput.addEventListener("input", () => {
        applyFilters();
        renderUsersTable();
      });
    }

    renderUsersTable();
  });