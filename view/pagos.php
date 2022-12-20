<?php 
    // aqui se pegaran los links personalizados de los css para cada pagina 
    $css1 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/navbar.css">';
    $css2 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/billetera.css">';
?>
<?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/nav.php" ?>

<?php include_once "../../WALLET-PHP-SQLSERVER/controller/index.php" ?>

    <!--incluimos nuestro archivo donde se veran las cuentas abiertas-->
    <?php require_once "../../WALLET-PHP-SQLSERVER/view/lista_cuentas.php" ?>
    <div class="container">
       <div class="container-title">
           <h1>Programa tu proximo pago</h1>
        </div>
        
        <div class="container-form">
            <form action="../../WALLET-PHP-SQLSERVER/controller/usuario.php" method="post">
                <div class="form-nota col-3">
                    <label for="nota" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nota" maxlength="15" name="txtnombre">
                </div>
                <?php 
                $wallet = new Wallet();
                $wallet2 = new SystemWallet();
                
                ?>
                <div class="form-categoria col-5 ">
                    <label for="categoria" class="form-label">Categoria</label>
                    <select name="categoria" id="categoria" class="form-select">
                        <option selected>Selecciona una categoria</option>
                        <?php $categories = $wallet2->getCategories();
                            foreach($categories as $row){
                        ?>
                        <option value="<?php echo $row[0]?>"><?php echo $row[1]?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="row g-3">
                    <div class="form-importe col-2">
                        <label for="importe" class="form-label">Importe</label>
                        <input type="text" id="importe" class="form-control" maxlength="4" name="txtimporte" required>
                    </div>
                    
                    <div class="form-moneda col-2">
                        <label for="tipo_moneda" class="form-label">Tipo de moneda</label>
                        <select name="moneda" id="tipo_moneda" class="form-select">
                            <option value="soles">Soles</option>
                            <option value="dolares">Dolares</option>
                            <option value="euros">Euros </option>
                        </select>
                    </div>
                </div>
                <div class="row g-3">
                    <div class="form-frecuencia col-3">
                        <label for="frecuencia-select" class="form-label">Frecuencia</label>
                        <select name="frecuencia" id="frecuencia-select" class="form-select">
                            <option value="F-1" onclick="desactivar.desactivarInput()">Una vez</option>
                            <option value="F-2" onclick="desactivar.activarInput()">Pago recurrente</option>
                        </select>
                    </div>
                    <div class="form-fecha col-3">
                        <label for="select_periodo" class="form-label">Periodo</label>
                        <select name="periodo" id="select_periodo" class="form-select" disabled>
                            <?php 
                            $periods = $wallet2->getPeriods();
                            foreach($periods as $row){
                            ?>
                            <option value="<?php echo $row[0]?>"><?php echo $row[0]?></option>
                            <?php }?>
                        </select>
                    </div>
                    
                    <div class="form-notificacion col-3">
                        <label for="notificacion-select" class="form-label">Notificacion</label>
                        <select name="notificacion" id="notificacion-select" class="form-select">
                        <?php 
                            $notification = $wallet2->getNotification();
                            foreach($notification as $row){
                            ?>
                            <option value="<?php echo $row[0]?>"><?php echo $row[0]?></option>
                            <?php }?>
                        </select>
                    </div>
                </div>
                <div class="form-fecha col-3">
                    <label for="fecha" class="form-label">Fecha de inicio</label>
                    <input type="date" name="fecha" id="fecha" class="form-control" value="">
                </div>
                
                <label for="floatingTextarea2" class="form-label">Descripcion</label>

                <div class="form-floating col-3">
                    <textarea class="form-control" name="txtarea"  placeholder="Leave a comment here" id="floatingTextarea2" style="height: 70px ; width:250px"></textarea>
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
                <div class="form-submit mb-3">
                    <button type="submit" class="btn" onclick="return validar_dato.validarRegistro()" name="btnInsertPayments"><i class="fa-solid fa-check"></i></button>
                </div>
            </form>
            
<?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/footer.php" ?>