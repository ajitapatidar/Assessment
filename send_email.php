<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Collect form data
    $name = $_POST['name'];
    $email = $_POST['email'];
    $country = $_POST['country'];
    $state = $_POST['state'];
    $district = $_POST['district'];

    // Email details
    $to = 'recipient@example.com'; // The recipient email address
    $subject = 'New Contact Form Submission';
    $message = "Name: $name\nEmail: $email\nCountry: $country\nState: $state\nDistrict: $district";
    $headers = "From: $email";

    // Send the email
    if (mail($to, $subject, $message, $headers)) {
        echo "Email sent successfully!";
    } else {
        echo "Failed to send email.";
    }
}
?>
