<?php
class Customer {
    private $name;
    private $address;
    private $email;
    private $mobile;
    
    public function __construct($n, $a, $m, $e) {
        $this->name = $n;
        $this->address = $a;
        $this->mobile = $m;
        $this->email = $e;
    }
    
    public function getName() { return $this->name; }
    public function getAddress() { return $this->address; }
    public function getMobile() { return $this->mobile; }
    public function getEmail() { return $this->email; }
}
