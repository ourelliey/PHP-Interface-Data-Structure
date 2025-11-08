<?php
interface QueueInterface extends CollectionInterface {
    public function enqueue($item);
    public function dequeue();
    public function peek();
}