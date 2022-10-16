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

                        if (isset($_GET['ID_INV'])) {
                            $ID_INV = $_GET['ID_INV'];


                            $don = mysql_query("select * from inventaire where ID_INV='$ID_INV' ");
                            $nb = mysql_num_rows($don);
                            // echo $nb;
                            $line = mysql_fetch_array($don);
			$a = substr($line['DATE_UTI'], 0, 4);     // conversion
            $m = substr($line['DATE_UTI'], 5, 2);     // de la date
             $j = substr($line['DATE_UTI'], 8, 2);     // au format
                        $date = $j.'-'.$m.'-'.$a;
						//echo $date;
                            $dd = strtotime($line['DATE_UTI']);
                            ?>



                            <form method="post" name="f1" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire" onsubmit="return verif();">
                                <fieldset><legend style="caption-side: right;">INFO INVENTAIRE </legend>
                                    <br>
                                        <table style="text-align: left; width: 60%;" border="1"
                                               cellpadding="2" cellspacing="2">
                                            <tbody>
                                                <tr>
                                                    <td style=" width: 20%;">Num inventaire</td>
                                                    <td><input name="NUM_INV" value="<?php echo $line['NUM_INV']; ?>"type="text"></td>
                                                </tr>
                                                <tr>
                                                    <td>Nom inentaire</td>
                                                    <td><input name="NOM_INV_LAT" value="<?php echo $line['NOM_INV_LAT']; ?>"type="text" size=50></td>
                                                </tr>
                                                <tr>
                                                    <td>إسم السلعة بالعربية</td>
                                                    <td><input name="NOM_INV_ARA" value="<?php echo $line['NOM_INV_ARA']; ?>"type="text"size=50></td>
                                                </tr>
                                                <tr>
                                                    <td>Type inventaire</td>
                                                    <td><select  name="TYPE_INV" > 
                                                            <option value="<?php echo $line['TYPE_INV']; ?>"> <?php echo $line['TYPE_INV']; ?></option>
                                                            <option>  ONEFD  </option><option>DENT  </option> <option>ACHAT  </option>  </select></td>
                                                </tr>
                                                <tr>
                                                    <td>Etat inventaire</td>
                                                    <td><select  name="ETAT_INV" > 
                                                            <option value="<?php echo $line['ETAT_INV']; ?>"> <?php echo $line['ETAT_INV']; ?></option>
                                                            <option>  STOCK  </option><option>BUREAU  </option> <option>  destruction  </option></select></td>
                                                </tr>
                                                <tr>
                                                    <td>Num_Bureau</td>
                                                    <td><select  name="NUM_BUR" > 
                                                            <option value="<?php echo $line['NUM_BUR']; ?>"> <?php echo $line['NUM_BUR']; ?></option>
                                                            <?php
                                                                                            $retour = mysql_query("select distinct NUM_BUR from inventaire"); // afficher les classes
                                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                                echo '<option value="' . $a['NUM_BUR'] . '">' . $a['NUM_BUR'] . '</option>';
                                                                                            }
                                                                                            ?> 

                                                            </tr>
                                                            <tr>
                                                                <td>Date D'utilisation</td> 
                                                                <td>
  
      <select name="JOUR_UTI">
      <option value="<?php echo $j; ?>"><?php echo $j;?></option>

      <?php  include('fonction_date/jour.php');  ?>
      </select>
      <select name="MOIS_UTI">
      <option value="<?php echo $m; ?>"><?php echo $m;?></option>

      <?php  include('fonction_date/mois.php');  ?>
      </select>
      <select name="ANNEE_UTI">
	  <option value="2019" selected>2019</option>
      <option value="<?php echo $a; ?>"><?php echo $a;?></option>

      <?php  include('fonction_date/annee.php');  ?>
      </select> 
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <input type="hidden" name="ID_INV" value="<?php echo $line['ID_INV']; ?>">
                                                                    <td colspan="2" rowspan="1"  style="text-align:center">  <input type="submit" name="modifier" value="modifier"> </td>

                                                            </tr>
                                                            </tbody>
                                                            </table>
                                                            </fieldset>


                                                            </form > 

    <?php
}

if (isset($_POST['modifier'])) {
    if ($_POST['NOM_INV_ARA'] == '' and $_POST['NOM_INV_LAT'] == '') {
        ?> <SCRIPT LANGUAGE="Javascript">	alert("أدخل اسم السلعة بالعربية أو الفرنسية");</SCRIPT> <?php
                                                            }
                                                            if (!empty($_POST['NUM_INV']) and ! empty($_POST['TYPE_INV']) and ! empty($_POST['ETAT_INV']) and ! empty($_POST['NUM_BUR'])) {
                                                                
                                                                  $JOUR_UTI=$_POST['JOUR_UTI'];
                                                                  $MOIS_UTI=$_POST['MOIS_UTI'];
                                                                  $ANNEE_UTI=$_POST['ANNEE_UTI'];
                                                                  $DNSs=$ANNEE_UTI."-".$MOIS_UTI."-".$JOUR_UTI;
                                                                  $date=date_create($DNSs);

                                                                  $DATE_UTI= date_format($date,'Y-m-d'); 
                                                                $NUM_INV = $_POST['NUM_INV'];
                                                                $NOM_INV_LAT = $_POST['NOM_INV_LAT'];
                                                                $NOM_INV_ARA = $_POST['NOM_INV_ARA'];
                                                                $TYPE_INV = $_POST['TYPE_INV'];
                                                                $ETAT_INV = $_POST['ETAT_INV'];
                                                                $NUM_BUR = $_POST['NUM_BUR'];
                                                                $ID_INV = $_POST['ID_INV'];
                                                                mysql_query("update inventaire set NUM_INV='$NUM_INV', NOM_INV_LAT='$NOM_INV_LAT', NOM_INV_ARA='$NOM_INV_ARA', TYPE_INV='$TYPE_INV', ETAT_INV='$ETAT_INV', NUM_BUR='$NUM_BUR',DATE_UTI='$DATE_UTI' where ID_INV='$ID_INV' ");
                                                                ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التحديث بنجاح!");
                              window.location.href = 'modifier_inventaire.php';</SCRIPT> <?php
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