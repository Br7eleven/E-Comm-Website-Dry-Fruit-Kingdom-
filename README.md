# 📦 Local Hosting Guide using XAMPP + phpMyAdmin

## 🛠️ Requirements

- XAMPP (Download from [https://www.apachefriends.org](https://www.apachefriends.org))
- A project folder (e.g. `myproject`)
- Basic understanding of PHP/MySQL

---

## 🚀 Step-by-Step Guide

### 1. XAMPP Install karo
- XAMPP ko install karo (Windows/Linux/Mac ke liye available hai).
- Installation ke baad **XAMPP Control Panel** open karo.

### 2. Apache aur MySQL Start karo
- **Apache** aur **MySQL** ke "Start" buttons pe click karo.
- Green light ka matlab services successfully run ho rahi hain.

### 3. Apna Project Folder Setup karo
- Apne project folder ko XAMPP ke `htdocs` folder ke andar paste karo.


### 4. Project Ko Browser Me Open Karo
- Browser me open karo:


---

## 🗄️ Database Setup using phpMyAdmin

### 1. phpMyAdmin Open karo
- Browser me type karo:
http://localhost/phpmyadmin


### 2. Naya Database Create karo
- Left sidebar me **New** pe click karo.
- Database ka naam daalo (e.g., `mydb`) aur "Create" pe click karo.

### 3. Table Create karo
- Database select karne ke baad table banane ke liye name aur number of columns daalo.
- Fields define karo (id, name, email, etc.).

### 4. Database ko Project se Connect karo
- PHP file me `mysqli` ya `PDO` ka use karke database se connect karo. code at last>>>

💡 Tips
Agar port issue aaye to Apache ka port 80 badal ke 8080 kar sakte ho.

Always save your PHP files with .php extension.

XAMPP ko hamesha as Administrator run karo (Windows me).



Screenshots :( :)
![ss1](https://github.com/user-attachments/assets/ce5117ba-c5a6-445b-9e7d-75aad0bc6e24)
![ss3](https://github.com/user-attachments/assets/6390e775-a340-4041-9df0-b9b1e86472f2)
![ss2](https://github.com/user-attachments/assets/035239cb-1b0d-4568-ad7f-487fbe97bf59)

```php

<?php
$conn = mysqli_connect("localhost", "root", "", "mydb");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully!";
?>
