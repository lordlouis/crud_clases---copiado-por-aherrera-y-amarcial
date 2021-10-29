<?php
class Personas extends Dbh{
  protected function getTodasPersonasConsulta(){
    $sql='select * from personas';
    $resultado=$this->conectar()->query($sql);
    $filas=$resultado->num_rows;
    if($filas>0){
      while($fila=$resultado->fetch_assoc()){
        $datos[]=$fila;
      }
      return $datos;
    }else{
      echo 'no hay datos';
    }
  }

  protected function getPersonaConsulta($id){
    $sql="select * from personas where id=$id";
    $resultado=$this->conectar()->query($sql);
    $filas=$resultado->num_rows;
    if($filas>0){
      while($fila=$resultado->fetch_assoc()){
        $datos[]=$fila;
      }
      return $datos;
    }else{
      echo 'no se encuentra persona';
    }
  }

  protected function editarPersonaConsulta(&$datos){
    $nombre=$datos['nombre'];
    $edad=$datos['edad'];
    $profesion=$datos['profesion'];
    $id=$datos['persona'];
    $sql="update personas set nombre='$nombre', edad='$edad',profesion='$profesion' where id=$id";
    $resultado=$this->conectar()->query($sql);
    return $resultado;
  }

  protected function registrarPersonaConsulta(&$datos){
    $nombre=$datos['nombre'];
    $edad=$datos['edad'];
    $profesion=$datos['profesion'];
    $sql="insert into personas (nombre,edad,profesion) values('$nombre','$edad','$profesion')";
    $resultado=$this->conectar()->query($sql);
    return $resultado;
  }

  protected function eliminarPersonaConsulta($id){
    $sql="delete from personas where id=$id";
    $resultado=$this->conectar()->query($sql);
    return $resultado;
  }
}