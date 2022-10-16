
<html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

    

<script language="Javascript">
function imprimer(){window.print();}
</script>
        <title>شهادة إثبات المستوى</title>
        <style>
            page {
                background: white;
                display: block;
                margin: 0 auto;
                margin-bottom: 0.5cm;

            }
            page[size="A5"][layout="portrait"] {
                width: 21cm;
                height: 14.8cm;
            }


            @media print {
				.bouton
 {
display:none;
}
                body,
                page {
                    margin: 0;

                }
            }
        </style>
    </head>
    <body>
    <page size="A5" layout="portrait">



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
                $DATE_ENTRE = $nbr['DATE_ENTRE'];
                $MENTION = $nbr['DECISE'];

                $date = date_create($DATE_NAIS);

                $DNS0 = date_format($date, 'Y-m-d');
                $dns = date_format($date, 'Y');

                $datte = date_create($DATE_ENTRE);

                $DNSS0 = date_format($datte, 'Y-m-d');
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
                $DATE_ENTRE = $nbr['DATEINS'];
                $MENTION = $nbr['MENTION'];
                $FILIERE = $NIVEAU . '  ' . $FILI;
                $DATE_NAIS = $nbr['DNS'];
                $date = date_create($DATE_NAIS);

                $DNS0 = date_format($date, 'Y-m-d');
                $dns = date_format($date, 'Y');
                $datte = date_create($DATE_ENTRE);

                $DNSS0 = date_format($datte, 'Y-m-d');
            }

            if ($MENTION == 'مقبول' OR $MENTION == 'ينتقل' OR $MENTION == 'ناجح') {
				if($IANNEE =='2020/2019'){
					?> <SCRIPT LANGUAGE="Javascript">	alert("شهادة المستوى 2020/2019 تستخرج من الموقع");
             javascript:history.go(-1);
                </SCRIPT> <?php
				}else{
                ?>
                <div  class="bouton" ><center><p><input name="B1" onclick="imprimer()" type="button" value="طباعة"></p> </center></div>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; <?php echo $ORDREC; ?><br><br>
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp;سطيف&nbsp; &nbsp;
                <br>
                <br>
                <br>

                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $IANNEE; ?>
                <br>

                <p style="line-height:180%">&nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; <?php echo $NOM; ?> &nbsp;&nbsp;<?php echo $PRENOM; ?><br>
                    &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp;<?php if ($PRESUME == '0') {
                 echo $DNS0;
              } else {
            echo 'خـــلال  ' . $dns;
        } ?> &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; <?php echo $LNS; ?><br>
                    &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp;<?php echo $DNSS0; ?> &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <?php echo $MATR; ?><br>
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    &nbsp; &nbsp; &nbsp; &nbsp; 
                    &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                    <?php echo $FILIERE; ?> </p>



                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp; سطيف &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp;&nbsp; &nbsp; <?php echo date("d-m-Y"); ?><br>
                <br>
                <br>
                <br>
                &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; 
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;<?php include('includes/directeur.php') ?>


                <?php
			}
            } else {
                ?> <SCRIPT LANGUAGE="Javascript">	alert("erreur! هذا الطالب يعيد السنة");
             javascript:history.go(-1);
                </SCRIPT> <?php
    }
}
        ?> 


    </page>
</body>
</html>