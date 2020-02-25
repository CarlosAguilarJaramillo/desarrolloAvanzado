function cargarOptionUsuarios(){

    $.ajax({
        type: "POST",
        url: "util/accesos/optionUsuarios.php",
        //data: {},
        dataType: 'json',
        beforeSend: function(){
            $("#usuarios").empty();
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            switch(respuesta.estado){
                case 1:
                
                    //console.log(respuesta);
                    var opciones = respuesta.data;

                    if( opciones.length > 0 ){
                         var opcSelect = '';

                         for(var f = 0; f < opciones.length; f++ ){
                            opcSelect += '<option ';
                            opcSelect += ' data-nombre="'+opciones[f]['nombre']+'" ';
                            opcSelect += ' value="'+opciones[f]['usuario']+'" >';
                            opcSelect += opciones[f]['usuario']+' - '+opciones[f]['nombre'];
                            opcSelect += '</option>';
                         }

                         $("#usuarios").html(opcSelect);
                         $("#usuarios").trigger("chosen:updated");
                    }


                    break;
                case 2:
                    $('#myModalWarningBody').html(respuesta.mensaje);
                    $('#myModalWarning').modal('show');            
                    break;
                default:
                    alert("Se ha producido un error");
                    break;
            }
        }
    });

}

function cargarMenu(){

    $.ajax({
        type: "POST",
        url: "util/accesos/queryMenu.php",
        //data: {},
        dataType: 'json',
        beforeSend: function(){
            $("#sys_menu").empty();
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            switch(respuesta.estado){
                case 1:
                
                    //console.log(respuesta);
                    var menu = respuesta.data;
                    var sys_menu = '<ul id="myMenuPermisos">';

                    for(var f = 0; f < menu.length; f++ ){
                        sys_menu += '<li class="open">';
                        sys_menu += '<input type="checkbox" id="menu_'+( f + 1 )+'" value="'+menu[f]['idmenu']+'" class="menu_sys">';
                        sys_menu += '<label for="menu_'+( f + 1 )+'">'+menu[f]['nombre']+'</label>';

                        sys_menu += '<ul>';
                        var submenu = menu[f]['submenu'];

                        for(var i = 0; i < submenu.length; i++ ){
                            sys_menu += '<li>';
                            sys_menu += '<input type="checkbox" id="menu_'+( f + 1 )+'_'+( i + 1 )+'" value="'+submenu[i]['idmenu']+'" class="menu_sys">';
                            sys_menu += '<label for="menu_'+( f + 1 )+'_'+( i + 1 )+'">'+submenu[i]['nombre']+'</label>';
                            sys_menu += '</li>';
                        }

                        sys_menu += '</ul>';

                        sys_menu += '</li>';
                    }

                    sys_menu += '</ul>';

                    $("#sys_menu").html(sys_menu);

                    break;
                case 2:
                    $('#myModalWarningBody').html(respuesta.mensaje);
                    $('#myModalWarning').modal('show');            
                    break;
                default:
                    alert("Se ha producido un error");
                    break;
            }
        },
        complete: function(){
            chekear();

            $("#myMenuPermisos").treeview({
                animated: "normal",
                collapsed: true,
                unique: false,
                persist: "location"
            });
        }
    });

}

function chekear(){

    $('input[type="checkbox"]').change(function(e) {
        var checked = $(this).prop("checked"),
            container = $(this).parent(),
            siblings = container.siblings();

        container.find('input[type="checkbox"]').prop({
            indeterminate: false,
            checked: checked
        });

        function checkSiblings(el) {
            var parent = el.parent().parent(),
                all = true;

            el.siblings().each(function() {
                return all = ($(this).children('input[type="checkbox"]').prop("checked") === checked);
            });

            if (all && checked) {
                parent.children('input[type="checkbox"]').prop({
                    indeterminate: false,
                    checked: checked
                });
                checkSiblings(parent);
            } else if (all && !checked) {
                parent.children('input[type="checkbox"]').prop("checked", checked);
                parent.children('input[type="checkbox"]').prop("indeterminate", (parent.find('input[type="checkbox"]:checked').length > 0));
                checkSiblings(parent);
            } else {
                el.parents("li").children('input[type="checkbox"]').prop({
                    indeterminate: true,
                    checked: true
                });
            }
        }

        checkSiblings(container);
    });
}

function limpiarFormPermisos(){
    $("#formGuardarPermisos").trigger("reset");

    $('input[type="checkbox"]').each(function (){
        $(this).prop({checked:false});
        $(this).prop({indeterminate:false});
    });
}

function mostrarMenuUsuario(usuario){

    $.ajax({
        async: false,
        type: "POST",
        url: "util/accesos/queryMenuUsuario.php",
        data: {
            usuario:usuario
        },
        dataType: 'json',
        beforeSend: function(){
            $('input[type="checkbox"]').each(function (){
                $(this).prop({checked:false});
                $(this).prop({indeterminate:false});
            });
        },
        error: function(request, status, error){
            alert(request.responseText);
        },
        success: function(respuesta){
            switch(respuesta.estado){
                case 1:
                
                    //console.log(respuesta);
                    var menu = respuesta.data;

                    if( menu.length > 0 ){

                        $(".menu_sys").each(function(){
                            var este_menu = this;
                            var valor = este_menu.value;

                            for(var f=0; f < menu.length; f++){
                                if(valor == menu[f]){
                                    $(este_menu).prop({checked: true});
                                    break;
                                }
                            }
                        });

                    }else{
                        $('#myModalWarningBody').html("El usuario no tiene permisos asignados");
                        $('#myModalWarning').modal('show');   
                    }

                    break;
                case 2:
                    $('#myModalWarningBody').html(respuesta.mensaje);
                    $('#myModalWarning').modal('show');            
                    break;
                default:
                    alert("Se ha producido un error");
                    break;
            }
        }
    });

}

$(document).ready(function (){

    cargarMenu();
    
    cargarOptionUsuarios();
    $("#usuarios").chosen({width: "100%"});

    $("#limpiarFormGuardarPermisos").click(function (){
        limpiarFormPermisos();
    });

    $("#formUsuarios").submit(function (){
        limpiarFormPermisos();

        var usuario = $("#usuarios option:selected").val();
        $("#usuario").val(usuario);
        $("#nombre").val($("#usuarios option:selected").data("nombre"));

        mostrarMenuUsuario(usuario);

        return false;
    });

    $("#formGuardarPermisos").submit(function (){
        var usuario = $("#usuario").val();

        if( usuario != '' ){

            var menuChekeado = [];
            var existeMenu = false;

            $(".menu_sys").each(function(){
                existeMenu = true;
                var este_menu = this;
                var valor = este_menu.value;

                var checkeado = ( $(este_menu).is(":checked") || $(este_menu).prop("indeterminate") ? 1 : 0 );

                if(checkeado == 1){
                    menuChekeado.push(valor);
                }

            });

            //console.log(menuChekeado);

            if(existeMenu){

                $.ajax({
                    async: false,
                    type: "POST",
                    url: "util/accesos/gestion.php",
                    data: {
                        usuario:usuario,
                        menuChekeado:menuChekeado
                    },
                    dataType: 'json',
                    //beforeSend: function(){},
                    error: function(request, status, error){
                        alert(request.responseText);
                    },
                    success: function(respuesta){
                        switch(respuesta.estado){
                            case 1:
                                $('#myModalSuccessBody').html(respuesta.mensaje);
                                $('#myModalSuccess').modal('show');
                                limpiarFormPermisos();            
                                break;
                            case 2:
                                $('#myModalWarningBody').html(respuesta.mensaje);
                                $('#myModalWarning').modal('show');            
                                break;
                            default:
                                alert("Se ha producido un error");
                                break;
                        }
                    }
                });

            }else{
                $('#myModalWarningBody').html("No se cargo el menú");
                $('#myModalWarning').modal('show'); 
            }

        }else{
            $('#myModalWarningBody').html("Debe seleccionar un usuario");
            $('#myModalWarning').modal('show'); 
        }

        return false;
    });

});