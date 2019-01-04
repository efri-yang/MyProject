<?php

class Father {

    public function getNewFather() {
        return new self();
    }

    public function getNewCaller() {
        return new static();
    }

}
class Sun1 extends Father {

}

class Sun2 extends Father {

}
$sun1 = new Sun1();
$sun2 = new Sun2();
print get_class($sun1->getNewFather());
echo "<br/>";
print get_class($sun1->getNewCaller());
echo "<br/>";
print get_class($sun2->getNewFather());
echo "<br/>";
print get_class($sun2->getNewCaller());
?>
  