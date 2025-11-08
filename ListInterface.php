<?php
interface ListInterface extends CollectionInterface {
    public function get($index);
    public function set($index, $value);
}