<?php
  class Visiteur {
    // DB stuff
    private $conn;
    private $table = 'visiteur';

    // Post Properties
    public $id;
    public $nom;
    public $prenom;
    public $login;
    public $mdp;
    public $adresse;


    // Constructor with DB
    public function __construct($db) {
      $this->conn = $db;
    }

    // Get Posts
    public function read() {
      // Create query
      $query = 'SELECT * FROM employe';

      // Prepare statement
      $stmt = $this->conn->prepare($query);

      // Execute query
      $stmt->execute();

      return $stmt;
    }

  }
