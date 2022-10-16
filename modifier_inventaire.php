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

        <title>modifier inventaire</title>
        <script type="text/javascript">
            function test(value) {
                if (parseInt(value) == value) alert ('ok'); else alert('?? ??);
            }
        </script>
    </head>

    <body style="direction:ltr ">
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
                        $host = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'gestion_stock';


                        $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                        mysql_select_db($db) or die('Erreur :' . mysql_error());
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        $DESTRU = 'DESTRUCTION';
                        $select = "SELECT * FROM inventaire   ORDER BY NUM_INV  ASC  ";
                        $result = mysql_query($select);
                        $total = mysql_num_rows($result);
                        if ($total) {
                            ?>

                            <h3 style="align:centre">المركز الولائـــــــــــــي ســطيـــــف</h3>
                            <h3>LISTE INVENTAIRES </h3>
                            <hr>
                                <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                    <tbody>
                                        <tr style="background-color:red;">
                                            <td>N° :</td>
                                            <td> NUM_INVTR</td>
                                            <td>NOM(fr) :</td>
                                            <td> NOM(ar)</td>

                                            <td>NUM_BUREAU</td>

                                            <td colspan="4" rowspan="1"></td>

                                        </tr>
                                        <?php
                                        $nem = 1;
                                        while ($row = mysql_fetch_array($result)) {
                                            echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['NUM_INV'] . '</td>
      <td>' . $row['NOM_INV_LAT'] . '</td>
      <td>' . $row['NOM_INV_ARA'] . '</td>
	  
      <td>' . $row['NUM_BUR'] . '</td>
    
	  <td><a href="mod_inventaire.php?ID_INV= ' . $row['ID_INV'] . '" > تحديث </a></td>
     
	   <td><a href="function_supprimer_inventaire.php?ID_INV=' . $row['ID_INV'] . '" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce inventaire?\'));" >حذف</a></td>
      <td><a href="movement_inventaire.php?ID_INV= ' . $row['ID_INV'] . '"> تحويل</a></td>
	  <td><a href="destruction_inventaire.php?ID_INV= ' . $row['ID_INV'] . '" >  إسقاط  </a></td>
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
<?php
    } else {
        ?> <SCRIPT LANGUAGE="Javascript">	alert("ليس لديك الصلاحية");
            window.location.href = 'indexx.php';
           // exit();
        </SCRIPT> <?php
    }
?>