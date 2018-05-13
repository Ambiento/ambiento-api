<?php

class Occurrence{
    public static function getOccurrenceObjects(){
        $pdo = Database::connect();
        $sql = "SELECT * FROM Occurrence";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public static function getOccurrenceObject($id){
        $pdo = Database::connect();
        $sql = "SELECT * FROM Occurrence WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data[0]);
    }

    public static function createOccurrenceObject($ocorrencia){
        $pdo = Database::connect();
        $sql = "INSERT INTO Occurrence (user, city, state, reference, description, imgurl, latitude, longitude) VALUES (:user, :city, :state, :reference, :description, :imgurl, :latitude, :longitude)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($ocorrencia);
        $ocorrencia['id'] = $pdo->lastInsertId();
        return json_encode($ocorrencia);
    }

    public static function updateOccurrenceObject($ocorrencia){
        $pdo = Database::connect();
        $sql = "UPDATE Occurrence SET name = :name, writer = :writer, url = :url WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($ocorrencia);
        return json_encode($ocorrencia);
    }

    public static function deleteOccurrenceObject($id){
        $pdo = Database::connect();
        $sql = "DELETE FROM Occurrence WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}