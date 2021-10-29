<?php include 'clases/db.php' ?>
<?php include 'clases/crud.consultas.php' ?>
<?php include 'clases/crud.respuestas.php' ?>

<?php
  session_start();

  $editar=new VerPersonas;

  if (isset($_POST) & !empty($_POST)) {
    if(isset($_POST['csrf_token'])){
      if($_POST['csrf_token']!=$_SESSION['csrf_token']){
        header('Location: index.php?mensaje=errortoken');
        exit();
      }else{
        var_dump($_POST);
        $datos=array(
          'nombre'=>$_POST['nombre'],
          'edad'=>$_POST['edad'],
          'profesion'=>$_POST['profesion'],
          'persona'=>$_POST['persona'],
        );
        $editar->editarPersona($datos);
        if($editar){
          header('Location: index.php?mensaje=modificado');
        }else{
          header('Location: index.php?mensaje=error');
        }
      }
    }
    if(!isset($_POST['persona'])){
      header('Location: index.php?mensaje=error');
      exit();
    }
  }