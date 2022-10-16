<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>Modifier fournisseur</title>

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
                        
                          if (isset($_GET['ID_FOURNISSEUR'])) {
                            $ID_FOURNISSEUR = $_GET['ID_FOURNISSEUR'];


                            $don = mysql_query("select * from fournisseur where ID_FOURNISSEUR='$ID_FOURNISSEUR' ");
                            $nb = mysql_num_rows($don);
                            // echo $nb;
                            $line = mysql_fetch_array($don);
                           
                            ?>



                           <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                            <fieldset><legend style="caption-side: right;">INFO PRODUIT </legend>
                                <br>
                                    <table style="text-align: left; width: 60%;" border="1"
                                           cellpadding="2" cellspacing="2">
                                        <tbody>
                                            
                                            <tr>
                                                <td>Nom fournisseur :</td>
                                                <td><input name="Nom_fournisseur" value="<?php echo $line['Nom_fournisseur']; ?>"type="text" size=50></td>
                                            </tr>
                                           
                                           
                                            
                                            <tr>
                                                <td colspan="2" rowspan="1"  style="text-align:center">  <input type="submit" name="modifier" value="modifier"></td>
                                                <input type="hidden" name="ID_FOURNISSEUR" value="<?php echo $line['ID_FOURNISSEUR']; ?>">
                                            </tr>
                                        </tbody>
                                    </table>
                            </fieldset>
                        </form >  

    <?php
}

if (isset($_POST['modifier'])) {
     if (isset($_POST['ID_FOURNISSEUR'])) {$ID_FOURNISSEUR=$_POST['ID_FOURNISSEUR'];}
                              if (!empty($_POST['Nom_fournisseur'])  ) {
                          
                                $Nom_fournisseur = $_POST['Nom_fournisseur'];
                                 $ID_FOURNISSEUR = $_POST['ID_FOURNISSEUR'];
                                         mysql_query("update fournisseur set Nom_fournisseur='$Nom_fournisseur' where ID_FOURNISSEUR='$ID_FOURNISSEUR' ");
                                                                ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التحديث بنجاح!");
                              window.location.href = 'liste_fournisseur.php';</SCRIPT> <?php
							
                                                            } else {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");
									document.location.href="modif_fournisseur.php?ID_FOURNISSEUR=<?php echo $ID_FOURNISSEUR;?>";
									
									</SCRIPT> <?php
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