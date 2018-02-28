$(document).ready(function(){
    $("#btnNU").on('click', function(){
        ctrl.nuevo();
    })

    $("#btnIN").on('click', function(){
        ctrl.inicio();
    })
    $("#btnFI").on('click', function(){
        ctrl.filtrar();
    })
    ctrl.generarTabla();

    $("#btnLI").click(function(e){
        e.preventDefault();
        ctrl.limpiar();
        ctrl.filtrar();
    });
});

var ctrl = {
    // Función para insertar una nueva fila
    generarTabla: function(){
        $.ajax({
            type: "POST",
            url: '../modelo/oper/usuarios-data.php',
            data: {Datos: $("#Datos").serialize()},
            success:function(data){
                var aDatos=[];
                aDatos = JSON.parse(data);

                var html="";
                for(x = 0; x<=aDatos.length-1; x++){
                    i =parseInt(x)+1;
                    html += "<tr>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['eCodUsuario']+"</td>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['Usuario']+"</td>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['fhFecha']+"</td>";
                    html += "  <td width=\"100%\">"+aDatos[x]['tCorreo']+"</td>";
                    html += "</tr>";
                }

                $('#tbDatos tbody').html(html);
            }
        });
    },
    inicio: function(){
        $(location).attr('href',"index.php");
    },
    filtrar(){
        ctrl.generarTabla();
    },
    limpiar: function(){
        if($( "<input>" ).is(":text")){
          $('input:text').each(function(){
            $(this).val("");
          });
        }
    },
}