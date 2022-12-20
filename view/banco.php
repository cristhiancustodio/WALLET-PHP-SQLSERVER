<?php
// aqui se pegaran los links personalizados de los css para cada pagina 
$css1 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/navbar.css">';
$css2 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/banco.css">';

?>
<?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/nav.php";
include_once "../../WALLET-PHP-SQLSERVER/controller/index.php";
?>

<?php $wallet2 = new SystemWallet();
$banks = $wallet2->getBanks();
?>
<div class="contenido">
    <div class="titulo">
        <h1>Crea tu billetera virtuaL</h1>
    </div>
    <script>
        function ale(){
        setTimeout(function() {
            swal({
                title: "Alerta",
                text: "Mensaje",
                type: "success"
            }, function() {
                window.location = "../../WALLET-PHP-SQLSERVER/view/pagos.php";
            });
        }, 1000);
    }
    </script>
    <form action="../../WALLET-PHP-SQLSERVER/controller/usuario.php" method="post">

        <div class="form-datos">
            <div class="opcion">
                <h4>Banco</h4>
                <select name="select_banco" id="" class="form-select">
                    <?php foreach ($banks as $row) { ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="monto">
                <h4>Ingresa un monto inicial</h4>
                <input class="form-control" id="monto" type="text" name="txtmonto" maxlength="4">
            </div>
            <div class="opcion-moneda">
                <h4 id="ti_moneda">Tipo de moneda</h4>
                <select name="moneda" id="" class="form-select">
                    <option value="soles">Soles</option>
                    <option value="dolares">Dolares</option>
                    <option value="euros">Euros</option>
                </select>
            </div>
        </div>
        <div class="button">
            <input type="submit" value="Registrar" name="btnRegisterBank" onclick="return validar_dato.verificarMontoBancario()">
        </div>
    </form>
    <button onclick="validar_dato.hola()">Hola</button>
</div>
<?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/footer.php" ?>