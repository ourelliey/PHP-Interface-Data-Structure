<?php
namespace MyLib\DataStructure\Implementations;

use MyLib\DataStructure\Interfaces\CollectionInterface;
use MyLib\DataStructure\Traits\IterableTrait;

class ArrayList implements CollectionInterface
{
    use IterableTrait;

    public function add(mixed $item): void
    {
        $this->elements[] = $item;
    }

    public function remove(mixed $item): bool
    {
        $index = array_search($item, $this->elements, true);
        if ($index === false) {
            return false;
        }
        array_splice($this->elements, $index, 1);
        return true;
    }

    public function contains(mixed $item): bool
    {
        return in_array($item, $this->elements, true);
    }

    public function clear(): void
    {
        $this->elements = [];
    }
}
