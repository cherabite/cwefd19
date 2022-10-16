<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html  dir="rtl" lang="ar" >
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>
 <title>releve de note</title>
<script language="Javascript">
function imprimer(){window.print();}
</script>
       
        <style>
           @media print
        {
			.bouton
 {
display:none;
}
            @page { size :size:portrait;


                    margin: auto;
            }

            
            td {
                font-size: 14px;
               


            }



        }
        </style>
    </head>
	
    <body style="margin: auto; position: relative; width: 18cm; height: 28cm; direction: rtl;" >

 <div id="a">
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
            ?>

            <table style="position:relative; width:100%; height: 100%;margin: auto; align:center;font-weight: bold;" border="1" cellpadding="2" cellspacing="2">
                   <tbody>
                    <tr style="position:relative;  height:7%;text-align:center">
                        <td style="vertical-align: top;"   colspan="4" rowspan="1">
            <table  style="height: 100%; width: 100%;" border="0" >
        <tbody>
          <tr>
            <td style="width: 25%;text-align: center; vertical-align: middle;"><img style="width:2.5cm;height:2.5cm;" src="onefd.png">
            </td>
            <td style="width: 50%;">
            <h3>الجمهورية
                                الجزائرية الديمقراطية الشعبية</h3>
                            <h3>وزارة
                                التربية الوطنية</h3>
                            <h3>الديوان
                                الوطني للتعليم و التكوين عن بعد</h3>
                            <h3>المركز
                                الولائي سطيف</h3>

            <hr color="blue" width="75%">
			  <h3><u>كشف نقاط امتحان إثبات المستوى</u></h3>
            </td>
            <td style= "width: 25%;"><div  class="bouton" ><p><input name="B1" onclick="imprimer()" type="button" value="طباعة"></p> </div> </td>
          </tr>
        </tbody>
      </table>
                           
                              

                        </td>
                    </tr>

                    <tr style="position:relative;  height:1.5%;">
                        <td style="position:relative; width:20%;">السنة الدراسية :</td>
                        <td colspan="3" rowspan="1" ><?php echo $nbr['COD_ANN']; ?></td>
                    </tr>
                    <tr style="position:relative;  height:1.5%;">
                        <td>رقم التسجيل :</td>
                        <td style="position:relative; width:20%;"><?php echo $nbr['MATR']; ?></td>
                        <td style="position:relative; width:20%;">رقم الترتيب : </td>
                        <td><?php echo $nbr['ORDER']; ?></td>
                    </tr>
                    <tr style="position:relative;  height:1.5%;">
                        <td >اللقب : </td>
                        <td colspan="3" rowspan="1"><?php echo $nbr['NOM']; ?></td>
                    </tr>
                    <tr style="position:relative;  height:1.5%;">
                        <td>الإسم :</td>
                        <td colspan="3" rowspan="1"> <?php echo $nbr['PRENOM']; ?></td>
                    </tr>
                    <tr style="position:relative;  height:1.5%;">
                        <td >تاريخ الميلاد :</td>
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
                        <td>مكان الميلاد : </td>
                        <td><?php echo $nbr['LIEU_NAIS']; ?></td>
                    </tr>
                    <tr style="position:relative;  height:1.56%;">
                        <td>المستوى و الشعبة : </td>
                        <td colspan="3" rowspan="1"><?php echo $nbr['DESING']; ?></td>
                    </tr>
                    <tr>
                     <td style="width:100%; vertical-align: top;" colspan="4" rowspan="1" > 

                        <p style="text-align:center ;font-weight: bold;"><u>
                                قـــد تحــصــل عــلى الــنتائج الــتاليـــة 
                            </u></p>
                    

                    
                        
                            <table
                                style="position:relative; width:50%;text-align: centre; margin-left: auto; margin-right: auto;  font-weight: bold;"
                                border="1" cellpadding="2" cellspacing="2" >
                                <tbody>
                                    <tr>
                                        <td>الـــمـــادة</td>
                                        <td>الـنــقــــطــة</td>
                                        <td>مــــلاحـظــة</td>
                                    </tr>
    <?php
    $req_note = mysql_query("select * from tab_note where  tab_note.MATR=$MATR ");

    while ($nbr_note = mysql_fetch_array($req_note)) {

        echo '
				 <tr>
			    <td > ' . $nbr_note['Nom_matiere'] . '</td>
				<td> ' . $nbr_note['Note_matiere'] . '</td>
				 <td> </td>
				 
				 </tr>';
    }
    ?>
                                </tbody>
                            </table>


                            </br>

                            <div style="text-align: center;"></div>
                            <table style="position:relative;width:75%;  margin-left: auto; margin-right: auto;  font-weight: bold;"
                                   border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td>عددالفروض</td>
                                        <td>معدل الفروض</td>
                                        <td>معدل الإمتحان</td>
                                        <td>معدل العام</td>
                                    </tr>
    <?php
    $req_examen = mysql_query("select * from  tab_examen where  MATR=$MATR");
    $nbr_examen = mysql_fetch_array($req_examen);
    ?>      
                                    <tr>
                                        <td> <?php echo $nbr_examen['nbr_devoire']; ?></td>
                                        <td><?php echo $nbr_examen['moyen_devoire']; ?></td>
                                        <td><?php echo $nbr_examen['moyen_examen']; ?></td>
                                        <td><?php echo $nbr_examen['moyen_general']; ?></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2" rowspan="1">قرار
                                            اللجنة البيداغوجية :</td>
                                        <td colspan="2" rowspan="1"><?php echo $nbr['DECISE']; ?></td>
                                    </tr>
                                </tbody>
                            </table>
							<br><br><br>
                        </td>
                    </tr>

                    <tr>

                    <td colspan="4" rowspan="1"> 
                     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;                                      
                                      
 &nbsp;&nbsp; &nbsp;&nbsp;       
                            &nbsp;&nbsp; &nbsp;    <u>  سطيف
                                    في :<?php echo date("d-m-Y"); ?></u><br><br>
           		   
                       <p>
        
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;                                      
 
                                       إمضاء
                                        مدير المركز &nbsp;الولائي</p>
	&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;	&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;

 
										<?php include('includes/directeur.php'); ?>
                                           
                                                <br>
												<br>
												<br>
                                                 <br>   
                                                        <br>
                                                            </td>
                                                            </tr>
                                                                <tr style="position:relative;  height:0.7cm">
                                                                    <td style="position:relative;  width:25%;">المركز الولائي سطيف</td>
                                                                    <td style="position:relative; width:25%;">الهاتف:036452261 </td>
                                                                    <td style="position:relative;  width:25%;">الفاكس :036452260</td>
                                                                    <td style="position:relative;  width:25%;">Email:crefd19@gmail.com</td>
                                                                </tr>
                                                                </tbody>

                                                                </table>

    <?php
}
?> 

 </div>

                                                            </body>
                                                            </html>