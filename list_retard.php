<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>



        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>قائمة الغياب </title>

    </head>
    <body style="direction: rtl;">


        <table style="text-align: right; width: 100%;" align="right"
               border="1" cellpadding="0" cellspacing="2">		
            <tr>
                <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>


            <tr>
                <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>


            <tr> 
                <td style="text-align: right; width: 203px;" >
                    <?php include('includes/sidebar_grh.php'); ?>
                </td>
                <td> 


                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'grh';


                    $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                    mysql_select_db($db) or die('Erreur :' . mysql_error());
                    mysql_query("set character_set_server='utf8'");
                    mysql_query("set names 'utf8'");

                    if (isset($_GET['ID_EMPLOYEUE'])) {
                        $ID_EMPLOYEUE = $_GET['ID_EMPLOYEUE'];

                        $reque = mysql_query("select * from employeur  where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
                        $linne = mysql_fetch_array($reque);
                    }




                    $requete = mysql_query("select * from tab_retard  where ID_EMPLOYEUE='$ID_EMPLOYEUE' ORDER BY DATE_RET  DESC");
                    $line = mysql_fetch_array($requete);
                    $nb = mysql_num_rows($requete);
                    if ($nb > 0) {
                        echo('    
                          			   <h3>  الغيابات و التأخرات للموظف :   </h3>  <h3> ' . $linne['NOM'] . '       ' . $linne['PRENOM'] . ' </h3> 
				   </br>
				    
                      <table border="2">
				<tr style="background-color:red;" >
				<td>  رقم  </td>
			   <td> طبيعة الغيابات </td>
			   <td>  التاريخ </td>
			   <td>  توقيت التأخرات </td>
			   <td> توقيت الخروج  </td>
			   <td> توقيت الرجوع  </td>
			    <td>  ت نهاية عطلة م </td>
			    <td> ملاحظة  </td>
			   
			    <td colspan="6" rowspan="1"> العمليات المنجزة</td>
                </tr> ');
                        $req = mysql_query("select * from tab_retard  where ID_EMPLOYEUE='$ID_EMPLOYEUE' ORDER BY DATE_RET  DESC ");
                        $nem = 1;
                        while ($nbr = mysql_fetch_array($req)) {

                            echo ('
				 <tr>
			    <td> ' . $nem . '</td>
				<td> ' . $nbr['TYPR_RET'] . '</</td>
				 <td> ' . $nbr['DATE_RET'] . '</ </td>
				<td>  ' . $nbr['HEUR_ENTRE_RET'] . '</ </td>
				 <td> ' . $nbr['HEUR_SORTIR'] . '</  </td>
				<td> ' . $nbr['HEUR_REVENIR'] . '</ </td>
				<td> ' . $nbr['DATE_REVENIR_CONGE'] . '</ </td>
				<td> ' . $nbr['PROUVE'] . '</ </td>
			  
			 
			   <td><a href="function_supprimer_retard.php?ID_RET=' . $nbr['ID_RET'] . ' " onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce retard?\'));" >حذف</a></td>
			   <td><a href="questionnaire.php?ID_RET= ' . $nbr['ID_RET'] . ' & ID_EMPLOYEUE=' . $nbr['ID_EMPLOYEUE'] . ' "target="_blank" > إستفسار </a></td>
			   
				</tr>');
                            $nem = $nem + 1;
                        }
                        echo' </table>	';
                    } else {
                        ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! ليس لديه غياب ");</SCRIPT> <?php
                        //header ('location: retard_absence.php');// redirection
                        echo(' <br><a href="retard_absence.php"> الرجوع إلى حجز الغياب</a><?php	');
                    }
                    ?>
                </td> 

            </tr> 


            <tr>
                <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
        </table



    </body>

</html>