<?php

class Animal {

    private $conn;
    private $table = "animais";

    public function __construct($db) {
        $this->conn = $db;
    }

    public function create($nome, $serie, $rgn, $sexo, $dt_nasc) {

        $query = "INSERT INTO {$this->table}
                  (nome, serie, rgn, sexo, dt_nasc)
                  VALUES (:nome, :serie, :rgn, :sexo, :dt_nasc)";

        $stmt = $this->conn->prepare($query);

        $stmt->bindParam(":nome", $nome);
        $stmt->bindParam(":serie", $serie);
        $stmt->bindParam(":rgn", $rgn);
        $stmt->bindParam(":sexo", $sexo);
        $stmt->bindParam(":dt_nasc", $dt_nasc);

        return $stmt->execute();
    }

    public function read($onlyOlderThanTwo = false) {

        $query = "SELECT *,
                  TIMESTAMPDIFF(YEAR, dt_nasc, CURDATE()) AS idade
                  FROM {$this->table}";

        if ($onlyOlderThanTwo) {
            $query .= " WHERE TIMESTAMPDIFF(YEAR, dt_nasc, CURDATE()) > 2";
        }

        $query .= " ORDER BY created_at DESC";

        $stmt = $this->conn->prepare($query);
        $stmt->execute();

        return $stmt;
    }
}