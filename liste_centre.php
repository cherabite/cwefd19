﻿<?php

session_start();

if (isset($_SESSION['admin'])) {
 // echo  $_SESSION['admine']; 
   
       ?>
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
                                            <td>104</td>
                                            <td>204</td>
                                            <td>304</td>
                                            <td>404</td>
                                            <td>122</td>
                                            <td>124</td>
                                            <td>212</td>
                                            <td>213</td>
                                            <td>214</td>
											 <td>215</td>
                                            <td>218</td>
                                            <td>216</td>
                                            <td>237</td>
											 <td>251</td>
                                            <td>253</td>
                                            <td>255</td>
                                            <td>257</td>
                                            <td>312</td>
                                            <td>313</td>
                                            <td>314</td>
											 <td>315</td>
                                            <td>316</td>
                                            <td>318</td>
                                            <td>337</td>
											
											 <td>351</td>
                                            <td>353</td>
                                            <td>355</td>
                                            <td>357</td>
                                            <td>عدد المترشحين</td>
                                            <td>عدد القاعات</td>
                                            <td>تحديث</td>
                                        </tr>
    <?php
    while ($row = mysql_fetch_array($result)) {
        echo' <tr>
      <td>' . $row['code_etab'] . ' </td>
      <td style="width:150;">' . $row['pole'] . '</td>
      <td>' . $row['directeur'] . '</td>
      <td>' . $row['etablissent'] . '</td>
      <td>' . $row['c104'] . '</td>
      <td>' . $row['c204'] . '</td>
      <td>' . $row['c304'] . '</td>
      <td>' . $row['c404'] . '</td>
      <td>' . $row['c122'] . '</td>
      <td>' . $row['c124'] . '</td>
      <td>' . $row['c212'] . '</td>
      <td>' . $row['c213'] . '</td>
      <td>' . $row['c214'] . '</td>
	   <td>' . $row['c215'] . '</td>
      <td>' . $row['c218'] . '</td>
      <td>' . $row['c216'] . '</td>
      <td>' . $row['c237'] . '</td>
	  <td>' . $row['c251'] . '</td>
      <td>' . $row['c253'] . '</td>
      <td>' . $row['c255'] . '</td>
      <td>' . $row['c257'] . '</td>
      <td>' . $row['c312'] . '</td>
      <td>' . $row['c313'] . '</td>
      <td>' . $row['c314'] . '</td>
	   <td>' . $row['c315'] . '</td>
      <td>' . $row['c316'] . '</td>
      <td>' . $row['c318'] . '</td>
      <td>' . $row['c337'] . '</td>
	    <td>' . $row['c351'] . '</td>
      <td>' . $row['c353'] . '</td>
      <td>' . $row['c355'] . '</td>
      <td>' . $row['c357'] . '</td>
      <td>' . $row['nbr_condidats'] . '</td>
      <td>' . $row['nbr_classes'] . '</td>
      <td><a href="modif_centre.php?reference= ' . $row['code_etab'] . '"> تحديث</a></td>
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
<?php
    } else {
        ?> <SCRIPT LANGUAGE="Javascript">	alert("ليس لديك الصلاحية");
            window.location.href = 'indexx.php';

        </SCRIPT> <?php
    }
?>