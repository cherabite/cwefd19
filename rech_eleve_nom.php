﻿<?php
// On démarre la session
session_start();
//$utilisateur = $_SESSION['user'];
//echo $utilisateur;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="js.js"></script>

<title> بحث بالاسم و اللقب</title>

</head>

<body style="direction: rtl;">
<div id="wrapper">
<table style="text-align: right; width: 100%;" align="right"
 border="1" cellpadding="0" cellspacing="2">		
<tr>
      <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>
<tr>
      <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>
 <tr>
<td style="text-align: right; width: 203px;" >
<?php include('includes/sidebar_eleve.php'); ?>
</td>

 <td>
 <h3>المركز الولائي سطيف </h3></br>
             
                  <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire"> 
				  <fieldset><legend style="caption-side: right;"><h3>   بحث بالاسم و اللقب</h3> </legend>
                <table>
				<tr>
				<td>اللقب   </td>
			<td>	<input type="text" name="NOM" size="30">  </td>
                </tr>
				<tr>
				<td>الاسم   </td>
			<td>	<input type="text" name="PRENOM" size="30">  </td>
                </tr>
				<tr>
			<td>	<input type="submit" name="chercher_0" value=" بحث في النظام القديم "> </td>
				<td> <input type="submit" name="chercher_1" value="بحث في النظام الجديد"> </td>
				</tr>
              </table>
                   </form>	
 
 <?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'base_crefd_19';

 
$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");

 
   
  if(isset($_POST['chercher_0']))
{

            if(!empty($_POST['NOM']) and !empty($_POST['PRENOM']) ) 
            {
		
              $NOM= $_POST['NOM'];$PRENOM=$_POST['PRENOM'];
                
	            //  $nbr=mysql_fetch_array(mysql_query("select count(*) as nb from tab_eleve where MATR='$MATR' "));
				
				$req=mysql_query("select * from tab_eleve  where NOM='$NOM' and PRENOM='$PRENOM'");
			//	$nbr=mysql_fetch_array($req);
				 $nb=mysql_num_rows($req);
	                  if ($nb >0) {
		             echo('    
                          			   <h3> نتائج البحث  </h3> 
				   
                      <table style="overflow:auto;"border="2">
				<tr style="background-color: rgb(8, 173, 255);">
				<td>  رقم التسجيل </td>
			   <td> اللقب </td>
			   <td>  الاسم </td>
			   <td> تاريخ الميلاد </td>
			   <td> المستوى  </td>
			   <td> رمز المستوى </td>
			   <td> السنة الدراسية  </td>
			   <td> القرار </td>
			    <td colspan="7" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
				//$req=mysql_query("select * from tab_eleve  where NOM='$NOM' and PRENOM='$PRENOM' ");
				 while($nbr= mysql_fetch_array($req)) 
 	            {
					
				echo ('
				 <tr>
			    <td> '. $nbr['MATR'].'</td>
				<td> '.$nbr['NOM'].'</</td>
				 <td> '.$nbr['PRENOM'].'</ </td>
				<td>  '.$nbr['DATE_NAIS'].'</ </td>
				 <td> '.$nbr['DESING'].'</  </td>
				<td> '.$nbr['CD_CLAS'].'</ </td>
				 <td>  '.$nbr['COD_ANN'].'</ </td>
				<td> '.$nbr['DECISE'].'</ </td>
			  <td><a href="aa.php?MATR=  '.$nbr['MATR'].' & t=a"target="_blank">  ش إ المستوى </a></td>
			  <td><a href="releve_c.php?MATR= '.$nbr['MATR'].'"target="_blank"> كشف النقاط </a></td>
			  
			    <td><a href="demende_correction.php?MATR= '.$nbr['MATR'].'"target="_blank"> طلب تصحيح </a></td>
				  <td><a href="C_A_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">  التحقق من الشهادة </a></td>
				   <td><a href="C_R_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">التحقق من الكشف</a></td>
				   <td><a href="C_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">تأكيد المستوى</a></td> ');
				 
                 if (isset($_SESSION['corecteur'])  ) {
                
				
                   echo '<td><a href="modifier_tab_eleve.php?MATR= '.$nbr['MATR'].'">  correction </a></td>';
				     }
			     echo	'</tr>';
				 }
           echo ' </table>	';	
								
								
		           }else
		              {
		
		                           
							
		                          ?> <SCRIPT LANGUAGE="Javascript">	alert("غير موجود هذا الرقم "); </SCRIPT> <?php
		                   }
            }else
			{	
			if(!empty($_POST['NOM']))
	         {
	            $NOM= $_POST['NOM'];
				$req=mysql_query("select * from tab_eleve  where NOM='$NOM' ");
				//$nbr=mysql_fetch_array($req);
				 $nb=mysql_num_rows($req);
	                  if ($nb >0) {
		           echo('    
                          			   <h3> نتائج البحث  </h3> 
				   
                      <table style="overflow:auto;"border="2">
				<tr style="background-color: rgb(8, 173, 255);">
				<td>  رقم التسجيل </td>
			   <td> اللقب </td>
			   <td>  الاسم </td>
			   <td> تاريخ الميلاد </td>
			   <td> المستوى  </td>
			   <td> رمز المستوى </td>
			   <td> السنة الدراسية  </td>
			   <td> القرار </td>
			    <td colspan="7" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
			//	$req=mysql_query("select * from tab_eleve  where NOM='$NOM'  ");
				 while($nbr= mysql_fetch_array($req)) 
 	            {
					
				echo ('
				 <tr>
			    <td> '. $nbr['MATR'].'</td>
				<td> '.$nbr['NOM'].'</</td>
				 <td> '.$nbr['PRENOM'].'</ </td>
				<td>  '.$nbr['DATE_NAIS'].'</ </td>
				 <td> '.$nbr['DESING'].'</  </td>
				<td> '.$nbr['CD_CLAS'].'</ </td>
				 <td>  '.$nbr['COD_ANN'].'</ </td>
				<td> '.$nbr['DECISE'].'</ </td>
			 <td><a href="aa.php?MATR=  '.$nbr['MATR'].' & t=a"target="_blank">  ش إ المستوى </a></td>
			  <td><a href="releve_c.php?MATR= '.$nbr['MATR'].'"target="_blank"> كشف النقاط </a></td>
			
			    <td><a href="demende_correction.php?MATR= '.$nbr['MATR'].'"target="_blank"> طلب تصحيح </a></td>
				 <td><a href="C_A_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">  التحقق من الشهادة </a></td>
				   <td><a href="C_R_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">التحقق من الكشف</a></td>
				    <td><a href="C_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">تأكيد المستوى</a></td> ');
				 
               if (isset($_SESSION['corecteur'])  ) {
                 
				
                echo '<td><a href="modifier_tab_eleve.php?MATR= '.$nbr['MATR'].'">  correction </a></td>';				
			    }
				echo	'</tr>';
				 }
           echo ' </table>	';	
								
								
		                }else
		                    {
		
		                           
							
		                          ?> <SCRIPT LANGUAGE="Javascript">	alert("غير موجود هذا الرقم "); </SCRIPT> <?php
		                   }
	         }elseif(!empty($_POST['PRENOM']))
	         {
	            $PRENOM= $_POST['PRENOM'];
				$req=mysql_query("select * from tab_eleve  where PRENOM='$PRENOM' ");
				//$nbr=mysql_fetch_array($req);
				 $nb=mysql_num_rows($req);
	                  if ($nb >0) {
		           echo('    
                          			   <h3> نتائج البحث  </h3> 
				   
                      <table style="overflow:auto;"border="2">
				<tr style="background-color: rgb(8, 173, 255);">
				<td>  رقم التسجيل </td>
			   <td> اللقب </td>
			   <td>  الاسم </td>
			   <td> تاريخ الميلاد </td>
			   <td> المستوى  </td>
			   <td> رمز المستوى </td>
			   <td> السنة الدراسية  </td>
			   <td> القرار </td>
			    <td colspan="7" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
				//$req=mysql_query("select * from tab_eleve  where NOM='$NOM'  ");
				 while($nbr= mysql_fetch_array($req)) 
 	            {
					
				echo ('
				 <tr>
			    <td> '. $nbr['MATR'].'</td>
				<td> '.$nbr['NOM'].'</</td>
				 <td> '.$nbr['PRENOM'].'</ </td>
				<td>  '.$nbr['DATE_NAIS'].'</ </td>
				 <td> '.$nbr['DESING'].'</  </td>
				<td> '.$nbr['CD_CLAS'].'</ </td>
				 <td>  '.$nbr['COD_ANN'].'</ </td>
				<td> '.$nbr['DECISE'].'</ </td>
			 <td><a href="aa.php?MATR=  '.$nbr['MATR'].' & t=a"target="_blank">  ش إ المستوى </a></td>
			  <td><a href="releve_c.php?MATR= '.$nbr['MATR'].'"target="_blank"> كشف النقاط </a></td>
			
			    <td><a href="demende_correction.php?MATR= '.$nbr['MATR'].'"target="_blank"> طلب تصحيح </a></td>
				 <td><a href="C_A_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">  التحقق من الشهادة </a></td>
				   <td><a href="C_R_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">التحقق من الكشف</a></td>
				    <td><a href="C_N.php?MATR= '.$nbr['MATR'].' & t=a"target="_blank">تأكيد المستوى</a></td> ');
				 
               if (isset($_SESSION['corecteur'])  ) {
                 
				
                echo '<td><a href="modifier_tab_eleve.php?MATR= '.$nbr['MATR'].'">  correction </a></td>';				
			    }
				echo	'</tr>';
				 }
           echo ' </table>	';	
								
								
		                }else
		                    {
		
		                           
							
		                          ?> <SCRIPT LANGUAGE="Javascript">	alert("غير موجود هذا الرقم "); </SCRIPT> <?php
		                   }
	         }
			 
			 else {
       ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات"); </SCRIPT> <?php		
			 }	   
}  } 
				   
    if(isset($_POST['chercher_1']))
  {

            if(!empty($_POST['NOM']) and !empty($_POST['PRENOM']) ) 
            {
		
              $NOM= $_POST['NOM'];$PRENOM=$_POST['PRENOM'];
                
	  // $req = mysql_query("SELECT   DISTINCT (DNANNEE), DNANNEXE, DNANNEEINS, DNNSEQ,DNCODE, DNNOM, DNPRENOM, DNDNS, MENTION
      //  FROM detnotes  where DNNOM='$NOM' and DNPRENOM='$PRENOM' order by DNNOM,DNANNEE");                        
   $req = mysql_query("SELECT  ANNEXE, ANNEEINS, NSEQ, IANNEE, NOM, PRENOM, DNS, LNS, PRESUME,IANNEXE,IANNEEINS,INSEQ,IANNEE,ORDREC,ICODE,DATEINS,MENTION
     FROM eleve ,inscription where ( eleve.NOM='$NOM' and eleve.PRENOM='$PRENOM')AND  (eleve.ANNEXE = inscription.IANNEXE)AND(eleve.ANNEEINS = inscription.IANNEEINS)  AND (eleve.NSEQ = inscription.INSEQ)  order by NOM,IANNEE");                        
                                    

  $nb = mysql_num_rows($req);
                                if ($nb > 0) {


                                    echo('    
                          			   <h3> نتائج البحث  </h3> 
				   
                      <table style="overflow:auto;"border="2">
				<tr style="background-color: rgb(8, 173, 255);">
				<td>  رقم التسجيل </td>
			   <td> اللقب </td>
			   <td>  الاسم </td>
			   <td> تاريخ الميلاد </td>
			   
			   <td> رمز المستوى </td>
			   <td> السنة الدراسية  </td>
			   <td> القرار </td>
			    <td colspan="7" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
                                  //  $req = mysql_query("select * from inseleve  where DNS='$DNS' ");

                                    while ($nbr = mysql_fetch_array($req)) {

                                      $IANNEXE = $nbr['IANNEXE'];
                                        $IANNEEINS = $nbr['IANNEEINS'];
                                        $INSEQ = $nbr['INSEQ'];
                                        $MATR = $IANNEXE . $IANNEEINS . $INSEQ;
                                        $DNS = $nbr['DNS'];
                                        $da = date_create($DNS);
                                        $DN = date_format($da, 'Y-m-d');
                                        echo ('
				 <tr>
			    <td> ' . $MATR . '</td>
				<td> ' . $nbr['NOM'] . '</</td>
				 <td> ' . $nbr['PRENOM'] . '</ </td>
				<td>  ' . $DN . '</ </td>
				
				<td> ' . $nbr['ICODE'] . '</ </td>
				 <td>  ' . $nbr['IANNEE'] . '</ </td>
				<td> ' . $nbr['MENTION'] . '</ </td>
			  <td><a href="aa.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">ش إ المستوى </a></td>
			   <td><a href="a4.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank"> 4A ش إ المستوى </a></td>
			  <td><a href="releve_n.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank"> كشف النقاط </a></td>
			   
			    <td><a href="demende_correction_inseleve.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '"target="_blank"> طلب تصحيح  </a></td>
				 <td><a href="C_A_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">  التحقق من الشهادة </a></td>
				 <td><a href="C_R_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">التحقق من الكشف</a></td>
				 <td><a href="C_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">تأكيد المستوى</a></td>');

                                       if (isset($_SESSION['corecteur'])  ) {
                                            
                                         echo '	 <td><a href="modifier_inseleve.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '"> Correction_BDD </a></td>';
                                           
                                        }echo ('</tr>');
                                    }
                                    echo' </table>	';					
								
								
		                }else
		                    {
		
		                           
							
		                          ?> <SCRIPT LANGUAGE="Javascript">	alert("غير موجود"); </SCRIPT> <?php
		                   }
            }else
			{	
			if(!empty($_POST['NOM']))
	         {
	            $NOM= $_POST['NOM'];
		//$req = mysql_query("SELECT   DISTINCT (DNANNEE), DNANNEXE, DNANNEEINS, DNNSEQ,DNCODE, DNNOM, DNPRENOM, DNDNS, MENTION
        //  FROM detnotes  where DNNOM='$NOM'  order by DNNOM,DNANNEE");                     
  $req = mysql_query("SELECT  ANNEXE, ANNEEINS, NSEQ, IANNEE, NOM, PRENOM, DNS, LNS, PRESUME,IANNEXE,IANNEEINS,INSEQ,IANNEE,ORDREC,ICODE,DATEINS,MENTION
     FROM eleve ,inscription where ( eleve.NOM='$NOM' )AND  (eleve.ANNEXE = inscription.IANNEXE)AND(eleve.ANNEEINS = inscription.IANNEEINS)  AND (eleve.NSEQ = inscription.INSEQ)  order by NOM,IANNEE");                        
                                    

  $nb = mysql_num_rows($req);
                                if ($nb > 0) {


                                    echo('    
                          			   <h3> نتائج البحث  </h3> 
				   
                      <table style="overflow:auto;"border="2">
				<tr style="background-color: rgb(8, 173, 255);">
				<td>  رقم التسجيل </td>
			   <td> اللقب </td>
			   <td>  الاسم </td>
			   <td> تاريخ الميلاد </td>
			   
			   <td> رمز المستوى </td>
			   <td> السنة الدراسية  </td>
			   <td> القرار </td>
			    <td colspan="7" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
                                  //  $req = mysql_query("select * from inseleve  where DNS='$DNS' ");

                                    while ($nbr = mysql_fetch_array($req)) {

                                        $IANNEXE = $nbr['IANNEXE'];
                                        $IANNEEINS = $nbr['IANNEEINS'];
                                        $INSEQ = $nbr['INSEQ'];
                                        $MATR = $IANNEXE . $IANNEEINS . $INSEQ;
                                        $DNS = $nbr['DNS'];
                                        $da = date_create($DNS);
                                        $DN = date_format($da, 'Y-m-d');
                                        echo ('
				 <tr>
			    <td> ' . $MATR . '</td>
				<td> ' . $nbr['NOM'] . '</</td>
				 <td> ' . $nbr['PRENOM'] . '</ </td>
				<td>  ' . $DN . '</ </td>
				
				<td> ' . $nbr['ICODE'] . '</ </td>
				 <td>  ' . $nbr['IANNEE'] . '</ </td>
				<td> ' . $nbr['MENTION'] . '</ </td>
			  <td><a href="aa.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">ش إ المستوى </a></td>
			   <td><a href="a4.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank"> 4A ش إ المستوى </a></td>
			  <td><a href="releve_n.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank"> كشف النقاط </a></td>
			   
			    <td><a href="demende_correction_inseleve.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '"target="_blank"> طلب تصحيح  </a></td>
				 
				 <td><a href="C_A_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">  التحقق من الشهادة </a></td>
				 <td><a href="C_R_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">التحقق من الكشف</a></td>
				 <td><a href="C_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">تأكيد المستوى</a></td>');

                                       if (isset($_SESSION['corecteur'])  ) {
                                            
                                         echo '	 <td><a href="modifier_inseleve.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '"> Correction_BDD </a></td>';
                                           
                                        }echo ('</tr>');
                                    }
                                    echo' </table>	';		
		                }else
		                    {
		
		                           
							
		                          ?> <SCRIPT LANGUAGE="Javascript">	alert("غير موجود هذا الرقم "); </SCRIPT> <?php
		                   }
	         }else{
				if(!empty($_POST['PRENOM']))
	         {
	            $PRENOM= $_POST['PRENOM'];
			//$req = mysql_query("SELECT   DISTINCT (DNANNEE), DNANNEXE, DNANNEEINS, DNNSEQ,DNCODE, DNNOM, DNPRENOM, DNDNS, MENTION
               //         FROM detnotes  where  DNPRENOM='$PRENOM' order by DNNOM,DNANNEE");                         
           $req = mysql_query("SELECT  ANNEXE, ANNEEINS, NSEQ, IANNEE, NOM, PRENOM, DNS, LNS, PRESUME,IANNEXE,IANNEEINS,INSEQ,IANNEE,ORDREC,ICODE,DATEINS,MENTION
     FROM eleve ,inscription where (eleve.PRENOM='$PRENOM')AND  (eleve.ANNEXE = inscription.IANNEXE)AND(eleve.ANNEEINS = inscription.IANNEEINS)  AND (eleve.NSEQ = inscription.INSEQ)  order by NOM,IANNEE");                        
                           

  $nb = mysql_num_rows($req);
                                if ($nb > 0) {


                                    echo('    
                          			   <h3> نتائج البحث  </h3> 
				   
                      <table style="overflow:auto;"border="2">
				<tr style="background-color: rgb(8, 173, 255);">
				<td>  رقم التسجيل </td>
			   <td> اللقب </td>
			   <td>  الاسم </td>
			   <td> تاريخ الميلاد </td>
			   
			   <td> رمز المستوى </td>
			   <td> السنة الدراسية  </td>
			   <td> القرار </td>
			    <td colspan="7" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
                                  //  $req = mysql_query("select * from inseleve  where DNS='$DNS' ");

                                    while ($nbr = mysql_fetch_array($req)) {

                                       $IANNEXE = $nbr['IANNEXE'];
                                        $IANNEEINS = $nbr['IANNEEINS'];
                                        $INSEQ = $nbr['INSEQ'];
                                        $MATR = $IANNEXE . $IANNEEINS . $INSEQ;
                                        $DNS = $nbr['DNS'];
                                        $da = date_create($DNS);
                                        $DN = date_format($da, 'Y-m-d');
                                        echo ('
				 <tr>
			    <td> ' . $MATR . '</td>
				<td> ' . $nbr['NOM'] . '</</td>
				 <td> ' . $nbr['PRENOM'] . '</ </td>
				<td>  ' . $DN . '</ </td>
				
				<td> ' . $nbr['ICODE'] . '</ </td>
				 <td>  ' . $nbr['IANNEE'] . '</ </td>
				<td> ' . $nbr['MENTION'] . '</ </td>
			 <td><a href="aa.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">ش إ المستوى </a></td>
			  <td><a href="releve_n.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank"> كشف النقاط </a></td>
			   
			    <td><a href="demende_correction_inseleve.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '"target="_blank"> طلب تصحيح  </a></td>
				  <td><a href="a4.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank"> 4A ش إ المستوى </a></td>
				 <td><a href="C_A_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">  التحقق من الشهادة </a></td>
				 <td><a href="C_R_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">التحقق من الكشف</a></td>
				 <td><a href="C_N.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '& t=b"target="_blank">تأكيد المستوى</a></td>');

                                       if (isset($_SESSION['corecteur'])  ) {
                                            
                                         echo '	 <td><a href="modifier_inseleve.php?MATR= ' . $MATR . '& IANNEE=' . $nbr['IANNEE'] . ' & ICODE=' . $nbr['ICODE'] . '"> Correction_BDD </a></td>';
                                           
                                        }echo ('</tr>');
                                    }
                                    echo' </table>	';	
		                }else
		                    {
		
		                           
							
		                          ?> <SCRIPT LANGUAGE="Javascript">	alert("غير موجود هذا الرقم "); </SCRIPT> <?php
		                   }
	          
				 
			 }
			 
			 else {
               ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات"); </SCRIPT> <?php		
			 }	   
    }  }  
  }			   
?>			    	 
   
</td> 

 </tr> 


<tr>
      <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
</table

		</div>

	</body>

</html>