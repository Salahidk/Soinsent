# Soinsent.com 🌸

![Project Status](https://img.shields.io/badge/status-live-success)
![Framework](https://img.shields.io/badge/laravel-v10-red)
![Security](https://img.shields.io/badge/security-hardened-blue)

**Soinsent** is a specialized e-commerce platform dedicated to luxury perfumes and organic beauty products. It provides a seamless shopping experience with a focus on elegance, user trust, and secure transactions.

This project bridges the gap between **modern web development** and **cybersecurity**, demonstrating how to build a robust online store using the **Laravel** ecosystem while adhering to strict safety standards.

👉 **Live Demo:** [https://soinsent.com](https://soinsent.com)

---

## 🚀 Key Features

### 🛒 E-Commerce Functionality

-   **Dynamic Catalog:** Browse varied categories (Parfums, Soins, Packs) with advanced filtering.
-   **Shopping Cart & Checkout:** Persistent cart management and a streamlined checkout flow.
-   **User Accounts:** Dashboard for order history, profile management, and wishlists.
-   **Admin Panel:** A comprehensive dashboard to manage products, inventory, and view sales analytics.

### 🛡️ Security & Performance (DevSecOps)

-   **Secure Authentication:** Implemented using Laravel's robust auth guards (protecting against Brute Force & Session Hijacking).
-   **SQL Injection Prevention:** Utilized **Eloquent ORM** parameter binding to sanitize all database queries.
-   **XSS Protection:** Automatic escaping in Blade templates to prevent Cross-Site Scripting.
-   **CSRF Protection:** Global CSRF middleware enabled on all POST/PUT/DELETE requests.
-   **Role-Based Access Control (RBAC):** Custom Middleware to restrict admin routes.

---

## 🛠️ Tech Stack

**Frontend**

-   ![Tailwind](https://img.shields.io/badge/-Tailwind_CSS-38B2AC?logo=tailwind-css&logoColor=white) **Tailwind CSS** (Utility-first framework for responsive, luxury design)
-   ![Blade](https://img.shields.io/badge/-Blade_Templates-FF2D20?logo=laravel&logoColor=white) **Laravel Blade** (Server-side rendering)
-   **JavaScript / Alpine.js** (For interactive UI components)

**Backend**

-   ![Laravel](https://img.shields.io/badge/-Laravel_PHP-FF2D20?logo=laravel&logoColor=white) **Laravel Framework** (MVC Architecture)
-   ![MySQL](https://img.shields.io/badge/-MySQL-4479A1?logo=mysql&logoColor=white) **MySQL** (Relational Database)

**Security & Tools**

-   **Sanctum / Passport:** For API Token management.
-   **Laravel Shield / Middleware:** For route protection.
-   **Argon2ID:** For secure password hashing.

---

## 🏁 Installation & Setup

Follow these steps to run the Laravel project locally:

1.  **Clone the repository**
    ```bash
    git clone
    ```
