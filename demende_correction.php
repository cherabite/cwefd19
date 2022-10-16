
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>rec</title>
        <style>
            @media print
            {
                @page { size :size:portrait;


                        margin: auto;
                }

                table{

                    font-weight: bold;
                    border: 2px solid black;


                }
                td {
                    font-size: 14px;
                    border: 1px solid black;


                }



            }
        </style>
    </head>
    <body style="position:relative;width:19cm;height:27cm;margin:auto" >
        <div>

            <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'base_crefd_19';



            $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
            mysql_select_db($db) or die('Erreur :' . mysql_error());
            mysql_query("set character_set_server='utf8'");
            mysql_query("set names 'utf8'");

            if (isset($_GET['MATR'])) {
                $MATR = $_GET['MATR'];

                $req = mysql_query("select * from tab_eleve where MATR=$MATR   ");

                //  $req=mysql_query("select * from tab_eleve  where MATR=$MATR ");
                $nbr = mysql_fetch_array($req);
                $nb = mysql_num_rows($req);
                $PRESUME = $nbr['PRESUME'];
                $COD_ANN = $nbr['COD_ANN'];
                $ORDER = $nbr['ORDER'];
                $CD_CLAS = $nbr['CD_CLAS'];
                $ANSCOL = $nbr['ANSCOL'];
                ?>

                <table style="text-align: right; width: 100%;height:100%" border="1"
                       cellpadding="2" cellspacing="2">
                    <tr style="position:relative;  height:7%;text-align:center">
                        <td  colspan="4" rowspan="1">
                            <h3>الجمهورية
                                الجزائرية الديمقراطية الشعبية</h3>
                            <h3>وزارة
                                التربية الوطنية</h3>
                            <h3>الديوان
                                الوطني للتعليم و التكوين عن بعد</h3>
                            <h3>المركز
                                الولائي سطيف</h3>
                            <hr color="blue" width="75%">
                            <h3><u> إستمارة
                                    &nbsp;طلب &nbsp;تصحيح</u></h3>

                        </td>
                    </tr>

                    <tr>
                        <td style="position:relative; width:15%;">تـــاريخ إيـــداع ملف التــصحـيح :</td>
                        <td style="position:relative; width:15%;"><?php echo date("d-m-Y"); ?></td>
                        <td style="position:relative; width:15%;">رقــم المــلـف :</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>السنة الدراسية :</td>
                        <td colspan="3" rowspan="1"> <?php echo $nbr['COD_ANN']; ?></td>
                    </tr>
                    <tr>
                        <td>رقم الترتيب : </td>
                        <td> <?php echo $nbr['ORDER']; ?></td>
                        <td>رقم التسجيل :</td>
                        <td><?php echo $nbr['MATR']; ?></td>
                    </tr>
                    <tr>
                        <td>المستوى و الشعبة : </td>
                        <td colspan="3" rowspan="1"><?php echo $nbr['DESING']; ?></td>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="1">ضــع علامــة *
                            أمــام المعلــومة الخاطـئـة : </td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="1">الـمعـلـومات
                            المـحجــوزة في المــركــز :</td>
                        <td colspan="2" rowspan="1">التـصحــيح
                            المطــلــوب :</td>

                    </tr>
                    <tr>
                        <td>اللقب : </td>
                        <td><?php echo $nbr['NOM']; ?></td>
                        <td colspan="2" rowspan="1">..............................</td>
                    </tr>
                    <tr>
                        <td>الإسم :</td>
                        <td><?php echo $nbr['PRENOM']; ?></td>
                        <td colspan="2" rowspan="1">..............................</td>
                    </tr>
                    <tr>
                        <td>تاريخ الميلاد :</td>
                        <td>
                            <?php
                            $DATE_NAIS = $nbr['DATE_NAIS'];
                            $date = date_create($DATE_NAIS);

                            $DNS0 = date_format($date, 'Y-m-d');
                            $dns = date_format($date, 'Y');

                            if ($PRESUME == '0') {
                                echo $DNS0;
                            } else {
                                echo 'خـــلال  ' . $dns;
                            }
                            ?>

                        </td>
                        <td colspan="2" rowspan="1">.............................</td>
                    </tr>
                    <tr>
                        <td>مكان الميلاد : </td>
                        <td><?php echo $nbr['LIEU_NAIS']; ?></td>
                        <td colspan="2" rowspan="1">..............................</td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="1"></td>
                        <td></td>
                        <td>NOM :</td>
                    </tr>
                    <tr>
                        <td colspan="2" rowspan="1"></td>
                        <td></td>
                        <td>PRENOM :</td>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="1">إمـضــاء
                            الـمعــــــني :</td>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="1">خــاص بالإدارة :
                            ملف المتــمدرس الموجــود في الأرشيف .</td>
                    </tr>
                    <tr style="position:relative; height:20%;">
                        <td  style="vertical-align: top;" colspan="4" rowspan="1" >
                            <table style="text-align: centre; width: 100%;" border="1"
                                   cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td>نوع الأرشيف</td>
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
                                        <td>رقــم الترتيب</td>
                                        <td>رقــم العلبة </td>
                                    </tr>

                                    <?php
                                    if ($ANSCOL > '29') {
                                        $req_dos = mysql_query("select * from dos_ar where  ann='$COD_ANN' and niv='$CD_CLAS' and dos_ar.min<='$ORDER' and dos_ar.max>='$ORDER'");

                                        while ($nbr_dos = mysql_fetch_array($req_dos)) {

                                            echo '
				 <tr>
			    <td > ' . $nbr_dos['type'] . '</td>
				<td> ' . $nbr_dos['niv'] . '</td>
				<td > ' . $nbr_dos['ann'] . '</td>
				<td> ' . $ORDER . '</td>
				 <td> ' . $nbr_dos['REF'] . '</td>
				 
				 </tr>';
                                        }
                                    } else {
                                        echo '
				 <tr>
			    <td colspan="5" rowspan="1"> الــــــســجـــل(REGISTRE)</td>
				 
				 </tr>';
                                    }
                                    ?>
                                </tbody>
                            </table>


                        </td>
                    </tr>
                    <tr>
                        <td colspan="4" rowspan="1"><u>  سطيف في :<?php echo date("d-m-Y"); ?></u></td>
                    </tr>
                    <tr>
                        <td>رأي مديــر المركز :</td>
                        <td></td>
                        <td colspan="2" rowspan="4">إمــضـاء و خــتم
                            مـديـر المـركــز</td>
                    </tr>
                    <tr>
                        <td>موافق :</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>لا أوافق :</td>
                        <td></td>
                    </tr>
                    <tr>
                        <td>السبب
                            :......................................................<br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            ......................................................</td>
                        <td></td>
                    </tr>
                    </tbody>
                </table>

    <?php
}
?> 


        </div> 
    </body>
</html>