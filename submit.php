<?php
// Step 1: Connect to the MySQL database
$servername = "localhost";
$username = "root";  // default MySQL username
$password = "";  // default MySQL password is empty
$dbname = "contact_form";  // your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Step 2: Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Step 3: Get form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];

    // Step 4: Insert data into database
    $sql = "INSERT INTO form_data (name, email, country, state, district) VALUES ('$name', '$email', '$country', '$state', '$district')";

    if ($conn->query($sql) === TRUE) {
        // Step 5: Redirect to a success page or show a message
        header("Location: thank_you.php");  // Redirect to thank you page
        exit();  // Stop further script execution
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the database connection
$conn->close();
?>
