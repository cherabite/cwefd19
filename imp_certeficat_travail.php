
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>rec</title>
        <style>
            @media print
            {
                body {
                    top: 0;
                    bottom: 0;
                    margin: auto;

                    left: 0;
                    right: 0;
                    border:1px solid ;
                    padding:3px;

                }
                @page { size :A4:portrait;

                        padding:0.5 cm;0.5 cm;0.5 cm;0.5 cm;

                }



            }
            @media screen
            {
                body {
                    border:1px solid ;
                    padding:3px;

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
    <body style="position:absolute;width:19cm;height:27cm;" >
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
                $ARRETE = $nbr['ARRETE'];
                $PRESUME = $nbr['PRESUME'];
                ?>
                <dl style="text-align: center;">
                    <h3>  <dd><span style="font-weight: bold;">الجمهورية الجزائرية الديمقراطــية
                                الشعبية</span></dd>
                        <dd> <span style="font-weight: bold;"><br>
                            </span></dd>
                        <dd><span style="font-weight: bold;"> وزارة التربية الوطنية</span></dd>
                        <dd> <span style="font-weight: bold;"><br>
                            </span></dd>
                        <dd><span style="font-weight: bold;"> الديوان الوطني للتعليم و التكوين عن
                                 بعد</span></dd>
                        <dd> <span style="font-weight: bold;"><br>
                            </span></dd>
                        <dd><span style="font-weight: bold;"> المركز الولائي سطيف</span></dd>
                </dl> </h3>
            <hr width="75%" color="blue"> 
            &nbsp;
            <br>
            <dl>
                <dd style="font-weight: bold;"> رقم :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; /م.ج.س/<?php echo date("Y"); ?></dd>



                <h1 style="text-align: center;">  <dd> * شـــــهــــــادة&nbsp; عـــمــــــل *</dd> </h1>
                <dd> <br>
                </dd>
                <dd> &nbsp;</dd>


                <h3>
                    <dd> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style="font-weight: bold;"> تـشـهــد مديرة المــركـز الـولائـي للتعليم و التـكوين عن بـعــد  سطـــيـف:</span></dd>
                    <dd> <span style="font-weight: bold;"><br>
                        </span></dd>
                    <dd><span style="font-weight: bold;"> بأن السيد (ة)&nbsp; :  <?php echo $nbr['NOM']; ?> &nbsp;&nbsp; <?php echo $nbr['PRENOM']; ?></span></dd>
                    <dd> <span style="font-weight: bold;"><br>
                        </span></dd>
                    <dd><span style="font-weight: bold;"> المولود (ة) بتاريخ :&nbsp;
                            <?php
                            $DATE_NAIS = $nbr['DNS'];
                            $date = date_create($DATE_NAIS);

                            $DNS0 = date_format($date, 'Y-m-d');
                            $dns = date_format($date, 'Y');

                            if ($PRESUME == '0') {
                                echo $DNS0;
                            } else {
                                echo 'خـــلال  ' . $dns;
                            }
                            ?> <br></span></dd>
                    <dd> <span style="font-weight: bold;"><br>
                        </span></dd>
                    <dd><span style="font-weight: bold;">  مكان الميلاد : &nbsp;<?php echo $nbr['LNS']; ?>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <br></span></dd>
                    <dd> <span style="font-weight: bold;"><br>
                        </span></dd>
                    <dd><span style="font-weight: bold;"> موظف و يشتغل منصب : <?php echo $nbr['GRADE']; ?></span></dd>
                    <dd> <span style="font-weight: bold;"><br>
                        </span></dd>
                    <dd> <span style="font-weight: bold;"> مكان العمل : المركز الولائي للتعليم و التكوين عن بعد</span></dd>
                    <dd> <span style="font-weight: bold;"><br>
                        </span></dd>  
                    <dd><span style="font-weight: bold;"> وهـذا إبتداءا من
                            :  <?php echo $nbr['DATE_PV_INSTALL']; ?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <?php if ($ARRETE == 'لا') {
                                echo ' إلى يومنـا هـذا .</span></dd>';
                            } else {
                                echo 'إلى  غــاية :&nbsp;';
                                echo $nbr['DATE_ARRETE'];
                                echo'</span></dd>';
                            } ?>
                            <dd> <span style="font-weight: bold;"><br>
                                </span></dd>
                            <dd><span style="font-weight: bold;"> &nbsp;</span></dd>

                            <dd><span style="font-weight: bold;"> سلمت هذه الشهادة للمعني بالأمر بطلب
                                    منه لإستعمالها فيما يسمح به القانون.</span></dd>
                            </dl>
                            <span style="font-weight: bold;">
                               &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <br>
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                
                                سـطـيف في :&nbsp;<?php echo date("d-m-Y"); ?>     <br>
                                <br>

                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                مديرة المركز الولائي</span><br></h3>
                            <p style="position: absolute; bottom: 0;"  
                        <dd><span style="font-weight: bold;"> 
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; رقم الــهاتف :036452261 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  رقم الفاكس : 036452260 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Email:crefd19@gmail.com
                            </span></dd>
                        </p>

    <?php
}
?> 


                    </div>
                    </body>
                    </html>