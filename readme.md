# Speeder - Logistics Management System

## Overview
Speeder is a logistics management system built using the PHP MVC framework, designed to provide functionalities similar to platforms like SpeedPost or ShipRocket. The application aims to streamline the process of managing orders, deliveries, and billing for administrators, vendors, and delivery personnel. It includes features such as user authentication, order tracking, and billing management.

## Current Status
**Note:** The project is currently not working due to the following issues:
- The login form fails to send `username` and `password` to the controller, likely due to JavaScript interference or routing issues.
- A database error (`PDOException: Column not found: 1054 Unknown column 'order_from'`) occurs when accessing the admin dashboard after login.

The project has been paused, and the code will be pushed to GitHub for future debugging and improvements.

## Features
- **User Authentication**: Supports login for different user types (admin, vendor, delivery personnel).
- **Order Management**: Allows tracking and managing orders (currently broken due to database issues).
- **Billing**: Fetches billing orders for display on the admin dashboard (currently broken).
- **Role-Based Access**: Different dashboards for admins, vendors, and other roles.

## Tech Stack
- **Backend**: PHP (MVC framework)
- **Database**: MySQL (accessed via PDO)
- **Frontend**: HTML, CSS, JavaScript (with jQuery, Bootstrap, and SweetAlert for UI)
- **Environment**: Developed and tested on XAMPP (localhost)

## Project Structure
- `app/`: Core application files
  - `controllers/`: Controllers (e.g., `Admin.php`)
  - `models/`: Models (e.g., `Page.php` for database queries)
  - `views/`: Views for different sections
    - `admin/`: Admin-related views (e.g., `login.php`, `index.php`)
    - `drivers/`: Driver-related views
    - `enterprises/`: Enterprise-related views
    - `go/`: Go-related views
    - `home/`: Home page views
    - `pages/`: Additional pages (e.g., `track.php`)
  - `libraries/`: Core libraries (e.g., `Database.php`, `Core.php`)
- `public/`: Public assets and entry point
  - `index.php`: Front controller
  - `assets/`: CSS, JS, and images
- `logs/`: Error logs (if configured)
- `.htaccess`: URL rewriting for MVC routing

## Setup Instructions
1. Clone the repository (once pushed to GitHub).
2. Place the project in your XAMPP `htdocs` directory (e.g., `C:\xampp\htdocs\speeder`).
3. Configure the database:
   - Create a MySQL database (e.g., `speeder_db`).
   - Import the database schema (if available).
   - Update database credentials in `app/config/config.php`.
4. Start XAMPP (Apache and MySQL).
5. Access the project at `http://localhost/speeder/public`.

## Known Issues
- **Form Submission**: The login form does not send `$_POST` data to the controller, likely due to JavaScript interference (`custom.js` or other scripts).
- **Database Error**: The `order_from` column is missing in the `orders` table, causing a PDO exception in `Page->get_billing_orders()`.
- **Routing**: Possible issues with MVC routing or `.htaccess` configuration.

## Future Improvements
- Fix form submission by debugging JavaScript interference and routing.
- Correct the database schema and queries to resolve the `order_from` column issue.
- Add error handling for database operations.
- Implement additional features like order tracking, delivery status updates, and reporting.

## Contributing
This project is currently under development and not accepting contributions until the core issues are resolved. Once fixed, contributions will be welcome via GitHub pull requests.
