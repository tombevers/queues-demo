<?php

require_once 'vendor/autoload.php';

$pheanstalk = new Pheanstalk_Pheanstalk('127.0.0.1', '13000');

while (true) {
    $job = $pheanstalk->watch('demo')
        ->ignore('default')
        ->reserve();

    echo $job->getData() . "\n";
    echo $job->getId() . "\n";
    sleep(1);

    $pheanstalk->delete($job);
}
