<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="lib/css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
    <link href="lib/css/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
    <link href="css/login.css?v=<?php echo $parametro['webversion']; ?>" rel="stylesheet" type="text/css"/>

    <link href="img/system/favicon.ico?v=<?php echo $parametro['webversion']; ?>" rel="icon" type="image/x-icon"/>

    <title>Pedidos</title>
</head>
<body>

<div class="modal fade" id="myModalWarning" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content panel-warning">
      <div class="modal-header panel-heading">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Advertencia</h4>
      </div>
      <div class="modal-body text-center" id="myModalWarningBody"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div class="container">
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="page-header text-center">
                <h1>Acceso al  sistema</h1>
            </div>
            <div class="alert alert-info text-center">
                Bienvenidos al sistema de pedidos web
            </div>
            <div class="panel panel-default">
                <div class="panel-heading">
                    Ingrese sus datos para acceder al sistema
                </div>
                <div class="panel-body">
                    <form role="form" id="formLogin" class="form-horizontal">
                        <div class="form-group">
                            <label for="usuario" class="col-md-2 control-label">Usuario</label>
                            <div class="col-md-10">
                                <input type="text" id="usuario" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="clave" class="col-md-2 control-label">Clave</label>
                            <div class="col-md-10">
                                <input type="password" id="clave" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-offset-2 col-md-10 text-right">
                                <button type="submit" id="btn_submit" class="btn btn-info">Acceder</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
    <script type="text/javascript" language="javascript" src="lib/js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" language="javascript" src="lib/css/bootstrap-3.3.7-dist/js/bootstrap.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/login.js?v=<?php echo $parametro['webversion']; ?>"></script>
</html>