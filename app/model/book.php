<?php
class Book{
    private $pdo;

    public function getBookObjects(){
        $pdo = Database::connect();
        $sql = "SELECT * FROM Book";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public function getBookObject($id){
        $pdo = Database::connect();
        $sql = "SELECT * FROM Book WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public function createBookObject($book){
        $pdo = Database::connect();
        $sql = "INSERT INTO Book (name, writer, url) VALUES (:name, :writer, :url)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($book);
        $book['id'] = $pdo->lastInsertId();
        return json_encode($book);
    }

    public function updateBookObject($book){
        $pdo = Database::connect();
        $sql = "UPDATE Book SET name = :name, writer = :writer, url = :url WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($book);
        return json_encode($book);
    }

    public function deleteBookObject($id){
        $pdo = Database::connect();
        $sql = "DELETE FROM Book WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}
