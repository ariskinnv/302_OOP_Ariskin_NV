<?php

function checkIfBalanced($expression)
{
    $stack = new Stack();
    for ($i = 0, $Pair = ''; $i < strlen($expression);)
    {
        $Char = $expression[$i++];
        switch($Char)
        {
            case '<':
                $Pair = '>';
                $stack->push('<');
                break;
            case '{':
                $Pair = '}';
                $stack->push('{');
                break;
            case '(':
                $Pair = ')';
                $stack->push('(');
                break;
            case '[':
                $Pair = ']';
                $stack->push('[');
                break;
        }
        if ($Char == $Pair)
        {
            $stack->pop();
            switch($stack->top())
            {
                case '<':
                    $Pair = '>';
                    break;
                case '{':
                    $Pair = '}';
                    break;
                case '(':
                    $Pair = ')';
                    break;
                case '[':
                    $Pair = ']';
                    break;
            }
        }
    } 
    return ($stack->isEmpty() ? True : False ) . PHP_EOL;
}
