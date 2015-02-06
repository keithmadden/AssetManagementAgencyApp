<?php
class Branch {
    private $address;
    private $phone;
    private $manager;
    private $hours;
    
    public function __construct($a, $p, $m, $h) {
        $this->address = $a;
        $this->phone = $p;
        $this->manager = $m;
        $this->hours = $h;
    }
    
    public function getAddress() { return $this->address; }
    public function getPhone() { return $this->phone; }
    public function getManager() { return $this->manager; }
    public function getHours() { return $this->hours; }
}