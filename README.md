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
