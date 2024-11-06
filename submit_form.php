<?php
// Display errors for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection details
$servername = "localhost";
$username = "root"; // Your MySQL username
$password = ""; // Your MySQL password (if any)
$dbname = "neet_institute"; // Your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data and sanitize it
    $full_name = $conn->real_escape_string($_POST['full_name']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $address = $conn->real_escape_string($_POST['address']);
    $course = $conn->real_escape_string($_POST['course']);
    $qualification = $conn->real_escape_string($_POST['qualification']);
    $parent_name = $conn->real_escape_string($_POST['parent_name']);
    $previous_institution = $conn->real_escape_string($_POST['previous_institution']);
    $start_date = $conn->real_escape_string($_POST['start_date']);
    $nationality = $conn->real_escape_string($_POST['nationality']);
    $emergency_contact = $conn->real_escape_string($_POST['emergency_contact']);
    $captcha = $conn->real_escape_string($_POST['captcha']);
    $consent = isset($_POST['consent']) ? 1 : 0; // Check if consent checkbox is checked

    // Handling file upload (documents)
    $target_dir = "uploads/"; // Directory to store uploaded files
    $target_file = $target_dir . basename($_FILES["documents"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if the file is a valid document type (e.g., pdf, jpg, etc.)
    if (!in_array($imageFileType, ['pdf', 'jpg', 'jpeg', 'png'])) {
        echo "Sorry, only PDF, JPG, JPEG, and PNG files are allowed.";
        $uploadOk = 0;
    }

    // Check if file is too large (2MB max)
    if ($_FILES["documents"]["size"] > 2000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // If everything is okay, try to upload the file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["documents"]["tmp_name"], $target_file)) {
            // Prepare SQL query to insert form data into the database
            $sql = "INSERT INTO admission_forms (full_name, dob, gender, email, phone, address, course, qualification, documents, parent_name, previous_institution, start_date, nationality, emergency_contact, captcha, consent)
                    VALUES ('$full_name', '$dob', '$gender', '$email', '$phone', '$address', '$course', '$qualification', '$target_file', '$parent_name', '$previous_institution', '$start_date', '$nationality', '$emergency_contact', '$captcha', '$consent')";

            // Execute the query
            if ($conn->query($sql) === TRUE) {
                echo "New record created successfully!";
            } else {
                echo "Error: " . $sql . "<br>" . $conn->error;
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "File upload failed.";
    }

    // Close connection
    $conn->close();
}
?>
