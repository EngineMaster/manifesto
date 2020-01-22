<?php
// Файлы phpmailer
require 'lib/phpmailer/PHPMailer.php';
require 'lib/phpmailer/SMTP.php';
require 'lib/phpmailer/Exception.php';
// Переменные, которые отправляет пользователь
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$bio = $_POST['bio'];
$opty = $_POST['opty'];
$mail = new PHPMailer\PHPMailer\PHPMailer();
try {
    $msg = "ok";
    $mail->isSMTP();   
    $mail->CharSet = "UTF-8";                                          
    $mail->SMTPAuth   = true;
    $mail->SMTPDebug = 2;
    // Настройки вашей почты
    $mail->Host       = 'ssl://smtp.mail.ru'; // SMTP сервера MAIL
    $mail->Username   = 'bdbuilder@mail.ru'; // Логин на почте
    $mail->Password   = 'POOP290'; // Пароль на почте
    $mail->SMTPSecure = 'ssl';
    $mail->Port       = 465;
    $mail->setFrom('bdbuilder@mail.ru', 'BD Building Company'); // Адрес самой почты и имя отправителя
    // Получатель письма    
    $mail->addAddress('bdbuilder@mail.ru','Gelik');  
    // Прикрипление файлов к письму
if (!empty($_FILES['myfile']['name'][0])) {
    for ($ct = 0; $ct < count($_FILES['myfile']['tmp_name']); $ct++) {
        $uploadfile = tempnam(sys_get_temp_dir(), sha1($_FILES['myfile']['name'][$ct]));
        $filename = $_FILES['myfile']['name'][$ct];
        if (move_uploaded_file($_FILES['myfile']['tmp_name'][$ct], $uploadfile)) {
            $mail->addAttachment($uploadfile, $filename);
        } else {
            $msg .= 'Неудалось прикрепить файл ' . $uploadfile;
        }
    }   
}

$mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
        // -----------------------
        // Само письмо
        // -----------------------
        $mail->isHTML(true);
    
        $mail->Subject = 'Ремонтные Работы';
        $mail->Body    = "<b>Вам пришло уведомление от</b> $name <br>
        <b>Почта: </b> $email<br>
        <b>Номер телефона: </b>$phone<br>
        <b>Сообщение: </b>$bio<br>
        <b>Услуга: </b>$opty<br>
        ";
// Проверяем отравленность сообщения
if ($mail->send()) {
    echo "$msg";
} else {
echo "Сообщение не было отправлено. Неверно указаны настройки вашей почты";
}
} catch (Exception $e) {
    echo "Сообщение не было отправлено. Причина ошибки: {$mail->ErrorInfo}";
}

header('Location: contact.html');