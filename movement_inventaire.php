<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>
<script language="JavaScript"> 
     
function verif() {

a=document.f1.SECONDE_PLACE.value;

if (a=="") {
alert ("Vous devez remplir le champ distination:");
valid = false;
return valid;
document.f1.SECONDE_PLACE.focus();
}else
var confirmation = confirm( "هل تريد حفظ التغييرات ?" ) ;
        if( confirmation )
        return true ;
    return false
}



</script>
        <title>movement inventaire</title>

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
                                <fieldset><legend style="caption-side: right;">MOVEMENT INVENTAIRE</legend>
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
                                                    <td>Num_Bureau</td><input type="hidden" name=" FIRST_PLACE" value="<?php echo $line['NUM_BUR']; ?>">
                                                        <td><?php echo $line['NUM_BUR']; ?></td>
                                                </tr>

                                                <tr>
                                                    <td>DISTINATION</td>
                                                    <td><select  name="SECONDE_PLACE" > 
                                                             <option selected> </option>
                                                            <?php
                                                                                            $retour = mysql_query("select distinct NUM_BUR from inventaire"); // afficher les classes
                                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                                echo '<option value="' . $a['NUM_BUR'] . '">' . $a['NUM_BUR'] . '</option>';
                                                                                            }
                                                                                            ?> 
																							</select>

                                                </tr>
                                                <tr>
                                                    <td>Date De Movement</td> 
                                                    <td>
                                                        <select name="JOUR_UTI"> 

    <?php include('fonction_date/jour.php'); ?>
                                                        </select>
                                                        <select name="MOIS_UTI"> 

    <?php include('fonction_date/mois.php'); ?>
                                                        </select>
                                                        <select name="ANNEE_UTI"> 
       <option selected>2017</option>
    <?php include('fonction_date/annee.php'); ?>
	
                                                        </select>
                                                    </td>
                                                </tr>
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

    if (!empty($_POST['FIRST_PLACE'])) {

        $JOUR_UTI = $_POST['JOUR_UTI'];
        $MOIS_UTI = $_POST['MOIS_UTI'];
        $ANNEE_UTI = $_POST['ANNEE_UTI'];
        $DNSs = $ANNEE_UTI . "-" . $MOIS_UTI . "-" . $JOUR_UTI;
        $date = date_create($DNSs);

        $DATE_MOV = date_format($date, 'Y-m-d');
        $NUM_INV = $_POST['NUM_INV'];
        $SECONDE_PLACE = $_POST['SECONDE_PLACE'];
        $FIRST_PLACE = $_POST['FIRST_PLACE'];

        if ($FIRST_PLACE == 'STOCK') {
            $etat = 'STOCK';
        } else {
            $etat = 'BUREAU';
        }
        $ID_INV = $_POST['ID_INV'];
        mysql_query("update inventaire set  ETAT_INV='$etat', NUM_BUR='$SECONDE_PLACE'  where ID_INV='$ID_INV' ");

        $sql_inser = "INSERT  INTO mov_inv (ID_INV, DATE_MOV, FIRST_PLACE, SECONDE_PLACE)
                             VALUES ('$ID_INV', '$DATE_MOV', '$FIRST_PLACE', '$SECONDE_PLACE') ";
        mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
        ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التحديث بنجاح!");

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