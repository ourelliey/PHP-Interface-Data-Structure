<?php
require_once __DIR__ . '/ListInterface.php';

class LinkedList implements ListInterface
{
    private $head = null;
    private $tail = null;
    private $count = 0;

    private function node($value, $next = null)
    {
        return (object)['value' => $value, 'next' => $next];
    }

    public function __construct(array $init = [])
    {
        foreach ($init as $v) $this->add($v);
    }

    public function size(): int
    {
        return $this->count;
    }
    public function isEmpty(): bool
    {
        return $this->count === 0;
    }
    public function clear(): void
    {
        $this->head = $this->tail = null;
        $this->count = 0;
    }
    public function contains($element): bool
    {
        return $this->indexOf($element) !== -1;
    }

    public function add($element): bool
    {
        $n = $this->node($element);
        if ($this->tail === null) {
            $this->head = $this->tail = $n;
        } else {
            $this->tail->next = $n;
            $this->tail = $n;
        }
        $this->count++;
        return true;
    }

    public function remove($element): bool
    {
        $prev = null;
        $cur = $this->head;
        while ($cur !== null) {
            if ($cur->value === $element) {
                if ($prev === null) { // head
                    $this->head = $cur->next;
                } else {
                    $prev->next = $cur->next;
                }
                if ($cur === $this->tail) $this->tail = $prev;
                $this->count--;
                return true;
            }
            $prev = $cur;
            $cur = $cur->next;
        }
        return false;
    }

    public function toArray(): array
    {
        $arr = [];
        $cur = $this->head;
        while ($cur !== null) {
            $arr[] = $cur->value;
            $cur = $cur->next;
        }
        return $arr;
    }

    private function getNodeAt(int $index)
    {
        if ($index < 0 || $index >= $this->count) throw new OutOfBoundsException("Index $index out of bounds");
        $cur = $this->head;
        $i = 0;
        while ($i < $index) {
            $cur = $cur->next;
            $i++;
        }
        return $cur;
    }

    public function get(int $index)
    {
        return $this->getNodeAt($index)->value;
    }

    public function set(int $index, $element)
    {
        $this->getNodeAt($index)->value = $element;
    }

    public function addAt(int $index, $element): bool
    {
        if ($index < 0 || $index > $this->count) throw new OutOfBoundsException("Index $index out of bounds");
        if ($index === $this->count) return $this->add($element);

        if ($index === 0) {
            $n = $this->node($element, $this->head);
            $this->head = $n;
            if ($this->tail === null) $this->tail = $n;
            $this->count++;
            return true;
        }

        $prev = $this->getNodeAt($index - 1);
        $n = $this->node($element, $prev->next);
        $prev->next = $n;
        $this->count++;
        return true;
    }

    public function removeAt(int $index)
    {
        if ($index < 0 || $index >= $this->count) throw new OutOfBoundsException("Index $index out of bounds");
        if ($index === 0) {
            $val = $this->head->value;
            $this->head = $this->head->next;
            if ($this->head === null) $this->tail = null;
            $this->count--;
            return $val;
        }
        $prev = $this->getNodeAt($index - 1);
        $val = $prev->next->value;
        $prev->next = $prev->next->next;
        if ($prev->next === null) $this->tail = $prev;
        $this->count--;
        return $val;
    }

    public function indexOf($element): int
    {
        $i = 0;
        $cur = $this->head;
        while ($cur !== null) {
            if ($cur->value === $element) return $i;
            $cur = $cur->next;
            $i++;
        }
        return -1;
    }
}