# User Management REST API

A complete user management system with Laravel backend and Vanilla JavaScript frontend, providing comprehensive CRUD functionality.

## ✨ Features

### Backend
- 🚀 RESTful API for user management
- ✅ Input validation using Data Transfer Objects (DTO)
- 📚 Interactive API documentation with Swagger
- 🏗 Service Pattern
- 🛡 Comprehensive validation and error handling

### Frontend
- 🖥 Simple Vanilla JavaScript interface
- 📊 User listing in a responsive table
- ✏ Dynamic forms for add/edit operations
- 🔍 Client-side input validation
- 🔄 Fetch communication with backend

## 🛠 Technologies Used

**Backend**
- Laravel 12
- MySQL
- Swagger (OpenAPI)
- PHPUnit
- Service Pattern
- DTO Validation

**Frontend**
- HTML5
- Vanilla JavaScript
- Fetch API

## 🚀 Installation

### 1. Clone Repository
```bash
git clone https://github.com/username/user-management-api.git
cd user-management-api

composer install
cp .env.example .env
php artisan key:generate

```

### 2. Database Configuration

Create a new database
Update .env with your credentials:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=user_management
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

Run Migrations
```bash
php artisan migrate
# Optional: Seed database
php artisan db:seed
```

### 3. Run the Application
Backend Development Server

```bash
php artisan serve
```

### 4. API Documentation
```
Swagger UI: http://localhost:8000/api/documentation
Generate docs: php artisan l5-swagger:generate
```

### 5. 🏗 Project Structure
``` Core Structure
project/
├── app/                # Backend logic
│   ├── DTO/            # Data Transfer Objects
│   ├── Http/
│   │   └── Controllers # API Controllers
│   ├── Models/         # Eloquent Models
│   ├── Repositories/   # Data access layer
│   └── Services/       # Business logic
├── public/             # Web root
│   ├── index.html      # Frontend entry point
│   └── js/
│       └── app.js      # Frontend logic
└── resources/          # Additional resources
```

### 6. 🧪 Testing

Run Backend Tests
```bash
php artisan test
# Specific test
php artisan test --filter UserApiTest
```

### 7. 🖥 Frontend Configuration
Update the API base URL in public/js/app.js:
```
const API_BASE_URL = 'http://localhost:8000/api/users';
```

### 🤝 Contributing
```
Fork the repository
Create your feature branch (git checkout -b feature/AmazingFeature)
Commit your changes (git commit -m 'Add some amazing feature')
Push to the branch (git push origin feature/AmazingFeature)
Open a Pull Request
```

### ⚠ Troubleshooting
```
Ensure all dependencies are installed
Verify database connection
Check browser console for frontend errors
Use php artisan serve for backend development
```

### 🔒 Security
```
Input validation on both backend and frontend
Use HTTPS in production
Authentication will be considered for future versions
```

### 📜 License
MIT

📧 Contact
Muhammad Akbar Adityah - akbaradityah444@gmail.com

Project Link: https://github.com/username/user-management-api

Built with ❤️ using Laravel & Vanilla JavaScript
