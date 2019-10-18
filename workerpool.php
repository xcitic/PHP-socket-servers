<?php

require_once 'worker.php';

class WorkerPool extends Worker
{

    CONST NUMBER_OF_WORKERS = 5;
    private $workers = array();

    public function __construct()
    {
        $this->seedPool();
    }

    private function seedPool()
    {
        for ($i = 0; $i < 5; $i++) {
            $this->workers[] = new Worker();
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