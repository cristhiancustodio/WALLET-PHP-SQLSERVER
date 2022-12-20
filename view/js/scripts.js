class Desactivar{
    activarInput(){
        document.getElementById("select_periodo").disabled = false;
        
    }
    desactivarInput(){
        document.getElementById("select_periodo").disabled = true;
    }
}
var desactivar = new Desactivar();

class Alerta{
    cancelarPagos(){
        let nombre = document.getElementById("nota").value 
        let importe = document.getElementById("importe").value;
        if (nombre != "" || importe != ""){
            swal({
                title: "Seguro que deseas cancelar el registro?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href='../../WALLET-PHP-SQLSERVER/view/gastos.php';
                return true;
                } else {
                    return false;
                }
            });
            return false;
        }
        else{
            return true;
        }
    }
    cancelarGastos(){
        let nombre = document.getElementById("nota").value 
        let importe = document.getElementById("importe").value;
        if (nombre != "" || importe != ""){
            swal({
                title: "Seguro que deseas cancelar el registro?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    window.location.href='../../WALLET-PHP-SQLSERVER/view/pagos.php';
                    return true;
                } else {
                    return false;
                }
            });
            return false;
        }
        else{
            return true;
        }
    }
}
var alerta = new Alerta();

class validarDatos{
    verificarMontoBancario(){
        let importe = document.getElementById("monto").value;
        console.log(importe);
        if(importe == ""){
            swal("Introduce un monto");
            return false;
        }
        else if(importe<50){
            swal("Para abrir la cuenta, debe ser un monto mayor a S/50.00");
            return false;
        }
        else{
            return true;
        } 
    }
    hola(){
        swal({
            title: "Cuenta abierta exitosamente",
            icon: "success",
          })
          .then((willDelete) => {
            if (willDelete) {
              window.location.href='../../WALLET-PHP-SQLSERVER/view/pagos.php';
            }
          });
    }
    validarRegistro(){
    
        let importe = document.getElementById("importe").value;
        let nombre = document.getElementById("nota").value;
        console.log(importe);
        if(importe == "" ){
            swal("Introduce un monto");
            return false;
        }
        else if(importe <= 0){
            swal("Cuidado!", "El monto debe ser mayor a 0", "error");
            return false;
        }
        else if(nombre == ""){
            swal("Introduce un 'nombre' a tu registro");
            return false;
        }
        else{
            return true
        }
    }
}
var validar_dato = new validarDatos();


function verFecha(){
    date = new Date();
    year = date.getFullYear();
    month = date.getMonth()+1 ;
    if(month<10){
        month = '0'+month;
    }
    else{
        month = month;
    }
    day = date.getDate();
    fecha = `${year}-${month}-${"0"+day}`;
    console.log(fecha);
    document.getElementById("fecha").value = fecha;
}
verFecha();

function cambio(){
    let moneda = parseInt(document.getElementById("ti_moneda").textContent);
    console.log(typeof(moneda));
    document.getElementById("aea").innerHTML = moneda;
}
