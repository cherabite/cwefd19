﻿<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
  <meta content="text/html; charset=UTF-8"
 http-equiv="content-type">
  <style>
@media print
{
body{font-family:times new roman;
font-size:16px;}
H1{page-break-after: always;}
@page { size :A4 portrait;

margin: auto;
}
 
}
  </style>
  <title> ج استلام المواضيع</title>
</head>
<body
 style="margin: 0pt auto; width: 19.5cm; height: 28cm; direction: rtl;">
<?php $host = 'localhost';
$user = 'root';
$pass = '';
$db = 'imthne';
$link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
mysql_select_db($db) or die('Erreur :' . mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
//if (!empty($_GET['code_etab'])) {
//if (isset($_GET['code_etab'])) {//tester le chois de l'etablissent
//$code_etab = $_GET['code_etab'];
//$don = mysql_query("select * from tab_total where cod_etab='$code_etab' ");
//$nb = mysql_num_rows($don);
// echo $nb;
//$line = mysql_fetch_array($don);
?>
<table style=" position relative;width: 100%; height: 100%;"
 cellpadding="2" cellspacing="2">
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
            <p style="text-align: center;">الجمهوريةالجزائرية
الديمقراطية الشعبية<br>
وزارةالتربية الوطنية <br>
الديوان الوطني للتعليم و التكوين عن بعد <br>
المركزالولائي سطيف</p>
            </td>
            <td style="width: 25%;"> </td>
          </tr>
        </tbody>
      </table>
      <hr color="blue" width="75%">
     <h3> <p style="text-align: center;"> <u> إمتــحـان المســـتوى دورة:&nbsp;<?php include('includes/date_examen.php') ?></u></p></h3>
      <p style="text-align: left;"><u>السيد (ة):</u>&nbsp;
مدير المركز الولائي
سطيف &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;</p>
      <p style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;<u>إلى
السيد (ة):</u>&nbsp; مدير التربية&nbsp; &nbsp;
&nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;</p>
      <p style="text-align: left;">&nbsp;
&nbsp;سطيف &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;</p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;<u> <h3>الموضوع &nbsp;: ح/ إسـتــلام مــواضيع &nbsp;الامـــتحان .</h3></u></p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;لــي عـظيم الشرف أن &nbsp;أسلمكم &nbsp;مواضيع
إمتحــان المستــــــــوى دورة &nbsp;<?php include('includes/date_examen.php') ?>&nbsp;
&nbsp; لمراكز إجراء إمتحان المستوى</p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;لولاية سطيف حسب الجدول التالــي.</p>
      <p style="text-align: right;">&nbsp; &nbsp;
* جدول المستويات و الشعب الخاصة بكل مركز.</p>
      <table style="width: 100%;" border="2"
 cellpadding="3" cellspacing="2">
        <tbody>
          <tr>
            <td>
            <h4>الرقم</h4>
            </td>
            <td>
            <h4>مركز الإجراء</h4>
            </td>
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
<?php $donn2 = mysql_query("SELECT * FROM tab_stat where wil='سطيف'  ");
$l=0;
while ($line2 = mysql_fetch_array($donn2)) {
$code_etab=$line2['code_etab'];
$doo = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.niveau ORDER BY niveau.trie ASC");
echo' <tr style="position:relative;height:3%">
<td>' . $line2['code_etab'] . '</td>
<td>' . $line2['etablissent'] . '</td>
<td>';
while ($lii = mysql_fetch_array($doo)) {
echo $lii['niv'] ;
echo' <br>';
}
echo '</td>
<td>';
$doo = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.niveau ORDER BY niveau.trie ASC");
while ($lii = mysql_fetch_array($doo)) {
echo $lii['mostawa'] ;
echo' <br>';
}
echo '</td>
<td>';
$doo = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.niveau ORDER BY niveau.trie ASC");
while ($lii = mysql_fetch_array($doo)) {
echo $lii['cod_etiquete'] ;
echo' <br>';
}
echo'</td>

</tr>';
}
?>
        </tbody>
      </table>
    

      <p>تقبلوا مني فائق الإحترام و التقــديـر .</p>
	
      <p>
	  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
	  &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;	  
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; <u>سطيف في : </u>....................</p>
	  
      <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;مدير التربية
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;مديرة (ة) المركز الولائي </p>
      <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php //echo $line['directeur']; ?>
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
<h1></h1>

<table style="position relative; width: 100%; height: 100%;"
 cellpadding="2" cellspacing="2">
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
            <p style="text-align: center;">الجمهوريةالجزائرية
الديمقراطية الشعبية<br>
وزارةالتربية الوطنية <br>
الديوان الوطني للتعليم و التكوين عن بعد <br>
المركزالولائي سطيف</p>
            </td>
            <td style="width: 25%;"> </td>
          </tr>
        </tbody>
      </table>
      <hr color="blue" width="75%">
       <h3> <p style="text-align: center;"> <u> إمتــحـان المســـتوى دورة:&nbsp;<?php include('includes/date_examen.php') ?></u></p></h3>
      <p style="text-align: left;"><u>السيد (ة):</u>&nbsp;
مدير المركز الولائي
سطيف &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;</p>
      <p style="text-align: left;">&nbsp;&nbsp;&nbsp;&nbsp;<u>إلى
السيد (ة):</u>&nbsp; &nbsp; مدير التربية&nbsp;
&nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp;</p>
      <p style="text-align: left;">
&nbsp; &nbsp;برج بوعريريج &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp;</p>
<br>
      <p style="text-align: right;">&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; <u> <h3>الموضوع &nbsp;: ح/ إسـتــلام مــواضيع &nbsp;الامـــتحان .</h3></u></p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;لــي عـظيم الشرف أن &nbsp;أسلمكم &nbsp;مواضيع
إمتحــان المستــــــــوى دورة &nbsp;<?php include('includes/date_examen.php') ?>&nbsp;
&nbsp;&nbsp;لمراكز إجراء إمتحان المستوى</p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp;لولاية برج بوعريريج حسب الجدول التالــي.</p>
      <p style="text-align: right;">&nbsp; &nbsp;
&nbsp; &nbsp; * جدول المستويات و الشعب الخاصة بكل مركز.</p>
      <table style="width: 100%;" border="2"
 cellpadding="3" cellspacing="2">
        <tbody>
          <tr>
            <td>
            <h4>الرقم</h4>
            </td>
            <td>
            <h4>مركز الإجراء</h4>
            </td>
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
<?php $donn2 = mysql_query("SELECT * FROM tab_stat where wil='برج بوعريريج' ");
$i=1;
while ($line2 = mysql_fetch_array($donn2)) {
$code_etab=$line2['code_etab'];
$doo = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.niveau ORDER BY niveau.trie ASC");
echo' <tr style="position:relative;height:3%">
<td>' . $i. '</td>
<td>' . $line2['etablissent'] . '</td>
<td>';
while ($lii = mysql_fetch_array($doo)) {
echo $lii['niv'] ;
echo' <br>';
}
echo '</td>
<td>';
$doo = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.niveau ORDER BY niveau.trie ASC");
while ($lii = mysql_fetch_array($doo)) {
echo $lii['mostawa'] ;
echo' <br>';
}
echo '</td>
<td>';
$doo = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.niveau ORDER BY niveau.trie ASC");
while ($lii = mysql_fetch_array($doo)) {
echo $lii['cod_etiquete'] ;
echo' <br>';
}
echo'</td>

</tr>';
$i=$i+1;
}
?>
        </tbody>
      </table>
      <br>
	  <br>
      <p>تقبلوا مني فائق الإحترام و التقــديـر .</p>
	  <br>
	  
      <p>&nbsp; &nbsp; &nbsp; <u>سطيف في : </u>....................</p>
	  <br>
	  
      <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;مدير التربية
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;مديرة (ة) المركز الولائي </p>
      <p style="font-weight: bold;">&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<?php //echo $line['directeur']; ?>
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
</h1>
</body>
</html>
