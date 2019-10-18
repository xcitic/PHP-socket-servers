<?php

include_once 'handler.php';

class Worker implements Handler
{
    public $busy = false;
    private $work;

    public function setWork($work)
    {
        $this->work = $work;
    }

    public function handleWork($work)
    {
        $this->setWork($work);

        $this->busy = true;
        try {
            $message = "Welcome to socket server v0.5\nWork ID: " . $this->work['id'] . "\n";
            socket_write($this->work['client'], $message);
            unset($this->work);
            $this->busy = false;
        } catch (\Exception $e) {
            return $e;
        }
    }

    public function isBusy()
    {
        return $this->busy;
    }

    public function isAvailable()
    {
        return !$this->busy;
    }

}