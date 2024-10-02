<?php
$to = "kevinolubiyi@gmail.com";
$subject = "Testing PHP mail function";
$body = "This is a test email to check if PHP mail() is working.";
$headers = "From: test@example.com";

if (mail($to, $subject, $body, $headers)) {
    echo "Mail sent successfully.";
} else {
    echo "Mail sending failed.";
}
?>
