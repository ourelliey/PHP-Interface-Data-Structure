<?php
namespace MyLib\DataStructure\Interfaces;

interface CollectionInterface
{
    public function add(mixed $item): void;
    public function remove(mixed $item): bool;
    public function contains(mixed $item): bool;
    public function isEmpty(): bool;
    public function clear(): void;
    public function toArray(): array;
}
