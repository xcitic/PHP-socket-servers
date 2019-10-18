#!/bin/usr/php
<?php

class Manager
{
    private $pool = array();

    public function __construct(WorkerPool $pool)
    {
        $this->pool = $pool;
    }

    public function assignWork($work)
    {
        $worker = $this->getWorker();
        $worker->handleWork($work);
    }

    public function getWorker()
    {
        $this->pool->getAvailableWorker();
    }

}
