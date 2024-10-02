<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Set the recipient email address (your email)
    $to = "kevinolubiyi@gmail.com";  // Replace with your email address

    // Email subject and headers
    $subject = "New Contact Form Submission from " . $name;
    $headers = "From: " . $email . "\r\n";
    $headers .= "Reply-To: " . $email . "\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Email body
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // Send the email
    if (mail($to, $subject, $body, $headers)) {
        echo "Message successfully sent!";
    } else {
        echo "Message delivery failed.";
    }
}

<?php
// Initialize variables for form values and feedback message
$name = $email = $message = "";
$feedback = "";
$feedbackClass = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect the form data
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $message = htmlspecialchars($_POST['message']);

    // Basic validation
    if (empty($name) || empty($email) || empty($message)) {
        $feedback = "All fields are required. Please fill in all the fields.";
        $feedbackClass = "error-message";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $feedback = "Please enter a valid email address.";
        $feedbackClass = "error-message";
    } else {
        // Set the recipient email address (replace with your email)
        $to = "kevinolubiyi@gmail.com";

        // Prepare the email subject and headers
        $subject = "New Contact Form Submission from " . $name;
        $headers = "From: " . $email . "\r\n";
        $headers .= "Reply-To: " . $email . "\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        // Email body content
        $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

        // Send the email
        if (mail($to, $subject, $body, $headers)) {
            $feedback = "Thank you for your message! We will get back to you shortly.";
            $feedbackClass = "success-message";

            // Clear the form fields after successful submission
            $name = $email = $message = "";
        } else {
            $feedback = "Sorry, something went wrong. Please try again later.";
            $feedbackClass = "error-message";
        }
    }
}
?>

