<?php

namespace Operation;

class Multiply extends Operation implements OperationContract
{
    public function operate()
    {
        return $this->firstNumber * $this->secondNumber;
    }
}