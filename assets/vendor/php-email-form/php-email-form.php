<?php
  // Replace contact@example.com with your real receiving email address
  $receiving_email_address = '0.omrclk@gmail.com';

  // Honeypot field
  if (!empty($_POST['honeypot'])) {
    die('Spam detected!');
  }

  // Form fields
  $from_name = $_POST['name'];
  $from_email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  // Validate form fields
  if (empty($from_name) || empty($from_email) || empty($subject) || empty($message)) {
    die('All fields are required!');
  }

  // Validate email
  if (!filter_var($from_email, FILTER_VALIDATE_EMAIL)) {
    die('Invalid email!');
  }

  // Email headers
  $headers = "From: $from_name <$from_email>\r\n";
  $headers .= "Reply-To: $from_email\r\n";
  $headers .= "X-Mailer: PHP/" . phpversion();

  // Send email
  if(mail($receiving_email_address, $subject, $message, $headers)) {
    echo "Your message has been sent. Thank you!";
  } else {
    echo "Failed to send email.";
  }
?>
