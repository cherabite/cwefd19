<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />


        <title>صحة شهادة التسجيل</title>

        </script>
    </head>


   
    <style>
        @media print
        {
            input{border:0;}
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
<body
    style="margin: auto; position: relative; width: 20cm; height: 29cm; direction: rtl;">


    <?php
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'base_crefd_19';



    $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
    mysql_select_db($db) or die('Erreur :' . mysql_error());
    mysql_query("set character_set_server='utf8'");
    mysql_query("set names 'utf8'");
    if (isset($_GET['MATR']) and isset($_GET['IANNEE']) and isset($_GET['ICODE'])) {
        $MATR = $_GET['MATR'];
        $IANNEE = $_GET['IANNEE'];
        $code = $_GET['ICODE'];
//echo $MATR;
        $IANNEXE = substr($MATR, 1, 2);
        $IANNEEINS = substr($MATR, 3, 4);
        $INSEQ = substr($MATR, 7, 7);

        //echo $IANNEE;	
      //  $req = mysql_query("select * from inseleve ,classe  where  inseleve.IANNEXE='$IANNEXE' and inseleve.IANNEEINS='$IANNEEINS' and inseleve.INSEQ='$INSEQ' and inseleve.ICODE='$code' and classe.CODE='$code'   ");
          $req = mysql_query("select * from eleve ,inscription ,classe  
			   where  eleve.ANNEXE='$IANNEXE' and eleve.ANNEEINS='$IANNEEINS' and eleve.NSEQ='$INSEQ' and 
                 inscription.IANNEXE='$IANNEXE' and inscription.IANNEEINS='$IANNEEINS' and inscription.INSEQ='$INSEQ' and inscription.IANNEE='$IANNEE'  and inscription.ICODE='$code'
			   and classe.CODE='$code'   ");  
	   $nbr = mysql_fetch_array($req);
        $nb = mysql_num_rows($req);
        $PRESUME = $nbr['PRESUME'];
        ?>


        <h3 style="text-align: center;">الجمهورية
            الجزائرية الديمقراطية الشعبية</h3>
        <h3 style="text-align: center;">وزارة
            التربية الوطنية</h3>
        <h3 style="text-align: center;">الديوان
            الوطني للتعليم و التكوين عن بعد</h3>
        <h3 style="text-align: center;">المركز
            الولائي سطيف</h3>
        <hr color="blue" width="75%"><big><br>
            </big><br>
                <big>&nbsp; الرقم :</big><big> &nbsp;
                    &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp;&nbsp; &nbsp;
                        &nbsp;&nbsp;&nbsp; مدير المركز
                        الولائي للتعليم و التكوين عن بعد * سطيف *<br>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp;<br>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp;&nbsp; &nbsp;إلى السيد : <br>
                                    <br>
                                        <br>
                                            &nbsp;<br>
                                                &nbsp;<span
                                                    style="font-weight: bold; text-decoration: underline;">الموضوع
                                                    : </span>حول تأكيـــد صحـــة : <br>
                                                    &nbsp; <br>
                                                        <span style="font-weight: bold; text-decoration: underline;">المرجــــــع:</span>
                                                        ردا علــى مراسلتكم رقـــم: &nbsp; &nbsp; &nbsp;
                                                        &nbsp;
                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                        بتاريخ: <br>
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp;<br>
                                                                <br>
                                                                    <br>
                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                        &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;
                                                                        &nbsp;&nbsp;ردا على طلبكــم المشـــار فـــي المرجـــع أعلاه
                                                                        حـــول التــــأكد مــن صحـــــة&nbsp;شهـــادة&nbsp;
                                                                        &nbsp;التسجيـــــل <br>
                                                                            <br>
                                                                                &nbsp; للطـــــــــــــالب : &nbsp;<br>
                                                                                    <br>
                                                                                        &nbsp; المولــــــــود فـــي : &nbsp; &nbsp; &nbsp;
                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                        &nbsp; &nbsp; &nbsp;ب :<br>
                                                                                            <br>
                                                                                                &nbsp; مسجـــــــــل(ة) في&nbsp;المستــــوى :<br>
                                                                                                    <br>
                                                                                                        &nbsp; للسنـــة الدراسيــــــة:<br>
                                                                                                            <br>
                                                                                                                &nbsp; ولــــــــــم يتحصــــــل علــى شهــادة إثبـــات
                                                                                                                المستـــــوى &nbsp;(يعيــــد السنــــة) كمــــــا هومبيـــن فــي
                                                                                                                كشف النقــــاط المرفق. <br>
                                                                                                                    <br>
                                                                                                                        <br>
                                                                                                                            <br>
                                                                                                                                <br>
                                                                                                                                    <br>
                                                                                                                                        &nbsp;&nbsp; سطيف
                                                                                                                                        فــي:<br>
                                                                                                                                            <br>
                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                                                                                                                                                &nbsp; &nbsp;
                                                                                                                                                &nbsp;مديـــر المركـــز الولائـــي</big>
                                                                                                                                                <?php
                                                                                                                                            }
                                                                                                                                            ?> 


                                                                                                                                            </body>
                                                                                                                                            </html>

