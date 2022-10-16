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
                if (parseInt(value) == value) alert ('ok'); else alert('?? ??);
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
                        $select = "SELECT * FROM employeur  where ARRETE ='لا' ";
//$select = "SELECT * FROM tab_retard where YEAR (DATE_RET) > 2015 "; 
                        $result = mysql_query($select);
                        $total = mysql_num_rows($result);
                        echo($total);
                        ?>
                        <form method="post" action="statistique_retardpdf.php" >
                            <table style="width: 100%" border="1">
                                <tbody>
                                    <tr>
                                        <td colspan="9" rowspan="1">
                                            <h1 style="text-align: center;"><span style="text-decoration: underline;"><span

                                                        style="font-weight: bold;">إستخراج إحصائيات الغياب </span></span></h1>
                                            <br>
                                                <br>
                                                    <br>
                                                        <br>
                                                            </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span style="font-weight: bold;">الموظفون </span></td>
                                                                <td style="width: 55px;"><span style="font-weight: bold;">
                                                                        <select name="ID_EMPLOYEUE"> 
                                                                            <?php
                                                                            $retour = mysql_query("select * from employeur where ARRETE ='لا'"); // afficher les classes
                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                echo '<option value="' . $a['ID_EMPLOYEUE'] . '">' . $a['NOM'] . '  ' . $a['PRENOM'] . '</option>';
                                                                            }
                                                                            ?>  
                                                                            <option  value= "0000" selected> كل الموظفين</option>
                                                                        </select> 
                                                                    </span> </td>
                                                                <td><span style="font-weight: bold;">
                                                                    </span> </td>
                                                                <td><span style="font-weight: bold;">
                                                                    </span> </td>
                                                                <td colspan="5" rowspan="1"><span style="font-weight: bold;">
                                                                    </span> <span style="font-weight: bold;">
                                                                    </span> </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span style="font-weight: bold;">&nbsp;إختر الشهر :</span></td>
                                                                <td><span style="font-weight: bold;">
                                                                        <select name="MOIS_01"> 
                                                                            <option selected > </option>
<?php include('fonction_date/mois.php'); ?>
                                                                        </select>
                                                                    </span></td>
                                                                <td><span style="font-weight: bold;">السنة :</span></td>
                                                                <td>
                                                                    <select name="ANNEE_01"> 
                                                                        <option selected > 2017</option>
<?php include('fonction_date/annee.php'); ?>
                                                                    </select>
                                                                </td>


                                                                <td colspan="4" rowspan="1"> <span style="font-weight: bold;"><input

                                                                            name="afficher0" value="إظهار النتائج" type="submit"></span></td>
                                                                <td><span style="font-weight: bold;"><br>
                                                                    </span> </td>
                                                            </tr>
                                                            <tr>
                                                                <td colspan="9" rowspan="1">
                                                                    <h2 style="text-align: center;"><span style="text-decoration: underline;"><span

                                                                                style="font-weight: bold;">خيارات أخرى</span></span></h2>
                                                                    <h5><span style="font-weight: bold;"></span></h5>
                                                                    <br>
                                                                </td>
                                                            </tr>
                                                            <tr>
                                                                <td><span style="font-weight: bold;">من تاريخ
                                                                        :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الشهر :</span></td>
                                                                <td><span style="font-weight: bold;"> <select name="MOIS_02"> 
                                                                            <option selected > </option>
<?php include('fonction_date/mois.php'); ?>
                                                                        </select>
                                                                    </span> </td>
                                                                <td><span style="font-weight: bold;">السنة :</span></td>
                                                                <td>
                                                                    <select name="ANNEE_02"> 
                                                                        <option selected > 2017</option>
<?php include('fonction_date/annee.php'); ?>
                                                                    </select>
                                                                </td>
                                                                <td><span style="font-weight: bold;">إلى
                                                                        تاريخ&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; الشهر :</span></td>
                                                                <td><span style="font-weight: bold;"> <select name="MOIS_03"> 
                                                                            <option selected > </option>
<?php include('fonction_date/mois.php'); ?>
                                                                        </select>
                                                                    </span> </td>
                                                                <td><span style="font-weight: bold;">السنة </span></td>
                                                                <td>

                                                                    <select name="ANNEE_03"> 
                                                                        <option selected > 2017</option>
<?php include('fonction_date/annee.php'); ?>
                                                                    </select>
                                                                </td>
                                                                <td><span style="font-weight: bold;"><input name="afficher1" value="إظهار النتائج"

                                                                                                            type="submit"><br>
                                                                                </span> </td>
                                                                                </tr>
                                                                                </tbody>
                                                                                </table>
                                                                                </form>
                                                                                </td> 

                                                                                </tr> 


                                                                                <tr>
                                                                                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
                                                                                </table

                                                                                </div>

                                                                                </body>

                                                                                </html>