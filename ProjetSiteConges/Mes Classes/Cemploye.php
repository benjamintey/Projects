<?php
require_once 'Cdao.php';
class Cemploye
{
    public $id;
    public $login;
    public $mdp;
    public $nom;
    public $prenom;
        public function __construct($sid, $slogin, $smdp, $snom, $sprenom)
    {
         $this->id = $sid;
         $this->login = $slogin;
         $this->mdp = $smdp;
         $this->nom = $snom;
         $this->prenom = $sprenom;
    }

}
