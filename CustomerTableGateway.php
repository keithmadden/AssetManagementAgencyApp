<?php

class CustomerTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getCustomers() {
        // execute a query to get all customer
        $sqlQuery = 
                "SELECT c.*, b.address AS bankAddress
                FROM customer c
                LEFT JOIN branch b ON b.branch_id = c.branch_id";

        $statement = $this->connection->prepare($sqlQuery);
        $status = $statement->execute();

        if (!$status) {
            die("Could not retrieve customers");
        }

        return $statement;
    }

    public function getCustomerById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = 
                    "SELECT c.*, b.address AS bankAddress
                    FROM customer c
                    LEFT JOIN branch b ON b.branch_id = c.branch_id
                    WHERE c.`Customer ID` = :CustomerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "CustomerID" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not retrieve user");
        }

        return $statement;
    }

    public function insertCustomer($n, $a, $m, $e, $bId) {
        $sqlQuery = "INSERT INTO customer " .
                "(name, address, mobile, email, branch_id) " .
                "VALUES (:name, :address, :mobile, :email, :branch_id)";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "name" => $n,
            "address" => $a,
            "mobile" => $m,
            "email" => $e,
            "branch_id" => $bId
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not insert customer");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteCustomer($id) {
        $sqlQuery = "DELETE FROM customer WHERE `Customer ID` = :CustomerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "CustomerID" => $id
        );

        $status = $statement->execute($params);

        if (!$status) {
            die("Could not delete user");
        }

        return ($statement->rowCount() == 1);
    }

    public function updateCustomer($id, $n, $a, $m, $e, $bId) {
        $sqlQuery =
                "UPDATE customer SET " .
                "branch_id = :branch_id, " .
                "name = :name, " .
                "address = :address, " . 
                "mobile = :mobile, " .
                "email = :email " .
                "WHERE `Customer ID` = :CustomerID";

        $statement = $this->connection->prepare($sqlQuery);
        $params = array(
            "CustomerID" => $id,
            "branch_id" => $bId,
            "name" => $n,
            "address" => $a,
            "mobile" => $m,
            "email" => $e
        );

        $status = $statement->execute($params);

        return ($statement->rowCount() == 1);
    }
}