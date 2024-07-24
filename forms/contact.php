<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

$receiving_email_address = 'giansirait18@gmail.com';

if (file_exists($php_email_form = '../assets/vendor/php-email-form/php-email-form.php')) {
    include($php_email_form);
} else {
    die('Unable to load the "PHP Email Form" Library!');
}

$contact = new PHP_Email_Form;
$contact->ajax = true;

$contact->to = $receiving_email_address;
$contact->from_name = htmlspecialchars($_POST['name']);
$contact->from_email = htmlspecialchars($_POST['email']);
$contact->subject = htmlspecialchars($_POST['subject']);

$contact->add_message(htmlspecialchars($_POST['name']), 'From');
$contact->add_message(htmlspecialchars($_POST['email']), 'Email');
$contact->add_message(htmlspecialchars($_POST['message']), 'Message', 10);

echo $contact->send();
?>
