<?php

interface Stack
{
    public function push($client);

    public function pop();

    public function peek();

    public function count();
}