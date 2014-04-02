<?php

require_once 'vendor/autoload.php';

$pheanstalk = new Pheanstalk_Pheanstalk('127.0.0.1', '13000');

for ($i = 1000; $i > 0; $i--) {
    $pheanstalk->useTube('email')
        ->put('{"email": "tom.bevers@phpro.be", "subject": "Hello!", "message": "Hello queue!"}');
}
