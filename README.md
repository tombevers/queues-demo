queues-demo
===========

Source files used during a workshop about queues @ phpro.be

Usage
=====

* git clone https://github.com/tombevers/queues-demo
* cd queues-demo/vagrant
* vagrant up
* vagrant ssh
* cd /var/www/queues

Execute both a producer and one or multiple workers

* php Producer.php
* php Worker.php

Applications
============

* **Beanstalk console:** http://192.168.56.133/beanstalk_console/public/
* **Mailcatcher:** http://192.168.56.133:1080
