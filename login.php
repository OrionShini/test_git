<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="bst5/css/bootstrap.min.css">
</head>
<body>


<div class="container">
<div class="row">
    <div class="col- ">
    
    <form action="logear.php" method="post">
        <div class="mb-3">
          <label for="" class="form-label">Usuario</label>
          <input type="text" class="form-control" name="usuario" placeholder="Usuario">
        </div>

        

        <div class="mb-3">
          <label for="" class="form-label">Password</label>
          <input type="password" class="form-control" name="pass" placeholder="Contraseña">
        </div>
        
      <button type="submit" class="btn btn-primary">Entrar</button>
      

    </form>
    
    </div>
    </div>

</div>

    <script src="bst5/js/bootstrap.bundle.min.js"></script>
  
</body>
</html>