<?php include 'clases/db.php' ?>
<?php include 'clases/crud.consultas.php' ?>
<?php include 'clases/crud.respuestas.php' ?>

<?php
  if(!isset($_GET['persona'])){
    header('Location: index.php?mensaje=error');
  }

  $datos=new VerPersonas;

  $persona=$_GET['persona'];
  
  if($datos->elimiarPersona($persona)){
    header('Location: index.php?mensaje=eliminado');
  }else{
    header('Location: index.php?mensaje=error');
  }
