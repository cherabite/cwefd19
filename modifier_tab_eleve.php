<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>



        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>MODIFICATION_ELEVE</title>
        <script type="text/javascript">
            function test(value) {
                if (parseInt(value) == value)
                    alert('ok');
                else
                    alert('أدخل عدد');
            }
        </script>
    </head>

    <body style="direction: rtl;">
	<?php
// On démarre la session
session_start();
if(!isset($_SESSION['corecteur'])){
 header('Location:indexx.php');die;	
}
?>
        <div id="wrapper">
            <table style="text-align: right; width: 100%;" align="right"
                   border="1" cellpadding="0" cellspacing="2">		
                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>


                <tr>
                    <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>


                <tr> 
                    <td style="text-align: right; width: 203px;" >
                        <?php include('includes/sidebar_eleve.php'); ?>
                    </td>

                    <td style="vertical-align: top;"> 
                        <?php
                        mysql_connect("localhost", "root", "");
                        mysql_select_db("base_crefd_19");
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        ?>


                        <?php
                        if (isset($_GET['MATR'])) {
                            $MATR = $_GET['MATR'];
                            $don = mysql_query("select * from tab_eleve where MATR=$MATR ");
                            $nb = mysql_num_rows($don);
                           
                            $line = mysql_fetch_array($don);
                            $dns = strtotime($line['DATE_NAIS']);
                            $PRESUME = $line['PRESUME'];
							$PRESUME0= $PRESUME;
							$DNS0=$line['DATE_NAIS'];
							$NOM0 = $line['NOM'];
							$PRENOM0 = $line['PRENOM'];
							$LNS0= $line['LIEU_NAIS'];
							$DATE_MODIFICATION = date('Y-m-d');
							//$NUM_USER=$_SESSION['NUM_USER'];
							$MATR0=$MATR;
							$ICODE0=$line['CD_CLAS'];
							$IANNEE0=$line['COD_ANN'];
							
if(isset($_SESSION['NUM_USER'])){
$NUM_USER=$_SESSION['NUM_USER'];  }
                            ?>


                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                                <table style="text-align: left; width: 100%;" border="1"
                                       cellpadding="2" cellspacing="2">
                                    <tbody>
                                        <tr style="text-decoration: underline;">
                                            <td colspan="2" rowspan="1"
                                                style="font-weight: bold; text-align: center;"><br>
                                                    طلب تصحيح المعلومات<br>
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right; font-weight: bold;">المستوى</td>
                                                            <td style="text-align: right; font-weight: bold;"><?php echo $line['CD_CLAS']; ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right; font-weight: bold;">السنة
                                                                الدراسية :</td>
                                                            <td style="text-align: right; font-weight: bold;"><?php echo $line['COD_ANN']; ?> </td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right; font-weight: bold;">اللقب
                                                                :</td>
                                                            <td style="text-align: right; font-weight: bold;"><input
                                                                    name="NOM" value="<?php echo $line['NOM']; ?>" type="text"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right; font-weight: bold;">الاسم
                                                                :</td>
                                                            <td style="text-align: right; font-weight: bold;"><input
                                                                    name="PRENOM" value="<?php echo $line['PRENOM']; ?>" type="text"></td>
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right; font-weight: bold;">تاريخ
                                                                الميلاد :</td>
                                                            <td style="text-align: right; font-weight: bold;">
                                                                <select name="JOUR_DNS" > 

                                                                    <option value="<?php echo date('d', $dns); ?>"><?php echo date('d', $dns); ?></option>		
    <?php include('fonction_date/jour.php'); ?>
                                                                </select>
                                                                <select name="MOIS_DNS" > 
                                                                    <option value="<?php echo date('m', $dns); ?>"><?php echo date('m', $dns); ?></option>	
    <?php include('fonction_date/mois.php'); ?>
                                                                </select>
                                                                <select name="ANNEE_DNS" > 
                                                                    <option value="<?php echo date('Y', $dns); ?>"><?php echo date('Y', $dns); ?></option>	
    <?php include('fonction_date/annee.php'); ?>

                                                                </select>  مفترض : <select  name="PRESUME" >
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
                                                        </tr>
                                                        <tr>
                                                            <td style="text-align: right; font-weight: bold;">مكان
                                                                الميلاد :</td>
                                                            <td style="text-align: right; font-weight: bold;"><input
                                                                    name="LNS" value="<?php echo $line['LIEU_NAIS']; ?>" type="text"></td>
                                                        </tr>
                                                        <tr style="font-weight: bold;" align="right">
                                                            <td colspan="2" rowspan="1"><br>
                                                                    <input type="hidden" name="MATR" value="<?php echo $line['MATR']; ?>">
																	<input type="hidden" name="MATR0" value="<?php echo $MATR0; ?>">
                                                                            <input type="hidden" name="NOM0" value="<?php echo $NOM0; ?>">
                                                                                <input type="hidden" name="PRENOM0" value="<?php echo $PRENOM0; ?>">
																				<input type="hidden" name="DATE_MODIFICATION" value="<?php echo $DATE_MODIFICATION; ?>">
                                                                            <input type="hidden" name="DNS0" value="<?php echo $DNS0; ?>">
                                                                                <input type="hidden" name="LNS0" value="<?php echo $LNS0; ?>">
																				<input type="hidden" name="NUM_USER" value="<?php echo $NUM_USER; ?>">
                                                                            <input type="hidden" name="PRESUME0" value="<?php echo $PRESUME0; ?>">
																			<input type="hidden" name="IANNEE0" value="<?php echo $IANNEE0; ?>">
                                                                            <input type="hidden" name="ICODE0" value="<?php echo $ICODE0; ?>">
                                                                        <br>
                                                                            <input type="submit" name="modifier" value="تحديث">
                                                                                </td>
                                                                                </tr>
                                                                                </tbody>
                                                                                </table>

                                                                                </form>
    <?php
}
if (isset($_POST['modifier'])) {

    if (!empty($_POST['NOM']) and ! empty($_POST['PRENOM']) and ! empty($_POST['LNS'])) {

        $JOUR_DNS = $_POST['JOUR_DNS'];
        $MOIS_DNS = $_POST['MOIS_DNS'];
        $ANNEE_DNS = $_POST['ANNEE_DNS'];

        $MATR = $_POST['MATR'];
        $DNSs = $JOUR_DNS . "-" . $MOIS_DNS . "-" . $ANNEE_DNS;
        $date = date_create($DNSs);

        $DNS = date_format($date, 'Y-m-d');
        $LNS = $_POST['LNS'];
        $NOM = $_POST['NOM'];
        $PRENOM = $_POST['PRENOM'];
        $PRESUME_A = $_POST['PRESUME'];
        if ($PRESUME_A == 'لا') {
            $PRESUME = "0";
        } else {
            $DNSs = $ANNEE_DNS . "-" . '01' . "-" . '01';
            $date = date_create($DNSs);

            $DNS = date_format($date, 'Y-m-d');
            $PRESUME = "1";
        }
       $PRESUME0=  $_POST['PRESUME0'];
							$DNS0= $_POST['DNS0'];
							//$DNS00 = date_format($DNS0, 'Y-m-d');
							$NOM0 =  $_POST['NOM0'];
							$PRENOM0 = $_POST['PRENOM0'];
							$LNS0=  $_POST['LNS0'];
							$DATE_MODIFICATION =  $_POST['DATE_MODIFICATION'];
							$NUM_USER= $_POST['NUM_USER'];
							$MATR0=  $_POST['MATR0'];
							$ICODE0 =  $_POST['ICODE0'];
							$IANNEE0= $_POST['IANNEE0'];
        mysql_query("update tab_eleve set NOM='$NOM', PRENOM='$PRENOM', DATE_NAIS='$DNS', LIEU_NAIS='$LNS', PRESUME=b'$PRESUME'  where MATR='$MATR' ");
		$sql_inser = "INSERT  INTO modification_user (NOM, PRENOM, DNS, LNS, PRESUME, MATR, ICODE,IANNEE,DATE_MODIFICATION,NUM_USER)
                             VALUES ('$NOM0', '$PRENOM0', '$DNS0', '$LNS0', '$PRESUME0', '$MATR0', '$ICODE0','$IANNEE0','$DATE_MODIFICATION','$NUM_USER') ";
                                    mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
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