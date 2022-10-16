<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>Liste_produit</title>

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
						
                        $select = "SELECT * FROM produit ORDER BY Nom_categorie  ASC ";
                        $result = mysql_query($select);
                        $total = mysql_num_rows($result);
                        if ($total) {
                            ?>

                            <h3>المركز الولائي سطيف </h3></br>
                            <h3>Liste_produit   AU : <?php echo date("d-m-Y"); ?> </h3>

                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>الرقم :</td>
                                        <td> Nom produit</td>
                                        <td>Type Categorie</td>
                                        <td> Qte_initial </td>
                                        <td> Qte_entree </td>
                                        <td>Qte_sortie</td>
                                        <td> Qte_final</td>

                                        <td colspan="2" rowspan="1"> Operation </td>
                                    </tr>
                                    <?php
                                    $nem = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['Nom_produit'] . '</td>
      <td>' . $row['Nom_categorie'] . '</td>
      <td>' . $row['Qte_initial'] . '</td>
	  <td>' . $row['Qte_entree'] . '</td>
      <td>' . $row['Qte_sortie'] . '</td>
      <td>' . $row['Qte_final'] . '</td>
      <td><a href="modif_produit.php?ID_PRODUIT= ' . $row['ID_PRODUIT'] . '" > Modif </a></td>
     
	   <td><a href="function_supprimer_produit.php?ID_PRODUIT=' . $row['ID_PRODUIT'] . '" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce produit?\'));" >Supp</a></td>
      
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
                        ?>


                       
                        
                    </td> 




                </tr> 


                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
            </table

        </div>

    </body>

</html>