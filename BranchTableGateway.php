<?php

class BranchTableGateway {

    private $connection;

    public function __construct($c) {
        $this->connection = $c;
    }

    public function getBranches() {
        // execute a query to get all customer
        $sqlQuery = "SELECT * FROM branch";

        $statementBranch = $this->connection->prepare($sqlQuery);
        $status = $statementBranch->execute();

        if (!$status) {
            die("Could not retrieve branches");
        }

        return $statementBranch;
    }

    public function getBranchById($id) {
        // execute a query to get the user with the specified id
        $sqlQuery = "SELECT * FROM branch WHERE branch_id = :id";

        $statementBranch = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statementBranch->execute($params);

        if (!$status) {
            die("Could not retrieve branch");
        }

        return $statementBranch;
    }

    public function insertBranch($a, $p, $m, $h) {
        $sqlQuery = "INSERT INTO branch " .
                "(address, phone, manager, hours) " .
                "VALUES (:address, :phone, :manager, :hours)";

        $statementBranch = $this->connection->prepare($sqlQuery);
        $params = array(
            "address" => $a,
            "phone" => $p,
            "manager" => $m,
            "hours" => $h
        );

        $status = $statementBranch->execute($params);

        if (!$status) {
            die("Could not insert branch");
        }

        $id = $this->connection->lastInsertId();

        return $id;
    }

    public function deleteBranch($id) {
        $sqlQuery = "DELETE FROM branch WHERE branch_id = :id";

        $statementBranch = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id
        );

        $status = $statementBranch->execute($params);

        if (!$status) {
            die("Could not delete branch");
        }

        return ($statementBranch->rowCount() == 1);
    }

    public function updateBranch($id, $a, $p, $m, $h) {
        $sqlQuery =
                "UPDATE branch SET " .
                "address = :address, " .
                "phone = :phone, " . 
                "manager = :manager, " .
                "hours = :hours " .
                "WHERE branch_id = :id";

        $statementBranch = $this->connection->prepare($sqlQuery);
        $params = array(
            "id" => $id,
            "address" => $a,
            "phone" => $p,
            "manager" => $m,
            "hours" => $h
        );

        $status = $statementBranch->execute($params);

        return ($statementBranch->rowCount() == 1);
    }
}