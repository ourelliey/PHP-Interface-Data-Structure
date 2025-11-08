<?php
namespace MyLib\DataStructure\Implementations;

use MyLib\DataStructure\Interfaces\CollectionInterface;

class Stack implements CollectionInterface
{
    private array $stack = [];

    public function add(mixed $item): void
    {
        $this->stack[] = $item;
    }

    public function remove(mixed $item): bool
    {
        // Untuk stack: remove hanya pop dari atas
        if ($this->isEmpty()) {
            return false;
        }
        array_pop($this->stack);
        return true;
    }

    public function contains(mixed $item): bool
    {
        return in_array($item, $this->stack, true);
    }

    public function isEmpty(): bool
    {
        return empty($this->stack);
    }

    public function clear(): void
    {
        $this->stack = [];
    }

    public function toArray(): array
    {
        return $this->stack;
    }
}
