<?php

namespace Operation;

abstract class Operation
{
    protected $firstNumber;
    protected $secondNumber;

    public function __construct($firstNumber, $secondNumber)
    {
        $this->firstNumber = $firstNumber;
        $this->secondNumber = $secondNumber;
    }
}