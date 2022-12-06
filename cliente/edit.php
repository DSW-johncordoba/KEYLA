<?php
include('../config/config.php');
include('clientes.php');
$p = new clientes();
$data = mysqli_fetch_object($p->getOne($_GET['id']));


if (isset($_POST) && !empty($_POST)){

  $update = $p->update($_POST);
  if ($update){
    $error = '<div class="alert alert-success" role="alert">Modificado correctamente</div>';
  }else{
    $error = '<div class="alert alert-danger" role="alert" > Error al modificar  </div>';
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
<?php include('../menu.php') ?>

<?php
    if (isset($error)){
      echo $error;
    }
    ?>
<!-- CREAN FORMULARIO -->
<form method="POST" enctype="multipart/form-data" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label">Nombres</label>
    <input type="text" name="nombrescompletos" id="nombrescompletos" value="<?= $data->nombrescompletos ?>"  class="form-control" >
    <input type="hidden" name="id" id="id" value="<?= $data->id ?>" />
  </div>
  <div class="col-md-6">
    <label for="inputPassword4" class="form-label">Celular</label>
    <input type="text" name="celular" id="celular"  class="form-control" value="<?= $data->celular ?>" >
  </div>

    <div class="col-6">
      <label for="inputAddress" class="form-label">Email</label>
      <input type="email" name="email" id="email" class="form-control" value="<?= $data->email ?>" >
    </div>
    <div class="col-6">
      <label for="inputAddress" class="form-label">Menu</label>
      <input type="text" name="menu" id="menu" class="form-control" value="<?= $data->menu ?>" >
    </div>
  <div class="col-12">
    <button  class="btn btn-primary">Modificar</button>
  </div>
</form>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>