<?php include 'template/header.php' ?>
<?php include 'clases/db.php' ?>
<?php include 'clases/crud.consultas.php' ?>
<?php include 'clases/crud.respuestas.php' ?>

<?php
  session_start();
  if(!isset($_GET['persona'])){
    header('Location: index.php?mensaje=error');
    exit();
  }

  $persona=new VerPersonas;
  $persona=$persona->verPersona($_GET['persona']);

  $token=md5(uniqid(rand(),true));
  $_SESSION['csrf_token']=$token;
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-5">
    <div class="card">
        <div class="card-header">
          Modificar Datos
        </div>
        <form action="editar_proceso.php" class="p-3" method="post">
          <input type="hidden" name="csrf_token" value="<?php echo $token ?>">
          <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" value="<?php echo $persona[0]['nombre'] ?>" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Edad:</label>
            <input type="number" class="form-control" value="<?php echo $persona[0]['edad'] ?>" name="edad" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Profesion:</label>
            <input type="text" class="form-control" value="<?php echo $persona[0]['profesion'] ?>" name="profesion" required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="persona" value="<?php echo $persona[0]['id'] ?>">
            <input type="submit" class="btn btn-primary" value="Editar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php' ?>