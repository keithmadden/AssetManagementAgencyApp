<?php

class PropertyTableGateway {

    private $connection;

    public function __construct($p) {
        $this->connection = $p;
    }

    public function getProperty() {
        
        $sqlQuery =
               "SELECT p.*, c.name AS customer
                FROM property p
                LEFT JOIN customer c ON c.`Customer ID` = p.customer_id";

        $statementProperty = $this->connection->prepare($sqlQuery);
        $status = $statementProperty->execute();

        if (!$status) {
            echo $status;
        }

        return $statementProperty;
    }

    public function getPropertyById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = 
                "SELECT p.*, c.name AS customer
                FROM property p
                LEFT JOIN customer c ON c.`Customer ID` = p.`Customer ID`
                WHERE p.property_id = :property_id";

        $statementProperty = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statementProperty->execute($params);

        if (!$status) {
            die("Could not retrieve property");
        }

        return $statementProperty;
    }

    public function insertProperty($a, $p, $d, $cId) {
        $sqlQuery = 
                "INSERT INTO property " .
                "(address, price, date, `Customer ID`) " .
                "VALUES (:address, :price, :date, :CustomerID)";

        $statementProperty = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "price" => $p,
            "date" => $m,
            "CustomerID" => $cId
        );

        $status = $statementProperty->execute($params);

        if (!$status) {
            die("Could not insert property");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteProperty($id) {
        $sqlQuery = "DELETE FROM property WHERE property_id = :id";

        $statementProperty = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statementProperty->execute($params);

        if (!$status) {
            die("Could not delete property");
        }

        return ($statementProperty->rowCount() == 1);
    }

    public function updateProperty($id, $a, $p, $d, $cId) {
        $sqlQuery =
                "UPDATE branch SET " .
                "address = :address, " .
                "price = :price, " . 
                "date = :date " .
                "`Customer ID` = :customer_id " .
                "WHERE property_id = :id";

        $statementProperty = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "address" => $a,
            "price" => $p,
            "date" => $d
        );

        $status = $statementProperty->execute($params);

        return ($statementProperty->rowCount() == 1);
    }
}
