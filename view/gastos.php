<?php 
    // aqui se pegaran los links personalizados de los css para cada pagina 
    $css1 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/navbar.css">';
    $css2 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/billetera.css">';
?>
<?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/nav.php"; ?>

<?php include_once "../../WALLET-PHP-SQLSERVER/controller/index.php"; ?>
    
    <!--incluimos nuestro archivo donde se veran las cuentas abiertas-->
    <?php include_once "../../WALLET-PHP-SQLSERVER/view/lista_cuentas.php"; ?>
        <div class="container">
        <div class="title">
            <h1>Estructura tus gastos</h1>
        </div>
        <form action="../../WALLET-PHP-SQLSERVER/controller/usuario.php" method="post">
            <div class="form-nota col-3">
                <label for="nota" class="form-label">Nombre</label>
                <input type="text" class="form-control" id="nota" maxlength="15" name="txtnombre">
            </div>
            <div class="form-nota col-4">
                <label for="nota" class="form-label">Cuenta </label>
                <select name="banco" id="" class="form-select" >
                    <option selected required>Selecciona una cuenta</option >
                    <?php $wallet = new Wallet();
                    $open_accounts = $wallet->getOpenAccount($_SESSION["id"]);
                    if($open_accounts == null){
                    ?>
                        
                    <?php } else{
                        foreach($open_accounts as $row){
                    ?>
                        <option value="<?php echo $row[3] ?>"><?php echo $row[1] ?></option >
                    <?php }
                    }?>
                </select>
            </div>
            <div class="form-categoria col-5 ">
                <label for="categoria" class="form-label">Categoria</label>
                <select name="categoria" id="" class="form-select">
                    <option selected>Selecciona una categoria</option>
                    <?php 
                    $wallet2 = new SystemWallet();
                    $categories = $wallet2->getCategories();
                    foreach($categories as $row){
                    ?>
                        <option value="<?php echo $row[0] ?>"><?php echo $row[1] ?></option>
                        <?php }?>
                </select>
            </div>

            <div class="row g-3">
                <div class="form-importe col-2">
                    <label for="importe" class="form-label" >Importe</label>
                    <input type="text" id="importe" class="form-control" maxlength="4" name="txtimporte" required>
                </div>
                <div class="form-moneda col-2">
                    <label for="tipo_moneda" class="form-label">Tipo de moneda</label>
                    <select name="moneda" id="tipo_moneda" class="form-select">
                        <option value="soles">Soles</option>
                        <option value="dolares">Dolares</option>
                        <option value="euros">Euros</option>
                    </select>
                </div>
                <div class="form-fecha col-3">
                    <input hidden type="date" name="fecha" id="fecha" class="form-control" value="2022-06-15">
                </div>
            </div>
            
            <div class="form-opciones">
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="operacion" id="inlineRadio1" value="gastos" required>
                    <label class="form-check-label" for="inlineRadio1">Gastos</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="operacion" id="inlineRadio2" value="ingresos" required>
                    <label class="form-check-label" for="inlineRadio2">Ingresos</label>
                </div>
            </div>
            <div class="form-sumbit">
                <button type="submit" class="btn" onclick="return validar_dato.validarRegistro()" name="btnRegisterExpenses"><i class="fa-solid fa-check"></i></button>
            </div>
        </form>
    </div>

    <?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/footer.php" ?>
