<?php
class ClaseBase {
    public function test() {
        echo "ClaseBase::test() llamada\n";
    }

    final public function masTests() {
        echo "ClaseBase::masTests() llamada\n";
    }
}

class ClaseHijo extends ClaseBase {
   

    public function test() {
        echo "ClaseHijo::test() llamada\n";
    }
}

$claseBase = new ClaseBase();
$claseHijo = new ClaseHijo();

$claseBase->test(); // Imprime: ClaseBase::test() llamada
$claseHijo->test(); // Imprime: ClaseHijo::test() llamada

$claseBase->masTests(); // Imprime: ClaseBase::masTests() llamada

?>
