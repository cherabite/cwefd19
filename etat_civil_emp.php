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
        <title>formulaire employeur</title>
        
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
                        if (isset($_POST['inserer'])) {

                            if (!empty($_POST['NOM']) and ! empty($_POST['PRENOM']) and ! empty($_POST['LNS']) and ! empty($_POST['JOUR_DNS']) and ! empty($_POST['MOIS_DNS']) and ! empty($_POST['ANNEE_DNS'])) {
                                $JOUR_DNS = $_POST['JOUR_DNS'];
                                $MOIS_DNS = $_POST['MOIS_DNS'];
                                $ANNEE_DNS = $_POST['ANNEE_DNS'];


                                $DNSs = $ANNEE_DNS . "-" . $MOIS_DNS . "-" . $JOUR_DNS;
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

                                $DATE_DIPLOMEs = $ANNEE_DIPLOME . "-" . $MOIS_DIPLOME . "-" . $JOUR_DIPLOME;
                                $date2 = date_create($DATE_DIPLOMEs);
                                $DATE_DIPLOME = date_format($date2, 'Y-m-d');
                                $AUTRE_DIPLOME = $_POST['AUTRE_DIPLOME'];
                                $N_PV_INSTALL = $_POST['N_PV_INSTALL'];
                                $JOUR_PV = $_POST['JOUR_PV'];
                                $MOIS_PV = $_POST['MOIS_PV'];
                                $ANNEE_PV = $_POST['ANNEE_PV'];

                                $DATE_PV_INSTALLs = $ANNEE_PV . "-" . $MOIS_PV . "-" . $JOUR_PV;
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

                                $DATE_ARRETEs = $ANNEE_ARRETE . "-" . $MOIS_ARRETE . "-" . $JOUR_ARRETE;
                                $date4 = date_create($DATE_ARRETEs);
                                $DATE_ARRETE = date_format($date4, 'Y-m-d');
                                $GRADE_ACTUEL = $_POST['GRADE_ACTUEL'];
                                $NOM_SERVICE = $_POST['NOM_SERVICE'];
                                $PRESUME_A = $_POST['PRESUME'];
                                if ($PRESUME_A == 'لا') {
                                    $PRESUME = "0";
                                } else {
                                    $DNSs = $ANNEE_DNS . "-" . '01' . "-" . '01';
                                    $date = date_create($DNSs);

                                    $DNS = date_format($date, 'Y-m-d');
                                    $PRESUME = "1";
                                }
                                $nbr = mysql_fetch_array(mysql_query("select count(*) as nb from employeur where NOM='$NOM' and  PRENOM= '$PRENOM'"));
                                if ($nbr['nb'] > 0) {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! موجود");</SCRIPT> <?php
                                } else {

                                    $sql_inser = "INSERT  INTO employeur (NOM, PRENOM, DNS, LNS, ETAT_CIVIL, NBR_ENFANT, ADRESSE, N_ASSURENCE, N_CCP, N_MUTUEL,
		 SERVICE_NATIONAL, DIPLOME, DATE_DIPLOME, AUTRE_DIPLOME, N_PV_INSTALL, DATE_PV_INSTALL, GRADE, CATEGORIE, N_ISTIDLALI,TEL,
		 ARRETE, DATE_ARRETE, GRADE_ACTUEL,NOM_SERVICE,PRESUME)
                             VALUES ('$NOM', '$PRENOM', '$DNS', '$LNS', '$ETAT_CIVIL', '$NBR_ENFANT', '$ADRESSE', '$N_ASSURENCE', '$N_CCP', '$N_MUTUEL',
		 '$SERVICE_NATIONAL', '$DIPLOME', '$DATE_DIPLOME', '$AUTRE_DIPLOME', '$N_PV_INSTALL', '$DATE_PV_INSTALL', '$GRADE', '$CATEGORIE', '$N_ISTIDLALI','$TEL',
		 '$ARRETE', '$DATE_ARRETE', '$GRADE_ACTUEL','$NOM_SERVICE',b'$PRESUME') ";
                                    mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
                                    /*   $sql_inser = "INSERT  INTO employeur (NOM, PRENOM, DNS, LNS)
                                      VALUES ('$NOM', '$PRENOM','$DNS','$LNS') " ;
                                      mysql_query($sql_inser) or die('Erreur SQL !<br />'.$sql_inser.'<br />'.mysql_error()) ; */
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التسجيل بنجاح");</SCRIPT> <?php
                                }
                            } else {
                                ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
                                }
                            }
                            ?>


                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire" name="f1" onsubmit="return verif();">
                            <fieldset><legend style="caption-side: right;">معلومات الحالة المدنية للموظف </legend>
                                <table align="right" border="1"
                                       cellpadding="2" cellspacing="2" ; >
                                    <tbody>
                                        <tr>

                                            <td>اللقب</td>
                                            <td> <input name="NOM" value=""
                                                        type="text"  ></td>

                                            <td>الاسم</td>
                                            <td> <input name="PRENOM" value=""
                                                        type="text"></td>

                                        </tr>
                                        <tr>
                                            <td>تاريخ الميلاد</td>     
                                            <td>
                                                <select name="JOUR_DNS"> 
                                                    <option selected > </option>
<?php include('fonction_date/jour.php'); ?>
                                                </select>
                                                <select name="MOIS_DNS"> 
                                                    <option selected > </option>
                                                    <?php include('fonction_date/mois.php'); ?>
                                                </select>
                                                <select name="ANNEE_DNS"> 
                                                    <option selected > </option>
                                                    <?php include('fonction_date/annee.php'); ?>
                                                </select>&nbsp;مفترض : <select  name="PRESUME" > <option> نعم </option> <option selected> لا</option> </select>
                                            </td>
                                            <td>مكان الميلاد</td>
                                            <td><input name="LNS" value=""
                                                       type="text" size=50 maxlength=150></td>


                                        </tr>
                                        <tr>
                                            <td>الحالة المدنية</td>
                                            <td><select  name="ETAT_CIVIL" > <option> متزوج </option><option> أعزب </option> <option selected> </option> </select></td>
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
                                                                                            <option selected > 00</option>
<?php include('fonction_date/jour.php'); ?>
                                                                                        </select>
                                                                                        <select name="MOIS_PV"> 
                                                                                            <option selected >00 </option>
                                                                                            <?php include('fonction_date/mois.php'); ?>
                                                                                        </select>
                                                                                        <select name="ANNEE_PV"> 
                                                                                            <option selected > 0000</option>
                                                                                            <?php include('fonction_date/annee.php'); ?>
                                                                                        </select>
                                                                                        <td>في رتبة</td>
                                                                                        <td> <select name="GRADE"> 
                                                                                            <?php
                                                                                            $retour = mysql_query("select distinct GRADE from tab_grade"); // afficher les classes
                                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                                echo '<option value="' . $a['GRADE'] . '">' . $a['GRADE'] . '</option>';
                                                                                            }
                                                                                            ?>  
                                                                                                <option selected> </option>
                                                                                            </select> </td>


                                                                                </tr>
                                                                                <tr>
                                                                                    <td>الشهادة</td>
                                                                                    <td><input name="DIPLOME" value=""
                                                                                               type="text" size=60 maxlength=150></td>
                                                                                    <td>الصادرة بتاريخ</td>
                                                                                    <td>
                                                                                        <select name="JOUR_DIPLOME"> 
                                                                                            <option selected > 00</option>
<?php include('fonction_date/jour.php'); ?>
                                                                                        </select>
                                                                                        <select name="MOIS_DIPLOME"> 
                                                                                            <option selected > 00</option>
                                                                                            <?php include('fonction_date/mois.php'); ?>
                                                                                        </select>
                                                                                        <select name="ANNEE_DIPLOME"> 
                                                                                            <option selected > 0000</option>
                                                                                            <?php include('fonction_date/annee.php'); ?>
                                                                                        </select>
                                                                                    </td>


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
                                                                                    <td>

                                                                                        <select name="GRADE_ACTUEL"> 
<?php
$retour = mysql_query("select distinct GRADE from tab_grade"); // afficher les classes
while ($a = mysql_fetch_array($retour)) {
    echo '<option value="' . $a['GRADE'] . '">' . $a['GRADE'] . '</option>';
}
?> 
                                                                                            <option selected> </option>
                                                                                        </select>			  </td>

                                                                                    <td>  تابع لمصلحة :</td> 
                                                                                    <td> <select name="NOM_SERVICE"> 
<?php
$retour = mysql_query("select distinct NOM_SERVICE from tab_services"); // afficher les classes
while ($a = mysql_fetch_array($retour)) {
    echo '<option value="' . $a['NOM_SERVICE'] . '">' . $a['NOM_SERVICE'] . '</option>';
}
?> 
                                                                                            <option selected> </option>
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
                                                                                                                <option selected > 00</option>
<?php include('fonction_date/jour.php'); ?>
                                                                                                            </select>
                                                                                                            <select name="MOIS_ARRETE"> 
                                                                                                                <option selected > 00</option>
<?php include('fonction_date/mois.php'); ?>
                                                                                                            </select>
                                                                                                            <select name="ANNEE_ARRETE"> 
                                                                                                                <option selected > 0000</option>
<?php include('fonction_date/annee.php'); ?>
                                                                                                            </select>
                                                                                                        </td>
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