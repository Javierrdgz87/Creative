<!DOCTYPE html>
<html lang="en" class="body-full-height">
<head>        
        <!-- META SECTION -->
        <title>Creative</title>            
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        
        <link rel="icon" href="favicon.ico" type="image/x-icon" />
        <!-- CDN Bootstrap 3.3.7 Css -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <!-- CDN jQuery Confirm Css -->
        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.css">
        <link rel="stylesheet" href="../css/default-theme.css">
        <!-- CDN Font Awesome -->
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>      
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>                            
    </head>
    <body>
        <div class="container">
            <div class="card">
                <div class="form-group">
                    <div class="col-md-8 col-lg-8 col-md-offset-2 col-lg-offset-2">
                        <form action="return false" class="form-signin" method="post" id="Datos">
                            <div id="divRespuesta"></div>
                            <div class="panel-default tabs m-t-40">
                                <ul class="nav nav-tabs" role="tablist" id="tabList">
                                  <li class="active"><a href="#tabLogin" data-toggle="tab">
                                      <i class="fa fa-sign-in-alt"></i>
                                    Iniciar Sesión</a>
                                  </li>
                                  <li><a href="#tabRegister" data-toggle="tab">
                                      <i class="fa fa-user-plus"></i>
                                    Registro</a>
                                  </li>
                                </ul>
                                <div class="panel-body-tabs tab-content">
                                    <div class="tab-pane fade in active" id="tabLogin">
                                        <div class="row m-t-40">
                                            <div class="form-group">
                                                <div class="col-md-12"><strong>Ingrese</strong> a su cuenta</div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" class="form-control" placeholder="Correo" id="tCorreo" name="tCorreo"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="password" class="form-control" placeholder="Password" id="tPassword" name="tPassword"/>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <button type="button" class="btn btn-info btn-block" id="login">Ingresar</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane fade in" id="tabRegister">
                                        <div class="row m-t-40">
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" name="tNombre" id="tNombre" class="form-control" placeholder="Nombre" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="text" name="tApellidos" id="tApellidos" class="form-control" placeholder="Apellidos">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="email" name="tCorreoRegistro" id="tCorreoRegistro" class="form-control" placeholder="Correo" value="">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="password" name="tPasswordRegistro" id="tPasswordRegistro" class="form-control" placeholder="Password">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <div class="col-md-12">
                                                    <input type="button" name="btnRE" id="btnRE" class=" btn btn-info btn-block" value="Registrar">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- Jquery -->
    <script src="http://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <!-- JS Jquery Confirm -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
    <script src="../js/sist.js"></script>
</html>


