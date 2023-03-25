<?php

class Stack implements StackInterface
{
	private $Array_Stack = array();
	private $Count_Stack = 0;

    function __construct(...$Array)
    {
		$this->push(...$Array);
	}	
	
    public function push(...$Array)
    {
        foreach ($Array as $Element)
            $this->Array_Stack[$this->Count_Stack++] = $Element;
    }
	
	public function pop()
    {
        $Element = $this->top();
        if (!$Element)
            return null;
        $this->Array_Stack[--$this->Count_Stack] = false;
        return $Element;
    }
	
	public function top()
    {
        return ($this->isEmpty() ? false : $this->Array_Stack[$this->Count_Stack - 1] );
    }
	
	public function isEmpty()
    {
        if (count($this->Array_Stack) == 0) {
            echo 'Стэк пуст' . PHP_EOL;
            return true;
        } else {
            echo 'Стэк не пуст' . PHP_EOL;
            return false;
        }
    }
	
	public function copy()
    {
        $New_Stack = new Stack();
        $New_Stack->push(...$this->Array_Stack);
        return $New_Stack;
    }

    public function __toString()
    {
        return $this->Cout_Array($this->Count_Stack - 1);
    }
}
