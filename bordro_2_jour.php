<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="fr">
<head>
  <meta content="text/html; charset=UTF-8"
 http-equiv="content-type">
 <style>
        
        @media print
        {
        body{font-family:times new roman;
		 font-size:16px;
		}
         
            
  

            @page { size :A4 portrait;

                    width: 21cm;
                    height: 29.7cm;
                 margin: 0;0;0;0;

            }


        }




    </style>
  <title> جدول إرسال</title>
</head>
<body
 style="margin-top: 0; ;margin-bottom:0;margin-left:auto;margin-right:auto; width: 19.5cm; height: 28cm; direction: rtl;">
     <div>
<?php $host = 'localhost';
$user = 'root';
$pass = '';
$db = 'imthne';
$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
if (!empty($_GET['code_etab'])) {
if (isset($_GET['code_etab'])) {//tester le chois de l'etablissent
$code_etab = $_GET['code_etab'];
$don = mysql_query("select * from tab_total  where cod_etab='$code_etab' ");
$nb = mysql_num_rows($don);
// echo $nb;
$line = mysql_fetch_array($don);
 
?>
<table style="width: 100%; height: 100%;border: 2px solid black;"
 cellpadding="2" cellspacing="2">
  <tbody>
    <tr style="height:28">
      <td
 style="text-align: right; vertical-align: top; height: 100%;">
      <table style="text-align: left; width: 100%; height: 2cm;"
 border="0" >
        <tbody>
          <tr>
            <td style="width: 25%;"><img style="width:2cm;height:2cm"src="onefd.png"> </td>
            <td style="width: 50%;vertical-align:top">
            <p style="text-align: center;">الجمهوريةالجزائرية الديمقراطية الشعبية<br>
           وزارةالتربية الوطنية <br>
           الديوان الوطني للتعليم و التكوين عن بعد <br>
           المركزالولائي سطيف</p>
            </td>
            <td style="width: 25%;"> </td>
          </tr>
        </tbody>
      </table>
      <hr color="blue" width="75%">
        <p style="text-align: center; "> <u> إمتــحـان المســـتوى دورة:&nbsp;<?php include('includes/date_examen.php') ?></u></p>
        <p style="text-align: center; "><u>جـــدول إرســـــال</u> </p>
		
	   <p style="text-align: right; "><u>الوثيقة رقم :03</u> </p> 
	   <p style="text-align: left; "> <u> السيد :</u> رئيس مركز إجراء &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</p>
	 <p style="text-align: left; "> <?php echo $line['etab']; ?>&nbsp;&nbsp; <?php echo $line['pole']; ?>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</p>
	 <p style="text-align: left; "><u> إلى السيد (ة) :</u>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</p>
	  <p style="text-align: left; "> مدير المركز الولائي  سطيف &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;</p>
	  <br>
	  <p> &nbsp; &nbsp; &nbsp; جدون رفقة  هذا الجـدول :</p>
	  <br>
      <div id="t1">
      <table style="width: 100%; "  border= "2px" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
		    <td>الرقم</td>
            <td>نوعية الوثائق</td>
			<td>العدد</td>
			<td>ملاحظة</td>
             </tr>
			  <tr>
		    <td>01</td>
            <td>ظرف السؤال البديل</td>
			<td>01</td>
			<td>&nbsp;</td>
             </tr> 
			 <tr>
		    <td>02</td>
            <td>المحضر التلخيصي للإمتحان</td>
			<td>02</td>
			<td>&nbsp;</td>
             </tr> <tr>
		    <td>03</td>
            <td>القائمة الإسمية (Listing) كل مستوى=01 Listing</td>
			<td> <?php echo $line['listing']; ?></td>
			<td>&nbsp;</td>
             </tr> <tr>
		    <td>04</td>
            <td>ملف القاعة</td>
			<td><?php echo $line['nbr_classes']; ?></td>
			<td>&nbsp;</td>
             </tr> <tr>
		    <td>05</td>
            <td colspan="2" rowspan="1">الملف المالي :<br>قائمة المؤطرين <br> رخصة الهيئة المستخدمة <br>صك مشطوب</td>
			
			<td></td>
             </tr>
        </tbody>
      </table>
      </div>
	  <br>
   <p>&nbsp; &nbsp; &nbsp; <u>سطيف في : </u>....................</p>  
<p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;رئيس مركز الإجراء &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;مديرة (ة) المركز الولائي </p>
 <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $line['directeur']; ?> &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; 
 <?php include('includes/directeur.php') ?></p>    
	 
     
     
      </td>
    </tr>
    
  </tbody>
</table>
 <?php
    }
}
?> 
    <div>
</body>
</html>
