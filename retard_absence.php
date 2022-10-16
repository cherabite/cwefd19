<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>




        <meta name="description" content="" />

        <meta name="keywords" content="" />

        <meta name="author" content="" />

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>formulaire employeur</title>
        <script type="text/javascript">
            function test(value) {
                if (parseInt(value) == value)
                    alert('ok');
                else
                    alert('أدخل عدد');
            }
        </script>
    </head>

    <body style="direction: rtl;">
        <div id="wrapper">
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

                    <td style="vertical-align: top;"
                    <?php
                    $host = 'localhost';
                    $user = 'root';
                    $pass = '';
                    $db = 'grh';


                    $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                    mysql_select_db($db) or die('Erreur :' . mysql_error());
                    mysql_query("set character_set_server='utf8'");
                    mysql_query("set names 'utf8'");

                    $select = "SELECT * FROM employeur where ARRETE ='لا' ORDER BY DATE_PV_INSTALL DESC ";
                    $result = mysql_query($select);
                    $total = mysql_num_rows($result);
                    $ABS = 'بالغياب';
                    $SORT = 'بالخروج';
                    $RETARD = 'بالتأخر';
                    if ($total) {
                        ?>

                            <h3>المركز الولائي سطيف </h3></br>
                            <h3>قائمة الموظفين الموجودون بالمركز </h3></br>

                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr  style="background-color: rgb(8, 173, 255);">
                                        <td>الرقم :</td>
                                        <td> اللقب</td>
                                        <td>الاسم :</td>
                                        <td> تاريخ الميلاد</td>
                                        <td> مكان الميلاد </td>

                                        <td> الرتبة</td>

                                        <td colspan="7" rowspan="1"></td>
                                    </tr>
                                    <?php
                                    $nem = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        echo' <tr>
      <td>' . $nem . ' </td>
      <td>' . $row['NOM'] . '</td>
      <td>' . $row['PRENOM'] . '</td>
      <td>' . $row['DNS'] . '</td>
	  <td>' . $row['LNS'] . '</td>
      <td>' . $row['GRADE'] . '</td>
     
      <td><a href="ajouter_retard.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '    " >  تأخر </a></td>
	  <td><a href="ajouter_absence.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '" >   غياب  </a></td>
     <td><a href="ajouter_sortir.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '" >   خروج </a></td>
	  <td><a href="conge_maladie.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '" >   عطلة غياب </a></td>
	  <td><a href="demende_permission.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '& RET= ' . $ABS . ' " >   رخصة غياب  </a></td>
     <td><a href="demende_permission.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . ' & RET= ' . $SORT . ' "  >   رخصة خروج  </a></td>
	 <td><a href="demende_permission.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . ' & RET= ' . $RETARD . ' "  >   رخصة بالتأخر </a></td>
	  <td><a href="list_retard.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . ' "> معاينة كل الغيابات  </a></td>
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
