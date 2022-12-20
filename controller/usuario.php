<?php 
include_once "../../WALLET-PHP-SQLSERVER/model/conexion.php";
include_once "../../WALLET-PHP-SQLSERVER/controller/class_user.php";

class UserLogin{
    public function getUser($user){
        $data = Conection::sentencia("call usp_Login('$user')");
        if($data != null ){
            $class_user = new User($data[0][0],$data[0][1],$data[0][2],$data[0][3]);
            return $class_user;
        }
        else{
            return null;
        }
    }
    public function verifyUser($user,$password){
        $datos = $this->getUser($user);
        if($datos != null){
            if($datos->password == $password ){
                Session::start_session($datos->id,$datos->user);
                return true;
            }
            else{
                return false;
            }
        }
        else{
            return null;
        }
    }
}
class UsersAction {
    //insertar usuario
    public function registerUser(){
        $user = $_POST["txtusuario"];
        $password = $_POST["txtpassword"];
        $name = $_POST["txtnombre"];
        $last_name= $_POST["txtapellido"];
        $phone = $_POST["txttelefono"];
        $query = "call usp_RegistrarUsuario(?,?,?,?,?)";
        $array = array($user,$password,$name,$last_name,$phone);
        Conection::ejecucion($query,$array);
    } 
    public function insertExpenses(){
        session_start();
        $name = $_POST["txtnombre"];
        $money = $_POST["txtimporte"];
        $type_currency = $_POST["moneda"];
        $date = $_POST["fecha"];
        $type = $_POST["operacion"];
        $id_user= $_SESSION["id"];
        $id_category = $_POST["categoria"];
        $id_account = $_POST["banco"];
        // ingresara el gasto a la base de datos
        $query = "call insertarGastos(?,?,?,?,?,?,?,?)";
        $array = array($name,$money,$type_currency,$date,$type,$id_user,$id_category,$id_account);
        Conection::ejecucion($query,$array);  
        // aqui actualizara el saldo de la cuenta
        $this->updateBalanceAccount($id_user,$id_account);

    }
    public function insertUpCommingPayments(){
        session_start();
        $id_user = $_SESSION["id"];
        $name = $_POST["txtnombre"];
        $importe = $_POST["txtimporte"];
        $type_currency = $_POST["moneda"];
        $date = $_POST["fecha"];
        $id_notification = $_POST["notificacion"];
        $description = $_POST["txtarea"];
        $type = $_POST["operacion"];// gastos o ingresos
        $id_category = $_POST["categoria"];
        $frecuency = $_POST["frecuencia"];
        if($frecuency == "F-2"){
            $period = $_POST["periodo"];
        }
        else{
            $period = "";
        }
        $query = "call usp_insertPagos(?,?,?,?,?,?,?,?,?,?,?)";
        $array = array($id_user,$name,$importe,$type_currency,$date,$id_notification,$description,$type,$id_category,$frecuency,$period);
        Conection::ejecucion($query,$array);
    }
    public function createBankAccount(){
        session_start();
        $id_user = $_SESSION["id"];
        $cod_bank = $_POST["select_banco"];
        $money = $_POST["txtmonto"];
        $query = "call usp_RegistrarCuentaBancaria(?,?,?)";
        $array = array($id_user,$cod_bank,$money);
        Conection::ejecucion($query,$array);
    }
    public function updateBalanceAccount($id_user,$id_account){
        $query = "call actualizarSaldoCuentas(?,?)";
        $array = array($id_user,$id_account);
        Conection::ejecucion($query,$array);
    }
}

class Session{
    //iniciamos en clase UserLogin / verifyUser
    public static function start_session($id,$user){
        session_start();
        $_SESSION["id"] = $id;
        $_SESSION["user"] = $user;
    }
    public static function close_session(){
        //destruimos las sesiones y sus variables
        session_unset();
        session_destroy();
    }
}

//instanciado los objectos para cada clase
$user = new UsersAction();
$user_login = new UserLogin();

if(isset($_POST["btnLogin"])){
    $user = $_POST["txtusuario"];
    $password = $_POST["txtpassword"];
    $login = $user_login->verifyUser($user,$password);
    if($login){
        header("Location:../../WALLET-PHP-SQLSERVER/view/menu.php"); 
    }
    elseif($login == null){
        header("Location:../../WALLET-PHP-SQLSERVER/index.php");
    }
    else{
        header("Location:../../WALLET-PHP-SQLSERVER/view/index.php");   
    }
}
// esto es para la session
// esto lo encontraremos en el archivo nav.php
elseif(isset($_GET["close"]) && $_GET["close"]==1){
    Session::close_session();
    header("Location:../../WALLET-PHP-SQLSERVER/index.php");
}

// Al registrar una cuenta bancaria
elseif(isset($_POST["btnRegisterBank"])){
    $user->createBankAccount();
    header("Location:../../WALLET-PHP-SQLSERVER/view/pagos.php");
}
//Registrar Usuario
elseif(isset($_POST["btnRegister"])){
    try {
        $user->registerUser();
        header("Location:../../WALLET-PHP-SQLSERVER");
    } catch (PDOException) {
        header("Location:../../WALLET-PHP-SQLSERVER/view/register.php?");
    }  
}
elseif(isset($_POST["btnRegisterExpenses"])){
    $user->insertExpenses();
    header("Location:../../WALLET-PHP-SQLSERVER/view/historial.php");
}
elseif(isset($_POST["btnInsertPayments"])){
    $user->insertUpCommingPayments();
    header("Location:../../WALLET-PHP-SQLSERVER/view/historial.php");
}
else{
    echo "Post incorrecto";
}


?>