<?php

$fajlPutanja = 'fajl download/Online Pijaca Katalog.pdf';

if (file_exists($fajlPutanja)) {
    header('Content-Type: application/pdf');
    header('Content-Disposition: attachment; filename="' . basename($fajlPutanja) . '"');
    readfile($fajlPutanja);
    exit;
} else {
    echo "Fajl ne postoji.";
}

?>