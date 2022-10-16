<?php
// On démarre la session
session_start();

if (isset($_SESSION['admine']) or isset($_SESSION['admin'])) {
   
        ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
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

    <body style="direction: ">
        <div id="wrapper">
            <table style=" width: 100%;" 
                   border="1" cellpadding="0" cellspacing="2">		
                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>


                <tr>
                    <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>


                <tr> 
                    <td style="vertical-align: top; width: 203px;" >
<?php include('includes/sidebar_stock.php'); ?>
                    </td>
                    <td style="vertical-align: top;"> 


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
            exit();
        </SCRIPT> <?php
    }
?>