<?php

class Book extends DBconnection{
    
    public $id;
    public $isbn;
    public $title;
    public $author;
    public $stock;
    public $price;
    public $books = [];

    public function __construct() {
        parent::__construct();
        $this->id;
        $this->isbn;
        $this->title;
        $this->author;
        $this->stock;
        $this->price;
    }
    public function getAllBooks() {
        $query = "SELECT * FROM `book`";
        $stmt = $this->getConnect()->prepare($query, array(PDO::FETCH_ASSOC));
        $stmt->execute();
        return $stmt->fetchAll();
    }
    public function getBookById($id) {
        $query = "SELECT * FROM `book` WHERE id = :id";
        $stmt = $this->getConnect()->prepare($query, array(PDO::FETCH_ASSOC));
        $stmt->execute(['id' => $id]);
        return $stmt->fetch();
    }

    public function updateStock($amounts = []) {
        foreach ($amounts as $book_id => $amount) {
            if ($amount > 0 && $amount <= $this->getBookById($book_id)['stock']) {
                $query = "UPDATE book SET stock = stock - :amount WHERE id = :book_id";
                $stmt = $this->getConnect()->prepare($query);
                $stmt->execute(['book_id' => $book_id, 'amount' => $amount]);
            }
        }
    }

    public function insercion_venta_libro($sale_id, $books = [] ) {
        foreach ($books as $book_id => $amount) {
            if ($amount > 0 && $amount <= $this->getBookById($book_id)['stock']) {
                $sql = "INSERT INTO sale_book (sale_id, book_id, amount) VALUES (:sale_id, :book_id, :amount)";
                $stmt = $this->getConnect()->prepare($sql);
                $stmt->execute([
                    ':sale_id' => $sale_id,
                    ':book_id' => $book_id,
                    ':amount' => $amount
                ]);
            }
        }
    }
    

}

?>