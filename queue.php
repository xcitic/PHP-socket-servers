<?php

include_once 'stack.php';

class Queue implements Stack
{
    private static $id;
    private $stack = array();

    public function __construct()
    {
        $this->id = 0;
    }

    public function push($client)
    {
        $this->id++;
        $data = [
            'id' => $this->id,
            'client' => $client
        ];
        $this->stack[] = $data;
    }

    public function pop()
    {
        return array_shift($this->stack);
    }

    public function peek()
    {

    }

    public function count()
    {
        return count($this->stack);
    }

}