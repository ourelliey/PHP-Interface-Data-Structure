<?php
interface MapInterface extends CollectionInterface {
    public function put($key, $value);
    public function get($key);
    public function containsKey($key);
}