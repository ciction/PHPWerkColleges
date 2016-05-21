<?php

require_once 'vendor/eoghanobrien/php-simple-mail/class.simple_mail.php';


$mail = new SimpleMail();
$mail->setTo('swolfschristophe@gmail.com', 'Your Email')
    ->setSubject('Test Message')
    ->setFrom('no-reply@domain.com', 'Domain.com')
    ->addMailHeader('Reply-To', 'no-reply@domain.com', 'Domain.com')
    ->addMailHeader('Cc', 'bill@example.com', 'Bill Gates')
    ->addMailHeader('Bcc', 'steve@example.com', 'Steve Jobs')
    ->addGenericHeader('X-Mailer', 'PHP/' . phpversion())
    ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
    ->setMessage('<strong>This is a test message.</strong>')
    ->setWrap(100);
$send = $mail->send();
echo ($send) ? 'Email sent successfully' : 'Could not send email';

?>