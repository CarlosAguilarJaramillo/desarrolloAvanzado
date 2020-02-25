<?php

class Funciones{

    public static function Logs( $nombre_archivo, $ubicacion, $descripcion){
        $carpeta = $ubicacion.date('Y').'/'.date('m').'/'.date('d').'/';

        if( !file_exists($ubicacion.date('Y').'/'.date('m').'/'.date('d')) ){
            mkdir($ubicacion.date('Y').'/'.date('m').'/'.date('d'), 0777, true);
        }

        $mi_archivo = fopen( $carpeta.$nombre_archivo.'.txt', "a") or die("Archivo inaccesible!");
        fwrite($mi_archivo, date("Y-m-d H:i:s").' >>> '.$descripcion."\r\n");
        fclose($mi_archivo);        
    }

    public static function ObtenerIp(){
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

    public static function ObtenerNavegador( $useragent ){
        if (preg_match('|MSIE ([0-9].[0-9]{1,2})|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'IE';
        } elseif (preg_match( '|Opera/([0-9].[0-9]{1,2})|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Opera';
        } elseif(preg_match('|Firefox/([0-9\.]+)|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Firefox';
        } elseif(preg_match('|Chrome/([0-9\.]+)|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Chrome';
        } elseif(preg_match('|Safari/([0-9\.]+)|',$useragent,$matched)) {
            $browser_version=$matched[1];
            $browser = 'Safari';
        } else {
            // browser not recognized!
            $browser_version = 0;
            $browser= 'Desconocido';
        }
        return $browser." - ".$browser_version;
    }

}

#Funciones::Logs("test", "../logs/", "Este es un mensaje de prueba");