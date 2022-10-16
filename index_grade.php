<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar"  xml:lang="ar">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>

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
                    <td style="text-align: right; width: 203px;" >
<?php include('includes/sidebar_grh_grade.php'); ?>
                    </td>



                    </td> 

                </tr> 


                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
            </table

        </div>

    </body>

</html>