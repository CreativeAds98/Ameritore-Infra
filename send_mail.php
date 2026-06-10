<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $to = "nithin@creativeadvs.in"; // Update with your recipient email
    // $to = "rohankedari962@gmail.com"; 
    $subject = $_POST["con_message"];

    // Sanitize and retrieve form data
    $name = htmlspecialchars($_POST["con_name"]);
    $email = filter_var($_POST["con_email"], FILTER_SANITIZE_EMAIL);
    // $message = htmlspecialchars($_POST["con_message"]);
    $phone = ($_POST["con_phone"]);

    // Email headers
    $headers = "From: $email" . "\r\n" .
       "Reply-To: $email" . "\r\n" .
       "Content-Type: text/plain; charset=UTF-8";

    // Email body
    $body = "Name: $name\n";
    $body .= "Email: $email\n";
    // $body .= "Message:\n$message\n";
    $body .= "Phone: $phone\n";

    // Send email
    if (mail($to, $subject, $body, $headers)) {
        
        echo "<script>
                alert('Email sent successfully!');
                window.location.href = 'thank-you.html';
              </script>";
    } else {
       echo "<script>alert('Failed to send email!');</script>";
    }
} else {
    echo "Invalid request.";
}
?>
