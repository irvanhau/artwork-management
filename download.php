<?php

function download($judulDown)
{
    $filename    = $_GET['file'];

    $back_dir    = "images/{$judulDown}/";
    $file = $back_dir . $filename;
    echo $file;

    if (file_exists($file)) {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename=' . basename($file));
        header('Content-Transfer-Encoding: binary');
        header('Expires: 0');
        header('Cache-Control: private');
        header('Pragma: private');
        header('Content-Length: ' . filesize($file));
        ob_clean();
        flush();
        readfile($file);

        exit;
    }
}
$name = $_GET['name'];
download($name);
