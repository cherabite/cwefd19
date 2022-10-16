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
a=document.f1.N_PV.value;
if (a=="" ) {
alert ("Entrer N PV");
valid = false;
return valid;
document.f1.N_PV.focus();
}else{
var confirmation = confirm( "هل تريد حفظ التغييرات ?" ) ;
        if( confirmation )
        return true ;
    return false
}
}


 

</script>
        <title>destruction inventaire</title>

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

                        if (isset($_GET['ID_INV'])) {
                            $ID_INV = $_GET['ID_INV'];


                            $don = mysql_query("select * from inventaire where ID_INV='$ID_INV' ");
                            $nb = mysql_num_rows($don);
                            // echo $nb;
                            $line = mysql_fetch_array($don);
                            $dd = strtotime($line['DATE_UTI']);
                            ?>



                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire" name="f1" onsubmit="return verif();" >
                                <fieldset><legend style="caption-side: right;">DESTRUCTION INVENTAIRE</legend>
                                    <br>
                                        <table style="text-align: left; width: 60%;" border="1"
                                               cellpadding="2" cellspacing="2">
                                            <tbody>
                                                <tr>
                                                    <td style=" width: 20%;">Num inventaire</td>
                                                    <td><?php echo $line['NUM_INV']; ?><input name="NUM_INV" value="<?php echo $line['NUM_INV']; ?>"type="hidden"></td>
                                                </tr>
                                                <tr>
                                                    <td>Nom inentaire</td>
                                                    <td><?php echo $line['NOM_INV_LAT']; ?><input name="NOM_INV_LAT" value="<?php echo $line['NOM_INV_LAT']; ?>"type="hidden" size=50></td>
                                                </tr>
                                                <tr>
                                                    <td>إسم السلعة بالعربية</td>
                                                    <td><?php echo $line['NOM_INV_ARA']; ?><input name="NOM_INV_ARA" value="<?php echo $line['NOM_INV_ARA']; ?>"type="hidden"size=50></td>
                                                </tr>


                                                <tr>
                                                    <td>Date De destruction</td> 
                                                    <td>
                                                        <select name="JOUR_UTI"> 

    <?php include('fonction_date/jour.php'); ?>
                                                        </select>
                                                        <select name="MOIS_UTI"> 

    <?php include('fonction_date/mois.php'); ?>
                                                        </select>
                                                        <select name="ANNEE_UTI"> 
    <option value="2019" selected>2019</option>
    <?php include('fonction_date/annee.php'); ?>
                                                        </select>
                                                    </td>
                                                </tr>
												<tr><td> N° PV :</td> <td> <input name="N_PV" value="" size="20" maxlength="20" type="text"> </td> </tr>
                                                <tr>
                                                    <input type="hidden" name="ID_INV" value="<?php echo $line['ID_INV']; ?>">
                                                        <td colspan="2" rowspan="1"  style="text-align:center">  <input type="submit" name="valider" value="valider"> </td>

                                                </tr>
                                            </tbody>
                                        </table>
                                </fieldset>


                            </form > 

    <?php
}

if (isset($_POST['valider'])) {

    if (!empty($_POST['ID_INV']) and !empty($_POST['N_PV']) ) {

        $JOUR_UTI = $_POST['JOUR_UTI'];
        $MOIS_UTI = $_POST['MOIS_UTI'];
        $ANNEE_UTI = $_POST['ANNEE_UTI'];
        $DNSs = $ANNEE_UTI . "-" . $MOIS_UTI . "-" . $JOUR_UTI;
        $date = date_create($DNSs);

        $DATE_DET = date_format($date, 'Y-m-d');

         $N_PV=$_POST['N_PV'];
    

        $etat = 'DESTRUCTION';
        $ID_INV = $_POST['ID_INV'];
        mysql_query("update inventaire set  ETAT_INV='$etat', NUM_BUR=''  where ID_INV='$ID_INV' ");

        $sql_inser = "INSERT  INTO deteruire_inv (ID_INV, DATE_DET,N_PV_DESTRUCTION)
                             VALUES ('$ID_INV', '$DATE_DET','$N_PV') ";
        mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
        ?> <SCRIPT LANGUAGE="Javascript">	alert("تم إسقاط الجرد");

                              window.location.href = 'modifier_inventaire.php';</SCRIPT> <?php
                            } else {
                                
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
<?php
    } else {
        ?> <SCRIPT LANGUAGE="Javascript">	alert("ليس لديك الصلاحية");
            window.location.href = 'indexx.php';
           // exit();
        </SCRIPT> <?php
    }
?>