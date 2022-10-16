
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>rec</title>
        <style>
            @media print
            {
                @page { size :size:portrait;


                        margin:auto;
                }

                h1 {page-break-before: always;}



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
    <body style="position:relative;width:19cm;height:27cm;margin:auto" >
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
                $req = mysql_query("select * from employeur where ID_EMPLOYEUE='$ID_EMPLOYEUE' ");
                $nbr = mysql_fetch_array($req);
                ?>

                <table style="text-align: right; width: 100%;" border="1"
                       cellpadding="2" cellspacing="2">
                    <tbody>
                        <tr>
                            <td colspan="4" rowspan="1"> الجمهورية
                                الجزائرية الديمقراطية الشعبية<br>
                                وزارة التربية الوطنية<br>
                                الديوان الوطني للتعليم و التكوين عن بعد<br>
                                المركز الجهوي سطيف</td>
                        </tr>
                        <tr>
                            <td>طلب إذن ب :</td>
                            <td colspan="3" rowspan="1"></td>
                        </tr>
                        <tr>
                            <td>اللقب :</td>
                            <td colspan="3" rowspan="1"></td>
                        </tr>
                        <tr>
                            <td>الإسم :</td>
                            <td colspan="3" rowspan="1"></td>
                        </tr>
                        <tr>
                            <td>الوظيفة :</td>
                            <td colspan="3" rowspan="1"></td>
                        </tr>
                        <tr>
                            <td>سبب التغيب أو الخروج :</td>
                            <td colspan="3" rowspan="1"></td>
                        </tr>
                        <tr>
                            <td>المدة :</td>
                            <td colspan="3" rowspan="1"></td>
                        </tr>
                        <tr>
                            <td>اليوم :</td>
                            <td colspan="3" rowspan="1"></td>
                        </tr>
                        <tr>
                            <td>الساعة من :</td>
                            <td></td>
                            <td>إلى :</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>سطيف في :</td>
                            <td></td>
                            <td>إمضاء المعني :</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>رأي رئيس المصلحة :</td>
                            <td></td>
                            <td>رأي مدير المركز</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>بالتعويض </td>
                            <td></td>
                            <td>بالتعويض </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>دون أجر</td>
                            <td></td>
                            <td>دون أجر</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>ملاحضة :ترجع إلىرئيس المصلحة</td>
                            <td></td>
                            <td>إمضاء رئيس المصلحة</td>
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