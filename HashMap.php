<?php
class HashMap implements MapInterface {
    private $map = [];

    public function put($key, $value) {
        $this->map[$key] = $value;
    }

    public function get($key) {
        return $this->map[$key] ?? null;
    }

    public function containsKey($key) {
        return array_key_exists($key, $this->map);
    }

    public function add($item) {
        // Tidak digunakan langsung di HashMap
    }

    public function remove($key) {
        unset($this->map[$key]);
    }

    public function size() {
        return count($this->map);
    }

    public function isEmpty() {
        return empty($this->map);
    }

    public function getAll() {
        return $this->map;
    }
}