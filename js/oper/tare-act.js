$(document).ready(function(){
    let cadena = ctrl.getParameters();

    cadena = cadena['url'].split("/");
    for(i = 0; i <= cadena.length; i++){
        // Valida si la cadena es numerica
        if(!isNaN(cadena[i])){
            ctrl.extraerDatos(cadena[i]);
        }
    }

    $("#btnCO").on('click', function(){
        ctrl.consulta();
    })

    $("#btnGU").on('click', function(){
        ctrl.guardar();
    });
    ctrl.getUsuario();
});

var ctrl = {
    getParameters: function(){
        var vars = {};
        var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
            vars[key] = value;
        });
        return vars;
    },
    // funcion que envia a la consulta
    consulta: function(){
        $(location).attr('href',"?url=tareas");
    },
    inicio: function(){
        $(location).attr('href',"index.php");
    },
    // obtiene los datos desde el archivo asignado
    extraerDatos: function(v1){
        $.ajax({
            type: "GET",
            url: "../modelo/data/data-tarea.php?v1="+v1,
            success:function(data){
                var aDatos=[];
                aDatos = JSON.parse(data);
                // console.log(aDatos);
                $("#eCodTarea").val(aDatos[0]['eCodTarea']);
                $("#tNombre").text(aDatos[0]['tNombre']);
                $("#fhFechaCreacion").text(aDatos[0]['fhFechaCreacion']);
                $("#Estatus").text(aDatos[0]['Estatus']);
            }
        });
    },
    // llena el combobox ecodEmbalaje
    getUsuario: function(){
        $.ajax({
          type: "GET",
          url: "../modelo/data/data-usuario.php",
          success: function( data ) {
              var aDatos=[];
              aDatos = JSON.parse(data);
              // console.log(aDatos);
              $.each(aDatos, function(i, v){
                  $("[id='eCodUsuario']").append($('<option>', { 
                      value: v.eCodUsuario,
                      text : v.tNombre
                  }));
              });
          }
        });
    },
    // funcion guardar
    guardar: function(){
        var bBandera = false;
        if(!$("#eCodUsuario").val()){
            bBandera = true;
            $("#eCodUsuario").parent().addClass('has-error');
        }else{
            bBandera = false;
            $("#eCodUsuario").parent().removeClass('has-error');
        }
        if(bBandera == true){

            $.alert({
                title: 'Alerta!',
                type: 'red',
                content: 'Favor de ingresar la información obligatoria!',
            });
        }else{
            $.ajax({type: "POST",
                url: "../modelo/oper/tare-act-data.php",
                data: {eAccion: 1, eCodUsuario: $("#eCodUsuario").val(), eCodTarea: $("#eCodTarea").val()},
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
        }
    },
}