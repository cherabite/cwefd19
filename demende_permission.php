
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>rec</title>
        <style>
            @media print
            {
                @page { size :size:paysage;


                        margin:auto;
                }

                h1 {page-break-before: always;}



                table{
                    page:portrait;

                    border: 2px solid black;
                    text-align: center;

                    border-collapse: collapse;}
                td {
                    font-size: 14px;
                    border: 1px solid black;
                    white-space: nowrap; overflow: hidden;
                    text-overflow: clip;

                }			
            }
            @media screen
            {
                body{
                    background-color:lightgreen;
                }
                table{

                    page:portrait;
                    border: 2px solid black;
                    text-align: center;

                    border-collapse: collapse;}
                td {
                    font-size: 13px;
                    border: 1px solid black;
                    white-space: nowrap; overflow: hidden;
                    text-overflow: clip;

                }	
            }

        </style>
    </head>
    <body  style="margin: auto; position: relative; width: 29cm; height: 20cm; direction: rtl;"> 
        <div>

            <?php
            $host = 'localhost';
            $user = 'root';
            $pass = '';
            $db = 'grh';



            $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
            mysql_select_db($db) or die('Erreur :' . mysql_error());
            mysql_query("set character_set_server='utf8'");
            mysql_query("set names 'utf8'");

            if (isset($_GET['ID_EMPLOYEUE'])) {

                $ID_EMPLOYEUE = $_GET['ID_EMPLOYEUE'];
                if (isset($_GET['RET'])) {
                    $RET = $_GET['RET'];
                }
                $req = mysql_query("select * from employeur where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
                $nbr = mysql_fetch_array($req);
                ?>

                <table style="text-align: right; width: 97%;height:97%;margin: auto;" border="1"
                       cellpadding="2" cellspacing="2">
                    <tbody>
                        <tr  style="position: relative;  height: 100%;">
                            <td style="vertical-align: top;">
                                <table style="text-align: right; width: 100%;height: 100%;"
                                       border="1" cellpadding="2" cellspacing="2">
                                    <tbody>
                                        <tr style="font-weight: bold;">
                                            <td style="text-align: center;" colspan="4"
                                                rowspan="1"> الجمهورية
                                                الجزائرية الديمقراطية الشعبية<br>
                                                وزارة التربية الوطنية<br>
                                                الديوان الوطني للتعليم و التكوين عن بعد<br>
                                                المركز الولائي سطيف</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">طلب إذن ب :</td>
                                            <td style="font-weight: bold;" colspan="3" rowspan="1"><?php echo $RET; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">اللقب :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"><?php echo $nbr['NOM']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">الإسم :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"><?php echo $nbr['PRENOM']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">الوظيفة :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"><?php echo $nbr['GRADE']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">سبب التغيب أو
                                                الخروج :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">المدة :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">اليوم :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="position: relative; width: 25%; font-weight: bold;">الساعة
                                                من :</td>
                                            <td
                                                style="position: relative; width: 25%; font-weight: bold;"></td>
                                            <td
                                                style="position: relative; width: 25%; font-weight: bold;">إلى
                                                :</td>
                                            <td style="position: relative; width: 25%;"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">سطيف في :</td>
                                            <td style="font-weight: bold;"></td>
                                            <td style="font-weight: bold;">إمضاء المعني :</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-weight: bold; text-align: center; text-decoration: underline;"
                                                colspan="2" rowspan="1">رأي رئيس المصلحة :</td>
                                            <td
                                                style="font-weight: bold; text-align: center; text-decoration: underline;"
                                                colspan="2" rowspan="1">رأي مدير المركز</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">بالتعويض </td>
                                            <td style="font-weight: bold;"></td>
                                            <td style="font-weight: bold;">بالتعويض </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">دون أجر</td>
                                            <td style="font-weight: bold;"></td>
                                            <td style="font-weight: bold;">دون أجر</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" colspan="2"
                                                rowspan="1">ملاحضة :ترجع
                                                إلى رئيس المصلحة</td>
                                            <td style="font-weight: bold;" colspan="2"
                                                rowspan="1">إمضاء رئيس المصلحة</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                            <td style="vertical-align: top;">
                                <table style="text-align: right; width: 100%;height:100%"
                                       border="1" cellpadding="2" cellspacing="2">
                                    <tbody>
                                        <tr style="font-weight: bold;">
                                            <td style="text-align: center;" colspan="4"
                                                rowspan="1"> الجمهورية
                                                الجزائرية الديمقراطية الشعبية<br>
                                                وزارة التربية الوطنية<br>
                                                الديوان الوطني للتعليم و التكوين عن بعد<br>
                                                المركز الولائي سطيف</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">طلب إذن ب :</td>
                                            <td style="font-weight: bold;" colspan="3" rowspan="1"><?php echo $RET; ?></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">اللقب :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"><?php echo $nbr['NOM']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">الإسم :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"><?php echo $nbr['PRENOM']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">الوظيفة :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"> <?php echo $nbr['GRADE']; ?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">سبب التغيب أو
                                                الخروج :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">المدة :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">اليوم :</td>
                                            <td style="font-weight: bold;" colspan="3"
                                                rowspan="1"></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="position: relative; width: 25%; font-weight: bold;">الساعة
                                                من :</td>
                                            <td
                                                style="position: relative; width: 25%; font-weight: bold;"></td>
                                            <td
                                                style="position: relative; width: 25%; font-weight: bold;">إلى
                                                :</td>
                                            <td style="position: relative; width: 25%;"></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">سطيف في :</td>
                                            <td style="font-weight: bold;"></td>
                                            <td style="font-weight: bold;">إمضاء المعني :</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td
                                                style="font-weight: bold; text-align: center; text-decoration: underline;"
                                                colspan="2" rowspan="1">رأي رئيس المصلحة :</td>
                                            <td
                                                style="font-weight: bold; text-align: center; text-decoration: underline;"
                                                colspan="2" rowspan="1">رأي مدير المركز</td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">بالتعويض </td>
                                            <td style="font-weight: bold;"></td>
                                            <td style="font-weight: bold;">بالتعويض </td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;">دون أجر</td>
                                            <td style="font-weight: bold;"></td>
                                            <td style="font-weight: bold;">دون أجر</td>
                                            <td></td>
                                        </tr>
                                        <tr>
                                            <td style="font-weight: bold;" colspan="2"
                                                rowspan="1">ملاحضة :ترجع
                                                إلى رئيس المصلحة</td>
                                            <td style="font-weight: bold;" colspan="2"
                                                rowspan="1">إمضاء رئيس المصلحة</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>


    <?php
}
?> 


        </div> 
    </body>
</html>