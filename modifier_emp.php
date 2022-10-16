<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>



        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>
<script language="JavaScript"> 
                          
function verif() {

a=document.f1.NOM.value;

b=document.f1.PRENOM.value;
c=document.f1.LNS.value;
d=document.f1.JOUR_DNS.value;
e=document.f1.MOIS_DNS.value;
f=document.f1.MOIS_DNS.value;
if (a=="") {
alert ("ادخل اللقب");
valid = false;
return valid;
document.f1.NOM.focus();
}
if (b=="") {
alert ("ادخل الاسم");
valid = false;
return valid;
document.f1.PRENOM.focus();
}
if (d=="" || e=="" || f=="") {
alert ("ادخل تاريخ الميلاد");
valid = false;
return valid;
document.f1.JOUR_DNS.focus();
}

if (c=="") {
alert ("ادخل مكان الميلاد");
valid = false;
return valid;
document.f1.LNS.focus();
}


}
</script>
        <title>modifier employeur</title>
       
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
                        mysql_connect("localhost", "root", "");
                        mysql_select_db("grh");
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        ?>


                        <?php
                        if (isset($_GET['ID_EMPLOYEUE'])) {
                            $ID_EMPLOYEUE = $_GET['ID_EMPLOYEUE'];
                            $don = mysql_query("select * from employeur where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
                            $nb = mysql_num_rows($don);
                            // echo $nb;
                            $line = mysql_fetch_array($don);
                           // $dns = strtotime($line['DNS']);
						$a = substr($line['DNS'], 0, 4);     // conversion
            $m = substr($line['DNS'], 5, 2);     // de la date
             $j = substr($line['DNS'], 8, 2);    
                           // $dns_arrete = strtotime($line['DATE_ARRETE']);
							$a1 = substr($line['DATE_ARRETE'], 0, 4);     // conversion
            $m1 = substr($line['DATE_ARRETE'], 5, 2);     // de la date
             $j1 = substr($line['DATE_ARRETE'], 8, 2);
                           // $dns_diplome = strtotime($line['DATE_DIPLOME']);
							$a2 = substr($line['DATE_DIPLOME'], 0, 4);     // conversion
            $m2 = substr($line['DATE_DIPLOME'], 5, 2);     // de la date
             $j2 = substr($line['DATE_DIPLOME'], 8, 2);
                           // $dns_pv_install = strtotime($line['DATE_PV_INSTALL']);
							$a3 = substr($line['DATE_PV_INSTALL'], 0, 4);     // conversion
            $m3 = substr($line['DATE_PV_INSTALL'], 5, 2);     // de la date
             $j3 = substr($line['DATE_PV_INSTALL'], 8, 2);
                            $PRESUME = $line['PRESUME'];
                            ?>


                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire"  name="f1" onsubmit="return verif();">
                                <fieldset><legend style="caption-side: right;">معلومات الحالة المدنية للموظف </legend>
                                    <table align="right" border="1"
                                           cellpadding="2" cellspacing="2" ; >
                                        <tbody>
                                            <tr>

                                                <td>اللقب</td>
                                                <td> <input name="NOM" value="<?php echo $line['NOM']; ?>"
                                                            type="text"  ></td>

                                                <td>الاسم</td>
                                                <td> <input name="PRENOM" value="<?php echo $line['PRENOM']; ?>"
                                                            type="text"></td>

                                            </tr>
                                            <tr>
                                                <td>تاريخ الميلاد</td>
                                                <td>
                                                    <select name="JOUR_DNS" > 

                                                        <option value="<?php echo $j; ?>"><?php echo $j; ?></option>		
    <?php include('fonction_date/jour.php'); ?>
                                                    </select>
                                                    <select name="MOIS_DNS" > 
                                                        <option value="<?php echo $m; ?>"><?php echo $m; ?></option>	
    <?php include('fonction_date/mois.php'); ?>
                                                    </select>
                                                    <select name="ANNEE_DNS" > 
                                                        <option value="<?php echo $a; ?>"><?php echo $a; ?></option>	
    <?php include('fonction_date/annee.php'); ?>

                                                    </select>
                                                    مفترض : <select  name="PRESUME" >
    <?php
    if ($PRESUME == '0') {
        ?><option value="<?php echo 'لا'; ?>"><?php echo 'لا'; ?></option>
                                                            <?php
                                                        } else {
                                                            ?><option value="<?php echo 'نعم'; ?>"><?php echo 'نعم'; ?></option>	 
                                                            <?php
                                                        }
                                                        ?>

                                                        <option> لا </option>
                                                        <option> نعم</option>
                                                </td>
                                                <td>مكان الميلاد</td>
                                                <td><input name="LNS" value="<?php echo $line['LNS']; ?>"
                                                           type="text" size=50 maxlength=150></td>


                                            </tr>
                                            <tr>
                                                <td>الحالة المدنية</td>
                                                <td><select  name="ETAT_CIVIL" >
                                                        <option value="<?php echo $line['ETAT_CIVIL']; ?>"> <?php echo $line['ETAT_CIVIL']; ?></option>
                                                        <option> متزوج </option>
                                                        <option> أعزب</option> </td>
                                                <td>عدد الأولاد</td>
                                                <td><input name="NBR_ENFANT" value="<?php echo $line['NBR_ENFANT']; ?>"
                                                           type="text" "></td>


                                            </tr>
                                            <tr>
                                                <td>العنوان الشخصي</td>
                                                <td colspan="3" rowspan="1"><input
                                                        name="ADRESSE" value="<?php echo $line['ADRESSE']; ?>" type="text"   size=100 maxlength=150></td>

                                            </tr>

                                            <tr>
                                                <td>رقم الحساب البريدي</td>
                                                <td colspan="3" rowspan="1"><input
                                                        name="N_CCP" value="<?php echo $line['N_CCP']; ?>" type="text"></td>

                                            </tr>
                                            <tr>
                                                <td>رقم الضمان الإجتماعي </td>
                                                <td colspan="3" rowspan="1"><input
                                                        name="N_ASSURENCE" value="<?php echo $line['N_ASSURENCE']; ?>" type="text"></td>

                                            </tr>
                                            <tr>
                                                <td>رقم التعاضدية</td>
                                                <td colspan="3" rowspan="1"><input
                                                        name="N_MUTUEL" value="<?php echo $line['N_MUTUEL']; ?>" type="text"></td>

                                            </tr>
                                            <tr>
                                                <td>الخدمة الوطنية</td>
                                                <td><select  name="SERVICE_NATIONAL" > 
                                                        <option value="<?php echo $line['SERVICE_NATIONAL']; ?>"> <?php echo $line['SERVICE_NATIONAL']; ?></option>
                                                        <option> نعم  </option>
                                                        <option> لا </option>
                                                        <option> غير معني </option>  </td>

                                                <td>رقم الهاتف </td>
                                                <td><input
                                                        name="TEL" value=" <?php echo $line['TEL']; ?>" type="text"></td>
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
                                                <td><input name="N_PV_INSTALL" value="<?php echo $line['N_PV_INSTALL']; ?>"
                                                           type="text"></td>
                                            </tr>
                                            <tr>

                                                <td>تاريخ التنصيب</td>
                                                <td>
                                                    <select name="JOUR_PV"> 

                                                        <option value="<?php echo $j3; ?>"><?php echo $j3; ?></option>	
    <?php include('fonction_date/jour.php'); ?>
                                                    </select>
                                                    <select name="MOIS_PV"> 
                                                        <option value="<?php echo $m3; ?>"><?php echo $m3; ?></option>	
    <?php include('fonction_date/mois.php'); ?>
                                                    </select>
                                                    <select name="ANNEE_PV"> 
                                                        <option value="<?php echo $a3; ?>"><?php echo $a3; ?></option>	
    <?php include('fonction_date/annee.php'); ?>

                                                    </select></td>
                                                <td>في رتبة</td>
                                                <td> <select name="GRADE"> 
                                                        <option value="<?php echo $line['GRADE']; ?>"> <?php echo $line['GRADE']; ?></option>
    <?php
    $retour = mysql_query("select distinct GRADE from tab_grade"); // afficher les classes
    while ($a = mysql_fetch_array($retour)) {
        echo '<option value="' . $a['GRADE'] . '">' . $a['GRADE'] . '</option>';
    }
    ?>   

                                                    </select> </td>


                                            </tr>
                                            <tr>
                                                <td>الشهادة</td>
                                                <td><input name="DIPLOME" value="<?php echo $line['DIPLOME']; ?>"
                                                           type="text" size=60 maxlength=150></td>
                                                <td>الصادرة بتاريخ</td>
                                                <td>
                                                    <select name="JOUR_DIPLOME"> 
                                                        <option value="<?php $j2; ?>"><?php echo $j2; ?></option>	
                                                        <?php include('fonction_date/jour.php'); ?>
                                                    </select>
                                                    <select name="MOIS_DIPLOME"> 
                                                        <option value="<?php echo $m2; ?>"><?php echo $m2; ?></option>	
                                                        <?php include('fonction_date/mois.php'); ?>
                                                    </select>
                                                    <select name="ANNEE_DIPLOME"> 
                                                        <option value="<?php echo $a2; ?>"><?php echo $a2; ?></option>	
                                                        <?php include('fonction_date/annee.php'); ?>
                                                    </select></td>


                                            </tr>
                                            <tr>
                                                <td>شهادات أخرى</td>
                                                <td colspan="5" rowspan="1"><textarea
                                                        name="AUTRE_DIPLOME" cols=50 rows=4 value="<?php echo $line['AUTRE_DIPLOME']; ?>"> </textarea></td>

                                            </tr>
                                            <tr>

                                                <td>الصنف</td>
                                                <td><input name="CATEGORIE" value="<?php echo $line['CATEGORIE']; ?>"
                                                           type="text"></td>
                                                <td>الرقم الإستدلالي</td>
                                                <td><input name="N_ISTIDLALI" value="<?php echo $line['N_ISTIDLALI']; ?>"
                                                           type="text"></td>


                                            </tr>
                                            <tr>
                                                <td>الرتبة الحالية </td>
                                                <td>

                                                    <select name="GRADE_ACTUEL"> 
                                                        <option value="<?php echo $line['GRADE_ACTUEL']; ?>"> <?php echo $line['GRADE_ACTUEL']; ?></option>
                                                        <?php
                                                        $retour = mysql_query("select distinct GRADE from tab_grade"); // afficher les classes
                                                        while ($a = mysql_fetch_array($retour)) {
                                                            echo '<option value="' . $a['GRADE'] . '">' . $a['GRADE'] . '</option>';
                                                        }
                                                        ?> 

                                                    </select>			  </td>
                                                <td>  تابع لمصلحة :</td> 
                                                <td> <select name="NOM_SERVICE"> 
                                                        <option value="<?php echo $line['NOM_SERVICE']; ?>"> <?php echo $line['NOM_SERVICE']; ?></option>
                                                        <?php
                                                        $retour = mysql_query("select distinct NOM_SERVICE from tab_services"); // afficher les classes
                                                        while ($a = mysql_fetch_array($retour)) {
                                                            echo '<option value="' . $a['NOM_SERVICE'] . '">' . $a['NOM_SERVICE'] . '</option>';
                                                        }
                                                        ?> 

                                                    </select>	 </td> 

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
                                                                            <option value="<?php echo $j1; ?>"><?php echo $j1; ?></option>	
    <?php include('fonction_date/jour.php'); ?>
                                                                        </select>
                                                                        <select name="MOIS_ARRETE"> 
                                                                            <option value="<?php echo $m1; ?>"><?php echo $m1; ?></option>	
    <?php include('fonction_date/mois.php'); ?>
                                                                        </select>
                                                                        <select name="ANNEE_ARRETE"> 
                                                                            <option value="<?php echo $a1; ?>"><?php echo $a1; ?></option>	
    <?php include('fonction_date/annee.php'); ?>

                                                                        </select></td>
                                                                    </tr>
                                                                    </tbody>
                                                                    </table>
                                                                    </fieldset>
                                                                    <input type="hidden" name="ID_EMPLOYEUE" value="<?php echo $line['ID_EMPLOYEUE']; ?>">
                                                                        <br>
                                                                            <input type="submit" name="modifier" value="تحديث"> &nbsp;&nbsp;&nbsp;
                                                                                <input type="reset" name="annule" value="إلغاء">



                                                                                    </form>
                                                                                    <?php
                                                                                }//if(isset($_GET['ID_EMPLOYEUR'])) 
                                                                                if (isset($_POST['modifier'])) {

                                                                                    if (!empty($_POST['NOM']) and ! empty($_POST['PRENOM']) and ! empty($_POST['LNS'])) {
                                                                                        $JOUR_DNS = $_POST['JOUR_DNS'];
                                                                                        $MOIS_DNS = $_POST['MOIS_DNS'];
                                                                                        $ANNEE_DNS = $_POST['ANNEE_DNS'];


                                                                                        $DNSs = $JOUR_DNS . "-" . $MOIS_DNS . "-" . $ANNEE_DNS;
                                                                                        $date = date_create($DNSs);
                                                                                        //$date1=new Date($DNSs);
                                                                                        $DNS = date_format($date, 'Y-m-d');
                                                                                        $LNS = $_POST['LNS'];
                                                                                        $NOM = $_POST['NOM'];
                                                                                        $PRENOM = $_POST['PRENOM'];
                                                                                        $ETAT_CIVIL = $_POST['ETAT_CIVIL'];
                                                                                        $NBR_ENFANT = $_POST['NBR_ENFANT'];
                                                                                        $ADRESSE = $_POST['ADRESSE'];
                                                                                        $N_ASSURENCE = $_POST['N_ASSURENCE'];
                                                                                        $N_CCP = $_POST['N_CCP'];
                                                                                        $N_MUTUEL = $_POST['N_MUTUEL'];
                                                                                        $SERVICE_NATIONAL = $_POST['SERVICE_NATIONAL'];
                                                                                        $DIPLOME = $_POST['DIPLOME'];
                                                                                        $JOUR_DIPLOME = $_POST['JOUR_DIPLOME'];
                                                                                        $MOIS_DIPLOME = $_POST['MOIS_DIPLOME'];
                                                                                        $ANNEE_DIPLOME = $_POST['ANNEE_DIPLOME'];

                                                                                        $DATE_DIPLOMEs = $JOUR_DIPLOME. "-" . $MOIS_DIPLOME . "-" . $ANNEE_DIPLOME;
                                                                                        $date2 = date_create($DATE_DIPLOMEs);
                                                                                        $DATE_DIPLOME = date_format($date2, 'Y-m-d');

                                                                                        $AUTRE_DIPLOME = $_POST['AUTRE_DIPLOME'];
                                                                                        $N_PV_INSTALL = $_POST['N_PV_INSTALL'];
                                                                                        $JOUR_PV = $_POST['JOUR_PV'];
                                                                                        $MOIS_PV = $_POST['MOIS_PV'];
                                                                                        $ANNEE_PV = $_POST['ANNEE_PV'];
                                                                                        $DATE_PV_INSTALLs = $JOUR_PV . "-" . $MOIS_PV . "-" . $ANNEE_PV;
                                                                                        $date3 = date_create($DATE_PV_INSTALLs);
                                                                                        $DATE_PV_INSTALL = date_format($date3, 'Y-m-d');

                                                                                        $GRADE = $_POST['GRADE'];
                                                                                        $CATEGORIE = $_POST['CATEGORIE'];
                                                                                        $N_ISTIDLALI = $_POST['N_ISTIDLALI'];

                                                                                        $TEL = $_POST['TEL'];
                                                                                        $ARRETE = $_POST['ARRETE'];
                                                                                        $JOUR_ARRETE = $_POST['JOUR_ARRETE'];
                                                                                        $MOIS_ARRETE = $_POST['MOIS_ARRETE'];
                                                                                        $ANNEE_ARRETE = $_POST['ANNEE_ARRETE'];
                                                                                        $DATE_ARRETEs = $JOUR_ARRETE . "-" . $MOIS_ARRETE . "-" . $ANNEE_ARRETE;
                                                                                        $date4 = date_create($DATE_ARRETEs);
                                                                                        $DATE_ARRETE = date_format($date4, 'Y-m-d');

                                                                                        $GRADE_ACTUEL = $_POST['GRADE_ACTUEL'];
                                                                                        $ID_EMPLOYEUE = $_POST['ID_EMPLOYEUE'];
                                                                                        $PRESUME_A = $_POST['PRESUME'];
                                                                                        if ($PRESUME_A == 'لا') {
                                                                                            $PRESUME = "0";
                                                                                        } else {
                                                                                            $DNSs = $ANNEE_DNS . "-" . '01' . "-" . '01';
                                                                                            $date = date_create($DNSs);

                                                                                            $DNS = date_format($date, 'Y-m-d');
                                                                                            $PRESUME = "1";
                                                                                        }

                                                                                        mysql_query("update employeur set NOM='$NOM', PRENOM='$PRENOM', DNS='$DNS', LNS='$LNS', ETAT_CIVIL='$ETAT_CIVIL', NBR_ENFANT='$NBR_ENFANT', ADRESSE='$ADRESSE',
	 N_ASSURENCE='$N_ASSURENCE', N_CCP='$N_CCP', N_MUTUEL='$N_MUTUEL',
		 SERVICE_NATIONAL='$SERVICE_NATIONAL',DIPLOME= '$DIPLOME', DATE_DIPLOME='$DATE_DIPLOME', AUTRE_DIPLOME='$AUTRE_DIPLOME', N_PV_INSTALL='$N_PV_INSTALL', 
		 DATE_PV_INSTALL='$DATE_PV_INSTALL', GRADE='$GRADE', CATEGORIE='$CATEGORIE', N_ISTIDLALI='$N_ISTIDLALI',TEL='$TEL',
		 ARRETE='$ARRETE', DATE_ARRETE='$DATE_ARRETE', GRADE_ACTUEL='$GRADE_ACTUEL',PRESUME=b'$PRESUME' where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
                                                                                        ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التحديث بنجاح!");</SCRIPT> 
                                                                                        <?php
                                                                                    }
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