<?php
// On démarre la session
session_start();

if ( isset($_SESSION['admin'])) {
    
        ?>

        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

        <html xmlns="http://www.w3.org/1999/xhtml" >
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
            <head>




                <meta name="description" content="" />

                <meta name="keywords" content="" />

                <meta name="author" content="" />

                <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

                <script type="text/javascript" src="jquery.js"></script>
                <script type="text/javascript" src="js.js"></script>

                <title>تحضير إمتحان إثبات المستوى </title>

            </head>
            <body>

                <div id="wrapper">
                    <table style="text-align: right; width: 100%;" align="right"
                           border="1" cellpadding="0" cellspacing="2">		
                        <tr>
                            <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>


                        <tr>
                            <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>


                        <tr> <td> <div id="content">
                                    <img src="guide.gif" width="750px"  border="1" > 

                                </div>
                            </td> 
                            <td>
        <?php include('includes/sidebar.php'); ?></td> </tr> 


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
           // exit();
        </SCRIPT> <?php
    }
?>
