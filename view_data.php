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
    echo "<table border='1'>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Country</th>
                <th>State</th>
                <th>District</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["name"] . "</td>
                <td>" . $row["email"] . "</td>
                <td>" . $row["country"] . "</td>
                <td>" . $row["state"] . "</td>
                <td>" . $row["district"] . "</td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "No records found!";
}

// Close the connection
$conn->close();
?>
