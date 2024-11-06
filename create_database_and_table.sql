CREATE TABLE admission_forms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(255),
    dob DATE,
    gender VARCHAR(10),
    email VARCHAR(255),
    phone VARCHAR(15),
    address TEXT,
    course VARCHAR(100),
    qualification VARCHAR(100),
    documents VARCHAR(255),
    parent_name VARCHAR(255),
    previous_institution VARCHAR(255),
    start_date DATE,
    nationality VARCHAR(100),
    emergency_contact VARCHAR(15),
    captcha VARCHAR(255),
    consent BOOLEAN
);
