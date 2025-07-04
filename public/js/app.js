// API Base URL (sesuaikan dengan URL API Anda)
const API_BASE_URL = "http://localhost:8000/api/users";

// Form dan elemen DOM
const userForm = document.getElementById("userForm");
const userTableBody = document.getElementById("userTableBody");
const formError = document.getElementById("formError");
const nameInput = document.getElementById("name");
const emailInput = document.getElementById("email");
const ageInput = document.getElementById("age");
const userIdInput = document.getElementById("userId");

// Validasi email
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(String(email).toLowerCase());
}

// Validasi form
function validateForm() {
    let isValid = true;
    formError.textContent = "";

    // Validasi nama
    if (!nameInput.value.trim()) {
        formError.textContent = "Name is required";
        isValid = false;
    }

    // Validasi email
    if (!emailInput.value.trim()) {
        formError.textContent = "Email is required";
        isValid = false;
    } else if (!validateEmail(emailInput.value)) {
        formError.textContent = "Invalid email format";
        isValid = false;
    }

    // Validasi umur
    if (!ageInput.value) {
        formError.textContent = "Age is required";
        isValid = false;
    } else if (ageInput.value < 0 || ageInput.value > 120) {
        formError.textContent = "Age must be between 0 and 120";
        isValid = false;
    }

    return isValid;
}

// Fetch users
async function fetchUsers() {
    try {
        const response = await fetch(API_BASE_URL);
        const result = await response.json();

        if (result.success) {
            userTableBody.innerHTML = "";
            result.data.forEach((user) => {
                const row = `
                <tr>
                    <td>${user.name}</td>
                    <td>${user.email}</td>
                    <td>${user.age}</td>
                    <td>
                        <button onclick="editUser('${user.id}')" class="btn btn-edit">Edit</button>
                        <button onclick="deleteUser('${user.id}')" class="btn btn-delete">Delete</button>
                    </td>
                </tr>
            `;
                userTableBody.innerHTML += row;
            });
        }
    } catch (error) {
        console.error("Error fetching users:", error);
        formError.textContent = "Failed to fetch users";
    }
}

// Submit user form
userForm.addEventListener("submit", async (e) => {
    e.preventDefault();

    // Validasi form
    if (!validateForm()) return;

    const userId = userIdInput.value;
    const userData = {
        name: nameInput.value,
        email: emailInput.value,
        age: ageInput.value,
    };

    try {
        const url = userId ? `${API_BASE_URL}/${userId}` : API_BASE_URL;
        const method = userId ? "PUT" : "POST";

        const response = await fetch(url, {
            method,
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify(userData),
        });

        const result = await response.json();

        if (result.success) {
            // Reset form
            userForm.reset();
            userIdInput.value = "";

            // Refresh user list
            fetchUsers();
        } else {
            // Tampilkan error dari server
            formError.textContent = result.message || "Failed to save user";
        }
    } catch (error) {
        console.error("Error saving user:", error);
        formError.textContent = "An error occurred while saving the user";
    }
});

// Edit user
async function editUser(id) {
    try {
        const response = await fetch(`${API_BASE_URL}/${id}`);
        const result = await response.json();

        if (result.success) {
            const user = result.data;
            userIdInput.value = user.id;
            nameInput.value = user.name;
            emailInput.value = user.email;
            ageInput.value = user.age;
        }
    } catch (error) {
        console.error("Error fetching user details:", error);
        formError.textContent = "Failed to fetch user details";
    }
}

// Delete user
async function deleteUser(id) {
    if (!confirm("Are you sure you want to delete this user?")) return;

    try {
        const response = await fetch(`${API_BASE_URL}/${id}`, {
            method: "DELETE",
        });

        const result = await response.json();

        if (result.success) {
            fetchUsers();
        } else {
            formError.textContent = "Failed to delete user";
        }
    } catch (error) {
        console.error("Error deleting user:", error);
        formError.textContent = "An error occurred while deleting the user";
    }
}

// Initial fetch of users
fetchUsers();
