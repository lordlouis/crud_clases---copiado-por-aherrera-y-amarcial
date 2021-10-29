<?php include 'clases/db.php' ?>
<?php include 'clases/crud.consultas.php' ?>
<?php include 'clases/crud.respuestas.php' ?>

<?php
  session_start();

  $registro=new VerPersonas;

  if(empty($_POST["oculto"]) ||
  empty($_POST["nombre"]) || 
  empty($_POST["edad"]) ||
  empty($_POST["profesion"])){
    header('Location: index.php?mensaje=falta');
    exit();
  }
  if (isset($_POST) & !empty($_POST)) {
    if(isset($_POST['csrf_token'])){
      if($_POST['csrf_token']!=$_SESSION['csrf_token']){
        header('Location: index.php?mensaje=errortoken');
        exit();
      }else{
        $registro->registrarPersona($_POST);
        if($registro){
          header('Location: index.php?mensaje=registrado');
        }else{
          header('Location: index.php?mensaje=error');
        }
      }
    }else{
      header('Location: index.php?mensaje=errortoken');
      exit();
    }
  }
