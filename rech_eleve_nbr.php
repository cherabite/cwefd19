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
                    <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>
                <tr>
                    <td style="text-align: right; width: 203px;" >
                        <?php include('includes/sidebar_eleve.php'); ?>
                    </td>

                    <td>
                       


                        <h3>المركز الولائي سطيف </h3></br>
                        <h3> </h3></br>
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire"> 
                            <fieldset><legend style="caption-side: right;"><h3> بحث برقم الاستمارة    </h3> </legend>
                                <table>
                                    <tr>
                                        <td>رقم الاستمارة    </td>
                                        <td>	<input type="text" name="NBR" size="5">  </td>
                                    </tr>
                                    <tr>
                                        <td>	<input type="submit" name="chercher_0" value="  بحث "> </td>

                                    </tr>
                                </table>
                        </form>	
						<?php
                      if (isset($_POST['chercher_0'])) {

                            if ($_POST['NBR'] != "") {

                                $NBR = $_POST['NBR'];
                                  $host = 'localhost';
                        $user = 'root';
                        $pass = '';
                        $db = 'base_crefd_19';


                        $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                        mysql_select_db($db) or die('Erreur :' . mysql_error());
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                                //  $nbr=mysql_fetch_array(mysql_query("select count(*) as nb from tab_eleve where MATR='$MATR' "));

                                $req_tab = mysql_query("select * from inseleve1  where ENPR='$NBR' and VALID >0  ");
                                $nbr_tab = mysql_fetch_array($req_tab);
                                 $nb_tab = mysql_num_rows($req_tab);
                                if ($nb_tab > 0) {
											
											echo('    
											<h3> نتائج البحث  </h3> 
						   
											<table style="overflow:auto;" border="2">
											<tr style="background-color: rgb(8, 173, 255);">
											<td> ر/الإستمارة </td>
											<td>  رقم التسجيل </td>
										   <td> اللقب </td>
										   <td>  الاسم </td>
										   <td> تاريخ الميلاد </td>
										   <td> المستوى  </td>
											<td> رقم الترتيب  </td>
										   <td> نوع الدروس </td>
										  
											</tr>
											<tr>
											<td> ' . $nbr_tab['ENPR'] . '</td>
											<td> ' . $nbr_tab['ANNEXE'].$nbr_tab['ANNEEINS'] .$nbr_tab['NSEQ'] . '</td>
											<td> ' . $nbr_tab['NOM'] . '</td>
											 <td> ' . $nbr_tab['PRENOM'] . ' </td>
											<td>  ' . $nbr_tab['DNS'] . '</td>
											 <td> ' . $nbr_tab['ICODE'] . ' </td>
											<td> ' . $nbr_tab['ORDREC'] . ' </td>
											 <td>  ' . $nbr_tab['COURS'] . ' </td> ');

											  
											echo ('</tr>
										  </table>						
										   ');
										   
                                } else {
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("رقم الإستمارة غير موجود");</SCRIPT> <?php
                                }
                            } else {
                                ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! إملا الفراغات");</SCRIPT> <?php
                            }
                        }

          ?>
                    </td> 

                </tr> 


                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
            </table>

        </div>

    </body>

</html>