<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';

$mail = new PHPMailer(true);
$mail->CharSet ='UTF-8';
$mail->setLanguage('ru','phpmailer/language/' );
$mail->IsHTML(true);

$mail->setFrom('form.send.jvk@gmail.com', 'Евгений Карев');
$mail->addAddress('karev_e@mail.ru');
$mail->Subject = 'Test';

$body = '<h1>Тестовое письмо</h1>';

if(trim(!empty($_POST['name']))){
	$body.='<p>Имя: '.$_POST['name'].'</p>';
}
if(trim(!empty($_POST['email']))){
	$body.='<p>E-mail: '.$_POST['email'].'</p>';
}
if(trim(!empty($_POST['message']))){
	$body.='<p>'.$_POST['message'].'</p>';
}


// Отправляем
$mail->Body = $body;
if (!$mail->send()) {
	$message = 'Error';
} else {
	$message = 'Form send';
}

$response = ['message' => $message];

header('Content-type: application/json');
echo json_encode( $response )


?>