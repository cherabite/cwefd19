<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>modifier grade</title>
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




                        if (isset($_GET['ID_GRADE'])) {
                            $ID_GRADE = $_GET['ID_GRADE'];


                            $don = mysql_query("select * from tab_grade where ID_GRADE='$ID_GRADE' ");
                            $nb = mysql_num_rows($don);
                            // echo $nb;
                            $line = mysql_fetch_array($don);
                            ?>



                            <h3>المركز الولائي سطيف </h3></br>
                            <h3>تحديث الرتبة   </h3></br>
                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire"> 
                                <input type="text" name="GRADE"  size="80" value="<?php echo $line['GRADE']; ?>"><br/> <br/>
                                    <input type="hidden" name="ID_GRADE" value="<?php echo $line['ID_GRADE']; ?>">
                                        <input type="submit" name="modifier" value="تحديث">

                                            </form>			 

                                            <?php
                                        }

                                        if (isset($_POST['GRADE'])) {

                                            if ($_POST['GRADE'] != "") {

                                                $GRADE = $_POST['GRADE'];

                                                $ID_GRADE = $_POST['ID_GRADE'];

                                                mysql_query("update tab_grade set GRADE='$GRADE' where ID_GRADE='$ID_GRADE' ");
                                                ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التحديث بنجاح!");</SCRIPT> 
                                                <?php
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