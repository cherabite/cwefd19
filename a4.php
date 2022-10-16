
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    

<script language="Javascript">
function imprimer(){window.print();}
</script>
        <title>شهادة إثبات المستوى</title>
        <style>
            page {
                background: white;
                display: block;
                margin: 0 auto;
                margin-bottom: 0.5cm;

            }
            page[size="A5"][layout="portrait"] {
                width: 21cm;
                height: 14.8cm;
            }


            @media print {
				.bouton
 {
display:none;
}
                body,
                page {
                    margin: 0;

                }
            }
        </style>
    </head>
    <body>
    
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'base_crefd_19';



        $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
        mysql_select_db($db) or die('Erreur :' . mysql_error());
        mysql_query("set character_set_server='utf8'");
        mysql_query("set names 'utf8'");
        if (isset($_GET['MATR'])) {
            $MATR = $_GET['MATR'];

            $T = $_GET['t'];
            if ($T == 'a') {
                $req = mysql_query("select * from tab_eleve  where  MATR=$MATR   ");
                $nbr = mysql_fetch_array($req);
                $nb = mysql_num_rows($req);
                $NOM = $nbr['NOM'];
                $PRENOM = $nbr['PRENOM'];

                $LNS = $nbr['LIEU_NAIS'];
                $IANNEE = $nbr['COD_ANN'];
                $ORDREC = $nbr['ORDER'];
                $FILIERE = $nbr['DESING'];
                $DECISE = $nbr['DECISE'];
                $PRESUME = $nbr['PRESUME'];
                $DATE_NAIS = $nbr['DATE_NAIS'];
                $DATE_ENTRE = $nbr['DATE_ENTRE'];
                $MENTION = $nbr['DECISE'];

                $date = date_create($DATE_NAIS);

                $DNS0 = date_format($date, 'Y-m-d');
                $dns = date_format($date, 'Y');

                $datte = date_create($DATE_ENTRE);

                $DNSS0 = date_format($datte, 'Y-m-d');
            } else {
                //isset($_GET['IANNEE']);
                //isset($_GET['ICODE']);
                $IANNEE = $_GET['IANNEE'];
                $code = $_GET['ICODE'];

                //echo $MATR;
                $IANNEXE = substr($MATR, 1, 2);
                $IANNEEINS = substr($MATR, 3, 4);
                $INSEQ = substr($MATR, 7, 7);

                //echo $IANNEE;		
               // $req = mysql_query("select * from inseleve ,classe  where  inseleve.IANNEXE='$IANNEXE' and inseleve.IANNEEINS='$IANNEEINS' and inseleve.INSEQ='$INSEQ' and inseleve.IANNEE='$IANNEE'  and inseleve.ICODE='$code' and classe.CODE='$code'   ");
       		
                $req = mysql_query("select * from eleve ,inscription ,classe  
			   where  eleve.ANNEXE='$IANNEXE' and eleve.ANNEEINS='$IANNEEINS' and eleve.NSEQ='$INSEQ' and 
                 inscription.IANNEXE='$IANNEXE' and inscription.IANNEEINS='$IANNEEINS' and inscription.INSEQ='$INSEQ' and inscription.IANNEE='$IANNEE'  and inscription.ICODE='$code'
			   and classe.CODE='$code'   ");
                       
				$nbr = mysql_fetch_array($req);
                $nb = mysql_num_rows($req);

                $NOM = $nbr['NOM'];
                $PRENOM = $nbr['PRENOM'];

                $LNS = $nbr['LNS'];
                $IANNEE = $nbr['IANNEE'];
                $ORDREC = $nbr['ORDREC'];
                $FILI = $nbr['FILIERE'];
                $NIVEAU = $nbr['NIVEAU'];
                $DECISE = $nbr['MENTION'];
                $PRESUME = $nbr['PRESUME'];				
                $DATE_ENTRE = $nbr['DATEINS'];
                $MENTION = $nbr['MENTION'];
                $FILIERE = $NIVEAU . '  ' . $FILI;
                $DATE_NAIS = $nbr['DNS'];
                $date = date_create($DATE_NAIS);

                $DNS0 = date_format($date,'d-m-Y');
                $dns = date_format($date, 'Y');
                $datte = date_create($DATE_ENTRE);

                $DNSS0 = date_format($datte, 'd-m-Y');
            }

            if ($MENTION == 'مقبول' OR $MENTION == 'ينتقل' OR $MENTION == 'ناجح') {
				if($IANNEE =='2030/2031'){
					?> <SCRIPT LANGUAGE="Javascript">	alert("شهادة المستوى 2020/2019 تستخرج من الموقع");
             javascript:history.go(-1);
                </SCRIPT> <?php
				}else{
	    if ($PRESUME == '0') {
                    $date_de_nais= $DNS0;
              } else {
			  $date_de_nais= 'خـــلال  ' . $dns;
			  }				
                
	$info= $NOM .'  '.$PRENOM .'  '.' تاريخ الميلاد  : '.$date_de_nais. ' ب :'.$LNS.'المستوى : '.$FILIERE .' السنة الدراسية : ' .$IANNEE . ' أنجزت يوم : '.date("d-m-Y")	;	                    
		 require('third_party/mpdf/mpdf/mpdf.php');
  $pdf=new mPDF('"ar","A4","30","utf8",10,10,10,10,6,3'); 
  $pdf->SetFont("amiri");
  require_once('third_party/phpqrcode/qrlib.php');
QRcode::png($info, 'filename.png', 'H',4,2);
 $stylesheet= 'body,p { font-family:amiri; font-size:20; margin-top:2px; margin-bottom:4px; text-align:right;
 background-image: url(images/bordure14.jpg);background-position:center; background-attachment: fixed; background-repeat: no-repeat;   background-image-resize: 6;
 }';
 //$pdf -> SetProtection ( array ('print')); 

	//$pdf= new mPDF('ar', "A4", $fontsize=11, $fontfamily="serif");
       // $pdf->SetDirectionality('rtl');
  ini_set('memory_limit','512M');     
$pdf->useSubstitutions = false;
$mpdf->autoScriptToLang = true;
//$mpdf->autoLangToFont = true;
$pdf->WriteHTML($stylesheet, 1);	
// entete du pdf
   
//--------------------------------récupération des données à partir du controller---------------------
if($IANNEE =='2017/2016' or $IANNEE =='2018/2017' or $IANNEE =='2019/2018'){
	$loi='<br/>
- بمقتضى المرسوم التنفيذي رقم 01-288 المؤرخ في 24 سبتمبر سنة 2001، المعدل والمتمم، والمتضمن تعديل القانون الأساسي للمركز الوطني للتعليم المعمم والمتمم بالمراسلة عن طريق الإذاعة والتلفزيون،
<br/>
- وبمقتضى القانون الوزاري المشترك المؤرخ في 25 يونيو  سنة 2013  المتضمن إحداث مراكز ولائية للتعليم والتكوين عن بعد،
<br/>
		- وبمقتضى القرار المؤرخ في 25 ديسمبر 1978 المتعلق بكيفيات تسليم شهادة المستوى من قبل المركز الوطني للتعليم المعمم والمتمم بالمراسلة عن طريق الإذاعة والتلفزيون،
<br/>
<br/>';

}
elseif($IANNEE =='2020/2019'){
	$loi='<br/>
- بمقتضى المرسوم التنفيذي رقم 01-288 المؤرخ في 24 سبتمبر سنة 2001، والمتضمن تعديل القانون الأساسي للمركز الوطني للتعليم المعمم والمتمم بالمراسلة عن طريق الإذاعة والتلفزيون،
المعدل و المتمم .
<br/>
- وبمقتضى القرار الوزاري المشترك المؤرخ في 25 يونيو  سنة 2013 المتضمن إحداث مراكز ولائية للتعليم والتكوين عن بعد،
<br/>

		- وبمقتضى القرار المؤرخ في 25 ديسمبر سنة  1978 المعدل والمتمم والمتعلق بكيفيات تسليم شهادة المستوى من قبل المركز الوطني للتعليم المعمم والمتمم بالمراسلة عن طريق الإذاعة والتلفزيون،
المعدل.
		<br/>
- بمقتضى محضر اللجنة البيداغوجية المنعقدة بتاريخ 26 أوت 2020 و المتضمن المعايير الاستثنائية الخاصة بتقويم المتعلمين عن بعد في ضل جائحة كورونا كوفيد -19 للسنة الدراسية 2019-2020 ،
<br/>
- و بالرجوع إلى قاعدة البيانات المتضمنة نتائج التقويم الإلكتروني للمتعلمين عن بعد لدورة 2020
<br/>';
	
}elseif($IANNEE =='2021/2020'){
	$loi='<br/>
- بمقتضى المرسوم التنفيذي رقم 01-288 المؤرخ في 24 سبتمبر سنة 2001، والمتضمن تعديل القانون الأساسي للمركز الوطني للتعليم المعمم والمتمم بالمراسلة عن طريق الإذاعة والتلفزيون،
<br/>
- وبمقتضى القرار الوزاري المشترك المؤرخ في 25 يونيو  سنة 2013 المتضمن إحداث مراكز ولائية للتعليم والتكوين عن بعد،
<br/>

		- وبمقتضى القرار المؤرخ في 25 ديسمبر سنة  1978 المعدل والمتمم والمتعلق بكيفيات تسليم شهادة المستوى من قبل المركز الوطني للتعليم المعمم والمتمم بالمراسلة عن طريق الإذاعة والتلفزيون،
<br/>
- بمقتضى محضر اللجنة البيداغوجية المنعقدة بتاريخ 08 جويلية 2021 و المتضمن معايير تقويم المتعلمين عن بعد لدورة 2021 ،
<br/>
- و بالرجوع إلى قاعدة البيانات المتضمنة نتائج التقويم الإلكتروني للمتعلمين عن بعد لدورة 2021،
<br/>';
}else{
	$loi= '<br/>
- بمقتضى المرسوم التنفيذي رقم 01-288 المؤرخ في 24 سبتمبر سنة 2001  والمتضمن تعديل القانون الأساسي للمركز الوطني للتعليم المعمم والمتمم بالمراسلة عن طريق الإذاعة والتلفزيون المعدل والمتمم .
<br/>
- وبمقتضى القرار المؤرخ في 25 ديسمبر 1978 المتعلق بكيفيات تسليم شهادة المستوى ، المعدل و المتمم ،
<br/>
- وبمقتضى القانون الوزاري المشترك المؤرخ في 10 مايو  سنة 2002 و المتضمن إحداث مراكز جهوية  للتعليم والتكوين عن بعد،
<br/>
		
<br/>

';

}


//**************************************************
// دورة ماي 
$annexec='ســطيف';
$date=date("d-m-Y");
$annee=$IANNEE;
if($annee=='2021/2020'){
	 $annee_ex='ماي 2021';
}
elseif ($annee=='2020/2019'){
     $annee_ex='ماي 2020';
    }
elseif ($annee=='2019/2018'){
     $annee_ex='ماي 2019';
    }
elseif ($annee=='2018/2017'){
     $annee_ex='ماي 2018';
    }
elseif ($annee=='2017/2016'){
     $annee_ex='ماي 2017';
    }
elseif ($annee=='2016/2015'){
     $annee_ex='ماي 2016';
    }
elseif ($annee=='2015/2014'){
     $annee_ex='ماي 2015';
    }
elseif ($annee=='2014/2013'){
     $annee_ex='ماي 2014';
    }
elseif ($annee=='2013/2012'){
     $annee_ex='ماي 2013';
    }
elseif($annee=='2012/2011'){
     $annee_ex='ماي 2012';
    }
elseif($annee=='2011/2010'){
     $annee_ex='ماي 2011';
    }
elseif($annee=='2010/2009'){
     $annee_ex='ماي 2010';
    }
elseif($annee=='2009/2008'){
     $annee_ex='ماي 2009';
    }
elseif($annee=='2008/2007'){
     $annee_ex='ماي 2008';
    }
elseif($annee=='2007/2006'){
     $annee_ex='ماي 2007';
    }
elseif($annee=='2006/2005'){
     $annee_ex='ماي 2006';
    }
elseif($annee=='2005/2004'){
     $annee_ex='ماي 2005';
    }
elseif($annee=='2004/2003'){
     $annee_ex='ماي 2004';
    }
elseif($annee=='2003/2002'){
     $annee_ex='ماي 2003';
    }

//**************************************************

 //*********le test de presume
/*   if ($presume==1 ){
	  $annee = substr($dns, 0, 4);
       $daten = 'خلال'.' '.$annee ;        
	 }
	 else {
		 $annee = substr($dns, 0, 4);
              $mois = substr($dns, 5, 2);
              $jour = substr($dns, 8, 2);  
		  $daten = $jour . '-' . $mois . '-'.$annee ; 
	 }
 */
  //******fin de test de presume******************************
   // inverser la date inscription 
              
              

			
			  $date = date("d-m-Y");
 //*************************************************************************
 // ----------------remplir le pdf  --------------------------------------------------------------------------------------------------------
 
 //--------------------------insertion du code barre--------------------------------------
/*<td align="left" valign="top">
<img src="C:/Wamp/WWW/CodeIgniter/codebarre.PNG" width="120" height="120" >
</td>*/
//------------------------------------------------------------------------------------------
 
				// ---------------------regler les marges en haut--------------------------------
			      //	$pdf->SetMargins(0,0); 
				//--------------------regler les marges en bas---------------------------------
					 $pdf->SetAutoPageBreak(false,0);
					// $pdf->setFontSubsetting(false,0);
					 
				//---------------- ecrire dans le pdf-------------------------------------------
				
// pour l'arrière plan c'est à dire la bordure:url ou bien le chemin on peut ecrire c:/xampp/htdocs/forbidden/codeigniter/bordure14.jpg  ou bordure14.jpg parce que l'image est dans la racine du cite c'est à dire 193.194.95.25/CodeIgniter				
				$pdf->WriteHTML('
<br/>				
<table style="padding-right:20px" >

<tr>

<td align="right"   >
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>
<br/>

الرقم: '.$ORDREC.'
<br/>
<br/>
	إن مدير(ة) المركز الولائي للتعليم والتكوين عن بعد لولاية : <strong><font color=#286F99 >'.$annexec.'</font></strong>
<br/>'
.$loi.
				
'
<br/>
-	و بعد الاطلاع على محضر لجنة مداولات امتحان المستوى دورة: <strong><font color=#286F99 >'.$annee_ex.'</font></strong>
			 <br/>
<br/>
			 يشهد بأن
			 <br/>
<br/>
               الآنسة / السيد (ة)  : <strong><font color=#286F99 >'.$NOM.'   '.$PRENOM.'</font></strong>
			  <br/>
<br/>
			   
              <span> المولود (ة) بتاريخ : <strong><font color=#286F99 >'.$date_de_nais.'</font></strong> </span>            بـ : <strong><font color=#286F99 >'.$LNS.'</font></strong></pre>
				<br/>
		  
			<span>المسجل(ة) بتاريخ : <strong><font color=#286F99 >'.$DNSS0. '</font></strong>'.'   </span>            تحت رقم : <strong><font color=#286F99 >'.$MATR.' / '.$ORDREC.'</font></strong></pre>
		<br/>

			 تحصل(ت) على المستوى : <strong><font color=#286F99 >'.$FILIERE.'</font></strong>
			<br/>
<br/>
			   
			  <span> حرر بــ:<strong><font color=#286F99 >'. $annexec.'</font></strong>'.'  </span> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                         في : <strong><font color=#286F99 >'.$date.'</font></strong></pre>
		<br/>
<div id="photo" style="text-align: center">

 <img style="vertical-align:middle;height:120px;width:120px" src="filename.png" alt="">

 <span style="vertical-align:middle">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  
				المدير(ة)  </span>
  
  </div>
			
					<br/><br/>			  							   			   		  			   <hr style=" color:black; background-color:black; height:2px;" height="130"/> 
			    <h5>			   <u>هام:</u>	  هذه الشهادة تعادل المستوى الدراسي المطابق وفقا لأحكام المادة الأولى من القرار المؤرخ في 25 ديسمبر 1978 المذكور أعلاه .
		   <br/>			   <u>ملاحظة:</u>	
	   لا تسلم إلا نسخة واحدة من هذه الشهادة			   <h5>											
	   </td></tr></table>');	   			   	
	   $pdf->Output('Attestation_Niveau.pdf','I');                             			}
            } else {
			   ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! هذا الطالب يعيد السنة");
             javascript:history.go(-1);
			</SCRIPT> <?php  
			}}     
			?>    
</body>
</html>