<?php

class Ocorrencia{
    public static function getOcorrenciaObjects(){
        $pdo = Database::connect();
        $sql = "SELECT * FROM Ocorrencia";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public static function getOcorrenciaObject($id){
        $pdo = Database::connect();
        $sql = "SELECT * FROM Ocorrencia WHERE idOcorrencia = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return json_encode($data);
    }

    public static function createOcorrenciaObject($ocorrencia){
        $pdo = Database::connect();
        $sql = "INSERT INTO Ocorrencia (nome_usuario, cidade, estado, referencia_localizacao, descricao, idImg, latitude, longitude) VALUES (:nome_usuario, :cidade, :estado, :referencia_localizacao, :descricao, :idImg, :latitude, :longitude)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($ocorrencia);
        $ocorrencia['id'] = $pdo->lastInsertId();
        return json_encode($ocorrencia);
    }

    public static function updateOcorrenciaObject($ocorrencia){
        $pdo = Database::connect();
        $sql = "UPDATE Ocorrencia SET name = :name, writer = :writer, url = :url WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($ocorrencia);
        return json_encode($ocorrencia);
    }

    public static function deleteOcorrenciaObject($id){
        $pdo = Database::connect();
        $sql = "DELETE FROM Ocorrencia WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
    }
}