CREATE DATABASE IF NOT EXISTS neet_institute;

USE neet_institute;

CREATE TABLE IF NOT EXISTS admission_forms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255) NOT NULL,
    dob DATE NOT NULL,
    gender VARCHAR(50) NOT NULL,
    email VARCHAR(100) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    address TEXT NOT NULL,
    course VARCHAR(100) NOT NULL,
    qualification TEXT NOT NULL,
    documents VARCHAR(255),
    parent_name VARCHAR(255),
    previous_institution VARCHAR(255),
    start_date DATE NOT NULL,
    nationality VARCHAR(100) NOT NULL,
    emergency_contact VARCHAR(20),
    captcha VARCHAR(100),
    consent BOOLEAN NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
