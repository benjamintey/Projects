<?php
  class Database {
    // DB Params
    private $host = 'fdb18.biz.nf';
    private $db_name = '3069581_gsb';
    private $username = '3069581_gsb';
    private $password = 'zephiro17';
    private $conn;

    // DB Connect
    public function connect() {
      $this->conn = null;

      try {
        $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      } catch(PDOException $e) {
        echo 'Connection Error: ' . $e->getMessage();
      }

      return $this->conn;
    }
  }