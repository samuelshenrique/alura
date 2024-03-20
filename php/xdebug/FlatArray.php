<?php

class FlatArray implements IteratorAggregate
{
    private array $flatArray;

    public function __construct(array $originalArray)
    {
        $this->flatArray = [];
        $this->flattenArray($originalArray);        
    }

    private function flattenArray(array $originalArray)
    {
        $this->flatArray = array_merge(...$originalArray);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->flatArray);
    }

}