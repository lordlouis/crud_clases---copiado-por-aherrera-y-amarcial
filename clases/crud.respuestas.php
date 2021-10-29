<?php
class VerPersonas extends Personas{
  public function verTodasPersonas(){
    $todos=$this->getTodasPersonasConsulta();
    $this->conectar()->close();
    return $todos;
  }

  public function verPersona($id){
    $persona=$this->getPersonaConsulta($id);
    $this->conectar()->close();
    return $persona;
  }

  public function editarPersona(&$persona){
    $editar=$this->editarPersonaConsulta($persona);
    $this->conectar()->close();
    return $editar;
  }

  public function registrarPersona(&$datos){
    $registrar=$this->registrarPersonaConsulta($datos);
    $this->conectar()->close();
    return $registrar;
  }

  public function elimiarPersona($id){
    $eliminar=$this->eliminarPersonaConsulta(($id));
    $this->conectar()->close();
    return $eliminar;
  }
}