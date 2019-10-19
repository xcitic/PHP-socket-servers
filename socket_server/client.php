#!/usr/bin/php
<?php
$fp = fsockopen('127.0.0.1', 1337);
if ($fp) {
    while (!feof($fp)) {
        print fread($fp, 2056);
    }
    fclose($fp);
} else {
    print 'Fatal error dude!';
}
