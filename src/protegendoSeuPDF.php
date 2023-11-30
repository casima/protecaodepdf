<?php
// setup the autoload function
require_once('../vendor/autoload.php');

use setasign\FpdiProtection\FpdiProtection;

$pdf = new FpdiProtection();

$src_file = '../dirPDF/pdfs/apostila_latex.pdf';
$dest_file = '../dirPDF/pdfsProtegidos/';

$ownerPassword = $pdf->setProtection(
    FpdiProtection::PERM_PRINT | FpdiProtection::PERM_COPY,
    '123456',
    '012345'
);
//Retorna a senha do proprietário
var_dump($ownerPassword);

$pageCount = $pdf->setSourceFile($src_file);
for ($pageNo = 1; $pageNo <= $pageCount; $pageNo++) {
    $id = $pdf->importPage($pageNo);
    $size = $pdf->getTemplateSize($id);

    $pdf->AddPage($size['orientation'], $size);
    $pdf->useTemplate($id);
}

$pdf->Output('F', $dest_file.'simple.pdf');
