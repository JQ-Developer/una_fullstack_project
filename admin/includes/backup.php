<?php

require_once("configuration.php");
date_default_timezone_set('America/Caracas');

function backup($input)
{


    $fecha = date("Ymd-His");
    $salida_sql = $input . '_' . $fecha . '.sql';
    $data = '';
    if ($input === 'database') {
        $data = DB_NAME;
        $dump = 'C:\xampp\mysql\bin\mysqldump -h ' . DB_HOST . ' -u ' . DB_USER . ' -p' . DB_PASS . ' --opt ' . $data . ' > ' . $salida_sql;
    } else {
        $data = $input;
        $dump = 'C:\xampp\mysql\bin\mysqldump -h ' . DB_HOST . ' -u ' . DB_USER . ' -p' . DB_PASS . ' --opt ' . DB_NAME . ' ' . $data . ' > ' . $salida_sql;
    }


    exec($dump);

    $zip = new ZipArchive();
    $salida_zip = $data . '_' . $fecha . '.zip';
    if ($zip->open($salida_zip, ZIPARCHIVE::CREATE) === true) {
        $zip->addfile($salida_sql);
        $zip->close();
        unlink($salida_sql);

        header('Content-Type: application/zip');
        header('Content-Disposition: attachment; filename="' . $salida_zip . '"');
        header('Content-Length: ' . filesize($salida_zip));

        // Leer y enviar el contenido del archivo ZIP al navegador
        readfile($salida_zip);

        // Borrar el archivo ZIP después de enviarlo
        unlink($salida_zip);

        exit;
    } else {
        echo ('Error');
    }
}
