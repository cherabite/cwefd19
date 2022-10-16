<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>



        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>
        <script language="JavaScript"> 
                          
function verif() {

a=document.f1.JOUR_RET.value;
b=document.f1.MOIS_RET.value;
c=document.f1.ANNEE_RET.value;
d=document.f1.HEUR_RET.value;
e=document.f1.MUNITE_RET.value;
if (a=="" || b=="" || c=="") {
alert ("أدخل تاريخ اليوم");
valid = false;
return valid;
document.f1.JOUR_RET.focus();
}
if (d=="" || e=="") {
alert ("ادخل التوقيت");
valid = false;
return valid;
document.f1.HEUR_RET.focus();
}

}
</script>
        <title>عطلة مرضية </title>

    </head>
    <body style="direction: rtl;">


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
                <td> 


                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'grh';


                    $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                    mysql_select_db($db) or die('Erreur :' . mysql_error());
                    mysql_query("set character_set_server='utf8'");
                    mysql_query("set names 'utf8'");

                    if (isset($_GET['ID_EMPLOYEUE'])) {
                        $ID_EMPLOYEUE = $_GET['ID_EMPLOYEUE'];
                        $req = mysql_query("select * from employeur where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
                        $nbr = mysql_fetch_array($req);
                        ?>

                        <h3>تسجيل عطلة </h3>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire" name="f1" onsubmit="return verif();">
                            <table
                                style="width: 100%; text-align: right; margin-left: auto; margin-right: 0px;" border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td>  الاسم و اللقب</td>
                                        <td colspan="5" rowspan="1"> <?php echo $nbr['NOM'] . "  " . $nbr['PRENOM']; ?></td>

                                    </tr>
                                    <tr>
                                        <td>الوظيفة</td>
                                        <td colspan="5" rowspan="1"> <?php echo $nbr['GRADE']; ?></td>

                                    </tr>
                                    <tr>
                                        <td>(غياب) عطلة مرضية</td>
                                        <td> التاريخ من :
                                        </td>
                                        <td> <select name="JOUR_RET"> 
                                                <option selected > </option> <?php include('fonction_date/jour.php'); ?>
                                            </select>
                                            <select name="MOIS_RET"> 
                                                <option selected > </option>
    <?php include('fonction_date/mois.php'); ?>
                                            </select>
                                            <select name="ANNEE_RET"> 
                                                <option selected > 2018 </option>
    <?php include('fonction_date/annee.php'); ?>
                                            </select></td>
                                        <td>
                                            تاريخ نهاية العطلة 
                                        </td>
                                        <td> 
										<select name="JOUR_REV"> 
                                                <option selected > </option> <?php include('fonction_date/jour.php'); ?>
                                            </select>
                                            <select name="MOIS_REV"> 
                                                <option selected > </option>
    <?php include('fonction_date/mois.php'); ?>
                                            </select>
                                            <select name="ANNEE_REV"> 
                                                <option selected > 2018 </option>
    <?php include('fonction_date/annee.php'); ?>
                                            </select></td>
                                        </td>


                                    </tr>
                                    <tr>
                                        <td>طبيعة العطلة  </td>
                                        <td>
                                            <select name="T_ABS"> 
                                                <option selected > </option>
												<option>أيام تكوينية</option>
												<option>مهمة إدارية</option>
                                                <option> عطلة مرضية</option>
                                                <option> عطلة أمومة</option>
												<option> عطلة مولود جديد</option>
                                                <option>عطلة ختان ولد</option>
												<option>عطلة زواج</option>
												<option>عطلة وفاة</option>
												<option>عطلة أسباب شخصية/عائلية</option>
												<option>قـرار توقيف</option>
												<option>أسباب مجهولة</option>

                                        </td>
										<td>التبرير :  </td>
                                        <td>
                                            <select name="PROUVE"> 
                                                <option selected > </option>
                                                <option> مبرر</option>
                                                <option> غير مبرر</option>

                                        </td>

                                    </tr>
                                </tbody>
                            </table>
                            <input type="hidden" name="ID_EMPLOYEUE" value="<?php echo $nbr['ID_EMPLOYEUE']; ?>">
                                <input type="submit" name="inserer" value="تاكيد">
                                    </form>
    <?php
}

if (isset($_POST['inserer'])) {
    if (!empty($_POST['JOUR_RET']) and ! empty($_POST['MOIS_RET']) and ! empty($_POST['ANNEE_RET']) and ! empty($_POST['JOUR_REV']) and ! empty($_POST['MOIS_REV']) and ! empty($_POST['ANNEE_REV'])) {
        $ID_EMPLOYEUE = $_POST['ID_EMPLOYEUE'];
        $JOUR_RET = $_POST['JOUR_RET'];
        $MOIS_RET = $_POST['MOIS_RET'];
        $ANNEE_RET = $_POST['ANNEE_RET'];
        $PROUVE = $_POST['PROUVE'];
        $JOUR_REV = $_POST['JOUR_REV'];
        $MOIS_REV = $_POST['MOIS_REV'];
		$ANNEE_REV = $_POST['ANNEE_REV'];
       
        $DATE_RETs = $ANNEE_RET . "-" . $MOIS_RET . "-" . $JOUR_RET;
		$DATE_REVs = $ANNEE_REV . "-" . $MOIS_REV . "-" . $JOUR_REV;
        $date = date_create($DATE_RETs);
        $date1 = date_create($DATE_REVs);
        $DATE_RET = date_format($date, 'Y-m-d');
        $DATE_REV = date_format($date1, 'Y-m-d');
        $TYPR_RET = $_POST['T_ABS'];
        $nbr = mysql_fetch_array(mysql_query("select count(*) as nb from tab_retard where TYPR_RET='$TYPR_RET' and  DATE_RET= '$DATE_RET' and DATE_REVENIR_CONGE='$DATE_REV'  and ID_EMPLOYEUE='$ID_EMPLOYEUE'"));
        if ($nbr['nb'] > 0) {
            ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! موجود");</SCRIPT> <?php
                                        } else {
                                            $sql_inser = "INSERT  INTO tab_retard (ID_EMPLOYEUE, TYPR_RET, DATE_RET, DATE_REVENIR_CONGE,PROUVE)
                             VALUES ('$ID_EMPLOYEUE', '$TYPR_RET','$DATE_RET','$DATE_REV','$PROUVE') ";
                                            mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
                                            ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التسجيل بنجاح");</SCRIPT> <?php
                                        }

                                        $requete = mysql_query("select * from tab_retard  where ID_EMPLOYEUE='$ID_EMPLOYEUE' ORDER BY DATE_RET  DESC ");
                                        $line = mysql_fetch_array($requete);
                                        $nb = mysql_num_rows($requete);
                                        if ($nb > 0) {
                                            echo('    
                          			   <h3>  الغيابات و التأخرات للموظف :   </h3> 
				   
                      <table border="2">
				<tr  style="background-color: rgb(8, 173, 255);">
				<td>  رقم  </td>
			   <td> طبيعة الغيابات </td>
			   <td>  التاريخ </td>
			   <td>  توقيت التأخرات </td>
			   <td> توقيت الخروج  </td>
			   <td> توقيت الرجوع  </td>
			   <td> نهاية عطلة الغياب  </td>
			   <td> تبرير التأخر </td>
			   
			    <td colspan="6" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
                                            $req = mysql_query("select * from tab_retard  where ID_EMPLOYEUE='$ID_EMPLOYEUE' ORDER BY DATE_RET  DESC ");
                                            $no = 1;
                                            while ($nbr = mysql_fetch_array($req)) {

                                                echo ('
				 <tr>
			    <td> ' . $no . '</td>
				<td> ' . $nbr['TYPR_RET'] . '</</td>
				 <td> ' . $nbr['DATE_RET'] . '</ </td>
				<td>  ' . $nbr['HEUR_ENTRE_RET'] . '</ </td>
				 <td> ' . $nbr['HEUR_SORTIR'] . '</  </td>
				<td> ' . $nbr['HEUR_REVENIR'] . '</ </td>
				<td> ' . $nbr['DATE_REVENIR_CONGE'] . '</ </td>
				<td> ' . $nbr['PROUVE'] . '</ </td>
				
			   <td><a href="function_supprimer_retard.php?ID_RET=' . $nbr['ID_RET'] . '" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce retard?\'));" >حذف</a></td>
			   <td><a href="questionnaire.php?ID_RET= ' . $nbr['ID_RET'] . ' & ID_EMPLOYEUE=' . $nbr['ID_EMPLOYEUE'] . ' "> إستفسار </a></td>
			   
			
				</tr>');
                                                $no = $no + 1;
                                            }
                                            echo' </table>	';
                                            ?> <br><a href="retard_absence.php"> الرجوع إلى حجز الغياب</a><?php
                                            } 
                                        }else {
                                                ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
                                            }
                                    }
                                    ?>
                                    </td> 

                                    </tr> 


                                    <tr>
                                        <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
                                    </table



                                    </body>

                                    </html>