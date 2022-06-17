<?php

namespace Operation;

class Add extends Operation implements OperationContract
{
    public function operate()
    {
        return $this->firstNumber + $this->secondNumber;
    }
}