<?php
require_once __DIR__ . '/autoload.php';

echo "=== ArrayList ===\n";
$a = new ArrayList([1, 2, 3]);
$a->add(4);
$a->addAt(2, 99);
print_r($a->toArray());
echo "remove 2: ";
$a->remove(2);
print_r($a->toArray());
echo "indexOf 99: " . $a->indexOf(99) . "\n\n";

echo "=== LinkedList ===\n";
$l = new LinkedList(['a', 'b', 'c']);
$l->add('d');
$l->addAt(1, 'x');
print_r($l->toArray());
echo "removeAt(2): " . $l->removeAt(2) . "\n";
print_r($l->toArray());
echo "\n";

echo "=== HashMap ===\n";
$m = new HashMap();
$m->put('name', 'Andi');
$m->put('age', 30);
echo "name: " . $m->get('name') . "\n";
print_r($m->keys());
print_r($m->values());
$m->remove('age');
echo "size: " . $m->size() . "\n\n";

echo "=== Queue ===\n";
$q = new Queue();
$q->offer('first');
$q->offer('second');
$q->offer('third');
echo "peek: " . $q->peek() . "\n";
echo "poll: " . $q->poll() . "\n";
print_r($q->toArray());
echo "\n";

echo "=== Stack ===\n";
$s = new Stack();
$s->push('one');
$s->push('two');
echo "peek: " . $s->peek() . "\n";
echo "pop: " . $s->pop() . "\n";
print_r($s->toArray());
echo "\n";

echo "\n=== Task Manager ===\n";
$tasks = new Queue();
$taskDetails = new HashMap();
$taskDetails->put('task1', 'Backup database');
$taskDetails->put('task2', 'Send email newsletter');
$taskDetails->put('task3', 'Clean temp files');
$tasks->offer('task1');
$tasks->offer('task2');
$tasks->offer('task3');
while (!$tasks->isEmpty()) {
    $taskId = $tasks->poll();
    echo "Running: [$taskId] " . $taskDetails->get($taskId) . "\n";
}
echo "Semua tugas selesai!\n";

echo "\n=== Shopping Cart ===\n";
$cart = new ArrayList();
$prices = new HashMap();
$cart->add('Apple');
$cart->add('Banana');
$cart->add('Orange');
$prices->put('Apple', 10000);
$prices->put('Banana', 5000);
$prices->put('Orange', 8000);
$total = 0;
foreach ($cart->toArray() as $item) {
    $total += $prices->get($item);
}
echo "Items: " . implode(', ', $cart->toArray()) . "\n";
echo "Total: Rp" . number_format($total) . "\n";
$cart->remove('Banana');
echo "After removing Banana:\n";
print_r($cart->toArray());

echo "\n=== Undo / Redo System ===\n";
$undo = new Stack();
$redo = new Stack();

$do = function ($action) use ($undo, $redo) {
    $undo->push($action);
    $redo->clear();
    echo "Action done: $action\n";
};

$undoAction = function () use ($undo, $redo) {
    if ($undo->isEmpty()) {
        echo "Nothing to undo\n";
        return;
    }
    $a = $undo->pop();
    $redo->push($a);
    echo "Undo: $a\n";
};

$redoAction = function () use ($undo, $redo) {
    if ($redo->isEmpty()) {
        echo "Nothing to redo\n";
        return;
    }
    $a = $redo->pop();
    $undo->push($a);
    echo "Redo: $a\n";
};

$do("Type 'Hello'");
$do("Type 'World'");
$undoAction();
$redoAction();
$undoAction();
$undoAction();
