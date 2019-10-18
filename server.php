#!/usr/bin/php

<?php

    require_once 'queue.php';
    require_once 'worker.php';

	$socket = socket_create_listen(1337);

	$queue = new Queue();
	$worker = new Worker();


	if (!$socket) {
		echo 'Fatal error dude';
		exit;
	}

	while (true) {
		$client = socket_accept($socket);
		$queue->push($client);
        echo "\n".$queue->count();
        $worker->getWork($queue->pop());
        $worker->handleWork();

	}
    socket_close($client);





?>
