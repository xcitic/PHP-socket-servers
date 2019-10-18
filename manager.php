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
        var_dump($this->pool);
        var_dump($worker);
        $worker->handleWork($work);
    }

    public function getWorker()
    {
        return $this->pool->getAvailableWorker();
    }

}
