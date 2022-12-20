<?php 
include_once "../../WALLET-PHP-SQLSERVER/model/conexion.php";

class Wallet {
    public function getOpenAccount($id_user){
        $data = Conection::sentencia("call verCuentasAbiertas($id_user)");
        return $data;
    }
    public function getTransactions($id_user){
        $data = Conection::sentencia("call usp_verMovimientos($id_user)");
        return $data;
    }
    public function getLastTransactions($id_user){
        $data = Conection::sentencia("call usp_verUltimosMovimientos($id_user)");
        return $data;
    }
    public function getNextPayments($id_user){
        $data = Conection::sentencia("call usp_verProximosPagos($id_user)");
        return $data;
    }
}
class SystemWallet{
    public function getBanks(){
        $data = Conection::sentencia("select * from bancos order by codbanco asc");
        return $data;        
    }
    public function getCategories(){
        $data = Conection::sentencia("select * from categorias");
        return $data;
    }
    public function getFrequencies(){
        $data = Conection::sentencia("select * from frecuencias");
        return $data;
    }
    public function getNotification(){
        $data = Conection::sentencia("select * from notificaciones");
        return $data;
    }
    public function getPeriods(){
        $data = Conection::sentencia("select * from periodos");
        return $data;
    }
    
}



?>