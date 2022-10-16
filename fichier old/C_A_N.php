<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <head>




        <title>تأكيد الشهادة</title>

        </script>
    </head>


    <title>releve de note</title>
    <style>
        #dd{

            margin:auto;

        }
        @media print
        {
            p.blo{margin:auto;width:100%;}
            #dd{

                margin:auto;

                width:100%;
            }
            input{
              
                font-family:times new roman;
                font-size:16px;
                border:0;}


            div {

                background: white;
                display: block;
                margin: 0 auto;
                margin-left: 0cm;
                margin-bottom: 0cm;
                margin-right:0.5cm;

            }
            @page { size :A4 portrait;

                    width: 21cm;
                    height: 29.7cm;


            }


        }




    </style>
</head>
<body style="position:relative;width:20cm;height:29.5cm;margin:auto; direction: rtl;" >
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

                $DNS0 = date_format($date, 'd-m-Y');
                $dns = date_format($date, 'Y');
            } else {
                //isset($_GET['IANNEE']);
                //isset($_GET['ICODE']);
                $IANNEE = $_GET['IANNEE'];
                $code = $_GET['ICODE'];

//echo $MATR;
                $IANNEXE = substr($MATR, 1, 2);
                $IANNEEINS = substr($MATR, 3, 4);
                $INSEQ = substr($MATR, 7, 7);

                //echo $IANNEE;		
                $req = mysql_query("select * from inseleve ,classe  where  inseleve.IANNEXE='$IANNEXE' and inseleve.IANNEEINS='$IANNEEINS' and inseleve.INSEQ='$INSEQ' and inseleve.IANNEE='$IANNEE'  and inseleve.ICODE='$code' and classe.CODE='$code'   ");
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

                $DNS0 = date_format($date, 'd-m-Y');
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
            <hr color="blue" width="75%">
                <big>&nbsp;<span style="text-decoration: underline;">
                        <span style="font-weight: bold;">الرقم</span> :<input name="N_C" value=""type="text" size=5 maxlength=5 >/م.و.س/<?php echo date("Y"); ?></span></big><big><span
                        style="text-decoration: underline;"> </span>&nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp;&nbsp; &nbsp; <br>
                        &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                        &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;مدير المركز الولائي للتعليم و التكوين<br>
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;
                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                            &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;عن بعد -سطيف -
                            <br><br>
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;
                                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                                    &nbsp; &nbsp; &nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<u>إلى السيد :</u><br>
                                        <span>&nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                            &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp; &nbsp;<input name="N_C" value=""type="text" size=50 maxlength=50 >
                                                <br>
                                                    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; 
                                                    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; 
                                                    &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;<input name="N_C" value=""type="text" size=50 maxlength=50 >
                                                        <br>
                                                            &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;  &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; 
                                                            &nbsp; &nbsp; &nbsp; &nbsp;<input name="N_C" value=""type="text" size=40 maxlength=40 ></span>
                                                                <br>


                                                                    &nbsp;&nbsp;&nbsp;&nbsp; <span
                                                                        style="text-decoration: underline; font-weight: bold;">الموضوع
                                                                        :</span> حول صحة شهادة &nbsp;إثبات المستوى <br>
                                                                        <br>
                                                                            &nbsp;&nbsp;&nbsp; <span
                                                                                style="text-decoration: underline; font-weight: bold;">المرجــــــع</span>:
                                                                            مراسلتكم :&nbsp; <input name="N_C" value=""type="text" size=5 maxlength=5 >
                                                                                &nbsp; &nbsp;  بتاريخ:<input name="N_C" value=""type="text" size=10 maxlength=10 > <br>

                                                                                        <p>&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;ردا على مراسلتكــــم المدونـــة فــي المرجــع أعلاه, يشرفني أن أعلمكـــم بـــأن شهــادة المستـــــوى المقدمة من طرف</p>

                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;السيــد(ة):&nbsp;&nbsp; <?php echo $NOM; ?> &nbsp;&nbsp;<?php echo $PRENOM; ?><br>
                                                                                            <br>
                                                                                                &nbsp;&nbsp;&nbsp;&nbsp; المولــود بتاريخ:&nbsp;&nbsp; <?php if ($PRESUME == '0') {
            echo $DNS0;
        } else {
            echo 'خـــلال  ' . $dns;
        } ?>  &nbsp; &nbsp;&nbsp; &nbsp; ب :&nbsp; &nbsp;<?php echo $LNS; ?><br>
                                                                                                    <br>
                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp; الحامـــل(ة) لرقم :&nbsp<u> <?php echo $ORDREC; ?> </u>&nbsp;و التي تنص على أن المعني (ة)تحصل على المستوى :<a  style=" font-weight: bold;"> &nbsp;<?php echo $FILIERE; ?></a> <br>
                                                                                                            <br>
                                                                                                                <br>
                                                                                                                    &nbsp;&nbsp;&nbsp;&nbsp;صحيحــــــــــــة &nbsp;<input name="N_C" value=""type="text" size=3 maxlength=3 >

                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; غير صحيحـــــــــــة <input name="N_C" value=""type="text" size=3 maxlength=3 ><br>
                                                                                                                                <br>
                                                                                                                                    <br>
                                                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp;المعني (ة) كان مسجــل بالمـركز الولائـي للتعلـــيم و التكويـن عــن بـعـد -سطــيف <br>
                                                                                                                                            <br>
                                                                                                                                                &nbsp;&nbsp;&nbsp;&nbsp; خلال السنــة الدراسيـــة :&nbsp;&nbsp; <?php echo $IANNEE; ?>&nbsp;&nbsp;&nbsp;&nbsp; تحت &nbsp;رقم التسجيــل:&nbsp;<?php echo $MATR; ?><br>
                                                                                                                                                    <br>

                                                                                                                                                        &nbsp;&nbsp;&nbsp;&nbsp; <?php if ($DECISE == 'ينتقل' OR $DECISE == 'مقبول' OR $DECISE == 'ناجح') {
            echo 'وقــد تحصــل(ة) علــى المستــوى: &nbsp;<a  style=" font-weight: bold;"> ' . $FILIERE . '</a>';
        } else {
            echo'ولم يتحصل على المستوى : &nbsp;<a  style=" font-weight: bold;">' . $FILIERE . '</a>';
        } ?> <br>
                                                                                                                                                            <br>&nbsp;&nbsp;&nbsp;&nbsp;حــيث  كــان قــرار اللـجــنة البيـــداغوجــية  : &nbsp;&nbsp;<a  style=" font-weight: bold;"><?php echo $DECISE; ?></a>.


                                                                                                                                                                <br><p>&nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        <u>  سطيف
                                                                                                                                                                            في :<?php echo date("d-m-Y"); ?></u></p>
                                                                                                                                                                    <br>

                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;مـدير(ة) المركز الولائـي
                                                                                                                                                                          <br>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                                                                                                                                                                        &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;
                                                                                                                                                                        &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;<?php include('includes/directeur.php'); ?></big>
                                                                                                                                                                        <div id="dd"style="position: absolute; bottom: 0;"  >
                                                                                                                                                                            <hr color="blue" width="100%"  >
                                                                                                                                                                                <p class="blo">
                                                                                                                                                                                    Email:crefd19@gmail.com &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TEL:036452261 &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp&nbsp;&nbsp;&nbsp;FAX:036452260 

                                                                                                                                                                                </p>
                                                                                                                                                                        </div>
    <?php
}
?> 

                                                                                                                                                                    </div>
                                                                                                                                                                    </body>
                                                                                                                                                                    </html>
