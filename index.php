<?php include 'template/header.php' ?>
<?php include 'clases/db.php' ?>
<?php include 'clases/crud.consultas.php' ?>
<?php include 'clases/crud.respuestas.php' ?>

<?php
  session_start();
  $personas=new VerPersonas;
  $token=md5(uniqid(rand(),true));
  $_SESSION['csrf_token']=$token;
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-7">
      <!-- alertas -->
      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='falta'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>Faltan datos</strong> Revise que no falten datos a la hora de insertar.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='registrado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>Registrado</strong> Datos agregados correctamente a la BD.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='error'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Error!</strong> Vuelve a intentar.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='modificado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>Modificado</strong> Registro modificado correctamente.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='eliminado'){
      ?>
      <div class="alert alert-info alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>Eliminado</strong> Registro eliminado correctamente.
      </div>
      <?php
        }
      ?>

      <?php if(isset($_GET['mensaje']) && $_GET['mensaje']=='errortoken'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      
        <strong>¡Error!</strong> Error de token.
      </div>
      <?php
        }
      ?>
      <!-- alertas fin -->
      <div class="card">
        <div class="card-header">
          Lista de Personas
        </div>
        <div class="p-4">
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Nombre</th>
                <th scope="col">Edad</th>
                <th scope="col">Profesion</th>
                <th scope="col" colspan="2">Acciones</th>
              </tr>
            </thead>
            <tbody>
              <?php
                foreach($personas->verTodasPersonas() as $persona){
              ?>
              <tr>
                <td scope="row"><?php echo $persona['id'] ?></td>
                <td><?php echo $persona['nombre'] ?></td>
                <td><?php echo $persona['edad'] ?></td>
                <td><?php echo $persona['profesion'] ?></td>
                <td><a class="text-warning" href="editar.php?persona=<?php echo $persona['id'] ?>"><i class="bi bi-pencil-square"></i></a></td>
                <td><a onclick="return confirm('¿Esta seguro que quiere eliminar?')" class="text-danger" href="eliminar.php?persona=<?php echo $persona['id'] ?>"><i class="bi bi-trash"></i></a></td>
              </tr>
              <?php
                }
              ?>
            </tbody>
          </table>
          
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Ingresar Datos
        </div>
        <form action="registrar.php" class="p-3" method="post">
          <input type="hidden" name="csrf_token" value="<?php echo $token ?>">
          <div class="mb-3">
            <label class="form-label">Nombre:</label>
            <input type="text" class="form-control" name="nombre" autofocus required>
          </div>
          <div class="mb-3">
            <label class="form-label">Edad:</label>
            <input type="number" class="form-control" name="edad" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Profesion:</label>
            <input type="text" class="form-control" name="profesion" required>
          </div>
          <div class="d-grid">
            <input type="hidden" name="oculto" value="1">
            <input type="submit" class="btn btn-primary" value="Registrar">
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php include 'template/footer.php' ?>
