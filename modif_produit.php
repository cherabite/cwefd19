<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>Moudifier produit</title>

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
                        
                          if (isset($_GET['ID_PRODUIT'])) {
                            $ID_PRODUIT = $_GET['ID_PRODUIT'];


                            $don = mysql_query("select * from produit where ID_PRODUIT='$ID_PRODUIT' ");
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
                                                <td style=" width: 30%;">Type categorie  :</td>
                                                <td>
												<select name="Nom_categorie"> 
												 <option value="<?php echo $line['Nom_categorie']; ?>"> <?php echo $line['Nom_categorie']; ?></option>
                                                                                            <?php
                                                                                            $retour = mysql_query("select distinct Nom_categorie from categorie"); // afficher les classes
                                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                                echo '<option value="' . $a['Nom_categorie'] . '">' . $a['Nom_categorie'] . '</option>';
                                                                                            }
                                                                                            ?>  
                                                                                              
                                                 </select>
												
												</td>
                                            </tr>
                                            <tr>
                                                <td>Nom produit :</td>
                                                <td><input name="Nom_produit" value="<?php echo $line['Nom_produit']; ?>"type="text" size=50></td>
                                            </tr>
                                            <tr>
                                                <td>Quantitie initial</td>
                                                <td><input name="Qte_initial" value="<?php echo $line['Qte_initial']; ?>"type="text"size=50></td>
                                            </tr>
                                           
                                            
                                            <tr>
                                                <td colspan="2" rowspan="1"  style="text-align:center">  <input type="submit" name="modifier" value="modifier"></td>
                                                <input type="hidden" name="ID_PRODUIT" value="<?php echo $line['ID_PRODUIT']; ?>">
                                            </tr>
                                        </tbody>
                                    </table>
                            </fieldset>
                        </form >  

    <?php
}

if (isset($_POST['modifier'])) {
	if (isset($_POST['ID_PRODUIT'])){ $ID_PRODUIT = $_POST['ID_PRODUIT'];
		  
          
                      if (!empty($_POST['Nom_produit']) and ! empty($_POST['Nom_categorie']) ) {
                          
                                $Nom_produit = $_POST['Nom_produit'];
                                $Nom_categorie = $_POST['Nom_categorie'];
                                $Qte_initial = $_POST['Qte_initial'];
                                 $ID_PRODUIT = $_POST['ID_PRODUIT'];
                                         mysql_query("update produit set Nom_produit='$Nom_produit', Nom_categorie='$Nom_categorie', Qte_initial='$Qte_initial' where ID_PRODUIT='$ID_PRODUIT' ");
                                                                ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التحديث بنجاح!");
                              window.location.href = 'liste_produit.php';</SCRIPT> <?php
                                    }
                                else {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");
									document.location.href="modif_produit.php?ID_PRODUIT=<?php echo $ID_PRODUIT;?>";
									
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