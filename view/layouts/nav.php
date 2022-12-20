
<?php //iniciamos nuestras variables de la sesion
session_start();
$_SESSION["user"];
$_SESSION["id"];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php echo $css1 ?>    
    <?php echo $css2 ?>

    <title></title>
</head>
<body>
    <div class="menu-nav">
        <div class="navigation-bar">
            <ul>
                <li><a href="../../WALLET-PHP-SQLSERVER/view/pagos.php" onclick="return alerta.cancelarGastos()"><i class="fa-solid fa-bell"></i><span>&#32 Programar pagos</span></a></li>
                <li><a href="../../WALLET-PHP-SQLSERVER/view/gastos.php" onclick="return alerta.cancelarPagos()"><i class="fa-solid fa-money-bill-1"></i><span>&#32 Registrar gastos</span></a></li>
                <li><a href="../../WALLET-PHP-SQLSERVER/view/historial.php"><i class="fa-solid fa-clock"></i><span>&#32 Ver historial</span></a></li>
                <li><a href="../../WALLET-PHP-SQLSERVER/view/banco.php"><i class="fa-solid fa-building-columns"></i></i><span>&#32 Añadir Cuenta</span></a></li>
            </ul>
        </div>
    </div>
    <div class="navigation-user">
        <div class="dropdown">
            <a class="btn-2 btn-warning dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
              <?php  echo $_SESSION["user"]; ?>
            </a>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              <li><a class="dropdown-item" href="../../WALLET-PHP-SQLSERVER/controller/usuario.php?close=1"><i class="fa-solid fa-door-open"></i> &#32 Cerrar sesión</a></li>
            </ul>
        </div>
    </div>

 