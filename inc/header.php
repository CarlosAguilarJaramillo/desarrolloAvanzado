<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="img/system/favicon.ico?v=<?php echo $parametro['webversion']; ?>" rel="icon" type="image/x-icon"/>

    <?php
    
    for($f=0; $f < count($varAcceso['framework']); $f++){
        switch($varAcceso['framework'][$f]){
            case 'bootstrap';
                echo '<link href="lib/css/bootstrap-3.3.7-dist/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>';
                echo '<link href="lib/css/bootstrap-3.3.7-dist/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>';
            break;
            case 'jquery-treeview';
                echo '<link href="lib/js/jquery-treeview-master/jquery.treeview.css" rel="stylesheet" type="text/css"/>';
            break;
            case 'chosen';
                echo '<link href="lib/js/chosen_v1.8.7/chosen.min.css" rel="stylesheet" type="text/css"/>';
            break;
            case 'datatables';
                echo '<link href="lib/js/DataTables/DataTables-1.10.18/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>';
            break;
        }
    }

    ?>

    <link href="css/system.css?v=<?php echo $parametro['webversion']; ?>" rel="stylesheet" type="text/css"/>
    <link href="css/<?php echo $pagina; ?>.css?v=<?php echo $parametro['webversion']; ?>" rel="stylesheet" type="text/css"/>

    <title>Pedidos</title>
</head>
<body>

    <!-- Parametros de la aplicacion -->
    <input type="hidden" id="param_timeout" value="<?php echo $parametro['timeout']; ?>">

    <!-- Modal Advertencia -->
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
            </div>
        </div>
    </div>

    <!-- Modal Peligro -->
    <div class="modal fade" id="myModalDanger" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content panel-danger">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Peligro</h4>
            </div>
            <div class="modal-body text-center" id="myModalDangerBody"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <!-- Modal Exito -->
    <div class="modal fade" id="myModalSuccess" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content panel-success">
            <div class="modal-header panel-heading">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Éxito</h4>
            </div>
            <div class="modal-body text-center" id="myModalSuccessBody"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            </div>
            </div>
        </div>
    </div>

    <!--------------------------------->
    <div class="container">
        <nav class="navbar navbar-default navbar-fixed-top">
            <div class="container-fluid">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Pedidos</a>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <?php
                    
                    $listaMenu = "";

                    for($f = 0; $f < count($vectorMenu); $f++){
                        if( $vectorMenu[$f]['es_menu'] == 'SI' ){

                            $menuAbierto = '';
                            $listaMenuInt = '<ul class="dropdown-menu">';

                            for($i = 0; $i < count($vectorMenu); $i++){
                                if( 
                                    $vectorMenu[$i]['es_menu'] == 'NO' && 
                                    $vectorMenu[$i]['idpadre'] == $vectorMenu[$f]['idmenu']                    
                                ){

                                    if( $pagina == $vectorMenu[$i]['ventana'] ){
                                        $menuAbierto = 'class="active"';
                                    }

                                    $listaMenuInt .= '<li><a href="'.$vectorMenu[$i]['ventana'].'">';
                                    $listaMenuInt .= '<span class="glyphicon '.$vectorMenu[$i]['icono'].'"></span> ';
                                    $listaMenuInt .= $vectorMenu[$i]['nombre'];
                                    $listaMenuInt .= '</a></li>';
                                }
                            }

                            $listaMenuInt .= '</ul>';

                            $listaMenu .= '<li '.$menuAbierto.'><a href="#" class="dropdown-toggle" data-toggle="dropdown">';
                            $listaMenu .= '<span class="glyphicon '.$vectorMenu[$f]['icono'].'"></span> '.$vectorMenu[$f]['nombre'].' <b class="caret"></b>';
                            $listaMenu .= '</a>';
                            $listaMenu .= $listaMenuInt;
                            $listaMenu .= '</li>';
                        }
                    }

                    echo $listaMenu;
                    
                    ?>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <li><a>Bienvenido <b><?php echo $_SESSION['nombre'];?></b></a></li>
                    <li><a href="util/system/logout.php">Desconectarse</a></li>
                </ul>
                </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
        </nav>