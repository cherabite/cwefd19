<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<head>




<meta name="description" content="" />

<meta name="keywords" content="" />

<meta name="author" content="" />

<link rel="stylesheet" type="text/css" href="style.css" media="screen" />

<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript" src="js.js"></script>

<title>formulaire employeur</title>
<script type="text/javascript">
function test(value) {
if (parseInt(value)==value) alert ('ok'); else alert('أدخل عدد');
}
</script>
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
<?php include('includes/sidebar_grh.php'); ?>
</td>

<td style="vertical-align: top;"> 
 <?php
include('calendrier.html');
mysql_connect("localhost", "root", "");
mysql_select_db("grh");
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");


?>


<?php


if(isset($_GET['ID_EMPLOYEUE']))
{

/* 
    if(!empty($_POST['NOM']) and !empty($_POST['PRENOM'])  and !empty($_POST['LNS']) ) 
   
		$JOUR_DNS=$_POST['JOUR_DNS'];
		$MOIS_DNS=$_POST['MOIS_DNS'];
		$ANNEE_DNS=$_POST['ANNEE_DNS'];
		

		$DNS=$JOUR_DNS."-".$MOIS_DNS."-".$ANNEE_DNS;
		//$format=('y-m-d');
		$DNS('y-m-d');
		//echo($DNS);
		$LNS=$_POST['LNS'];
	   $NOM=$_POST['NOM'];
	  $PRENOM=$_POST['PRENOM'];
	   $ETAT_CIVIL=$_POST['ETAT_CIVIL'];
	 $NBR_ENFANT=$_POST['NBR_ENFANT'];
	 $ADRESSE=$_POST['ADRESSE'];
	 $N_ASSURENCE=$_POST['N_ASSURENCE'];
	 $N_CCP=$_POST['N_CCP'];
	 $N_MUTUEL=$_POST['N_MUTUEL'];
	 $SERVICE_NATIONAL=$_POST['SERVICE_NATIONAL'];
	 $DIPLOME=$_POST['DIPLOME'];
	 $JOUR_DIPLOME=$_POST['JOUR_DIPLOME'];
		$MOIS_DIPLOME=$_POST['MOIS_DIPLOME'];
		$ANNEE_DIPLOME=$_POST['ANNEE_DIPLOME'];
		
		$DATE_DIPLOME=$ANNEE_DIPLOME."-".$MOIS_DIPLOME."-".$JOUR_DIPLOME;
	
	 $AUTRE_DIPLOME=$_POST['AUTRE_DIPLOME'];
	 $N_PV_INSTALL=$_POST['N_PV_INSTALL'];
	 $JOUR_PV=$_POST['JOUR_PV'];
		$MOIS_PV=$_POST['MOIS_PV'];
		$ANNEE_PV=$_POST['ANNEE_PV'];
		
		$DATE_PV_INSTALL=$ANNEE_PV."-".$MOIS_PV."-".$JOUR_PV;
	
	 $GRADE=$_POST['GRADE'];
	 $CATEGORIE=$_POST['CATEGORIE'];
	 $N_ISTIDLALI=$_POST['N_ISTIDLALI'];
	
	 $TEL=$_POST['TEL']; 
	 $ARRETE=$_POST['ARRETE'];
	  $JOUR_ARRETE=$_POST['JOUR_ARRETE'];
		$MOIS_ARRETE=$_POST['MOIS_ARRETE'];
		$ANNEE_ARRETE=$_POST['ANNEE_ARRETE'];
		
		$DATE_ARRETE=$ANNEE_ARRETE."-".$MOIS_ARRETE."-".$JOUR_ARRETE;
	
	$GRADE_ACTUEL=$_POST['GRADE_ACTUEL']; */
	
     $ID_EMPLOYEUE=$_GET['ID_EMPLOYEUE'];
     $don=mysql_query("select * from employeur where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
	 $nb=mysql_num_rows($don);
	// echo $nb;
	 $line= mysql_fetch_array($don);
	
, <?php echo $line['LNS'];?>, <?php echo $line['ETAT_CIVIL'];?>, 
<?php echo $line['NBR_ENFANT'];?>, <?php echo $line['ADRESSE'];?>, <?php echo $line['N_ASSURENCE'];?>, <?php echo $line['N_CCP'];?>, <?php echo $line['N_MUTUEL'];?>,
		 <?php echo $line['SERVICE_NATIONAL'];?>, <?php echo $line['DIPLOME'];?>, <?php echo $line['DATE_DIPLOME'];?>, <?php echo $line['AUTRE_DIPLOME'];?>, 
		 <?php echo $line['N_PV_INSTALL'];?>, <?php echo $line['DATE_PV_INSTALL'];?>, <?php echo $line['GRADE'];?>, <?php echo $line['CATEGORIE'];?>, <?php echo $line['N_ISTIDLALI'];?>,
		 <?php echo $line['TEL'];?>,
		 <?php echo $line['ARRETE'];?>, <?php echo $line['DATE_ARRETE'];?>, <?php echo $line['GRADE_ACTUEL'];?>
	
	
?>


      <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
        <fieldset><legend style="caption-side: right;">معلومات الحالة المدنية للموظف </legend>
        <table align="right" border="1"
 cellpadding="2" cellspacing="2" ; >
          <tbody>
            <tr>
	
			<td>اللقب</td>
              <td><input name="NOM" value=" <?php echo $line['NOM'];?>"</td>
              
			  <td>الاسم</td>
              <td> <input name="PRENOM" value="<?php echo $line['PRENOM'];?>"
 type="text"></td>
            
            </tr>
            <tr>
			<td>تاريخ الميلاد</td>
              		<td>
			    <select name="JOUR_DNS"> 
<?php
$i=1;
 while($i<32){
?>
<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>

&nbsp;
			    <select name="MOIS_DNS"> 
<?php
$i=1;
 while($i<13){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>
&nbsp;
			    <select name="ANNEE_DNS"> 
<?php
$i=1940;
 while($i<2010){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?>

</select></td>
			<td>مكان الميلاد</td>
              <td><input name="LNS" value=""
 type="text" size=50 maxlength=150></td>
               
           
            </tr>
            <tr>
			<td>الحالة المدنية</td>
             <td><select  name="ETAT_CIVIL" > <option> متزوج <option> أعزب <option selected> </td>
			<td>عدد الأولاد</td>
              <td><input name="NBR_ENFANT" value=""
 type="text" onchange="test(this.value);"></td>
               
             
            </tr>
            <tr>
			<td>العنوان الشخصي</td>
              <td colspan="3" rowspan="1"><input
 name="ADRESSE" value="" type="text"   size=100 maxlength=150></td>
              
            </tr>
            <tr>
			 <td>رقم الحساب البريدي</td>
              <td colspan="3" rowspan="1"><input
 name="N_CCP" value="" type="text"></td>
             
            </tr>
            <tr>
			<td>رقم الضمان الإجتماعي </td>
              <td colspan="3" rowspan="1"><input
 name="N_ASSURENCE" value="" type="text"></td>
              
            </tr>
            <tr>
			 <td>رقم التعاضدية</td>
              <td colspan="3" rowspan="1"><input
 name="N_MUTUEL" value="" type="text"></td>
             
            </tr>
            <tr>
			 <td>الخدمة الوطنية</td>
			<td><select  name="SERVICE_NATIONAL" > <option> نعم  <option> لا <option> غير معني <option selected>  </td>
              
              <td>رقم الهاتف </td>
              <td><input
 name="TEL" value="" type="text"></td>
            </tr>
          </tbody>
        </table>
        </fieldset>
        <fieldset><legend>معلومات خاصة بالتوظيف</legend>
        <table align="right"  width: 100%;"
 border="1" cellpadding="2" cellspacing="2">
          <tbody>
		   <tr>
		   <td>رقم محضر التنصيب</td>
              <td><input name="N_PV_INSTALL" value=""
 type="text"></td>
		    </tr>
            <tr>
			 
  <td>تاريخ التنصيب</td>
            	<td>
			    <select name="JOUR_PV"> 
<?php
$i=1;
 while($i<32){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>

&nbsp;
			    <select name="MOIS_PV"> 
<?php
$i=1;
 while($i<13){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>
&nbsp;
			    <select name="ANNEE_PV"> 
<?php
$i=1940;
 while($i<2010){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?>

</select></td>
			<td>في رتبة</td>
			<td><select  name="GRADE" > 
			<option> مدير المركز 
			<option> رئيس المصلحة التربوية
			<option> رئيس المصلحة التقنية
			<option> مهندس في الإعلام الآلي
			<option> تقني سامي في الإعلام الآلي
			<option> أستاذ التعليم المتوسط 
			<option>أستاذالتعليم الثانوي
			<option>عون حجز
			<option>حارس
			<option> OP
			<option selected>  </td>
            
             
            </tr>
            <tr>
			 <td>الشهادة</td>
              <td><input name="DIPLOME" value=""
 type="text" size=60 maxlength=150></td>
			<td>الصادرة بتاريخ</td>
              	<td>
			    <select name="JOUR_DIPLOME"> 
<?php
$i=1;
 while($i<32){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>

&nbsp;
			    <select name="MOIS_DIPLOME"> 
<?php
$i=1;
 while($i<13){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>
&nbsp;
			    <select name="ANNEE_DIPLOME"> 
<?php
$i=1970;
 while($i<2020){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?>

</select></td>
              
             
            </tr>
            <tr>
			 <td>شهادات أخرى</td>
              <td colspan="5" rowspan="1"><textarea
 name="AUTRE_DIPLOME" cols=50 rows=4> </textarea></td>
             
            </tr>
            <tr>
              
 <td>الصنف</td>
              <td><input name="CATEGORIE" value=""
 type="text"></td>
               <td>الرقم الإستدلالي</td>
              <td><input name="N_ISTIDLALI" value=""
 type="text"></td>
              
             
            </tr>
            <tr>
              <td>الرتبة الحالية </td>
			  <td><select  name="GRADE_ACTUEL" > 
			<option> مدير المركز 
			<option> رئيس المصلحة التربوية
			<option> رئيس المصلحة التقنية
			<option> مهندس في الإعلام الآلي
			<option> تقني سامي في الإعلام الآلي
			<option> أستاذ التعليم المتوسط 
			<option>أستاذالتعليم الثانوي
			<option>عون حجز
			<option>حارس
			<option> OP
			<option selected>  </td>
             
            </tr>
          </tbody>
        </table>
        </fieldset>
		 <fieldset><legend>معلومات إظافية </legend>
        <table align="right"  width: 100%;"
 border="1" cellpadding="2" cellspacing="2">
          <tbody>
           <tr>
		    <td>هذا الموظف قد توقف عن العمل </td>
              <td><select  name="ARRETE" > <option> لا  <option> نعم <option selected> لا</td>
			 <td>بتاريخ   </td> 
			 	<td>
			    <select name="JOUR_ARRETE"> 
<?php
$i=1;
 while($i<32){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>

&nbsp;
			    <select name="MOIS_ARRETE"> 
<?php
$i=1;
 while($i<13){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?></select>
&nbsp;
			    <select name="ANNEE_ARRETE"> 
<?php
$i=1990;
 while($i<2020){
?>
<option value="<?php echo $i; ?> "><?php echo $i; ?></option>
<?php
$i=$i+1;
}?>

</select></td>
            </tr>
          </tbody>
        </table>
        </fieldset>
        <input type="submit" name="inserer" value="تاكيد">
		
        
        
      </form>
  	 
   
</td> 

 </tr> 


<tr>
      <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
</table

		</div>

	</body>

</html>