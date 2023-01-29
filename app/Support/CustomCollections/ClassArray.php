<?php

namespace App\Support\CustomCollections;

use InvalidArgumentException;

abstract class ClassArray extends \ArrayObject
{
    abstract protected function className(): string;

    public function __construct(array $objects)
    {
        array_walk($objects, [$this, 'validateType']);
        parent::__construct($objects);
    }

    public function offsetSet($key, $value)
    {
        $this->validateType($value);
        parent::offsetSet($key, $value);
    }

    private function validateType($value)
    {
        if (!is_object($value) || !($value instanceof $this->className)) {
            throw new InvalidArgumentException('Only objects of type ' . $this->className . ' allowed.');
        }
    }
}
