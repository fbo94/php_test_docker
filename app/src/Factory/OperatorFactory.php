<?php

namespace Factory;

use Operation\Add;
use Operation\Divide;
use Operation\Multiply;
use Operation\Sub;

class OperatorFactory
{
    /**
     * @param float|int $firstNumber
     * @param float|int $secondNumber
     * @param string $operator
     * @return \Operation\Operation
     */
    public static function get($firstNumber, $secondNumber, $operator){
        switch ($operator) {
            case '+' :
                return new Add($firstNumber,$secondNumber);
            case '-' :
                return new Sub($firstNumber,$secondNumber);
            case '*' :
            case 'x' :
                return new Multiply($firstNumber,$secondNumber);
            case '/' :
                return new Divide($firstNumber,$secondNumber);
            default:
                throw new \InvalidArgumentException('Le signal est inconnu');
        }
    }
}