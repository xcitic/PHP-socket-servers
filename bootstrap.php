<?php

include_once 'worker.php';
include_once 'workerpool.php';
include_once 'manager.php';
include_once 'queue.php';

$workerPool = new WorkerPool();
$manager = new Manager($workerPool);
$queue = new Queue();