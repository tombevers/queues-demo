<?php

require_once 'vendor/autoload.php';

$pheanstalk = new Pheanstalk_Pheanstalk('127.0.0.1', '13000');

while (true) {
    $job = $pheanstalk->watch('email')
        ->ignore('default')
        ->reserve();

    $data = json_decode($job->getData());

    $transport = Swift_SmtpTransport::newInstance('localhost', 1025);
    $mailer = Swift_Mailer::newInstance($transport);

    $message = Swift_Message::newInstance($data->subject, $data->message);
    $message->setFrom('info@info.com')
        ->setTo($data->email);

    // Send the message
    $mailer->send($message);
    echo $job->getId() . "\n";

    $pheanstalk->delete($job);
}
