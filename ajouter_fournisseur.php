<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>Ajouter Fournisseur</title>

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
                            
                            if (!empty($_POST['Nom_fournisseur'])  ) {
                          
                                $Nom_fournisseur = $_POST['Nom_fournisseur'];
                               
                                
                                $ques = mysql_fetch_array(mysql_query("select count(*) as nb from fournisseur where Nom_fournisseur='$Nom_fournisseur' "));
                                if ($ques['nb'] > 0) {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! موجود");</SCRIPT> <?php
                                } else {
                                    $sql_inser = "INSERT  INTO fournisseur (Nom_fournisseur)
                                     VALUES ('$Nom_fournisseur') ";
                                    mysql_query($sql_inser) or die('Erreur SQL !<br />' . $sql_inser . '<br />' . mysql_error());
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التسجيل بنجاح");</SCRIPT> <?php
                                    }
                                } else {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
                                }
                            }
                            ?>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                            <fieldset><legend style="caption-side: right;">INFO Fournisseur </legend>
                                <br>
                                    <table style="text-align: left; width: 60%;" border="1"
                                           cellpadding="2" cellspacing="2">
                                        <tbody>
                                           
                                            <tr>
                                                <td>Nom fournisseur :</td>
                                                <td><input name="Nom_fournisseur" value=""type="text" size=50></td>
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