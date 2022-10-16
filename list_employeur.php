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

        <title>قائمة الموظفين</title>
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

                    <td style="vertical-align: top;"> 
                        <?php
                        $host = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'grh';


                        $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                        mysql_select_db($db) or die('Erreur :' . mysql_error());
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");

                        $select = "SELECT * FROM employeur ORDER BY DATE_PV_INSTALL  ASC ";
                        $result = mysql_query($select);
                        $total = mysql_num_rows($result);
                        if ($total) {
                            ?>

                            <h3>المركز الولائي سطيف </h3></br>
                            <h3>قائمة الموظفين الموجودون بالمركز </h3></br>

                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>الرقم :</td>
                                        <td> اللقب</td>
                                        <td>الاسم :</td>
                                        <td> تاريخ الميلاد</td>
                                        <td> مكان الميلاد </td>
                                        <td>تاريخ التوظيف</td>
                                        <td> الرتبة</td>

                                        <td colspan="5" rowspan="1"></td>
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
      <td>' . $row['DATE_PV_INSTALL'] . '</td>
      <td>' . $row['GRADE'] . '</td>
      <td><a href="modifier_emp.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '" > تحديث </a></td>
     
	   <td><a href="function_supprimer_emp.php?ID_EMPLOYEUE=' . $row['ID_EMPLOYEUE'] . '" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce Employeur?\'));" >حذف</a></td>
      <td><a href="consiltation_emp.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '"> معاينة   </a></td>
	  <td><a href="imp_certeficat_travail_a4.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '" target="_blank" >   شهادة عمل  </a></td>
	   <td><a href="formulaire_note.php?ID_EMPLOYEUE= ' . $row['ID_EMPLOYEUE'] . '" target="_blank" >   استمارة التنقيط   </a></td>
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