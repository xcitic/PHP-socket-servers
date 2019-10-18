#!/usr/bin/php
<?php

    require_once 'bootstrap.php';

	$socket = socket_create_listen(1337);


	if (!$socket) {
		echo 'Fatal error dude';
		exit;
	}

	while (true) {
		$client = socket_accept($socket);
		$queue->push($client);
        echo "\nQueue Size: ".$queue->count();

        $manager->assignWork($queue->pop());

        echo "\nQueue Size: " . $queue->count();

        socket_close($client);
	}






?>
