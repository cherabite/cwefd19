<?php
// On démarre la session
session_start();

if (isset($_SESSION['inventaire']) or isset($_SESSION['admin']) ) {
    
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>
   
  <script language="JavaScript"> 
     
function verif() {

a=document.f1.NUM_INV.value;

b=document.f1.NOM_INV_ARA.value;
c=document.f1.NOM_INV_LAT.value;
d=document.f1.TYPE_INV.value;
e=document.f1.ETAT_INV.value;
f=document.f1.NUM_BUR.value;
if (a=="") {
alert ("Vous devez remplir le champ Nun inventaire:");
valid = false;
return valid;
document.f1.NUM_INV.focus();
}
if (b=="" && c=="") {
alert ("Vous devez remplir le champ Nom inventaire (Arabe ou francais):");
valid = false;
return valid;
document.f1.NOM_INV_LAT.focus();
}
if (d=="") {
alert ("Vous devez remplir le champ type inventaire:");
valid = false;
return valid;
document.f1.TYPE_INV.focus();
}
if (e=="") {
alert ("Vous devez remplir le champ etat inventaire:");
valid = false;
return valid;
document.f1.ETAT_INV.focus();
}
if (f=="") {
alert ("Vous devez remplir le champ numero de bureau inventaire:");
valid = false;
return valid;
document.f1.NUM_BUR.focus();
}


}
</script>
        <title>Ajouter inventaire</title>

    </head>

    <body style="direction: ">
        <div id="wrapper">
            <table style=" width: 100%;" 
                   border="1" cellpadding="0" cellspacing="2">		
                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>


                <tr>
                    <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>


                <tr> 
                    <td style="vertical-align: top; width: 203px;" >
                        <?php include('includes/sidebar_inventaire.php'); ?>
                    </td>
                    <td style="vertical-align: top;"> 

                        <?php
                        mysql_connect("localhost", "root", "");
                        mysql_select_db("gestion_stock");
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        ?>


                        <?php
                        if (isset($_POST['inserer'])) {
                            if ($_POST['NOM_INV_ARA'] == '' and $_POST['NOM_INV_LAT'] == '') {
                                ?> <SCRIPT LANGUAGE="Javascript">	alert("أدخل اسم السلعة بالعربية أو الفرنسية");</SCRIPT> <?php
                            }
                            if (!empty($_POST['NUM_INV']) and ! empty($_POST['TYPE_INV']) and ! empty($_POST['ETAT_INV']) and ! empty($_POST['NUM_BUR'])) {
                                $JOUR_UTI = $_POST['JOUR_UTI'];
                                $MOIS_UTI = $_POST['MOIS_UTI'];
                                $ANNEE_UTI = $_POST['ANNEE_UTI'];
                                $DNSs = $ANNEE_UTI . "-" . $MOIS_UTI . "-" . $JOUR_UTI;
                                $date = date_create($DNSs);
                                //$date1=new Date($DNSs);`ID_INV`, `NUM_INV`, `NOM_INV_LAT`, `NOM_INV_ARA`, `TYPE_INV`, `ETAT_INV`, `NUM_BUR`, `DATE_UTI`
                                $DATE_UTI = date_format($date, 'Y-m-d');
                                $NUM_INV = $_POST['NUM_INV'];
                                $NOM_INV_LAT = $_POST['NOM_INV_LAT'];
                                $NOM_INV_ARA = $_POST['NOM_INV_ARA'];
                                $TYPE_INV = $_POST['TYPE_INV'];
                                $ETAT_INV = $_POST['ETAT_INV'];
                                $NUM_BUR = $_POST['NUM_BUR'];
                                $etat = 'DESTRUCTION';
                                $ques = mysql_fetch_array(mysql_query("select count(*) as nb from inventaire where NUM_INV='$NUM_INV' and  ETAT_INV!= '$etat'"));
                                if ($ques['nb'] > 0) {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! موجود");</SCRIPT> <?php
                                } else {
                                    $sql_inser = "INSERT  INTO inventaire (NUM_INV, NOM_INV_LAT, NOM_INV_ARA, TYPE_INV, ETAT_INV, NUM_BUR, DATE_UTI)
                             VALUES ('$NUM_INV', '$NOM_INV_LAT', '$NOM_INV_ARA', '$TYPE_INV', '$ETAT_INV', '$NUM_BUR', '$DATE_UTI') ";
                                    mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التسجيل بنجاح");</SCRIPT> <?php
                                    }
                                } else {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
                                }
                            }
                            ?>

                        <form method="post" name="f1" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire" onsubmit="return verif();">
                            <fieldset><legend style="caption-side: right;">INFO INVENTAIRE </legend>
                                <br>
                                    <table style="text-align: left; width: 60%;" border="1"
                                           cellpadding="2" cellspacing="2">
                                        <tbody>
                                            <tr>
                                                <td style=" width: 30%;">Num inventaire :</td>
                                                <td><input name="NUM_INV" value=""type="text"></td>
                                            </tr>
                                            <tr>
                                                <td>Nom inentaire :</td>
                                                <td><input name="NOM_INV_LAT" value=""type="text" size=50></td>
                                            </tr>
                                            <tr>
                                                <td>إسم السلعة بالعربية&nbsp; :</td>
                                                <td><input name="NOM_INV_ARA" value=""type="text"size=50></td>
                                            </tr>
                                            <tr>
                                                <td>Type inventaire :</td>
                                                <td><select  name="TYPE_INV" > <option>  ONEFD  </option><option>DONT  </option> <option>ACHAT  </option> <option selected> </option> </select></td>
                                            </tr>
                                            <tr>
                                                <td>Etat inventaire :</td>
                                                <td><select  name="ETAT_INV" > <option>  STOCK  </option><option>UTILISER  </option>  <option selected> </option> </select></td>
                                            </tr>
                                            <tr>
                                                <td>Num_Bureau :</td>
                                                <td><select  name="NUM_BUR" >
												<?php
                                                                                            $retour = mysql_query("select distinct NUM_BUR from inventaire"); // afficher les classes
                                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                                echo '<option value="' . $a['NUM_BUR'] . '">' . $a['NUM_BUR'] . '</option>';
                                                                                            }
                                                                                            ?> 
                                            </tr>
                                            <tr>
                                                <td>Date D'utilisation : </td> 
                                                <td>
                                                    <select name="JOUR_UTI"> 
                                                        <option selected > 00</option>
<?php include('fonction_date/jour.php'); ?>
                                                    </select>
                                                    <select name="MOIS_UTI"> 
                                                        <option selected > 00</option>
<?php include('fonction_date/mois.php'); ?>
                                                    </select>
                                                    <select name="ANNEE_UTI"> 
                                                        <option selected > 0000</option>
                                                        <?php include('fonction_date/annee.php'); ?>
                                                    </select>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td colspan="2" rowspan="1"  style="text-align:center">  <input type="submit" name="inserer" value="Ajouter"></td>

                                            </tr>
                                        </tbody>
                                    </table>
                            </fieldset>
                        </form > 
                    </td> 




                </tr> 


                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
            </table

        </div>

    </body>

</html>
<?php
    } else {
        ?> <SCRIPT LANGUAGE="Javascript">	alert("ليس لديك الصلاحية");
            window.location.href = 'indexx.php';
           // exit();
        </SCRIPT> <?php
    }
?>