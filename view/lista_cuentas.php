
<?php $wallet = new Wallet();
    $banks = $wallet->getOpenAccount($_SESSION["id"]);

?>

<aside>
    <div class="billetera-titulo">
        <h4>Lista de cuentas</h4>
    </div>
    <?php 
    if($banks!=null){
    foreach($banks as $row ){
     ?>
    <div class="billetera">
        <div class="billetera-saldo">
            <?php if($row[2]<20){ ?>
                <p style="color: #FF1717;">S/<?php echo $row[2] ?></p>
            <?php }else{?>
            <p >S/<?php echo $row[2] ?></p>
            <?php }?>
        </div>
        <div class="billetera-desc">
            <p><?php echo $row[1] ?></p>
            <p>0011-0057-0268416421</p>
            <p>Soles</p>
        </div>
    </div>
   <?php }
    } else{ ?>
    <div class="billetera">
        <h4 style="color:#EC0303 ;">No hay cuentas abiertas</h4>
    </div>
    
    <?php }?>
</aside>
