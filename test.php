#!/usr/bin/php
<?php

for ($i = 0; $i < 100; $i++) {
    //exec('php client.php > /dev/null &');
    `./client.php`;
}