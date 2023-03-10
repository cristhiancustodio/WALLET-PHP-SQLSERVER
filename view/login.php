<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css" integrity="sha512-10/jx2EXwxxWqCLX/hHth/vu2KY3jCF70dCQB8TSgNjbCVAC/8vai53GfMDrO2Emgwccf2pJqxct9ehpzG+MTw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../WALLET-PHP-SQLSERVER/view/css/style.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <h1 class="title_login text-center"><i class="fa-solid fa-arrow-right-to-bracket"></i> &#32 Ingresa a tu cuenta</h1>
        
        <form action="../../WALLET-PHP-SQLSERVER/controller/usuario.php" method="post" class="row g-3 ">
            
            <div class="mb-3">
                
                <!--<p style="text-align: center; color: #fff; background-color: red; border-radius: 5px;width: 40%;"></p>-->
                        
              <label for="exampleInputEmail1" class="form-label"><i class="fa-solid fa-user"></i> &#32 Usuario</label>
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="txtusuario" required>
            </div>
            <input type="hidden" name="csrf_token" value="{{ csrf_token() }}">
            <div class="mb-3">
              <label for="exampleInputPassword1" class="form-label"><i class="fa-solid fa-key"></i> &#32 Contraseña</label>
              <input type="password" class="form-control" id="exampleInputPassword1" name="txtpassword" required>
            </div>
           
            <div class="d-grid gap-2 col-6 mx-auto m-4">
                <button type="submit" class="btn" name="btnLogin">INGRESA</button>        
            </div>
             
        </form>
        <div class="mb-3 text-center m-2">
            <a href="../WALLET-PHP-SQLSERVER/view/register.php" class="fs-6">Crea tu cuenta</a>
        </div> 
    </div>
    
</body>
</html>