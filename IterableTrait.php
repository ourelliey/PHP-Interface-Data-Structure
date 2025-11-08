<?php
namespace MyLib\DataStructure\Traits;

trait IterableTrait
{
    protected array $elements = [];

    public function toArray(): array
    {
        return $this->elements;
    }

    public function isEmpty(): bool
    {
        return empty($this->elements);
    }
}
