<?php
class Dbh{
  private $servidor;
  private $usuario;
  private $clave;
  private $db;

  protected function conectar(){
    $this->servidor='host';
    $this->usuario='usuario';
    $this->clave='clave';
    $this->db='dbnombre';

    try {
      $con=new mysqli($this->servidor,$this->usuario,$this->clave,$this->db);
      return $con;
    } catch (Exception $e) {
      echo $e->getMessage();
    }
  }
}