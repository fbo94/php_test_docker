<?php

use Factory\OperatorFactory;

class Calculator
{
    private $regexGlobal = '/\d{1,}(\+|\-|\*|x|\/)\d{1,}\)\s(\+|\-|\*|x|\/)\s\(\d{1,}(\+|\-|\*|x|\/)\d{1,}\)/';
    private $regexSub = '/\d{1,}(\+|\-|\*|x|\/)\d{1,}/';

    /**
     * Prend en paramètre une chaine de crarctères au format "(nb1 + nb2) * (nb3 - nb4)"
     *
     * @param string $argumentOperation
     * @return float|int
     * @throws \Exception
     */
    public function calculate($argumentOperation)
    {
        preg_match($this->regexGlobal,$argumentOperation,$matches);
        array_shift($matches);

        if(count($matches)<3) {
            throw new Exception('Mauvais nombre d\'arguments');
        }

        array_shift($matches);
        $mainOperator = trim(array_shift($matches));

        $operationsArray = explode($mainOperator, $argumentOperation);

        $regexSub = $this->regexSub;
        $operations = array_map(function ($operation) use ($regexSub) {
            preg_match(
                $regexSub,
                trim($operation),$matchesOperation);

            list($subOperation,$operator) = $matchesOperation;
            list($firstNumber,$secondNumber) = explode($operator, $subOperation,2);
            return OperatorFactory::get($firstNumber,$secondNumber,$operator)->operate();
        },$operationsArray);

        return OperatorFactory::get($operations[0],$operations[1],$mainOperator)->operate();
    }
}