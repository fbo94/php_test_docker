<?php

namespace Operation;

class Sub extends Operation implements OperationContract
{
    public function operate()
    {
        return $this->firstNumber - $this->secondNumber;
    }
}