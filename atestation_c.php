
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>rec</title>
        <style>
            @media print
            {
                @page { 
                    size :A5 portrait;


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
    <body style="margin: auto; position: relative; width: 14cm; height: 21cm; direction: rtl;" >
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


                <table style="width: 100%; height: 100%;" border="1" cellpadding="2" cellspacing="2">
                    <tbody>
                        <tr style=" position: relative; height: 4cm;">
                            <td style=" position: relative; width: 5cm;">rer</td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 1cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 1cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 4cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 1cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 1cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 1cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 1cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr style=" position: relative; height: 1cm;">
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
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