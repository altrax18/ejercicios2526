<?php

class Customer extends DBconnection{
    
    public $id;
    public $name;
    public $email;
    public $address;
    public $phone;

    public function __construct() {
        parent::__construct();
        $this->id;
        $this->name;
        $this->email;
        $this->address;
        $this->phone;
    }

    public function getAllCustomers() {
        $query = "SELECT * FROM `customer`";
        $stmt = $this->getConnect()->prepare($query, array(PDO::FETCH_ASSOC));
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getCustomerById($id) {
        $query = "SELECT * FROM `customer` WHERE id = :id";
        $stmt = $this->getConnect()->prepare($query, array(PDO::FETCH_ASSOC));
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    

}   

?>