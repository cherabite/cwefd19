<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>Ajouter Stock</title>

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
                        <?php include('includes/sidebar_stock.php'); ?>
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
                            
                            if (!empty($_POST['Nom_produit']) and ! empty($_POST['Nom_categorie']) ) {
                          
                                $Nom_produit = $_POST['Nom_produit'];
                                $Nom_categorie = $_POST['Nom_categorie'];
                                $Qte_initial = $_POST['Qte_initial'];
                                
                                $ques = mysql_fetch_array(mysql_query("select count(*) as nb from produit where Nom_produit='$Nom_produit' "));
                                if ($ques['nb'] > 0) {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! موجود");</SCRIPT> <?php
                                } else {
                                    $sql_inser = "INSERT  INTO produit (Nom_produit, Nom_categorie, Qte_initial)
                                     VALUES ('$Nom_produit', '$Nom_categorie', '$Qte_initial') ";
                                    mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التسجيل بنجاح");</SCRIPT> <?php
                                    }
                                } else {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
                                }
                            }
                            ?>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                            <fieldset><legend style="caption-side: right;">INFO PRODUIT </legend>
                                <br>
                                    <table style="text-align: left; width: 60%;" border="1"
                                           cellpadding="2" cellspacing="2">
                                        <tbody>
                                            <tr>
                                                <td style=" width: 30%;">Type categorie  :</td>
                                                <td>
												<select name="Nom_categorie"> 
                                                                                            <?php
                                                                                            $retour = mysql_query("select distinct NOM_CATEGORIE from categorie"); // afficher les classes
                                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                                echo '<option value="' . $a['NOM_CATEGORIE'] . '">' . $a['NOM_CATEGORIE'] . '</option>';
                                                                                            }
                                                                                            ?>  
                                                                                                <option selected> </option>
                                                 </select>
												
												</td>
                                            </tr>
                                            <tr>
                                                <td>Nom produit :</td>
                                                <td><input name="Nom_produit" value=""type="text" size=50></td>
                                            </tr>
                                            <tr>
                                                <td>Quantitie initial</td>
                                                <td><input name="Qte_initial" value="0" type="number"size=50></td>
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