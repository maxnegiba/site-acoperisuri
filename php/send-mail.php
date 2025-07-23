<?php
/*  /var/www/site-acoperisuri/mail.php
 *  Endpoint folosit de formularul de contact
 *  Trimite un e-mail de la Info.michael@gmbh.de către info.michaell.gmbh@gmail.com
 */

header('Content-Type: application/json');

// 1. Datele primite din formular
$name    = trim($_POST['name']    ?? '');
$phone   = trim($_POST['phone']   ?? '');
$email   = trim($_POST['email']   ?? '');
$addr    = trim($_POST['address'] ?? '');
$service = $_POST['service']      ?? '';
$date    = $_POST['date']         ?? '';
$msg     = trim($_POST['message'] ?? '');
$website = $_POST['website']      ?? '';

// 2. Anti-spam (honeypot)
if ($website !== '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Spam detected']);
    exit;
}

// 3. reCAPTCHA v3 (înlocuiește YOUR_SECRET_KEY)
$recaptcha = $_POST['recaptcha_response'] ?? '';
$secret     = '6Lfd6IwrAAAAAIEybbgYHpw9xrqIo1AY9CPybfwq';
$verifyUrl  = 'https://www.google.com/recaptcha/api/siteverify';
$response   = json_decode(file_get_contents($verifyUrl . '?secret=' . $secret . '&response=' . $recaptcha));

if (!$response || !$response->success || ($response->score ?? 0) < 0.5) {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Captcha failed']);
    exit;
}

// 4. Validare minimă
if ($name === '' || $addr === '' || $service === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Pflichtfelder fehlen']);
    exit;
}
if ($phone === '' && $email === '') {
    http_response_code(400);
    echo json_encode(['success' => false, 'error' => 'Telefon oder E-Mail angeben']);
    exit;
}

// 5. Compunerea mesajului
$subject = "Neue Kontaktanfrage";
$body    =
    "Name: $name\n" .
    "Adresse: $addr\n" .
    "Telefon: $phone\n" .
    "E-Mail: $email\n" .
    "Dienstleistung: $service\n" .
    "Wunschtermin: $date\n\n" .
    "Nachricht:\n$msg";

$headers =
    "From: Info.michael@gmbh.de\r\n" .
    "Reply-To: $email\r\n" .
    "Content-Type: text/plain; charset=utf-8\r\n";

// 6. Trimiterea efectivă
$sent = mail('info.michaell.gmbh@gmail.com', $subject, $body, $headers);

if ($sent) {
    echo json_encode(['success' => true]);
} else {
    http_response_code(500);
    echo json_encode(['success' => false, 'error' => 'Mail server error']);
}
?>