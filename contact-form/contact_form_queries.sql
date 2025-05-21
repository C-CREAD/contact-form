-- Create new PS database 
CREATE DATABASE IF NOT EXISTS PS;

-- Delete PS database 
-- DROP DATABASE IF EXISTS PS;

-- Show All Databases 
-- SHOW DATABASES;

-- Set current database to PS
USE PS;

-- Create contact_forms table  
CREATE TABLE IF NOT EXISTS contact_forms (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    message TEXT NOT NULL,
    submitted_at DATETIME DEFAULT CURRENT_TIMESTAMP
);

-- Create users table  
CREATE TABLE IF NOT EXISTS users (
	id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(50) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(30) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
    is_admin TINYINT(1) DEFAULT 0
);

-- Get all admin users
-- SELECT * FROM users WHERE is_admin=1

-- Get all contact forms ordered by most recent
-- SELECT * FROM contact_forms ORDER BY submitted_at DESC;

-- Delete all contact form records
-- DELETE FROM contact_forms;

-- Delete contact_forms table
-- DROP TABLE IF EXISTS contact_forms;

-- Delete all user records
-- DELETE FROM users;

-- Delete users table
-- DROP TABLE IF EXISTS users;