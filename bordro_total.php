<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="fr">
<head>
  <meta content="text/html; charset=UTF-8"
 http-equiv="content-type">
 <style>
        
        @media print
        {
        body{font-family:times new roman;}
         
            
  

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
<br/><br/>
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
        <p style="text-align: center; "><u>جدول إرسال</u> &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <u> إمتــحـان المســـتوى دورة:&nbsp;<?php include('includes/date_examen.php') ?></u></p>
      
	  
      <p>يشهد السيد (ة) <?php echo $line['directeur']; ?> رئيس (ة) مركز <?php echo $line['etab']; ?>&nbsp;&nbsp; <?php echo $line['pole']; ?> على إستلام الوثائق التالية :</p>
	  
	
      <div id="t1">
      <table style="width: 100%; "  border= "2px" cellpadding="2" cellspacing="2">
        <tbody>
            <tr>
		    <td>الوثيقة</td>
            <td>الكمية</td>
             </tr>
			 <tr>
<tr>
		    <td>تكليف بمهمة</td>
            <td>01</td>
             </tr>
			 <tr>			 
			 <tr>
		    <td>بطاقة تقنية</td>
            <td>01</td>
             </tr>
			 <tr>
		    <td>استدعاء الحراس</td>
            <td><?php echo $line['conv_gardien']; ?></td>
             </tr>
			 <tr>
		    <td>استدعاء أعضاء الأمانة و اللإتصال</td>
            <td><?php echo $line['conv_com_secrit']; ?></td>
             </tr>
			 <tr>
		         <td> دفـاتر الغيبابـات </td>
                  <td><?php echo $line['listing']*2; ?></td>
             </tr>
			   <tr>
		         <td> قصاصات المترشحين توضع على الطاولة </td>
                  <td><?php echo $line['nbr_cond_par_centre']; ?></td>
             </tr>
			  
			  
			 <tr>
		    <td>قوائم المترشحين حسب كل حجرة</td>
            <td><?php echo $line['nbr_classes']; ?></td>
             </tr>
			 
			
			 <tr>
		    <td>تقرير رئيس مركز الإجراء+ جدول إجراء الامتحان</td>
            <td>02+02</td>
             </tr>
			
						 <tr>
		    <td>جدول إستلام أوراق الإمتحان بين الأمانة و الحراس+  جدول حضور أعضاء الأمانة و الإتصال+جدول الحراسة </td>
            <td>02+02+02</td>
             </tr>
			 
			 
			 <tr>
		    <td>محضر فك الأختام + محضر فك الأختام لسؤال البديل</td>
            <td><?php echo $line['listing']*4 + 2; ?></td>
             </tr>
			 <tr>
		    <td> ملف القاعة (قائمة المترشحين+قائمة الغياب و التخلي+تعليمة الحراس) </td>
            <td><?php echo $line['nbr_classes']; ?></td>
             </tr>
			  <tr>
		    <td> ترخيص الهيئة المستخدمة+استمارة المعلومات </td>
            <td><?php echo $line['autorite_tot']; ?></td>
             </tr>
			  <tr>
		    <td>جدول  إرسال وثائق الإختبارات  </td>
            <td>05</td>
             </tr>
			
			  <tr>
		    <td>جدول إجمالي للمؤطرين الحاضرين في مركز الإجراء</td>
            <td>02</td>
             </tr>
			 
			 <tr>
		    <td>التعليمات الخاصة ب :رئس مركز الإجراء+أعضاء الأمانة+المترشحين
			</td>
            <td>01+01+01</td>
             </tr>
			
			 
			 <tr>
		    <td>تقرير حالة الغش +إعتراف بالغش</td>
            <td>05+05</td>
             </tr>
			 <tr>
		    <td>تصريح شرفي للمشاركة في حراسة المترشح المعاق+مشاركة بتحفظ في الإمتحان</td>
            <td>02+02 </td>
             </tr>
			 <tr>
		    <td>  تصريح شرفي للأستاذ المشارك في تحرير إجابة المترشح المعاق +ترخيص خاص بالمترشح المعاق</td>
            <td>05+05</td>
             </tr>
			 <tr>
			 <tr>
		    <td>أوراق الإجابة</td>
            <td><?php echo $line['feille_examen']; ?></td>
             </tr>
			 <tr>
		    <td>أوراق إضافية</td>
            <td><?php echo $line['inter_cal']; ?></td>
             </tr>
			 <tr>
		    <td>أوراق مسودة</td>
            <td><?php echo $line['briellon']; ?></td>
             </tr>
			
			
			 <tr>
		    <td> محضـر القاعــة </td>
            <td><?php echo $line['pv_salle']; ?></td>
             </tr>
			 			 <tr>
		    <td>أظرفة</td>
            <td><?php echo $line['envloppe']; ?></td>
			<tr>
		    <td>أقلام جافة + شريط لاصق</td>
            <td><?php echo $line['stylo']; echo '+ 1'?></td>
             </tr>
             </tr>

        </tbody>
      </table>
      </div>
     
<p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;مديرةالمركز الولائي &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; رئيس مركز الإجراء</p>
 <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<?php include('includes/directeur.php') ?></p>    
	 
     
     
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
