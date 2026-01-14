<?php

class Sale extends DBconnection {
    
    public $customer_id;
    public $date;
    public $id;

    public function __construct($customer_id, $date) {
        parent::__construct();
        $this->customer_id = $customer_id;
        $this->date = $date;
    }
    
    public function addSale() {
        $customer_id = $this->customer_id;
        $date = $this->date;
        $sql = "INSERT INTO sale (customer_id, date) VALUES (:customer_id, :date)";
        $stmt = $this->getConnect()->prepare($sql);
        $stmt->execute([':customer_id' => $customer_id, ':date' => $date]);
        $this->id = $this->getConnect()->lastInsertId();
    }

    public function getSaleId() {
        return $this->id;
    }

}

?>