<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />


        <title>تأكيـــد المستـــوى</title>

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
    if (isset($_GET['MATR'])) {
        $MATR = $_GET['MATR'];

        $T = $_GET['t'];
        if ($T == 'a') {
            $req = mysql_query("select * from tab_eleve  where  MATR=$MATR   ");
            $nbr = mysql_fetch_array($req);
            $nb = mysql_num_rows($req);
            $NOM = $nbr['NOM'];
            $PRENOM = $nbr['PRENOM'];

            $LNS = $nbr['LIEU_NAIS'];
            $IANNEE = $nbr['COD_ANN'];
            $ORDREC = $nbr['ORDER'];
            $FILIERE = $nbr['DESING'];
            $DECISE = $nbr['DECISE'];
            $PRESUME = $nbr['PRESUME'];
            $DATE_NAIS = $nbr['DATE_NAIS'];
            $date = date_create($DATE_NAIS);

            $DNS0 = date_format($date, 'Y-m-d');
            $dns = date_format($date, 'Y');
        } else {
            //isset($_GET['IANNEE']);
            //isset($_GET['ICODE']);
            $IANNEE = $_GET['IANNEE'];
            $code = $_GET['ICODE'];
            echo ('b');
//echo $MATR;
            $IANNEXE = substr($MATR, 1, 2);
            $IANNEEINS = substr($MATR, 3, 4);
            $INSEQ = substr($MATR, 7, 7);

            //echo $IANNEE;		
           // $req = mysql_query("select * from inseleve ,classe  where  inseleve.IANNEXE='$IANNEXE' and inseleve.IANNEEINS='$IANNEEINS' and inseleve.INSEQ='$INSEQ' and inseleve.IANNEE='$IANNEE'  and inseleve.ICODE='$code' and classe.CODE='$code'   ");
              $req = mysql_query("select * from eleve ,inscription ,classe  
			   where  eleve.ANNEXE='$IANNEXE' and eleve.ANNEEINS='$IANNEEINS' and eleve.NSEQ='$INSEQ' and 
                 inscription.IANNEXE='$IANNEXE' and inscription.IANNEEINS='$IANNEEINS' and inscription.INSEQ='$INSEQ' and inscription.IANNEE='$IANNEE'  and inscription.ICODE='$code'
			   and classe.CODE='$code'   ");  
		   $nbr = mysql_fetch_array($req);
            $nb = mysql_num_rows($req);

            $NOM = $nbr['NOM'];
            $PRENOM = $nbr['PRENOM'];

            $LNS = $nbr['LNS'];
            $IANNEE = $nbr['IANNEE'];
            $ORDREC = $nbr['ORDREC'];
            $FILI = $nbr['FILIERE'];
            $NIVEAU = $nbr['NIVEAU'];
            $DECISE = $nbr['MENTION'];
            $PRESUME = $nbr['PRESUME'];
            $FILIERE = $NIVEAU . '  ' . $FILI;
            $DATE_NAIS = $nbr['DNS'];
            $date = date_create($DATE_NAIS);

            $DNS0 = date_format($date, 'Y-m-d');
            $dns = date_format($date, 'Y');
        }
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
                <big>&nbsp; &nbsp; الرقم :<input name="N_C" value=""type="text" size=5 maxlength=5 >/م.و.س/<?php echo date("Y"); ?></big><big>
                    &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; <br>
                        <br>

                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; مدير
                            المركز
                            الولائي للتعليم و التكوين عن بعد * سطيف *<br>
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp;إلى السيد :<input name="N_C" value=""type="text" size=50 maxlength=50 > <br>
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br>
                                                &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                &nbsp; &nbsp; &nbsp; &nbsp;<input name="N_C" value=""type="text" size=30 maxlength=30 > <br>
                                                        <br>
                                                            <br>
                                                                &nbsp; &nbsp; &nbsp;الموضوع : حول تأكيـــد المستـــوى
                                                                الدراســـي: <br>
                                                                    <br>
                                                                        &nbsp; &nbsp; &nbsp;المرجــــــع: مراسلتكم رقـــم: &nbsp;<input name="N_C" value=""type="text" size=5 maxlength=5 > 
                                                                            &nbsp; &nbsp; &nbsp; &nbsp;
                                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                            بتاريخ:<input name="N_C" value=""type="text" size=10 maxlength=10 > <br>
                                                                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                    &nbsp; &nbsp; <br>
                                                                                        <br>
                                                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;ردا على
                                                                                            مراسلتكــــم
                                                                                            المدونـــة فــي المرجــع أعلاه, يشرفنــي أن أحيطكــم علمــا
                                                                                            أن&nbsp;:<br>
                                                                                                <br>
                                                                                                    &nbsp; &nbsp; &nbsp;السيــد(ة):&nbsp;<?php echo $NOM; ?> &nbsp;&nbsp;<?php echo $PRENOM; ?><br>
                                                                                                        <br>
                                                                                                            &nbsp; &nbsp; &nbsp;المولــود بتاريخ:  &nbsp;<?php if ($PRESUME == '0') {
        echo $DNS0;
    } else {
        echo 'خـــلال  ' . $dns;
    } ?>&nbsp; &nbsp;
                                                                                                            &nbsp; &nbsp;

                                                                                                            &nbsp; ب :&nbsp; <?php echo $LNS; ?><br>
                                                                                                                <br>
                                                                                                                    &nbsp; &nbsp; &nbsp;كان مسجل(ة) &nbsp; : بالمركز
                                                                                                                    الولائـــي&nbsp;للتعليــم و التكويــن عن بعــد
                                                                                                                    &nbsp; -سطــيف-<br>
                                                                                                                        <br>
                                                                                                                            &nbsp; &nbsp; &nbsp;خلال السنــة الدراسيـــة :&nbsp;<?php echo $IANNEE; ?><br>
                                                                                                                                <br>
                                                                                                                                    &nbsp; &nbsp; &nbsp;تحت &nbsp;رقم التسجيــل: &nbsp;<?php echo $MATR; ?><br>

                                                                                                                                        <br>
                                                                                                                                            &nbsp; &nbsp; &nbsp;<?php if ($DECISE == 'ينتقل' OR $DECISE == 'مقبول' OR $DECISE == 'ناجح') {
        echo 'وقــد تحصــل(ة) علــى المستــوى:' . $FILIERE;
    } else {
        echo'ولم يتحصل على المستوى ' . $FILIERE;
    } ?> <br>
                                                                                                                                                <br>&nbsp;&nbsp;&nbsp;&nbsp;حــيث  كــان قــرار اللـجــنة البيـــداغوجــية  : &nbsp;<?php echo $DECISE; ?>.
                                                                                                                                                    <br>
                                                                                                                                                        <br>
                                                                                                                                                            &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; <u>  سطيف
                                                                                                                                                                في :<?php echo date("d-m-Y"); ?></u><br>

                                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;
                                                                                                                                                                &nbsp;
                                                                                                                                                                &nbsp;مديـــر المركـــز الولائـــي</big>
    <?php
}
?> 


                                                                                                                                                            </body>
                                                                                                                                                            </html>
