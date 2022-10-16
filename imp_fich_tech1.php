<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html lang="fr">
<head>
  <meta content="text/html; charset=UTF-8"
 http-equiv="content-type">
 <style>
        
        @media print
        {
        body{font-family:times new roman;}
            p.blo{margin:auto;width:100%;}
            #dd{

                margin:auto;

                width:100%;
            }
            input{

                font-family:times new roman;
                font-size:16px;
                border:0;}
  #t1,t2{
	font-family:times new roman;
                font-size:18px;  
	  
  }

            div {

                background: white;
                display: block;
                margin: 0 auto;
                margin-left: 0cm;
                margin-bottom: 0cm;
                margin-right:0cm;

            }
            @page { size :A4 portrait;

                    width: 21cm;
                    height: 29.7cm;


            }


        }




    </style>
  <title></title>
</head>
<body
 style="margin: auto; position: relative; width: 19.5cm; height: 28cm; direction: rtl;">
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
$don = mysql_query("select * from tab_niv,niveau where cod_etab='$code_etab' ");
$nb = mysql_num_rows($don);
// echo $nb;
$line = mysql_fetch_array($don);
?>
<table style="width: 100%; height: 100%;border: 2px solid black;"
 cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td
 style="text-align: right; vertical-align: top; height: 98%;">
      <table style="text-align: left; width: 100%; height: 175px;"
 border="0" >
        <tbody>
          <tr>
            <td style="width: 25%;"><img src="onefd.png"> </td>
            <td style="width: 50%;">
            <h3 style="text-align: center;">الجمهورية
الجزائرية الديمقراطية الشعبية</h3>
            <h3 style="text-align: center;">وزارة
التربية الوطنية</h3>
            <h3 style="text-align: center;">الديوان
الوطني للتعليم و التكوين عن بعد</h3>
            <h3 style="text-align: center;">المركز
الولائي سطيف</h3>
            </td>
            <td style="width: 25%;"> </td>
          </tr>
        </tbody>
      </table>
      <hr color="blue" width="75%">
      <h2 style="text-align: center; text-decoration: underline;">البــطاقــة
التـقنيــة</h2>
      <h2 style="text-align: center; text-decoration: underline;">إمتــحـان المســـتوى دورة:&nbsp;<?php include('includes/date_examen.php') ?></h2>
      <br>
      <h3>&nbsp;
&nbsp;اسـم
مركـز الإجـراء : &nbsp;&nbsp;<?php echo $line['etab']; ?></h3>
      <div id="t1">
      <table style="width: 100%; "  border= "2px" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
		  
            <td><h4>الرمز</h4></td>
            <td><h4>المستوى</h4></td>
            <td><h4>الشعبة</h4></td>
            <td><h4>ع المسجلين</h4></td>
            <td><h4>ع القاعات</h4></td>
            <td><h4>ملاحظة </h4></td>
			
          </tr>
<?php $donn = mysql_query("select * from tab_niv INNER JOIN niveau ON tab_niv.cod_etab='$code_etab' and tab_niv.niv=niveau.cod_niv ORDER BY niveau.tri_niv ASC");
while ($line = mysql_fetch_array($donn)) {
echo' <tr style="position:relative;height:3%">
<td>' . $line[2] . '</td>
<td>' . $line[7] . '</td>
<td>' . $line[8] . '</td>
<td>' . $line[3] . '</td>
<td>' . $line[5] . '</td>
<td></td>
</tr>';
}
?>
        </tbody>
      </table>
      </div>
      <div id="t2">
      <h3> المــؤطـرون الإداريون</h3>
      <table style="width: 100%;"border= "2px"  cellpadding="1" cellspacing="1">
        <tbody>
          <tr style="position: relative; height: 3%;">
            <td><h4>رئيس المركز</h4></td>
            <td><h4>نائب الرئيس</h4></td>
            <td><h4>الأمانة</h4></td>
            <td><h4>الاتصال</h4></td>
            <td><h4>أعوان الأمن</h4></td>
            <td><h4>العمال المهنيون</h4></td>
            <td><h4>الأساتذة الحراس</h4></td>
          </tr>
          <tr style="position: relative; height: 3%;">
<?php		
		$din = mysql_query("select * from tab_total where cod_etab='$code_etab' ");
$nb = mysql_num_rows($din);
// echo $nb;
$linee = mysql_fetch_array($din);?>
            <td><?php echo  '1' ?></td>
            <td><?php echo  '1' ?></td>
            <td><?php echo  $line['ammana'] ?></td>
            <td><?php echo  $line['commun'] ?></td>
            <td><?php echo '2' ?></td>
            <td><?php echo  $line['travails'] ?></td>
            <td><?php echo  $line['conv_gardien'] ?></td>
          </tr>
        </tbody>
      </table>
      </div>
      <div id="t3"
 style="position: absolute; bottom: 24pt; width: 95%;">
      <p style="font-weight: bold; text-decoration: underline;">سـطيف فـي :&nbsp;  <?php echo date("d-m-Y"); ?><br></p>
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
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;مديرةالمركز الولائي</p>
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
	 <br>
      <br>
      <br>
     
      </div>
      </td>
    </tr>
    <tr>
      <td>
      <table style="text-align: center; width: 100%;"border= "2px"
 cellpadding="1" cellspacing="1">
        <tbody>
          <tr>
            <td>FAX :03645</td>
            <td>TEL :</td>
            <td>Email :crefd19@gmail.com</td>
          </tr>
        </tbody>
      </table>
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
