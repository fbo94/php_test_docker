<?php

namespace Operation;

class Divide extends Operation implements OperationContract
{
    public function operate()
    {
        return $this->firstNumber / $this->secondNumber;
    }
}