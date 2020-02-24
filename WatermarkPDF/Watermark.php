
<?php
//This page contains edit the existing file by using fpdi.
include('cryptojs-aes.php');
require('WatermarkPDF.php');
# ==========================
$encrypt = $_GET['file'];


$encrypt = json_decode(cryptoJsAesDecrypt("rep0ptba", $encrypt));
$file = $encrypt[0];
$nama = $encrypt[1];
$np = $encrypt[2];

//print_r(json_decode($file));

$pdfFile = dirname(__DIR__ )."/uploads/".$file;
$watermarkText = "DOKUMEN RAHASIA";
$user = "Dibaca oleh ".$nama."(".$np.")";
$pdf = new WatermarkPDF($pdfFile, $watermarkText, $user);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 12);

if($pdf->numPages>1) {
    for($i=2;$i<=$pdf->numPages;$i++) {
        $pdf->_tplIdx = $pdf->importPage($i);
        $pdf->AddPage();
    }
}

$pdf->Output(); 

//If you Leave blank then it should take default "I" i.e. Browser
//$pdf->Output("sampleUpdated.pdf", 'D'); //Download the file. open dialogue window in browser to save, not open with PDF browser viewer
//$pdf->Output("save_to_directory_path.pdf", 'F'); //save to a local file with the name given by filename (may include a path)
//$pdf->Output("sampleUpdated.pdf", 'I'); //I for "inline" to send the PDF to the browser
//$pdf->Output("", 'S'); //return the document as a string. filename is ignored.
?>


