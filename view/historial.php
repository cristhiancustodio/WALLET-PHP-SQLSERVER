<?php 
    // aqui se pegaran los links personalizados de los css para cada pagina 
    $css1 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/historial.css">';
    $css2 = '<link rel="stylesheet" href="../../WALLET-PHP-SQLSERVER/view/css/navbar.css">';
?>

<?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/nav.php"; ?>
<?php include_once "../../WALLET-PHP-SQLSERVER/controller/index.php"; ?>
    <?php 
        $wallet = new Wallet();
        $last_transaction = $wallet->getTransactions($_SESSION["id"]);
    ?>
    <div class="container2">
        <!--card de registro de gastos-->
        
        <div class="card-container">
            <div class="card-title">
                <h3>Historial de gastos</h3>    
                <p>Ultimos 30 dias</p>
            </div> 
                <?php 
                if($last_transaction != null){
                    foreach($last_transaction as $row){ 
                    ?>
                    <div class="card-record">
                        <div class="record-title">
                            <p ><strong><?php echo $row[0]?></strong></p>
                            <div class="record-desc">
                                <p>Banco BCP</p>
                                <p><?php echo $row[1]?></p>
                            </div>
                        </div>
                        <div class="record-importe">
                            <p class="<?php echo $row[4]?>">-S/<?php echo $row[2]?></p>
                            <p style="font-size: 0.9em; margin-left: 15px; color: #737373;"><?php echo $row[3]?></p>
                        </div>

                    </div>
                <?php 
                }
            }else{

            ?>
            <div class="card-record">
                    <div class="record-title">
                        <p ><strong></strong></p>
                        <div class="record-desc">
                            <p></p>
                            <p></p>
                        </div>
                    </div>
                    <div class="record-importe">
                        <p class="">S/0.00</p>
                        <p style="font-size: 0.9em; margin-left: 15px; color: #737373;"></p>
                    </div>

                </div>

                <?php } ?>
                <div class="button">
                    <a href="">Mostrar mas &#32 <i class="fa-solid fa-circle-chevron-down"></i></a>
                    <a href="">Nuevo registro &#32 <i class="fa-solid fa-circle-plus"></i></a>
                </div>
        </div>
        
        <!--card de Proximos pagos-->
        <div class="card-container">
            <div class="card-title">
                <h3>Historial de proximos pagos</h3>
            </div>  
                <?php $next_pays = $wallet->getNextPayments($_SESSION["id"]);
                if($next_pays != null){
                    foreach($next_pays as $row){
                ?>
                <div class="card-record">
                    <div class="record-title">
                        <p ><strong><?php echo $row[0]?></strong></p>
                        <div class="record-desc">
                            <p><?php echo $row[2]?></p>
                        </div>
                    </div>
                    <div class="record-importe">
                            <p class="importe-gastos">-S/<?php echo $row[1]?></p>
                        <p style="font-size: 0.9em; margin-left: 15px; color: #737373;"><?php echo $row[3]?></p>
                    </div>
                </div>
                <?php }
                } else {?>
                <div class="card-record">
                    <div class="record-title">
                        <p ><strong></strong></p>
                        <div class="record-desc">
                            <p></p>
                        </div>
                    </div>
                    <div class="record-importe">
                            <p class="importe-gastos">S/0.00</p>
                        <p style="font-size: 0.9em; margin-left: 15px; color: #737373;"></p>
                    </div>
                </div>
                <?php }?>
                <div class="button">
                    <a href="">Mostrar mas &#32 <i class="fa-solid fa-circle-chevron-down"></i></a>
                    <a href="">Nuevo registro &#32 <i class="fa-solid fa-circle-plus"></i></a>
                </div>

        </div>
        <div class="card-container">
            <div class="card-title">
                <h3>Cuentas abiertas</h3>
            </div>
            
            <div class="card-body">
                <div class="body-head">
                    <p>Cuenta Bancaria</p>
                    <p>Saldo disponible</p>
                </div>
                <?php $open_accounts = $wallet->getOpenAccount($_SESSION["id"]);
                if($open_accounts != null){
                    foreach($open_accounts as $row){
                ?>
                <div class="body-main">
                    <div class="body-main_title">
                        <p><?php echo $row[1] ?></p>
                        <p>0011-0057-0268416421</p>
                    </div>
                    <div class="body-balance">
                        <p><strong>S/<?php echo $row[2] ?> </strong></p>
                    </div>
                </div>
                <?php }
                } else {?>
                <div class="body-main">
                    <div class="body-main_title">
                        <p></p>
                        <p></p>
                    </div>
                    <div class="body-balance">
                        <p><strong>S/0.00 </strong></p>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
    </div>
    <?php include_once "../../WALLET-PHP-SQLSERVER/view/layouts/footer.php" ?>
