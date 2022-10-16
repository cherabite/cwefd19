<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>
        <meta name="description" content="" />

        <meta name="keywords" content="" />

        <meta name="author" content="" />

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>قائمة مراكز الإجراء </title>

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
                        <?php include('includes/sidebar.php'); ?>
                    </td>
                    <td style="text-align: right; width: 100%;" align="right"> <div id="content">
                            <?php
                            $host = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $db = 'imthne';


                            // j'ai cliqué sur « remplir tab_niv »
// connection à la DB

                            $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                            mysql_select_db($db) or die('Erreur :' . mysql_error());
                            mysql_query("set character_set_server='utf8'");
                            mysql_query("set names 'utf8'");
                            $select = "SELECT * FROM tab_stat ";
                            $result = mysql_query($select);
                            $total = mysql_num_rows($result);
                            if ($total) {
                                ?>

                                <table style="text-align: centre; width: 100%;" border="1"cellpadding="2" cellspacing="2">
                                    <tbody>
                                        <tr>
                                            <td colspan="4" rowspan="1"></td>
                                            <td colspan="18" rowspan="1">المستويات</td>
                                            <td colspan="3" rowspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td>رقم المركز</td>
                                            <td>الولاية</td>
                                            <td>مدير المركز</td>
                                            <td style="width:150;">إسم المركز</td>
                                           
                                            <td colspan="3" rowspan="1">طباعة</td>
											
                                        </tr>
    <?php
    while ($row = mysql_fetch_array($result)) {
        echo' <tr>
      <td>' . $row['code_etab'] . ' </td>
      <td style="width:150;">' . $row['pole'] . '</td>
      <td>' . $row['directeur'] . '</td>
      <td>' . $row['etablissent'] . '</td>
      <td><a href="imp_fich_tech.php?code_etab= ' . $row['code_etab'] . '" target="_blank"> بطاقة التقنية</a></td>
	   <td><a href="bordro_total.php?code_etab= ' . $row['code_etab'] . '" target="_blank">ج إرسال إجمالي</a></td>
     <td><a href="bordro_2_jour.php?code_etab= ' . $row['code_etab'] . '" target="_blank">ج إ يوم 02</a></td>
     <td><a href="bordro_sujet.php?code_etab= ' . $row['code_etab'] . '" target="_blank">ج إ المواضيع</a></td>
	</tr>';
    }
    ?>
                                    </tbody>
                                </table>

                                        <?php
                                        // fin du tableau.
                                    } else
                                        echo 'Pas d\'enregistrements dans cette table...';
                                    ?>


                        </div>
                    </td> 

                </tr> 


                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
            </table

        </div>

    </body>

</html>