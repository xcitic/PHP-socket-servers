<?php

require_once 'worker.php';
require_once 'workerpool.php';
require_once 'manager.php';
require_once 'queue.php';

$workerPool = new WorkerPool();
$manager = new Manager($workerPool);
$queue = new Queue();