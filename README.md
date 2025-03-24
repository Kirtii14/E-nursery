# E-Nursery System

## Overview
E-Nursery is an e-commerce web application for purchasing plants and gardening products. It is built using **PHP, MySQL, HTML, JavaScript, and CSS** and is hosted on the **XAMPP Apache server**.

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Features
- User authentication (Login/Signup)
- Admin panel for managing products and orders
- Product listing and filtering
- Shopping cart functionality
- Secure checkout process
  
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Installation and Setup
### Prerequisites
- **XAMPP** (or any local server with Apache, PHP, and MySQL)
- Web browser (Chrome, Firefox, etc.)
  
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### Steps to Set Up
1. **Download and Install XAMPP:**
   - [Download XAMPP](https://www.apachefriends.org/index.html)
   - Install and start **Apache** and **MySQL** from the XAMPP Control Panel.

2. **Clone or Download the Project:**
   - Extract the project folder `e-nursery` into `C:\xampp\htdocs\`

3. **Create the Database:**
   - Open `phpMyAdmin` (`http://localhost/phpmyadmin/`)
   - Click **New**, enter `enursery` as the database name, and create it.
   - Import the provided SQL file (`enursery.sql`) into this database.

4. **Configure Database Connection:**
   - Open `config.php` and update database credentials if needed:
     ```php
     $conn = mysqli_connect("localhost", "root", "", "enursery");
     ```
   - If using a MySQL password, update it accordingly.

5. **Run the Project:**
   - Open a browser and go to: `http://localhost/e-nursery/`
  
-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------


## Troubleshooting
### "Unknown database 'enursery'" Error
- Ensure MySQL is running in XAMPP.
- Check if the `enursery` database exists in phpMyAdmin.
- Import the `enursery.sql` file into phpMyAdmin.

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

### Blank Page or Errors
- Check `config.php` for database credentials.
- Enable PHP error reporting in `php.ini` (`display_errors = On`).
- Restart Apache and MySQL in XAMPP.

-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

## Future Enhancements
- Implement payment gateway integration
- Add product reviews and ratings
- Optimize for better performance

----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------  

## Contact
For any issues or contributions, feel free to reach out!
email - kirtit1444@gmail.com

------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
Enjoy gardening with **E-Nursery!** 🌱


