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
            url: '../modelo/oper/tareas-data.php',
            data: {Datos: $("#Datos").serialize()},
            success:function(data){
                var aDatos=[];
                aDatos = JSON.parse(data);

                var html="";
                for(x = 0; x<=aDatos.length-1; x++){
                    i =parseInt(x)+1;
                    html += "<tr>";
                    html += "  <td style=\"white-space: nowrap\"><a onclick=\"ctrl.asignar("+aDatos[x]['eCodTarea']+")\">"+aDatos[x]['eCodTarea']+"</a></td>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['tNombre']+"</td>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['Usuario']+"</td>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['fhFechaCreacion']+"</td>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['tmHora']+"</td>";
                    html += "  <td style=\"white-space: nowrap\">"+aDatos[x]['fhFechaFinalizacion']+"</td>";
                    html += "  <td width=\"100%\" style=\"white-space: nowrap\"><button type=\"button\" class=\"btn btn-default btn-shadow btn-sm\" "+(aDatos[x]['tCodEstatus'] == 'EP' ? '' : "disabled='disabled'")+" id=\"btnGU"+aDatos[x]['eCodTarea']+"\" onclick=\"ctrl.finalizar("+aDatos[x]['eCodTarea']+");\"><i class=\"fa fa-check\"></i>&nbsp;Finalizar</button></td>";
                    html += "</tr>";
                }

                $('#tbDatos tbody').html(html);
            }
        });
    },
    nuevo: function(){
        $(location).attr('href',"?url=tare-reg");
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
    asignar: function(v1){
        $(location).attr('href',"?url=asig-reg/"+v1);
    },

    // funcion guardar
    finalizar: function(v1){
        $.ajax({type: "POST",
            url: "../modelo/oper/tare-act-data.php",
            data: {eAccion: 2, eCodTarea: v1},
            success:function(tRespuesta){
                $("#divRespuesta").html(tRespuesta);
                if($("#bCodigo").length > 0){
                    $.confirm({
                        title: 'Alerta!',
                        type: 'success',
                        content: 'Se ha registrado correctamente!',
                        buttons: {
                          confirm: {
                            text: 'Aceptar',
                            keys: ['enter'],
                            action: function(){
                              $(location).attr('href',"?url=tareas");
                            }
                          }
                        }
                    });
                }
            }
        });
    },
}