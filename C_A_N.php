<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <head>

<script language="Javascript">
function imprimer(){window.print();}
</script>


   <style>
       
        @media print
        {
.bouton
{
display:none;
}
    table,tr,td
   {
  
   page-break-inside : avoid;
  
  
   }
            input{
		font-weight: bold;
               text-align:center;
                font-family:times new roman;
                font-size:16px;
                border:0;}


          
            @page { size :A4 portrait;

                    width: 21cm;
                    height: 29.7cm;


            }


        }




    </style>     

        
    </head>


    <title>تأكيد الشهادة</title>
    
</head>
<body style="direction: rtl;height: 29cm; width: 20cm;margin:auto">
<?php $host = 'localhost';
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
$req = mysql_query("select * from tab_eleve where MATR=$MATR ");
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
$date = date_create($DATE_NAIS);
$DNS0 = date_format($date, 'd-m-Y');
$dns = date_format($date, 'Y');
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
// $req = mysql_query("select * from inseleve ,classe where inseleve.IANNEXE='$IANNEXE' and inseleve.IANNEEINS='$IANNEEINS' and inseleve.INSEQ='$INSEQ' and inseleve.IANNEE='$IANNEE' and inseleve.ICODE='$code' and classe.CODE='$code' ");
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
$FILIERE = $NIVEAU . ' ' . $FILI;
$DATE_NAIS = $nbr['DNS'];
$date = date_create($DATE_NAIS);
$DNS0 = date_format($date, 'd-m-Y');
$dns = date_format($date, 'Y');
}
?>
<table  style="position fixed;height: 28cm; width: 19cm;margin:auto" border="0" cellpadding="2" cellspacing="2">
  <tbody>
    <tr>
      <td style="vertical-align: top;">
      <table style="height: 5cm; width: 100%;" border="0">
        <tbody>
          <tr>
            <td style="width: 25%;text-align: center; vertical-align: middle;"><img style="width:2.5cm;height:2.5cm;" src="onefd.png">
            </td>
            <td style="width: 50%;text-align: center;">
           <h3>الجمهورية
                                الجزائرية الديمقراطية الشعبية</h3>
                            <h3>وزارة
                                التربية الوطنية</h3>
                            <h3>الديوان
                                الوطني للتعليم و التكوين عن بعد</h3>
                            <h3>المركز
                                الولائي سطيف</h3>

            <hr color="blue" width="75%">
            </td>
            <td style="width: 25%;"> 
<div  class="bouton" ><center><p><input name="B1" onclick="imprimer()" type="button" value="طباعة"></p> </center></div>
</td>
          </tr>
        </tbody>
      </table>
      <table
 style="width: 100%;  margin-left: auto; margin-right: 0px;"
 border="0" cellpadding="2" cellspacing="2">
        <tbody>
          <tr>
            <td style="width:50%">الرقم:&nbsp;<input name="N_C" value="" size="5" maxlength="5" type="text">/م.و.س/<?php echo date("Y"); ?>
            </td>
            <td style="text-align: right; width: 25%;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</td>
            <td style="text-align: center;font-weight: bold;">مدير
المركز الولائي للتعليم و التكوين<br>
&nbsp;&nbsp; عن بعد -سطيف - </td>
          </tr>
          <tr>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
            <td style="text-align: center;"><span
 style="font-weight: bold; text-decoration: underline;">إلى
السيد :</span></td>
          </tr>
          <tr>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
            <td style="text-align: center; vertical-align: middle;font-weight: bold;">
			<input  list="distination1" name="N_C" value="" size="50" maxlength="50" type="text" autocomplete="on"> 
			
<datalist id="distination1">
  <option value="مدير المعهد الوطني المتخصص">
  <option value="مدير جامعة التكوين المتواصل ">
  <option value="مدير التوظيف والإنتداب  ">
  <option value="مدير المعهد الوطني للتكوين">
  <option value="مدير مركز التكوين المهني والتمهين">
   <option value="رئيس المجلس الشعبي البلدي ">
  <option value="مدير المعهد الوطني المتخصص في التكوين المهني ">
  <option value="مدير المؤسسة العمومية الإستشفائية">
  <option value="مدير المعهد الوطني للتكوين العالي">
 
</datalist>
			
			</td>
          </tr>
          <tr>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
            <td style="text-align: center;font-weight: bold;"> 
			<input list="distination2" name="N_C" value="" size="50" maxlength="50"type="text" autocomplete="on">
			<datalist id="distination2">
  <option value=" في التكوين المهني الهضاب- سطيف">
  <option value=" مديرية الموارد لبشرية للأمن الوطني">
  <option value="  مركز العناصر – البرج  –">
  <option value="المتخصص للأسلاك الخاصة بإدارة الشؤون">
   <option value="عبد الرحمان قطوش02 - العلمـة -">
  <option value="مديرية المستخدمين والتكوين ">
  <option value="لإطارات الشباب والرياضة">
  <option value="برج بوعريريج ">
  <option value="سطــيف ">
 
</datalist>
			</td>
          </tr>
          <tr>
            <td style="text-align: right;"></td>
            <td style="text-align: right;"></td>
            <td style="text-align: center;font-weight: bold;">
			<input name="N_C" value="" size="50" maxlength="50"type="text" autocomplete="on"> 
			<datalist id="distination3">
<datalist id="distination3">
  <option value="العلمة">
  <option value="برج بوعريريج ">
  <option value="سطــيف ">
			</td>
          </tr>
        </tbody>
      </table>
&nbsp;&nbsp;&nbsp;&nbsp; <span
 style="text-decoration: underline; font-weight: bold;">الموضوع
:</span> حول صحة شهادة &nbsp;إثبات المستوى <br>
      <br>
&nbsp;&nbsp;&nbsp; <span
 style="text-decoration: underline; font-weight: bold;">المرجــــــع</span>:
مراسلتكم :&nbsp; <input name="N_C" value=""
 size="5" maxlength="5" type="text">
&nbsp; &nbsp; بتاريخ:<input name="N_C" value=""
 size="10" maxlength="10" type="text" autocomplete="on"> <br>
      <p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
&nbsp;&nbsp;ردا على مراسلتكــــم المدونـــة فــي المرجــع
أعلاه, يشرفني أن أعلمكـــم بـــأن شهــادة المستـــــوى المقدمة من طرف</p>
&nbsp;&nbsp;
&nbsp;&nbsp;السيــد(ة):&nbsp;&nbsp;<?php echo $NOM; ?>
&nbsp;&nbsp;<?php echo $PRENOM; ?><br>
      <br>
&nbsp;&nbsp;&nbsp;&nbsp; المولــود
بتاريخ:&nbsp;&nbsp;<?php if ($PRESUME == '0') {
echo $DNS0;
} else {
echo 'خـــلال ' . $dns;
} ?>
&nbsp; &nbsp;&nbsp; &nbsp; ب :&nbsp; &nbsp;<?php echo $LNS; ?><br>
      <br>
&nbsp;&nbsp;&nbsp;&nbsp; الحامـــل(ة) لرقم :&nbsp;<u>
<?php echo $ORDREC; ?> </u>&nbsp;و التي تنص على أن
المعني (ة)تحصل على المستوى :<a style="font-weight: bold;">
&nbsp;<?php echo $FILIERE; ?></a> <br>
      <br>
      <br>
&nbsp;&nbsp; &nbsp; صحيحــــــــــــة &nbsp;<input
 name="N_C" value="" size="3" maxlength="3"
 type="text">
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; غير صحيحـــــــــــة <input
 name="N_C" value="" size="3" maxlength="3"
 type="text"><br>
      <br>
      <br>
	  <br>
&nbsp;&nbsp;&nbsp;&nbsp;المعني (ة) كان مسجــل بالمـركز
الولائـي للتعلـــيم و التكويـن عــن بـعـد -سطــيف <br>
      <br>
&nbsp;&nbsp;&nbsp;&nbsp; خلال السنــة الدراسيـــة
:&nbsp;&nbsp;<?php echo $IANNEE; ?>
&nbsp;&nbsp;&nbsp;&nbsp; تحت &nbsp;رقم
التسجيــل:&nbsp;<?php echo $MATR; ?><br>
      <br>
&nbsp;&nbsp;&nbsp;&nbsp;<?php if ($DECISE == 'ينتقل' OR $DECISE == 'مقبول' OR $DECISE == 'ناجح') {
echo 'وقــد تحصــل(ة) علــى المستــوى: &nbsp;<a style=" font-weight: bold;"> ' . $FILIERE . '</a>';
} else {
echo'ولم يتحصل على المستوى : &nbsp;<a style=" font-weight: bold;">' . $FILIERE . '</a>';
} ?>
      <br>
      <br>
&nbsp;&nbsp;&nbsp;&nbsp;حــيث كــان قــرار اللـجــنة
البيـــداغوجــية : &nbsp;&nbsp;<a style="font-weight: bold;"><?php echo $DECISE; ?></a>.
      
      <p>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
 حرر ب : سطيف 
 في :<?php echo date("d-m-Y"); ?> </p>
      <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;مـدير(ة) المركز الولائـي
      <br>
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;<?php include('includes/directeur.php'); ?>
      </td>
    </tr>
    <tr>
      <td style="vertical-align: bottom; height: 0.7cm;">
      <table style="text-align: center; width: 100%;"
 border="2" cellpadding="1" cellspacing="1">
        <tbody>
          <tr>
            <td>FAX :036452260</td>
            <td>TEL :036452261</td>
            <td>Email
:crefd19@gmail.com</td>
          </tr>
        </tbody>
      </table>
      </td>
    </tr>
  </tbody>
</table>
<?php
}
?>
</body>
</html>
