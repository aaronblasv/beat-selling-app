# 🎧 Beat Selling E-Commerce Platform

A functional, secure, and modern web application built for a music producer's portfolio. This project demonstrates full-stack development skills using the LAMP stack, focusing on secure payment processing, digital product delivery, and a clean user experience.

---

## 🎯 Project Goals & Core Features

The main objective is to create a complete e-commerce experience for purchasing instrumental beats.

### Core Features

1.  **Landing Page (`index.php`):** Attractive entry point with clear Call-to-Action (CTA) directing users to the catalogue.
2.  **Beat Catalogue (`catalogo.php`):**
    * Display a list of beats with title, genre, BPM, and price.
    * **Functional HTML5 Audio Player** for listening to watermarked samples.
    * Add-to-Cart functionality (using PHP Sessions).
3.  **Secure Checkout (`checkout.php`):**
    * Order summary and customer information collection.
    * Integration with a Payment Gateway (e.g., Stripe) for transaction processing.
4.  **Secure Digital Delivery (`descarga.php`):**
    * PHP script that processes the purchase confirmation.
    * Secure file delivery mechanism (preventing direct URL access to master files) using tokens and headers.

---

## 💻 Technology Stack

The project is built on the classic and robust **LAMP** stack:

* **Backend Logic:** PHP (Utilizing pure PHP and PDO for database interactions).
* **Database:** MySQL (Managed via phpMyAdmin).
* **Frontend:** HTML5, CSS3, JavaScript.
* **Server:** Apache (Local setup: XAMPP/WAMP/MAMP).
* **Version Control:** Git & GitHub.

---

## 📁 Directory Structure & Organization

The project follows a standard MVC-inspired structure to separate concerns and ensure security (protecting database credentials and master audio files).

---

## 📐 Coding Standards & Naming Conventions

All naming conventions will be strictly in **English** to maintain industry standards and readability.

| Element | Naming Convention | Examples |
| :--- | :--- | :--- |
| **PHP Variables** | `snake_case` | `$beat_price`, `$customer_email` |
| **PHP Functions** | `snake_case` | `get_all_beats()`, `process_order()` |
| **MySQL Columns** | `snake_case` | `beat_id`, `url_muestra`, `total_price` |
| **CSS Classes/IDs** | `kebab-case` | `.beat-card`, `#audio-player` |

---

### Commit Conventions

#### Nomenclatura de commits
**Tag/Tipo de tarea (emoji/🎉): + Tipo de tag (palabra corta) + descripción**

*Ejemplo:*
```
🎉 init: created repo basis
```

#### Conventional Commits
🔹 **Tipos más comunes**
- `feat`: → Nueva funcionalidad (feature) para el usuario.
- `fix`: → Corrección de bug.
- `docs`: → Cambios solo en documentación.
- `style`: → Cambios de formato (espacios, comas, formateo, etc.) sin afectar el código.
- `refactor`: → Cambio de código que no corrige bug ni añade feature.
- `perf`: → Mejora de rendimiento.
- `test`: → Añadir o corregir tests.
- `chore`: → Tareas varias (build, configs, scripts…).
```