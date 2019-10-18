#!/usr/bin/php
<?php

class WorkerPool
{

    CONST NUMBER_OF_WORKERS = 5;
    private $workers = array();

    public function __construct()
    {
        $this->seedPool();
    }

    private function seedPool()
    {
        for ($i = 0; $i < self::NUMBER_OF_WORKERS; $i++) {
            $workers[] = new Worker();
        }
    }

    public function getAvailableWorker()
    {
        foreach ($this->workers as $worker) {
            if ($worker->isAvailable()) {
                return $worker;
            }
        }
    }

}