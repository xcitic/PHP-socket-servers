#!/usr/bin/php

<?php 
$fp = fsockopen('127.0.0.1', 1337);
if ($fp) {
	fwrite($fp, 'Client Connected!');

	while (!feof($fp)) {
		print fread($fp, 2056);
		$msg = readline();
        fwrite($fp, $msg);

	}
	
	fclose($fp);
	} else {
		print 'Fatal error dude!';
	}
?>
