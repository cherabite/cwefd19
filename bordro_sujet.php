<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=UTF-8" http-equiv="content-type">
  <style>
@media print
{
body{font-family:times new roman;
font-size:16px;}
H1{
	page-break-after: always;
	}
    @page { size :A4 portrait;
   margin: auto;
  }
}
  </style>
  <title> ج استلام المواضيع</title>
</head>
<body style="margin: 0pt auto; width: 19.5cm; height: 28cm; direction: rtl;">
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
$don = mysql_query("select * from tab_total where cod_etab='$code_etab' ");
$nb = mysql_num_rows($don);
// echo $nb;
$line = mysql_fetch_array($don);
?>
<table style="width: 737px; height: 1058px;" cellpadding="2"
 cellspacing="2">
  <tbody>
    <tr style="height: 28px;">
      <td
 style="text-align: right; vertical-align: top; height: 100%;">
      <table style="text-align: left; width: 100%; height: 2cm;"
 border="0">
        <tbody>
          <tr>
            <td style="width: 25%;"><img
 style="width: 2cm; height: 2cm;" src="onefd.png"> </td>
            <td style="width: 50%; vertical-align: top;">
         <h4>   <p style="text-align: center;">الجمهوريةالجزائرية
الديمقراطية الشعبية<br>
وزارةالتربية الوطنية <br>
الديوان الوطني للتعليم و التكوين عن بعد <br>
المركزالولائي سطيف</p><h4>
            </td>
            <td style="width: 25%;"> </td>
          </tr>
        </tbody>
      </table>
      <hr color="blue" width="75%">
   <h4>   <p style="text-align: center;"> <u> إمتــحـان
المســـتوى دورة:&nbsp;<?php include('includes/date_examen.php') ?></u></p>
      <p style="text-align: left;"><u>السيد (ة):</u>&nbsp;
مدير (ة) المركز الولائي سطيف  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;</p>
      <p style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;<u>إلى
السيد (ة)
:</u>&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;</p>
      <p style="text-align: left;">
&nbsp; &nbsp;رئيس مركز الإجــراء &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp;</p>
      <p style="text-align: left;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;<?php echo $line['etab']; ?>&nbsp;&nbsp;<?php echo $line['pole']; ?>
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp;&nbsp; &nbsp;</p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;</p> </h4>
      <h3><u>المــوضوع :  إسـتــلام مــواضــيع
امتحان المستوى دورة &nbsp;<?php include('includes/date_examen.php') ?>&nbsp; </u></h3>
<h3><u> المرجع : </u>  مراسلة الديوان - دليل امتحان إثبات المستوى دورة &nbsp;<?php include('includes/date_examen.php') ?>&nbsp;</h3>
      <p></p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;  في إطار تطبيق التعليمات الخاصة بتسليم مواضيع 
إمتحــان المستــــــــوى دورة &nbsp;<?php include('includes/date_examen.php') ?>&nbsp;&nbsp;
وفقا للبـطاقة التقنية  لمركزكم تسلم  المواضيع  يوم ,,,,,,,,,,,,,,,,,,,,,, ,,,,,,, على الساعة ,,,,,,,,,,,,,,,,,,,,,,</p>
      <p style="text-align: right;"> &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
	  - فتح المواضيع يوم &nbsp;<?php include('includes/date_examen.php') ?>&nbsp; بعد التأكد من المستوى ، الشعبة ، المادة ، التوقيت </p>
      <p style="text-align: right;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
     - يملأ محضر فك الأختام بعناية و يمضى من طرف الحراس و المترشحين .
	 </p>
      <p style="text-align: right;">&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
     - ظرف السؤال البديل لا يفتح إلا في الضرورة و بإذن مسبق من طرف الإدارة المركزية .
	 </p>
      <p style="text-align: right;">&nbsp; &nbsp;
* جدول المستويات و الشعب الخاصة بمركزكم .</p>
      <table style="width: 100%;" border="2"
 cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td>
            <h4>الرمز</h4>
            </td>
            <td>
            <h4>المستوى</h4>
            </td>
            <td>
            <h4>الشعبة</h4>
            </td>
            
          </tr>
<?php $donn2 = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.niveau ORDER BY niveau.trie ASC");
$nem = 1;
while ($line2 = mysql_fetch_array($donn2)) {
$tri_niv=$line2['trie'];
$doo = mysql_query(" SELECT * FROM emploi_temp1 WHERE tri_niv = '$tri_niv' and (tri_mat between '1' and '4') ORDER BY tri_mat ASC");
echo' <tr style="position:relative;height:3%">
<td>' . $line2['niv']. '</td>
<td>' . $line2['mostawa'] . '</td>
<td>' . $line2['cod_etiquete'] . '</td>

</tr>';
}
?>
        </tbody>
      </table>
      <br>
      <p>تقبلوا مني فائق الإحترام و التقــديـر .</p>
      <div id="t1">
      </div>
      <br>
      <p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 <u>سطيف في : </u>....................</p>
      <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;رئيس مركز الإجراء
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;مدير(ة) المركز الولائي   </p>
      <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php // echo $line['directeur']; ?>
&nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp;<?php include('includes/directeur.php') ?>
      </p>
      </td>
    </tr>
  </tbody>
</table>
<?php
}}
?>
</div>
</body>
</html>
