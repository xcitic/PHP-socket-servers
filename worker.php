<?php

include_once 'handler.php';

class Worker implements Handler
{
    public $busy = false;
    private $work;

    public function getWork($work)
    {
        $this->work = $work;
    }

    public function handleWork()
    {
        if (!empty($this->work)) {
            $this->busy = true;
            try {
                $message = "\nWelcome to socket server v0.4\nWork ID: ".$this->work['id']."\n";
                socket_write($this->work['client'], $message);
                unset($this->work);
                $this->busy = false;
            } catch (\Exception $e) {
                return $e;
            }
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