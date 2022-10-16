<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>Liste_fournisseur</title>

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
						
                        $select = "SELECT * FROM fournisseur  ";
                        $result = mysql_query($select);
                        $total = mysql_num_rows($result);
                        if ($total) {
                            ?>

                            <h3>المركز الولائي سطيف </h3></br>
                            <h3>Liste fournisseur </h3>

                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>الرقم :</td>
                                        <td> Nom_fournisseur</td>
                                       

                                        <td colspan="2" rowspan="1"></td>
                                    </tr>
                                    <?php
                                    $nem = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['Nom_fournisseur'] . '</td>
      
      <td><a href="modif_fournisseur.php?ID_FOURNISSEUR= ' . $row['ID_FOURNISSEUR'] . '" > Modif </a></td>
     
	   <td><a href="function_supprimer_fournisseur.php? ID_FOURNISSEUR=' . $row['ID_FOURNISSEUR'] . '" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce fournisseur?\'));" >Supp</a></td>
      
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