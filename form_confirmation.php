<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>



        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>MODIFICATION_ELEVE</title>
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
                        <?php include('includes/sidebar_eleve.php'); ?>
                    </td>

                    <td style="vertical-align: top;"> 
                        <?php
                        mysql_connect("localhost", "root", "");
                        mysql_select_db("base_crefd_19");
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        ?>


                        <?php
                        if (isset($_GET['MATR'])) {
                            $MATR = $_GET['MATR'];
                            $T = $_GET['t'];
                            ?>

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                                <table style="text-align: left; width: 100%;" border="1"
                                       cellpadding="2" cellspacing="2">
                                    <tbody>
                                        <tr>
                                            <td style="text-align: center;" colspan="5"
                                                rowspan="1">
                                                <h1><br>
                                                        <span style="font-weight: bold;"><span
                                                                style="text-decoration: underline;"></span></span></h1>
                                                <h1><span style="font-weight: bold;"><span
                                                            style="text-decoration: underline;">معلومات
                                                            خاصة &nbsp;بالمـــراسلة حول صحة:</span></span></h1>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; font-weight: bold;align:right">&nbsp;رقم
                                                المراسلة الواردة : </td>
                                            <td colspan="4" rowspan="1" align="right"><input name="N_C" value=""type="text"  ></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; font-weight: bold;">تاريخ
                                                المراسلة الواردة :</td>
                                            <td colspan="4" rowspan="1"  align="right"> <input name="DATE_C" value=""
                                                                                               type="text"  ></td>
                                        </tr>
                                        <tr>
                                            <td style="text-align: right; font-weight: bold;">الى
                                                السيد :</td>
                                            <td colspan="4" rowspan="1"  align="right"> <input name="MONSIEU" value=""
                                                                                               type="text" size=100 maxlength=150 ></td>
                                        </tr>
                                        <tr>
                                            <input type="hidden" name="T" value="$T">
                                                <input type="hidden" name="MATR" value="<?php echo $line['MATR']; ?>">
                                                    <td style="text-align: center;"><input
                                                            name="atestation" value="صحة الشهادة" type="submit"></td>
                                                    <td style="text-align: center;"> <input
                                                            name="releve" value="صحة كشف النقاط" type="submit"></td>
                                                    <td style="text-align: center;"> <input
                                                            name="niveau" value="صحة المستوى الدراسي" type="submit"></td>
                                                    </tr>
                                                    </tbody>
                                                    </table>
                                                    </form>
    <?php
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