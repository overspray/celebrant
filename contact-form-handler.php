<?php

$errors="";
$myemail= 'l.attitude37@gmail.com';
if(empty($_POST['name']) ||
    empty($_POST['email']) ||
    empty($_POST['message']))
{
    $errors .= "\n Error: all fields are required";
}    

$name = $_POST['name'];
$email_address = $_POST['email'];
$message = $_POST['message'];

print "$name";
print "$email_address";
print "$message";

if (!preg_match(
    "/^[_a-z0-9-]+(\.[a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i",
    $email_address))
    {
        $errors .= "\n Error: Invalid email address";
    }

if(empty($errors))
{
    $to = $myemail;
    $email_subject = "Contact form submission: $name";
    $email_body = "You have recieved a new message.".
    "Here are the details: \n Name: $name \n Email: $email_address \n Message \n $message";

    $headers = "From: $myemail\n";
    $headers = "Reply-To: $email_address";

    mail($to,$email_subject,$email_body,$headers);
    header('location: contact-form-thankyou.html');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Form Handler</title>
</head>
<body>
    <?php
    echo nl2br($errors);
    ?>
</body>
</html>
