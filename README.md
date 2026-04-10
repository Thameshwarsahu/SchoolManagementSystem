# 🎓 School Management System

A complete **School Management System** built using Laravel to manage students, staff, classes, and school operations efficiently.

---

## 🚀 Features

* 👨‍🎓 Student Management (Add, Edit, Delete, View)
* 👨‍🏫 Staff Management
* 🏫 Class & Section Management
* 🔐 Authentication System (Login/Register)
* ⚙️ Settings Management
* 🖼️ Image Upload (Student & Staff)
* 📊 Admin Dashboard
* 🪪 Admit Card Print System (Generate & Print Student Admit Cards)

---

## 🛠️ Tech Stack

* **Backend:** Laravel (PHP)
* **Frontend:** Blade, Bootstrap, JavaScript
* **Database:** MySQL
* **Server:** XAMPP / Apache

---

## 📂 Folder Structure

```
app/
resources/
routes/
public/
database/
```

---

## ⚙️ Installation Guide

### 1. Clone the Repository

```
git clone https://github.com/Thameshwarsahu/schoolManagementSystem.git
```

### 2. Open Project Folder

```
cd schoolManagementSystem
```

### 3. Install Dependencies

```
composer install
npm install
```

### 4. Setup Environment File

```
cp .env.example .env
php artisan key:generate
```

### 5. Configure Database (.env file)

```
DB_DATABASE=your_database_name
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Run Migrations

```
php artisan migrate --seed
```

### 7. Start Server

```
php artisan serve
```

---

## 🔐 Login Details (If Available)

```
Email: admin@gmail.com
Password: 123456
```

---

## 📸 Screenshots

### Dashboard

![Dashboard](dashboard.png)

### Student List

![Students](students.png)

### Add Student

![Add Student](add-student.png)

### Admit Card

![Admit Card](admit-card.png)

---

## 📄 License

This project is open-source and free to use.

---

## 👨‍💻 Author

**Thameshwar Sahu**
