
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>rec</title>
      
    </head>
    <body style="position:absolute;width:19cm;height:27cm; font-family: 'Amiri', serif;" >
        <div>

            <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'grh';



            $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
            mysql_select_db($db) or die('Erreur :' . mysql_error());
            mysql_query("set character_set_server='utf8'");
            mysql_query("set names 'utf8'");

            if (isset($_GET['ID_EMPLOYEUE'])) {
                $ID_EMPLOYEUE = $_GET['ID_EMPLOYEUE'];
                $req = mysql_query("select * from employeur where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
                $nbr = mysql_fetch_array($req);
                $ARRETE = $nbr['ARRETE'];
                $PRESUME = $nbr['PRESUME'];
                           $DATE_NAIS = $nbr['DNS'];
                            $date = date_create($DATE_NAIS);

                            $DNS0 = date_format($date, 'd-m-Y');
                            $dns = date_format($date, 'Y');
							$date = date_create($nbr['DATE_ARRETE']);

                            $DATE_ARRETE = date_format($date, 'd-m-Y');
						

                            if ($PRESUME == '0') {
                                $date_de_nais= $nbr['DNS'];
                            } else {
                               $date_de_nais= 'خـــلال  ' . $dns;
                            }
                        if ($ARRETE == 'لا') {
                                $fin_travail= ' إلى يومنـا هـذا .';
                            } else {
								$fin_travail= 'إلى  غــاية :&nbsp;'. $DATE_ARRETE;
                               
                            } 
							 $date = date_create($nbr['DATE_PV_INSTALL']);

                            $DATE_PV_INSTALL = date_format($date, 'd-m-Y');
						
/************************/
$info=$nbr['NOM'].' '.$nbr['PRENOM'].'   تاريخ الميلاد  '.$date_de_nais.' '.$nbr['LNS'].'  الوظيفة :  '.$nbr['GRADE'].'  '.'  تاريخ التنصيب : '.$DATE_PV_INSTALL.'  أنجزت يوم : '.date("d-m-Y");
                   
	require_once 'lib/TCPDF-6.4.0/tcpdf.php';
 $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
  
 require_once('third_party/phpqrcode/qrlib.php');
QRcode::png($info, 'filename.png', 'H',4,2);
$pdf->SetAuthor('CHERABITE KAMEL');
		$pdf->SetTitle('ورقة التنقيط');

		// set header and footer fonts
		$pdf->setHeaderFont(array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$pdf->setFooterFont(array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$pdf->SetMargins(5, 10, 10, 5);
		//	$pdf->SetHeaderMargin(0, 0, 0, 0);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// set auto page breaks
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// set image scale factor
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		$pdf->setFontSubsetting(false);
		$lg = array();
		$lg['a_meta_charset'] = 'UTF-8';
		$lg['a_meta_dir'] = 'rtl';
		$lg['a_meta_language'] = 'ar';
		$lg['w_page'] = 'page';
		$pdf->setLanguageArray($lg);
		$pdf->SetFont('mohammadbart1', '', 14);

		$pdf->AddPage();
		$fourmulaire = '<table cellspacing="0" cellpadding="0" border="0">
		 <tr>
		 <td align="center">
		 <h4>الجمهورية الجزائرية الديمقراطية الشعبية</h4>
		 <h4>وزارة التربية الوطنية </h4>
		
		 <h4> الديوان الوطني للتعليم و التكوين عن بعد    </h4>
		 <h4>المركز الولائي سطيف</h4>
		
		
		</td>
		 </tr></table>';
		$fourmulaire =$fourmulaire . '<h4 align="center"> إستمـــارة التنقيــــط</h4> <p></p>';
		$fourmulaire = $fourmulaire . '
    <table border="1" cellpadding="2" cellspacing="2" align="right"  width="100%">
	<tr>
	<td>
	<h4> الإســم : '.$nbr['PRENOM'].' </h4>
	 <h4> اللقب : '.$nbr['NOM'].' </h4>
	<h4> تاريخ الميلاد : '.$date_de_nais.'  </h4>
	<h4> الوضعية العائلية : '.$nbr['ETAT_CIVIL'].' </h4>
	
	</td>
	<td>
	<h4> الرتبة :'.$nbr['GRADE_ACTUEL'].' </h4>
	<h4> الوظيفة :'.$nbr['GRADE'].' </h4>
	<h4> الدرجة : '.$nbr['GRADE'].' </h4> 
	<h4> تاريخ سريان مفعولها : '.$date_de_nais.' </h4>
	
	</td>
	</tr>
	<tr>
	<td>
	<h4> النقطة بالأرقام : ......<h4> 
	<h4> تاريخ التنقيط : ..................<h4>
	<h4> توقيع المسؤول :<h4>
	<h4> ركن مخصص للمعني بالتنقيط :<h4>
	<h4> يمكن للمعني بالأمر أن يسجل ملاحظاته حول النقطة التي منحت له  و يمكن أن يقدم توضيحات عن وضعيتة و عن المهام التي يراها تتناسب أكثر مع كفاءاته .<h4>
	<h4> هام جدا<h4>
	<h4> يقر الممضي أنه اطلع على نقطته<h4>
	
	<h4>توقيع الموظف المعني </h4>
	
	</td>
	<td>
	
	gf
	</td>
	
	</tr>
	</table>
';

 




     $pdf->writeHTML($fourmulaire, true, false, false, false, '');		
	 ob_end_clean();
	$pdf->Output($nbr['NOM'].' '.$nbr['PRENOM'].'F_note.pdf', 'I');

	//	$pdf->Output('Table_stat_by_secteur.pdf', 'I');
			}
 
?>
 
 </div>
    </body>
    </html>