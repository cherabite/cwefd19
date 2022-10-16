<?php
include("../mpdf.php");
$mpdf=new mPDF(); 

$html= '<table border="1"><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr><tr><td>a</td></tr></table>';

$mpdf->WriteHTML('$html');
$mpdf->Output();
?>