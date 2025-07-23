<?php
header('Content-Type: application/json');

$name  = trim($_POST['name']  ?? '');
$phone = trim($_POST['phone'] ?? '');
$email = trim($_POST['email'] ?? '');
$addr  = trim($_POST['address'] ?? '');
$service = $_POST['service'] ?? '';
$date  = $_POST['date'] ?? '';
$msg   = trim($_POST['message'] ?? '');
$website = $_POST['website'] ?? '';

// honeypot
if ($website !== '') {
  echo json_encode(['success'=>false,'error'=>'Spam detected']); exit;
}

// reCAPTCHA v3
$recaptcha = $_POST['recaptcha_response'];
$verify = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret=YOUR_SECRET_KEY&response='.$recaptcha);
$response = json_decode($verify);
if (!$response->success || $response->score < 0.5) {
  echo json_encode(['success'=>false,'error'=>'Captcha failed']); exit;
}

// validare basic
if ($name === '' || $addr === '' || $service === '') {
  echo json_encode(['success'=>false,'error'=>'Pflichtfelder fehlen']); exit;
}
if ($phone === '' && $email === '') {
  echo json_encode(['success'=>false,'error'=>'Telefon oder E-Mail angeben']); exit;
}

// pregatire mail
$to = 'info@dachdecker-muenchen.de';
$subject = "Neue Kontaktanfrage";
$body = "Name: $name\nAdresse: $addr\nTelefon: $phone\nE-Mail: $email\nDienstleistung: $service\nWunschtermin: $date\nNachricht:\n$msg";
$headers = "From: $email\r\nReply-To: $email\r\nContent-Type: text/plain; charset=utf-8";

if (mail($to, $subject, $body, $headers)) {
  echo json_encode(['success'=>true]);
} else {
  echo json_encode(['success'=>false,'error'=>'Mail server error']);
}