<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!--<link rel="stylesheet" href="css/style.css">-->

    <title>Hello, world!</title>
  </head>
  <body>
        <form action="../../WALLET-PHP-SQLSERVER/controller/usuario.php" method="post" class="row g-3 " autocomplete="off">
        <section>
        <div class="container">
          <div class="row justify-content-center">
              
            <div class="col-12 col-md-8 col-lg-8 col-xl-6">
                
              <div class="row">
                <div class="col text-center">
                    
                  <h1>Registrate</h1>
                </div>
              </div>
              <div class="row align-items-center">
                <div class="col mt-4">
                  <input type="text" class="form-control" placeholder="Nombre usuario" name="txtusuario" required>
                </div>
              </div>
              <div class="row align-items-center mt-4">
                <div class="col">
                  <input type="password" class="form-control" placeholder="Contraseña" name="txtpassword" required>
                </div>
              </div>
              <div class="row align-items-center mt-4">
                <div class="col">
                  <input type="text" class="form-control" placeholder="Nombre" name="txtnombre" required>
                </div>
                <div class="col">
                  <input type="text" class="form-control" placeholder="Apellido" name="txtapellido" required>
                </div>
                <div class="col">
                    <input type="text" class="form-control" maxlength="9" placeholder="+51 946285789" name="txttelefono" required>
                  </div>
              </div>
              <div class="row justify-content-start mt-4">
                <div class="col">
                  <button class="btn btn-primary mt-4" name="btnRegister" onclick="return usuarioRepetido()" >Submit</button>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        </form>
    </section>  
 














    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <!--Para FontAwesome abajo-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/js/all.min.js" integrity="sha512-Cvxz1E4gCrYKQfz6Ne+VoDiiLrbFBvc6BPh4iyKo2/ICdIodfgc5Q9cBjRivfQNUXBCEnQWcEInSXsvlNHY/ZQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>