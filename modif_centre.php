<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>



        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>تحديث مراكز الإجراء </title>

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
                    <td> <div id="content">
                            <?php
                            $host = 'localhost';
                            $user = 'root';
                            $pass = '';
                            $db = 'imthne';


                            $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
                            mysql_select_db($db) or die('Erreur :' . mysql_error());
                            mysql_query("set character_set_server='utf8'");
                            mysql_query("set names 'utf8'");

//if(isset($_GET['reference']));
//if(empty($_GET['reference']))
                            if (!empty($_GET['reference'])) {
                                if (isset($_GET['reference']))
                                    ; {
                                    $id = $_GET['reference'];
                                    $select = "SELECT * FROM tab_stat where code_etab= '$id'";
                                    $result = mysql_query($select);
                                    $select_tab_niv = "SELECT * FROM tab_niv where cod_etab='$id'";
                                    $result_tab_niv = mysql_query($select_tab_niv);
                                    $total = mysql_num_rows($result);
                                    // echo $total;
                                    if ($row = mysql_fetch_array($result)) {
                                        ?>		  
                                        تحديث مراكز الإمتحان<br>
                                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>"
                                                  name="modificationcentre">
                                                <fieldset><legend>مركز الإجراء</legend>
                                                    <table style="text-align: left; width: 500px; height: 88px;" border="1" cellpadding="2" cellspacing="2">
                                                        <tbody>
                                                            <tr>
                                                                <td>الولاية :</td>
                                                                <td><input type="text" name="pole" value="<?php echo $row['pole']; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>إسم المركز :</td>
                                                                <td><input type="text" name="etablissent"  value="<?php echo $row['etablissent']; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>مدير المركز :</td>
                                                                <td><input type="text" name="directeur" value="<?php echo $row['directeur']; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>عدد القاعات :</td>
                                                                <td><input type="text" name="nbr_classes" value="<?php echo $row['nbr_classes']; ?>"></td>
                                                            </tr>
                                                            <tr>
                                                                <td>عدد المترشحين :</td>
                                                                <td><input type="text" name="nbr_condidats" value="<?php echo $row['nbr_condidats']; ?>"></td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </fieldset>
                                                <br>
                                                    <fieldset><legend>المستويات الخاصة بالمركز</legend><br>
                                                            <table style="text-align: left; width: 100%;" border="1"cellpadding="2" cellspacing="2">
                                                                <tbody>
                                                                    <tr>
                                                                        <td>المستوى</td>
                                                                        <td>العدد</td>
                                                                        <td colspan="1" rowspan="7"></td>
                                                                        <td>المستوى</td>
                                                                        <td>العدد</td>
                                                                        <td colspan="1" rowspan="7"></td>
                                                                        <td>المستوى</td>
                                                                        <td>العدد</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>104</td>
                                                                        <td><input type="text" name="104" value="<?php echo $row['104']; ?>"></td> 

                                                                        <td>212</td>
                                                                        <td><input type="text" name="212" value="<?php echo $row['212']; ?>"></td>
                                                                        <td>312</td>
                                                                        <td><input type="text" name="312" value="<?php echo $row['312']; ?>"></td>
                                                                    </tr>
                                                                    <tr> 
                                                                        <td>204</td>
                                                                        <td><input type="text" name="204" value="<?php echo $row['204']; ?>"></td>
                                                                        <td>213</td>
                                                                        <td><input type="text" name="213" value="<?php echo $row['213']; ?>"></td>
                                                                        <td>313</td>
                                                                        <td><input type="text" name="313" value="<?php echo $row['313']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>304</td>
                                                                        <td><input type="text" name="304" value="<?php echo $row['304']; ?>"></td>
                                                                        <td>214</td>
                                                                        <td><input type="text" name="214" value="<?php echo $row['214']; ?>"></td>
                                                                        <td>314</td>
                                                                        <td><input type="text" name="314" value="<?php echo $row['314']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>404</td>
                                                                        <td><input type="text" name="404" value="<?php echo $row['404']; ?>"></td>
                                                                        <td>216</td>
                                                                        <td><input type="text" name="216" value="<?php echo $row['216']; ?>"></td>
                                                                        <td>316</td>
                                                                        <td><input type="text" name="316" value="<?php echo $row['316']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>122</td>
                                                                        <td><input type="text" name="122" value="<?php echo $row['122']; ?>"></td>
                                                                        <td>218</td>
                                                                        <td><input type="text" name="218" value="<?php echo $row['218']; ?>"></td>
                                                                        <td>318</td>
                                                                        <td><input type="text" name="318" value="<?php echo $row['318']; ?>"></td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td>124</td>
                                                                        <td><input type="text" name="124" value="<?php echo $row['124']; ?>"></td>
                                                                        <td>237</td>
                                                                        <td><input type="text" name="237" value="<?php echo $row['237']; ?>"></td>
                                                                        <td>337</td>
                                                                        <td><input type="text" name="337" value="<?php echo $row['337']; ?>"></td>
                                                                    </tr>
																	
																	 <tr>
                                                                        <td>251</td>
                                                                        <td><input type="text" name="251" value="<?php echo $row['251']; ?>"></td>
                                                                        <td>253</td>
                                                                        <td><input type="text" name="253" value="<?php echo $row['253']; ?>"></td>
                                                                        <td>255</td>
                                                                        <td><input type="text" name="255" value="<?php echo $row['255']; ?>"></td>
                                                                    </tr>
																	 <tr>
                                                                        <td>257</td>
                                                                        <td><input type="text" name="257" value="<?php echo $row['257']; ?>"></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
																	 <tr>
                                                                        <td>351</td>
                                                                        <td><input type="text" name="351" value="<?php echo $row['351']; ?>"></td>
                                                                        <td>353</td>
                                                                        <td><input type="text" name="353" value="<?php echo $row['353']; ?>"></td>
                                                                        <td>355</td>
                                                                        <td><input type="text" name="355" value="<?php echo $row['355']; ?>"></td>
                                                                    </tr>
																	 <tr>
                                                                        <td>357</td>
                                                                        <td><input type="text" name="357" value="<?php echo $row['357']; ?>"></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                        <td></td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                            <br>
                                                                </fieldset>
                                                                <input type="hidden" name="code_etab" value="<?php echo $row['code_etab']; ?>">
                                                                    <br>
                                                                        <input type="submit" name="modifier" value="تحديث"> &nbsp;&nbsp;&nbsp;
                                                                            <input type="reset" name="annule" value="إلغاء">
                                                                                </form>
            <?php
        }
    }
}
if (isset($_POST['etablissent'])) {
    if ($_POST['etablissent'] != "") {
        $g = $_POST['code_etab'];
        $ff = $_POST['etablissent'];

        $directeur = $_POST['directeur'];
        $nbr_classes = $_POST['nbr_classes'];
        $n1 = $_POST['104'];
        $n2 = $_POST['204'];
        $n3 = $_POST['304'];
        $n4 = $_POST['404'];
        $n5 = $_POST['122'];
        $n6 = $_POST['124'];
        $n7 = $_POST['212'];
        $n8 = $_POST['213'];
        $n9 = $_POST['214'];
        $n10 = $_POST['216'];
        $n11 = $_POST['218'];
        $n12 = $_POST['237'];
        $n13 = $_POST['312'];
        $n14 = $_POST['313'];
        $n15 = $_POST['314'];
        $n16 = $_POST['316'];
        $n17 = $_POST['318'];
        $n18 = $_POST['337'];
		
		
		 $n19 = $_POST['251'];
        $n20 = $_POST['253'];
        $n21 = $_POST['255'];
        $n22 = $_POST['257'];
		 $n23 = $_POST['351'];
        $n24 = $_POST['353'];
        $n25 = $_POST['355'];
        $n26 = $_POST['357'];
        mysql_query("update tab_stat set etablissent='$ff',directeur='$directeur',nbr_classes='$nbr_classes', tab_stat.104='$n1',tab_stat.204='$n2',tab_stat.304='$n3',tab_stat.404='$n4',tab_stat.122='$n5',tab_stat.124='$n6',tab_stat.212='$n7',tab_stat.213='$n8',tab_stat.214='$n9',tab_stat.216='$n10',tab_stat.218='$n11',tab_stat.237='$n12',tab_stat.312='$n13',tab_stat.313='$n14',tab_stat.314='$n15',tab_stat.316='$n16',tab_stat.318='$n17',tab_stat.337='$n18' 
,tab_stat.251='$n19',tab_stat.253='$n20' ,tab_stat.255='$n21' ,tab_stat.257='$n22'  
,tab_stat.351='$n23',tab_stat.353='$n24' ,tab_stat.355='$n25' ,tab_stat.357='$n26'
		where code_etab='$g'");
        // mysql_query("UPDATE tab_total SET directeur='$directeur',etab='$ff',nbr_classes='$nbr_classes' where cod_etab='$g' ");

        $sel = "SELECT * FROM tab_stat where code_etab='$g'";
        $res = mysql_query($sel);
        $tt = mysql_num_rows($res);
        $nbrcha = mysql_num_fields($res);

        while ($ro = mysql_fetch_row($res)) {
            $nbr_condidats = 0;
            for ($i = 1; $i < 27; $i++) {
                //$v=$row[$i];
                if ($ro[$i] > 0) {
                    $nbr_condidats = $nbr_condidats + $ro[$i];
                    //$field=mysql_field_name($result, $i);	
                    //création de la requête SQL:
                }
            }
            mysql_query("update tab_stat set nbr_condidats='$nbr_condidats' where code_etab='$g' ");
        }
        //tab_niv
        $select_tab_niv = "SELECT * FROM tab_niv ";
        $result_tab_niv = mysql_query($select_tab_niv);
        $total_tab_niv = mysql_num_rows($result_tab_niv);

        if ($total_tab_niv == 0) { // remplire tab_niv
            $select1 = "SELECT * FROM tab_stat ";
            $result1 = mysql_query($select1);
            $total1 = mysql_num_rows($result1);
            $nbrchamps1 = mysql_num_fields($result1);

            while ($row1 = mysql_fetch_row($result1)) {
                $nbr_niv = 0;
                for ($i = 1; $i < 27; $i++) {
                    //$v=$row[$i];
                    if ($row1[$i] > 0) {
                        $nbr_niv = $nbr_niv + 1;
                        $field = mysql_field_name($result1, $i);
                        //création de la requête SQL:
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        $sql_t = "INSERT  INTO tab_niv (cod_etab ,etab ,niv,nbr_cond_par_niv )
                         VALUES ( '$row1[30]','$row1[27]','$field','$row1[$i]') ";

                        //exécution de la requête SQL:
                        mysql_query($sql_t);
                    }
                }
                // inserer nbr_niv dans tab_total
                //    $sql_h = "INSERT  INTO tab_total (nbr_classes,nbr_niv,nbr_cond_par_centre,etab,cod_etab,directeur,pole)
                //     VALUES ( '$row1[23]','$nbr_niv','$row1[0]','$row1[19]','$row1[22]','$row1[21]','$row1[20]') " ;
                //	  mysql_query($sql_h)  ;
            }
        } else {
            $select_tab_niv1 = "SELECT * FROM tab_niv where cod_etab='$g'";
            $result_tab_niv1 = mysql_query($select_tab_niv1);
            $total_tab_niv1 = mysql_num_rows($result_tab_niv1);
            if ($total_tab_niv1 == 0) {
                $s_ins = "SELECT * FROM tab_stat where code_etab='$g' ";
                $r_ins = mysql_query($s_ins);
                $t_ins = mysql_num_rows($r_ins);
                $row3 = mysql_fetch_row($r_ins);
                for ($i = 1; $i < 27; $i++) {
                    //$v=$row[$i];
                    if ($row3[$i] > 0) {
                        $field = mysql_field_name($r_ins, $i);
                        //création de la requête SQL:
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        $sql_ins = "INSERT  INTO tab_niv (cod_etab ,etab ,niv,nbr_cond_par_niv )
                                       VALUES ( '$row3[30]','$row3[27]','$field','$row3[$i]') ";

                        //exécution de la requête SQL:
                        mysql_query($sql_ins);
                    }
                }
            } else {
                $s_ins = "SELECT * FROM tab_stat where code_etab='$g' ";
                // $selectu = "SELECT * FROM tab_stat where code_etab ";
                $resultu = mysql_query($s_ins);
                $r_ins = mysql_query($s_ins);
                $rowu = mysql_fetch_row($r_ins);
                //echo $g;

                for ($i = 1; $i < 27; $i++) {
                    if ($rowu[$i] > 0) {
                        $field = mysql_field_name($r_ins, $i);
                        $select_tab_niv2 = "SELECT * FROM tab_niv where cod_etab='$g' and niv='$field'";
                        $result_tab_niv2 = mysql_query($select_tab_niv2);
                        $total_tab_niv2 = mysql_num_rows($result_tab_niv2);
                        if ($total_tab_niv2 > 0) {
                            mysql_query("set character_set_server='utf8'");
                            mysql_query("set names 'utf8'");
                            mysql_query("UPDATE tab_niv set nbr_cond_par_niv='$rowu[$i]' where cod_etab='$g' and niv='$field' ");
                        } elseif ($total_tab_niv2 == 0) {
                            $sql_t = "INSERT  INTO tab_niv (cod_etab ,etab ,niv,nbr_cond_par_niv )
                                          VALUES ( '$rowu[30]','$rowu[27]','$field','$rowu[$i]') ";

                            //exécution de la requête SQL:
                            mysql_query($sql_t);
                        }
                    }
                }


                //
            }
        }
        // update tab_total
        $select = "SELECT * FROM tab_total ";
        $result = mysql_query($select);
        $nbr_row = mysql_num_rows($result);
        $nbrchamps = mysql_num_fields($result);
        if ($nbr_row == 0) {//tab_total est vide
            $select_1 = "SELECT * FROM tab_stat ";
            $result_1 = mysql_query($select_1);
            while ($row1 = mysql_fetch_row($result_1)) {
                $nbr_niv = 0;
                for ($i = 1; $i < 27; $i++) {
                    //$v=$row[$i];
                    if ($row1[$i] > 0) {
                        $nbr_niv = $nbr_niv + 1;
                    }
                }
                // inserer nbr_niv dans tab_total
                $sql_h = "INSERT  INTO tab_total (nbr_classes,nbr_niv,nbr_cond_par_centre,etab,cod_etab,directeur,pole)
                             VALUES ( '$row1[31]','$nbr_niv','$row1[0]','$row1[27]','$row1[30]','$row1[29]','$row1[28]') ";
                mysql_query($sql_h);
            }
        } else {

            for ($k = 1; $k < $nbr_row + 1; $k++) {
                $select_a = "SELECT * FROM tab_stat where code_etab='$k' ";
                $result_a = mysql_query($select_a);
                $nbr_r = mysql_num_rows($result_a);
                $row1 = mysql_fetch_row($result_a);
                //
                echo '//';
                $nbr_niv = 0;
                for ($i = 1; $i < 27; $i++) {
                    //$v=$row[$i];
                    if ($row1[$i] > 0) {
                        $nbr_niv = $nbr_niv + 1;
                    }
                    mysql_query("UPDATE tab_total SET directeur='$row1[29]',etab='$row1[27]',nbr_classes='$row1[31]',nbr_niv='$nbr_niv',nbr_cond_par_centre='$row1[0]' where cod_etab='$k' ");
                }
            }
        }
//********************************
        for ($z = 1; $z < $nbr_row + 1; $z++) {
            $select_b = "SELECT * FROM tab_total where cod_etab='$z'  ";
            $result_b = mysql_query($select_b);
            $nbr_b = mysql_num_rows($result_b);
            if ($row = mysql_fetch_row($result_b)) {
                $pv_salle = $row[28] * 4;
                $nb_sal = $row[28];
                //$autorite_tot=$row[20]//
                $conv_gardien = $row[28] * 3;
                //$conv_com_secrit//
                //$stylo=$row[28]//
                $envloppe = $row[28] * 4;
                $inter_cal = $row[30] * 4;
                $briellon = $row[30] * 8;
                $etiquette = $row[30];
                $feille_examen = $row[30] * 4;
                $liste_cond_par_classe = $row[28] * 2;
                $listing = $row[29];
                $etiquette = $row[30];
                if (($nb_sal % 8 == 0)) {
                    $ammana = (int) ($nb_sal / 8);
                    $travails = (int) ($nb_sal / 8);
                } else {
                    $ammana = (int) ($nb_sal / 8) + 1;
                    $travails = (int) ($nb_sal / 8) + 1;
                }
                if (($nb_sal % 10 == 0)) {
                    $commun = (int) ($nb_sal / 10);
                } else {
                    $commun = (int) ($nb_sal / 10) + 1;
                }
                if ($ammana > 8) {
                    $ammana = 8;
                }
                if ($travails > 5) {
                    $travails = 5;
                }
                $autorite_tot = $ammana + $commun + $conv_gardien + 2;
                $conv_com_secrit = $ammana + $commun;
                $stylo = $ammana + $commun + 2;

                // echo"$pv_salle";
                $sql_f = mysql_query("UPDATE tab_total SET pv_salle='$pv_salle',ammana='$ammana',commun='$commun',travails='$travails',autorite_tot='$autorite_tot',conv_gardien='$conv_gardien',conv_com_secrit='$conv_com_secrit',stylo='$stylo', envloppe='$envloppe',inter_cal='$inter_cal', briellon='$briellon',etiquette='$etiquette',feille_examen='$feille_examen',liste_cond_par_classe='$liste_cond_par_classe', listing='$listing' where cod_etab='$z' ");

                mysql_query($sql_f);
            }
        }
        //
        ?> <SCRIPT LANGUAGE="Javascript">	alert("تم التحديث بنجاح!");</SCRIPT> 
                                                                            <?php
                                                                        } else {
                                                                            ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! Vous devez remplire tous les champss");</SCRIPT> <?php
                                                                        }
                                                                        echo '<div class="corp"><br/><br/><a href="liste_centre.php"> الرجوع إلى قائمةالمراكز</a></div>';
                                                                    }
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