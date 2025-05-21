# Contact Form (PHP)

## Description
This small project demonstrates a PHP-based Contact Form. The project allows the user to submit forms to a MySQL database and log in as an admin to view all submitted forms. 

### Assumptions
- The user has 2 hours to construct this project.
- Access to submit forms can be open to anyone (admins and non-admins) without logging in. (To save time)
- Only admins can view the form data.
- CSS and styling can be kept to a minimum, given the time constraint. Thus, using Bootstrap CSS could be incentivised. 

### Features
- Basic User Login (Admin Only ⚠️):
  The login feature is more appreciated for accessing the admin panel for viewing all forms. To make the project more convenient to use, I decided to only allow admins to log in to view all forms, but kept open access for submitting form data. This reduces the hassle of requiring two separate authentication accesses (admins and non-admins) for submitting forms, given the 2-hour time constraint

- Basic Form Submission (Open access ✅):
  The no. 1 goal of the form is to collect data. Assuming that this form is only being used by employees of a company, I decided to skip the general authentication required to reduce the time required to record the data. 

## Installation 
1. To install and run this project, you must download and install XAMPP. If you do not have XAMPP installed, [click here](https://www.apachefriends.org/index.html). As you install it, make sure that the 'Apache' and 'MySQL' modules are installed.
![image](https://github.com/user-attachments/assets/3d594d51-d5cd-4bbc-af4a-c42d8368d738)

   Click Start on 'Apache' and 'MySQL' modules:
   ![image](https://github.com/user-attachments/assets/20e7e5fe-300c-4d81-bdb2-e15647c94e96)

2. Download this repository and store it in the XAMPP directory:
   ```sh
   C:\xampp\htdocs\
   ```

   Example:
   ```sh
   C:\xampp\htdocs\contact-form
   ```

3. Create the database by going to your browser (e.g. Chrome or Firefox) and entering this link:
   ```sh
   http://localhost/phpmyadmin
   ```
   Next, select the 'Database' option, enter the Database name as 'PS', then select "Create":
   ![image](https://github.com/user-attachments/assets/6a85ab3d-ab8e-4254-8505-78855810327d)

4. Create the following tables:
   - Table Name: contact_forms
   - Rows: 5
   ![image](https://github.com/user-attachments/assets/1d35b799-1330-4ad1-a8e1-767609062416)

   - Columns: ID (INT) PRIMARY KEY AUTO_INCREMENT, name (VARCHAR(50), email (VARCHAR(50)) UNIQUE, message (TEXT), submitted_at (DATETIME) DEFAULT=CURRENT_TIME
   ![image](https://github.com/user-attachments/assets/3d016265-8328-47fa-bfba-b8cd56108980)


   - Table Name: users
   - Rows: 6
   ![image](https://github.com/user-attachments/assets/c560e400-e91a-4a03-8a60-626c365c5c82)

   - Columns: ID (INT) PRIMARY KEY AUTO_INCREMENT, name (VARCHAR(50), email (VARCHAR(50)) UNIQUE, password (VARCHAR(30)), created_at (DATETIME) DEFAULT=CURRENT_TIME, is_admin (TINYINT(1)) DEFAULT=0
   ![image](https://github.com/user-attachments/assets/9fe4f8c5-0f05-4fc2-9968-530bab25ed6f)

5. Add new admin user:
   - Example:
   ![image](https://github.com/user-attachments/assets/c9ada396-39f3-4cce-b045-57f2307093d9)

   (NOTE: The details shown in the image above are just an example; you can enter anything.)

## Usage
1. Go to your browser's URL and enter the following link:
   ```sh
   http://localhost/contact-form/contact_form.php
   ```
   Example:
   ![image](https://github.com/user-attachments/assets/45260cdb-3e16-4d38-909f-b4f2ff4f6ffb)
   
   From here, you can enter the form details and submit them. (Log in not required)  

2. You can also navigate to the admin login page via the navigation bar to log in (use the Admin user details you recently created).
   ```sh
   http://localhost/contact-form/admin_login.php
   ```
   Example:
   ![image](https://github.com/user-attachments/assets/b80c10d6-5792-4324-9290-9f1822e440be)

3. Once you've logged in, you'll be redirected to the Admin Panel to see all the submitted forms in the most recent order.
   ```sh
   http://localhost/contact-form/admin.php
   ```
   Example:
   ![image](https://github.com/user-attachments/assets/29a5f7cc-f808-47a7-96c2-23c2271fd17e)
   
   NOTE: You need to be logged in to access this page, otherwise, you'll be redirected to the admin login page. ⚠️

## Credits
Shingai Dzinotyiweyi [GitHub Profile](https://github.com/C-CREAD)
Repository Link: [Here](https://github.com/C-CREAD/contact-form)
