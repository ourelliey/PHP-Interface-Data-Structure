<?php
class Queue implements QueueInterface {
    private $queue = [];

    public function enqueue($item) {
        array_push($this->queue, $item);
    }

    public function dequeue() {
        return array_shift($this->queue);
    }

    public function peek() {
        return $this->queue[0] ?? null;
    }

    public function add($item) {
        $this->enqueue($item);
    }

    public function remove($item) {
        $index = array_search($item, $this->queue);
        if ($index !== false) {
            unset($this->queue[$index]);
        }
    }

    public function size() {
        return count($this->queue);
    }

    public function isEmpty() {
        return empty($this->queue);
    }

    public function getAll() {
        return $this->queue;
    }
}