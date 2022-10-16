<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

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




                        if (isset($_POST['valider'])) {
                            $NUM_BUR = $_POST['NUM_BUR'];
                            if ($NUM_BUR == 'TOUTE L INVENTAIRES') {
                                $DESTRU = 'DESTRUCTION';
                                $select = "SELECT * FROM inventaire  where ETAT_INV !='$DESTRU' ORDER BY NUM_INV  ASC ";
                                $result = mysql_query($select);
                                $total = mysql_num_rows($result);
                                if ($total) {
                                    ?>

                                    <h3 style="align:centre">المركز الولائـــــــــــــي ســطيـــــف </h3>
                                    <h3>LISTE TOUTE L INVENTAIRES DU CENTRE </h3>
                                    <hr>
                                        <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                            <tbody>
                                                <tr style="background-color:red;">
                                                    <td>N° :</td>
                                                    <td> NUM_INVTR</td>
                                                    <td>NOM(fr) :</td>
                                                    <td> NOM(ar)</td>
                                                    <td> TYPE_INV</td>
                                                    <td> ETAT_INV</td>
                                                    <td>NUM_BUREAU</td>
                                                    <td> DATE_UTILISATION</td>


                                                </tr>
            <?php
            $nem = 1;
            while ($row = mysql_fetch_array($result)) {
                echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['NUM_INV'] . '</td>
      <td>' . $row['NOM_INV_LAT'] . '</td>
      <td>' . $row['NOM_INV_ARA'] . '</td>
	  <td>' . $row['TYPE_INV'] . '</td>
	    <td>' . $row['ETAT_INV'] . '</td>
      <td>' . $row['NUM_BUR'] . '</td>
      <td>' . $row['DATE_UTI'] . '</td>
       </tr>';
                $nem = $nem + 1;
            }
            ?>
                                            </tbody>
                                        </table>
                                                <?php
                                            } else {

                                                echo 'Pas d\'enregistrements dans cette table...';
                                            }
                                        } else {
                                            $DESTRU = 'DESTRUCTION';
                                            $select = "SELECT * FROM inventaire  where ETAT_INV !='$DESTRU' AND NUM_BUR ='$NUM_BUR' ORDER BY NUM_INV  ASC ";
                                            $result = mysql_query($select);
                                            $total = mysql_num_rows($result);
                                            if ($total) {
                                                ?>

                                        <h3 style="align:centre">المركز الولائـــــــــــــي ســطيـــــف </h3>
                                        <h3>LISTE INVENTAIRES :<?php echo $NUM_BUR; ?> </h3>
                                        <hr>
                                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                                <tbody>
                                                    <tr style="background-color:red;">
                                                        <td>N° :</td>
                                                        <td> NUM_INVTR</td>
                                                        <td>NOM(fr) :</td>
                                                        <td> NOM(ar)</td>
                                                        <td> TYPE_INV</td>
                                                        <td> ETAT_INV</td>
                                                        <td>NUM_BUREAU</td>
                                                        <td> DATE_UTILISATION</td>


                                                    </tr>
            <?php
            $nem = 1;
            while ($row = mysql_fetch_array($result)) {
                echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['NUM_INV'] . '</td>
      <td>' . $row['NOM_INV_LAT'] . '</td>
      <td>' . $row['NOM_INV_ARA'] . '</td>
	  <td>' . $row['TYPE_INV'] . '</td>
	    <td>' . $row['ETAT_INV'] . '</td>
      <td>' . $row['NUM_BUR'] . '</td>
      <td>' . $row['DATE_UTI'] . '</td>
       </tr>';
                $nem = $nem + 1;
            }
            ?>
                                                </tbody>
                                            </table>
                                                    <?php
                                                } else {

                                                    echo 'Pas d\'enregistrements dans cette table...';
                                                }
                                            }
                                        } else {
                                            ?>

                                    <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                                        <fieldset><legend style="caption-side: right;">INFO INVENTAIRE </legend>
                                            <br>
                                                <table style="text-align: left; width: 60%;" border="1"
                                                       cellpadding="2" cellspacing="2">
                                                    <tbody>
                                                        <tr>
                                                            <td style=" width: 30%;">Num inventaire :</td>
                                                            <td><select name="NUM_BUR"> 
                                    <?php
                                    $retour = mysql_query("select distinct NUM_BUR from inventaire"); // afficher les classes
                                    while ($a = mysql_fetch_array($retour)) {
                                        echo '<option value="' . $a['NUM_BUR'] . '">' . $a['NUM_BUR'] . '</option>';
                                    }
                                    ?>  
                                                                    <option selected> TOUTE L INVENTAIRES</option>
                                                                </select></td>
                                                        </tr>

                                                        <tr>
                                                            <td colspan="2" rowspan="1"  style="text-align:center">  <input type="submit" name="valider" value="valider"></td>

                                                        </tr>
                                                    </tbody>
                                                </table>
                                        </fieldset>
                                    </form > 
                                                                    <?php
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