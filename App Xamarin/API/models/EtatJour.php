<?php
  class EtatJour {

    private $conn;
    private $table = 'calendrierconges';

    public $idVisiteur;
    public $jour;
    public $etatjour;
    public $nbJour;

    public function __construct($db) {
      $this->conn = $db;
    }
    public function read() {
      $query = 'SELECT * from calendrierconges WHERE idVisiteur = ? AND MONTH(jour)= ? ';


      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(1, $this->idVisiteur);
      $stmt->bindParam(2, $this->mois);

      $stmt->execute();

      return $stmt;
    }
    
      public function nombreEtatJour() {
      $query = 'SELECT COUNT(jour) AS nbJour from calendrierconges WHERE idVisiteur = ? AND etatjour NOT IN("JTR") AND etatjour NOT IN ("WE")
AND etatjour NOT IN ("JF")';


      $stmt = $this->conn->prepare($query);

      $stmt->bindParam(1, $this->idVisiteur);

      $stmt->execute();

      return $stmt;
    }

    public function update() {

          $query = 'UPDATE ' . $this->table . '
                                SET etatjour = :body
                                WHERE idVisiteur = :id AND jour = :category_id';


          $stmt = $this->conn->prepare($query);

          $this->etatjour = htmlspecialchars(strip_tags($this->etatjour));
          $this->jour = htmlspecialchars(strip_tags($this->jour));
          $this->idVisiteur = htmlspecialchars(strip_tags($this->idVisiteur));

          $stmt->bindParam(':body', $this->etatjour);
          $stmt->bindParam(':category_id', $this->jour);
          $stmt->bindParam(':id', $this->idVisiteur);

          if($stmt->execute()) {
            return true;
          }

          printf("Error: %s.\n", $stmt->error);

          return false;
    }

  }
