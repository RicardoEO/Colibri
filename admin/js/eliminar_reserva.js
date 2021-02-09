document.addEventListener('DOMContentLoaded', e => {
    document.getElementById("cabana").selectedIndex = -1;
    document.getElementById("reserva").selectedIndex = -1;
    var formulario = document.getElementById('formulario');
    formulario.addEventListener('submit', e => {
        e.preventDefault();

        var params_login = {
        cabana: document.getElementById('cabana').value,
        reserva: document.getElementById('reserva').value
        }

        url = './ajax/save_delete.php';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.addEventListener('load', data => {

        if(xhr.status == 200) {
            
            var response = JSON.parse(data.target.response);

            if(response.success) {
                document.getElementById("alert_danger").style.display = 'none';
                document.getElementById("alert_success").style.display = '';
                document.getElementById("cabana").selectedIndex = -1;
                document.getElementById("reserva").options.length = 0;
                document.getElementById("reserva").selectedIndex = -1;
            } else {
                document.getElementById("alert_success").style.display = 'none';
                document.getElementById("alert_danger").style.display = '';
                document.getElementById("alert_danger").innerText = response.msg;
            }
        } else {
            console.log("error");
        }

        });

        xhr.send(JSON.stringify(params_login));
    });

    document.getElementById("cerrarSesion").addEventListener('click', e => {
        
        var signout = {
        cabana: document.getElementById('cabana').value,
        start: document.getElementById('start').value,
        end: document.getElementById('end').value,
        cliente: document.getElementById('cliente').value,
        celularCliente: document.getElementById('celularCliente').value,
        valorReserva: document.getElementById('valorReserva').value
        }

        url = 'ajax/signout.php';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.addEventListener('load', data => {

        if(xhr.status == 200) {
            
            var response = JSON.parse(data.target.response);

            if(response.success) {
                window.location = "login.php";
            } else {
                console.log('ola');
            }
        } else {
            console.log("error");
        }

        });

        xhr.send(JSON.stringify(signout));
    });

    function formatDate (input) {
        var datePart = input.match(/\d+/g),
        year = datePart[0].substring(2), // get only two digits
        month = datePart[1], day = datePart[2];
      
        return day+'/'+month+'/'+year;
      }
      

    document.getElementById('cabana').addEventListener('change', function(e) {
        

        var cabana_valor = this.value;
        var params_login = {
        cabana: cabana_valor
        }

        url = './ajax/get_reservas.php';
        var xhr = new XMLHttpRequest();
        xhr.open('POST', url);
        xhr.addEventListener('load', data => {

        if(xhr.status == 200) {
            var cmbReserva = document.getElementById("reserva");
            cmbReserva.options.length = 0;
            var response = JSON.parse(data.target.response);
            response.forEach((element, index, array) => {
                var fechaInicio = formatDate(element.fechaInicio);
                var fechaFin = formatDate(element.fechaFin);
                cmbReserva.innerHTML += "<option value="+element.id+">"+fechaInicio+" ----> "+fechaFin+"</option>"
            });
        } else {
            console.log("error");
        }

        });

        xhr.send(JSON.stringify(params_login));
    });

});