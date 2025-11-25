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

## 📜 Commit Convention

We will use the **Conventional Commits** specification combined with **Emojis** for a clear and professional Git history.

### Commit Format

`<type>(<scope>): <emoji> <subject>`

### Types and Emojis

| Type | Emoji | Description |
| :--- | :--- | :--- |
| **feat** | ✨ | A new feature, enhancement, or major functionality. |
| **fix** | 🐛 | A bug fix. |
| **docs** | 📚 | Changes to documentation (README, comments, etc.). |
| **style** | 💅 | Changes that do not affect the meaning of the code (formatting, CSS). |
| **refactor** | 🔨 | Code changes that neither fix a bug nor add a feature (cleanup, better structure). |
| **chore** | ⚙️ | Maintenance tasks, build processes, or general tooling. |
| **test** | 🧪 | Adding missing tests or correcting existing tests. |
| **perf** | ⚡️ | A code change that improves performance. |

### Examples:

* `feat: ✨ Implement basic beat catalogue display from database`
* `fix: 🐛 Correct typo in DB connection host name`
* `chore: ⚙️ Update .gitignore file for new secure folder`
* `style: 💅 Apply basic styling to beat cards in catalogue.php`
