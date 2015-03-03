<?php
class Connection {

    private static $connection = NULL;

    public static function getInstance() {
        if (Connection::$connection === NULL) {
            // connect to the database

            $host = "daneel";
            $database = "n00134034";
            $username = "N00134034";
            $password = "N00134034";

            $host = "localhost";
            $database = "n00134034";
            $username = "root";
            $password = "";

            $dsn = "mysql:host=" . $host . ";dbname=" . $database;
            Connection::$connection = new PDO($dsn, $username, $password);
            if (!Connection::$connection) {
                die("Could not connect to database");
            }
        }

        return Connection::$connection;
    }
}
