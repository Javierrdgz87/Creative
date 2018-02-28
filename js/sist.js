$(document).ready(function(){
  $("#btnOU").on('click', function(){
    sist.logout();
  });
  $("#login").on('click', function(){
    sist.login();
  });
  $("#btnRE").on('click', function(){
    sist.registrar();
  });
});
var sist = {
  // funcion para traer las variables de la url
  getParameters: function(){
      var vars = {};
      var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
          vars[key] = value;
      });
      return vars;
  },
  // función para realizar el login
  login: function(){
    $.ajax({
        type: "POST",
        url: '../modelo/sist/sist-login.php',
        data: {Datos: $("#Datos").serialize()},
        success: function(data){
          if(data == 1){
            $(location).attr('href',"../app/index.php");
          }else{
            $.alert({
                title: 'Alerta!',
                type: 'red',
                content: 'Usuario o Contraseña no valida, favor de intentarlo más tarde!',
            });
            $(location).attr('href',"../app/login.php");
          }
        }
    });
  },
  // funcion para cerrar sesión
  logout: function(){
    $.ajax({
        type: "POST",
        success:function(data){
          $.confirm({
                  title: 'Exito!',
                  content: '¿Esta seguro que desea cerrar sesión?',
                  type: 'blue',
                  typeAnimated: true,
                  buttons: {
                      confirm: {
                          text: 'Aceptar',
                          keys: ['enter'],
                          btnClass: 'btn-default',
                          action: function () {
                            $(location).attr('href',"logout.php");
                          }
                      },
                      cancel: {
                        text: 'Cancelar',
                        keys: ['escape'],
                        btnClass: 'btn-danger',
                        action: function () {
                          
                        }
                      },
                  }
              });

        }
    });
  },
  
  // function para registrar un nuevo usuario
  registrar: function(){

    $.ajax({type: "POST",
        url: "../modelo/data-usuario.php",
        data: {Datos: $("#Datos").serialize()},
        success:function(tRespuesta){
          // console.log(tRespuesta)
          $.confirm({
                title: 'Alerta!',
                type: 'success',
                content: 'Se ha registrado correctamente!',
                buttons: {
                  confirm: {
                    text: 'Aceptar',
                    keys: ['enter'],
                    action: function(){
                      $(location).attr('href',"login.php");
                    }
                  }
                }
            });
        }
    });
  }
}