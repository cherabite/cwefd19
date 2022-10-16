<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>قائمة الرتب</title>
        <script type="text/javascript">
            function test(value) {
                if (parseInt(value) == value)
                    alert('ok');
                else
                    alert('���� ���');
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
                    <td style="text-align: right; width: 203px;" >
                        <?php include('includes/sidebar_grh_grade.php'); ?>
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

                        $select = "SELECT * FROM tab_services ";
                        $result = mysql_query($select);
                        $total = mysql_num_rows($result);
                        if ($total) {
                            ?>

                            <h3>المركز الولائي سطيف </h3>
                            <h3>قائمة المصالح </h3>

                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr  style="background-color: rgb(8, 173, 255);">
                                        <td>الرقم :</td>

                                        <td colspan="3" rowspan="1">المصلحة</td>
                                    </tr>
                                    <?php
                                    $nem = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        echo' <tr>
      <td>' . $nem . ' </td>
      <td>' . $row['NOM_SERVICE'] . '</td>
     
     
     
     <td><a href="function_supprimer_service.php?ID_SERVICE=' . $row['ID_SERVICE'] . '" onclick="return(confirm(\'Etes-vous sur de vouloir supprimer ce service?\'));" >حذف</a></td>
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