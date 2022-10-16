<?php
 require('third_party/mpdf/mpdf/mpdf.php');
  $pdf=new mPDF('"ar","A4","30","utf8",10,10,10,10,6,3'); 
 // $pdf->SetFont("amiri");
  //require_once('third_party/phpqrcode/qrlib.php');
//QRcode::png($info, 'filename.png', 'H',4,2);
 $stylesheet= 'body,p { font-family:amiri;  margin-top:2px; margin-bottom:4px; text-align:right;}';
 //$pdf -> SetProtection ( array ('print')); 

	//$pdf= new mPDF('ar', "A4", $fontsize=11, $fontfamily="serif");
       // $pdf->SetDirectionality('rtl');
  ini_set('memory_limit','512M'); 
$pdf->SetDirectionality('rtl');  
$pdf->useSubstitutions = false;
$mpdf->autoScriptToLang = true;
//$mpdf->autoLangToFont = true;
$pdf->WriteHTML($stylesheet, 1);

               
                        $host = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'grh';


                        $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                        mysql_select_db($db) or die('Erreur :' . mysql_error());
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");

                        if (isset($_POST['afficher0'])) {

                            if (!empty($_POST['ID_EMPLOYEUE']) and ! empty($_POST['MOIS_01']) and ! empty($_POST['ANNEE_01'])) {
                                $ID_EMPLOYEUE = $_POST['ID_EMPLOYEUE'];
                                $MOIS_01 = $_POST['MOIS_01'];

                                $mois = (int) $MOIS_01;

                                switch ($mois) {
                                    case 1:$MOIS_LETTRE = "جانفي";
                                        break;
                                    case 2:$MOIS_LETTRE = "فيفري";
                                        break;
                                    case 3:$MOIS_LETTRE = "مارس";
                                        break;
                                    case 4:$MOIS_LETTRE = "أفريل";
                                        break;
                                    case 5:$MOIS_LETTRE = "مــــاي";
                                        break;
                                    case 6:$MOIS_LETTRE = "جــوان";
                                        break;
                                    case 7:$MOIS_LETTRE = "جويلية";
                                        break;
                                    case 8:$MOIS_LETTRE = "أوت";
                                        break;
                                    case 9:$MOIS_LETTRE = "سبتمبر";
                                        break;
                                    case 10:$MOIS_LETTRE = "أكتوبر";
                                        break;
                                    case 11:$MOIS_LETTRE = "نـوفمبر";
                                        break;
                                    case 12:$MOIS_LETTRE = "ديسمبر";
                                        break;
                                }

                                $ANNEE_01 = $_POST['ANNEE_01'];
                                //
                                $g = (int) $ID_EMPLOYEUE;
                                if ($g == 0000) {
                                    $select = "SELECT * FROM employeur where ARRETE ='لا' ORDER BY N_ISTIDLALI  DESC ";
                                } else {
                                    $select = "SELECT * FROM employeur where ID_EMPLOYEUE=$ID_EMPLOYEUE and ARRETE ='لا'";
                                }

//$select = "SELECT * FROM tab_retard where YEAR (DATE_RET) > 2015 "; 
                                $result = mysql_query($select);
                                $total = mysql_num_rows($result);

                                if ($total) {
                                   $pdf->WriteHTML('

                                    <p style="  text-align: center;"><span style="font-weight: bold;">الجمهورية
                                            الجزائرية الديمقراطية الشعبية</span></p>
                                    <p><span style="font-weight: bold;"> </span></p>
                                    <p style="  text-align: center;"><span style="font-weight: bold;">وزارة
                                            التربية الوطنية</span></p>
                                    <p><span style="font-weight: bold;"> </span></p>
                                    <p style="  text-align: center;"><span style="font-weight: bold;">الديوان
                                            الوطني للتعليم و التكوين عن بعد</span></p>
                                    <p><span style="font-weight: bold;"> </span></p>
                                    <p style="  text-align: center;"><span style="font-weight: bold;">المركز
                                            الجهوي سطيف</span></p>
                                    
                                    <hr color="blue" width="75%">
                                        <p style="text-align: center;"> <span style="text-decoration: underline;">الإحصائيات
                                                الإجمالية للتأخرات و الغياب للموظفين</span></p>
                                        
                                        <p style="text-align: center;"> <span style="text-decoration: underline;">لشــهر :'.$MOIS_LETTRE.'
                                    '.$ANNEE_01.'</span></p>
                                        
                                        <table style="width: 100%" border="1">
                                            <tbody>
                                                <tr>
                                                    <td style="text-align: center; background-color: #cccccc;">إسم و لقب
                                                        الموظف</td>
                                                    <td style="text-align: center; background-color: #cccccc;">الرتبة</td>

                                                    <td style="text-align: center; background-color: #cccccc;">
                                                        <table style="position:fixe;width:12cm;"border="1">
                                                            <tr> 
                                                                <td colspan="7" rowspan="1" style="text-align: center;" > نوع الغياب </td>
                                                                
                                                             </tr>
														</table>
                                                     </td>

                                                    <td style="text-align: center; background-color: #cccccc;">قرار
                                                        الإدارة</td>
                                                </tr>');
                                               
                                                $nem = 1;
                                                while ($row = mysql_fetch_array($result)) {
                                                    $ID_EMPLOYEUE = $row['ID_EMPLOYEUE'];
                                                    $pdf->WriteHTML('  <tr>
														  <td style="text-align: center;"> ' . $row['NOM'] . '   ' . $row['PRENOM'] . '
														  </td>
														  <td style="text-align: center;">  ' . $row['GRADE'] . '
														  </td>
														  
														  <td style="text-align: center;">
                                                    
                                   <table style="position:fixe;width:12cm;"border="1">
								                           <tr> 
                                                                <td style=" width: 16%; text-align: center; background-color: #cccccc; " > نوع الغياب </td>
                                                                <td style="width: 16%;text-align: center; background-color: #cccccc;">التاريخ  </td>
                                                                <td style="width: 16%;text-align: center; background-color: #cccccc;">ت.التأخر</td>
                                                                <td style="width: text-align: center; background-color: #cccccc;"> ت.الخروج </td>
																 <td style="width: 16%;text-align: center; background-color: #cccccc;"> ت.الدخول </td>
																 <td style="width: 16%;text-align: center; background-color: #cccccc;">  ت نهاية ع م </td>
                                                                <td style="width: 16%;text-align: center; background-color: #cccccc;"> التبرير  </td>
																 
                                                                 </tr>');
                                                          
                                                    $req = mysql_query("select * from tab_retard  where ID_EMPLOYEUE='$ID_EMPLOYEUE'  and YEAR (DATE_RET) =$ANNEE_01 and MONTH (DATE_RET) =$MOIS_01  ORDER BY DATE_RET  ASC");
                                                    while ($nbr = mysql_fetch_array($req)) {
                                                        $TYPR_RET = $nbr['TYPR_RET'];
													$d=$nbr['DATE_REVENIR_CONGE'];
													if ($d=='0000-00-00'){
														$dd='';
														}else{$dd=$d;}
                                                        
                                                       
			$pdf->WriteHTML('	<tr> 
				<td style=" width: 16%;text-align: right; " > ' . $nbr['TYPR_RET'] . '  </td>
                <td style="width: 16%;text-align: right;"> ' . $nbr['DATE_RET'] . '  </td>
				<td style="width: 16%;text-align: right;"> ' . $nbr['HEUR_ENTRE_RET'] . '  </td>
				<td style="width: 16%;text-align: right;"> ' . $nbr['HEUR_SORTIR'] . '  </td>
				<td style="width: 16%;text-align: right;"> ' . $nbr['HEUR_REVENIR'] . '  </td>
				<td style="width: 16%;text-align: right;"> ' .$dd. '  </td>
				<td style="width: 16%;text-align: right;"> ' . $nbr['PROUVE'] . '  </td>
				</tr>');
				 }
			$pdf->WriteHTML('</table>
                                                   
             </td>
			 <td style="width: 16%;text-align: center">   </td>
			
         
          
         
        </tr>');
                                                }
                                                
                          $pdf->WriteHTML('                  </tbody>
                                        </table>');

                              $pdf->Output('Stat_retard.pdf','I');           
                                    } else {

                                        echo 'Pas d\'enregistrements dans cette table...';
                                    }


                                   
                                } else {

                                  
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
                                    echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL=condition_statistique.php"> ';
                                }
                            } elseif (isset($_POST['afficher1'])) {

                                if (!empty($_POST['ID_EMPLOYEUE']) and ! empty($_POST['MOIS_02']) and ! empty($_POST['ANNEE_02'])and ! empty($_POST['MOIS_03']) and ! empty($_POST['ANNEE_03'])) {
                                    $ID_EMPLOYEUE = $_POST['ID_EMPLOYEUE'];
                                    $MOIS_02 = $_POST['MOIS_02'];
                                    $ANNEE_02 = $_POST['ANNEE_02'];
                                    $MOIS_03 = $_POST['MOIS_03'];
                                    $ANNEE_03 = $_POST['ANNEE_03'];

                                    $mois = (int) $MOIS_02;

                                    $moiss = (int) $MOIS_03;

                                    switch ($moiss) {
                                        case 1:$MOIS_LETTRES = "جانفي";
                                            break;
                                        case 2:$MOIS_LETTRES = "فيفري";
                                            break;
                                        case 3:$MOIS_LETTRES = "مارس";
                                            break;
                                        case 4:$MOIS_LETTRES = "أفريل";
                                            break;
                                        case 5:$MOIS_LETTRES = "مــــاي";
                                            break;
                                        case 6:$MOIS_LETTRES = "جــوان";
                                            break;
                                        case 7:$MOIS_LETTRES = "جويلية";
                                            break;
                                        case 8:$MOIS_LETTRES = "أوت";
                                            break;
                                        case 9:$MOIS_LETTRES = "سبتمبر";
                                            break;
                                        case 10:$MOIS_LETTRES = "أكتوبر";
                                            break;
                                        case 11:$MOIS_LETTRES = "نـوفمبر";
                                            break;
                                        case 12:$MOIS_LETTRES = "ديسمبر";
                                            break;
                                    }
                                    switch ($mois) {
                                        case 1:$MOIS_LETTRE = "جانفي";
                                            break;
                                        case 2:$MOIS_LETTRE = "فيفري";
                                            break;
                                        case 3:$MOIS_LETTRE = "مارس";
                                            break;
                                        case 4:$MOIS_LETTRE = "أفريل";
                                            break;
                                        case 5:$MOIS_LETTRE = "مــــاي";
                                            break;
                                        case 6:$MOIS_LETTRE = "جــوان";
                                            break;
                                        case 7:$MOIS_LETTRE = "جويلية";
                                            break;
                                        case 8:$MOIS_LETTRE = "أوت";
                                            break;
                                        case 9:$MOIS_LETTRE = "سبتمبر";
                                            break;
                                        case 10:$MOIS_LETTRE = "أكتوبر";
                                            break;
                                        case 11:$MOIS_LETTRE = "نـوفمبر";
                                            break;
                                        case 12:$MOIS_LETTRE = "ديسمبر";
                                            break;
                                    }
                                    //
                                    $g = (int) $ID_EMPLOYEUE;
                                    if ($g == 0000) {
                                        $select = "SELECT * FROM employeur where ARRETE ='لا'  ORDER BY N_ISTIDLALI  DESC ";
                                    } else {
                                        $select = "SELECT * FROM employeur where ID_EMPLOYEUE=$ID_EMPLOYEUE and ARRETE ='لا' ";
                                    }


                                    $result = mysql_query($select);
                                    $total = mysql_num_rows($result);

                                    if ($total) {
                                        

                           $pdf->WriteHTML('  <p style="  text-align: center;"><span style="font-weight: bold;">الجمهورية
                                                الجزائرية الديمقراطية الشعبية</span></p>
                                        <p><span style="font-weight: bold;"> </span></p>
                                        <p style="  text-align: center;"><span style="font-weight: bold;">وزارة
                                                التربية الوطنية</span></p>
                                        <p><span style="font-weight: bold;"> </span></p>
                                        <p style="  text-align: center;"><span style="font-weight: bold;">الديوان
                                                الوطني للتعليم و التكوين عن بعد</span></p>
                                        <p><span style="font-weight: bold;"> </span></p>
                                        <p style="  text-align: center;"><span style="font-weight: bold;">المركز
                                                الجهوي سطيف</span></p>
                                        
                                        <hr color="blue" width="75%">
                                            <p style="text-align: center;"> <span style="text-decoration: underline;">الإحصائيات
                                                    الإجمالية للتأخرات و الغياب للموظفين</span></p>
                                            <p style="text-align: center;"> <span style="text-decoration: underline;">من شــهر :'. $MOIS_LETTRE.'
                                        '.$ANNEE_02.' إلــى غــايــة :'.$MOIS_LETTRES.'
                                        '. $ANNEE_03.'</span></p>
                                            &nbsp;
                                            <table style="width: 100%" border="1">
                                                <tbody>
                                                    <tr>
                                                        <td style="text-align: center; background-color: #cccccc;">إسم و لقب
                                                            الموظف</td>
                                                        <td style="text-align: center; background-color: #cccccc;">الرتبة</td>

                                                        
                                                        <td style="text-align: center; background-color: #cccccc;position:fixe;width:12cm;">
                                                            <table style="position:fixe;width:12cm;"border="1">
                                                                <tr> 
                                                                     <td colspan="7" rowspan="1" style="text-align: center;" > نوع الغياب </td>
                                                                   
                                                                </tr>
																</table>
                                                        </td>

                                                        <td style="text-align: center">قرار
                                                            الإدارة</td>
                                                    </tr>');
                                                    
                                                    $nem = 1;
                                                    while ($row = mysql_fetch_array($result)) {
                                                        $ID_EMPLOYEUE = $row['ID_EMPLOYEUE'];
                                                        $pdf->WriteHTML('  <tr>
          <td style="text-align: center;"> ' . $row['NOM'] . '   ' . $row['PRENOM'] . '
          </td>
          <td style="text-align: center;">  ' . $row['GRADE'] . '
          </td>
          
          <td style="text-align: center;">
                                                        //$select = "SELECT * FROM tab_retard where YEAR (DATE_RET) > 2015 ";   
                         <table style="position:fixe;width:12cm;"border="1">
								                        <tr> 
                                                                <td style=" width: 16%; text-align: center; background-color: #cccccc; " > نوع الغياب </td>
                                                                <td style="width: 16%;text-align: center; background-color: #cccccc;">التاريخ  </td>
                                                                <td style="width: 16%;text-align: center; background-color: #cccccc;">ت.التأخر</td>
                                                                <td style="width: text-align: center; background-color: #cccccc;"> ت.الخروج </td>
																 <td style="width: 16%;text-align: center; background-color: #cccccc;"> ت.الدخول </td>
																 <td style="width: 16%;text-align: center; background-color: #cccccc;">  ت نهاية ع م </td>
                                                                <td style="width: 16%;text-align: center; background-color: #cccccc;"> التبرير  </td>
                                                                 </tr>');

                                                        $req = mysql_query("select * from tab_retard  where ID_EMPLOYEUE='$ID_EMPLOYEUE' and  YEAR (DATE_RET) >=$ANNEE_02 and MONTH (DATE_RET) >=$MOIS_02 and  YEAR (DATE_RET) <=$ANNEE_03 and MONTH (DATE_RET) <=$MOIS_03 ORDER BY DATE_RET  ASC");

                                                        while ($nbr = mysql_fetch_array($req)) {
                                                            $TYPR_RET = $nbr['TYPR_RET'];
															$d=$nbr['DATE_REVENIR_CONGE'];
													if ($d=='0000-00-00'){
														$dd='';
														}else{$dd=$d;}
                                                           
                                                    
			$pdf->WriteHTML('	<tr> 
				<td style=" width: 2cm;text-align: right; " > ' . $nbr['TYPR_RET'] . '  </td>
                <td style="width: 2cm;text-align: right;"> ' . $nbr['DATE_RET'] . '  </td>
				<td style="width: 2cm;text-align: right;"> ' . $nbr['HEUR_ENTRE_RET'] . '  </td>
				<td style="width: 2cm;text-align: right;"> '  . $nbr['HEUR_SORTIR'] . '  </td>
				<td style="width: 16%;text-align: right;"> ' . $nbr['HEUR_REVENIR'] . '  </td>
				<td style="width: 16%;text-align: right;"> '.$dd.'  </td>
				<td style="width: 2cm;text-align: right;"> ' . $nbr['PROUVE'] . '  </td>
				
				</tr>');
				 }
			$pdf->WriteHTML('</table>
                                                       
                 </td>
         
          
        </tr>');
                                                    }
                                                   
                                 $pdf->WriteHTML('  </tbody>
                                            </table>');
$pdf->Output('Stat_retard.pdf','I');  
            
        } else {

            echo 'Pas d\'enregistrements dans cette table...';
        }


        //
    } else {

        //header ('location: condition_statistique.php');
        ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
        echo'<META HTTP-EQUIV="Refresh" CONTENT="0;URL=condition_statistique.php"> ';
    }
}
?>
