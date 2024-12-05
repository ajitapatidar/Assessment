<?php
// Database connection
$servername = "localhost";
$username = "root"; // The default username for MySQL is "root"
$password = ""; // Leave it empty if you haven't set a password for MySQL
$dbname = "contact_form"; // Replace this with your database name

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];
    $gender = $_POST['gender'];
    $mobile = $_POST['mobile'];

    // Insert data into the database
    $sql = "INSERT INTO users (name, email, address, country, state, district, gender, mobile)
            VALUES ('$name', '$email', '$address', '$country', '$state', '$district', '$gender', '$mobile')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP Contact Form</title>
  <link rel="stylesheet" href="style.css">
 
</head>
<body>
  <div class="form-container">
    <h2>Contact Form</h2>
    <form id="contactForm" method="POST" action="send_email.php">
      <div class="form-group">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" placeholder="Enter your name" required>
      </div>

      <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" placeholder="Enter your email" required>
      </div>

      <div class="form-group">
        <label for="address">Address:</label>
        <textarea id="address" name="address" placeholder="Enter your address" required></textarea>
      </div>

      <div class="form-group">
        <label for="country">Country:</label>
        <select id="country" name="country" required>
          <option value="">Select Country</option>
          <option value="India">India</option>
          <option value="USA">USA</option>
          <option value="Australia">Australia</option>
          <option value="Canada">Canada</option>
          <option value="UK">United Kingdom</option>
        </select>
      </div>

      <div class="form-group">
        <label for="state">State:</label>
        <select id="state" name="state" required>
          <option value="">Select State</option>
          <!-- States will be populated based on the selected country -->
        </select>
      </div>

      <div class="form-group">
        <label for="district">District:</label>
        <select id="district" name="district" required>
          <option value="">Select District</option>
          <!-- Districts will be populated based on the selected state -->
        </select>
      </div>

      <div class="form-group gender-options">
        <label>Gender:</label>
        <label for="male"><input type="radio" id="male" name="gender" value="Male" required> Male</label>
        <label for="female"><input type="radio" id="female" name="gender" value="Female" required> Female</label>
      </div>

      <div class="form-group">
        <label for="mobile">Mobile No.:</label>
        <input type="tel" id="mobile" name="mobile" placeholder="Enter your mobile number" pattern="[0-9]{10}" required>
      </div>

      <button type="submit">Submit</button>
    </form>


    <h2>Submitted Data</h2>
    <?php
    // Connect to the database
    $conn = new mysqli('localhost', 'root', '', 'contact_form');

    // Check the connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Query to get all submitted form data
    $sql = "SELECT * FROM form_data";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Output data of each row
        while($row = $result->fetch_assoc()) {
            echo "Name: " . $row["name"]. " - Email: " . $row["email"]. " - Country: " . $row["country"]. " - State: " . $row["state"]. " - District: " . $row["district"]. "<br>";
        }
    } else {
        echo "No records found!";
    }

    // Close the connection
    $conn->close();
    ?>
  </div>

 
  <script src="script.js"></script>
</body>
</html>

