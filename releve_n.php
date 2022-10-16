<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />


        <script language="Javascript">
function imprimer(){window.print();}
</script>
    </head>


    <title>releve de note</title>
   
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
<body style="margin: auto; position: relative; width: 18cm; height: 25cm; direction: rtl;" >


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
       // $req = mysql_query("select * from inseleve ,classe  where  inseleve.IANNEXE='$IANNEXE' and inseleve.IANNEEINS='$IANNEEINS' and inseleve.INSEQ='$INSEQ' and inseleve.IANNEE='$IANNEE'  and inseleve.ICODE='$code' and classe.CODE='$code'   ");
       $req = mysql_query("select * from eleve ,inscription ,classe  
			   where  eleve.ANNEXE='$IANNEXE' and eleve.ANNEEINS='$IANNEEINS' and eleve.NSEQ='$INSEQ' and 
                 inscription.IANNEXE='$IANNEXE' and inscription.IANNEEINS='$IANNEEINS' and inscription.INSEQ='$INSEQ' and inscription.IANNEE='$IANNEE'  and inscription.ICODE='$code'
			   and classe.CODE='$code'   ");
	   $nbr = mysql_fetch_array($req);
        $nb = mysql_num_rows($req);
        $PRESUME = $nbr['PRESUME'];
		
        ?>
 <table style="position:relative; width:100%; height: 100%;margin: auto; align:center" border="1" cellpadding="2" cellspacing="2" >
 <tr>
 <td>
        <table style="position:relative; width:100%; height: 100%;margin: auto; align:center" border="0" cellpadding="2" cellspacing="2" >
               <tbody>
                <tr style="position:relative;  height:7%;text-align:center">
                    <td style="vertical-align: top;"colspan="4" rowspan="1">
      <table id="z" style="height: 100%; width: 100%;" border="0">
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
    <h2> كــشف الــنقــاط</h2>
            <hr color="blue" width="75%">
            </td>
            <td style="width: 25%;"> <div  class="bouton" ><center><p><input name="B1" onclick="imprimer()" type="button" value="طباعة"></p> </center></div></td>
          </tr>
        </tbody>
      </table>

                    </td>
                </tr>
		<tr>
            <td colspan="4" rowspan="1" style=" font-weight: bold">			
            <table style="position:relative; width:100%; height: 100%;margin: auto; align:center" border="0" cellpadding="2" cellspacing="2">

                <tr style="position:relative;  height:1.5%;">
                    <td style="position:relative; width:20%;">السنة الدراسية :</td>
                    <td colspan="3" rowspan="1" ><?php echo $nbr['IANNEE']; ?></td>
                </tr>
                <tr style="position:relative;  height:1.5%;">
                    <td>رقم التسجيل :</td>
                    <td style="position:relative; width:20%;"><?php echo $MATR; ?></td>
                    <td style="position:relative; width:20%;">رقم الترتيب : </td>
                    <td><?php echo $nbr['ORDREC']; ?></td>
                </tr>
				<tr style="position:relative;  height:1.5%;">
                    <td>اللقب :</td>
                    <td style="position:relative; width:20%;"><?php echo  $nbr['NOM']; ?></td>
                    <td style="position:relative; width:20%;">الإسم : </td>
                    <td><?php echo $nbr['PRENOM'] ?></td>
                </tr>
              
                <tr style="position:relative;  height:1.5%;">
                    <td >تاريخ الميلاد :</td>
                    <td>
                        <?php
                        $DNS = $nbr['DNS'];
                        $date = date_create($DNS);

                        $DNS0 = date_format($date, 'Y-m-d');
                        $dns = date_format($date, 'Y');

                        if ($PRESUME == '0') {
                            echo $DNS0;
                        } else {
                            echo 'خـــلال  ' . $dns;
                        }
                        ?></td>
                    <td>مكان الميلاد : </td>
                    <td><?php echo $nbr['LNS']; ?></td>
                </tr>
                <tr style="position:relative;  height:1.56%;">
                    <td>المستوى و الشعبة : </td>
                    <td colspan="3" rowspan="1"><?php echo $nbr['NIVEAU']; ?>  &nbsp; &nbsp; <?php echo $nbr['FILIERE']; ?></td>
                </tr>
			</table>
            </td>
            </tr>			
                <tr style="position:relative;  height:5%;">
                 <td colspan="4" rowspan="1">

                 <p style="text-align:center;font-weight: bold" >  <u>
                            قـــد تحــصــل عــلى الــنتائج الــتاليـــة 
                        </u></p><br>
                
                       
               
                   
                        <table
                            style="position:relative; width:50%;text-align: centre; margin-left: auto; margin-right: auto;  font-weight: bold;"
                            border="1" cellpadding="2" cellspacing="2" >
                            <tbody>
                                <tr>
                                    <td style="text-align: center; font-weight: bold;">الـــمـــادة</td>
                                    <td style="text-align: center; font-weight: bold;">عـلامــة الإمتحان</td>
                                    
                                </tr>
                               <?php
              //  $req_note = mysql_query("select * from detnotes,mat_exam  where  DNANNEXE='$IANNEXE' and DNANNEEINS='$IANNEEINS' 
		 
		    //    and DNNSEQ='$INSEQ' and DNCODE='$code' and DNANNEE= '$IANNEE'  and mat_exam.MACODE='$code' and detnotes.DNMATIERE=mat_exam.MAMATIERE and mat_exam.MAANNEE= '$IANNEE' and mat_exam.EXAMEN=0 ");
            

//if($IANNEE ='2021/2020'){
	//echo '1'.'<br/>';
                 $temoin= 0;
				  $req_racha = mysql_query("select RACHAT from detnotes  where  DNANNEXE='$IANNEXE' and DNANNEEINS='$IANNEEINS' 
		 
                  and DNNSEQ='$INSEQ' and DNCODE='$code' and DNANNEE= '$IANNEE'   ");

				while ($nbr_note = mysql_fetch_array($req_racha)) {
					$racha=$nbr_note['RACHAT'];
					 IF ($racha !='' ){
					 $temoin= 1;
					  BREAK;
					 }
					}
						if($temoin == 1){
						//	echo '2'.'<br/>';
							$req_note = mysql_query("select * from detnotes  where  DNANNEXE='$IANNEXE' and DNANNEEINS='$IANNEEINS' 
								 
									and DNNSEQ='$INSEQ' and DNCODE='$code' and DNANNEE= '$IANNEE' and RACHAT !='' ");	
						}else{
						//	echo '3'.'<br/>';
							$req_note = mysql_query("select * from detnotes  where  DNANNEXE='$IANNEXE' and DNANNEEINS='$IANNEEINS' 
								 
									and DNNSEQ='$INSEQ' and DNCODE='$code' and DNANNEE= '$IANNEE' and RACHAT ='' ");
						}

/*}else{
	echo '4'.'<br/>';
			  $req_note = mysql_query("select * from detnotes  where  DNANNEXE='$IANNEXE' and DNANNEEINS='$IANNEEINS' 
		 
            and DNNSEQ='$INSEQ' and DNCODE='$code' and DNANNEE= '$IANNEE'   ");	
}	*/		

             
               while ($nbr_note = mysql_fetch_array($req_note)) {
               $mm =  str_replace(Array('_sess2'), '', $nbr_note['DNMATIERE']);
			   
			   $n_m= ($nbr_note['MENTION']== 'غائب' )? 'غ':number_format($nbr_note['NEX'], 2, '.', '') ;
                  echo '
				 <tr>
			    <td style="text-align: center "> ' .$mm. '</td>
				<td style="font-weight: bold; text-align: center;"> ' . $n_m . '</td>
				
				 
				 </tr>';
				 $MDEV1= ($nbr_note['MDEV1']== null)? number_format($nbr_note['MDEV1'], 2, '.', ''):'' ;
				
				 $MDEV=($nbr_note['MDEV']!= null)? number_format($nbr_note['MDEV'], 2, '.', ''):'' ;
				 $MDEV2=($nbr_note['MDEV2']!= null)? number_format($nbr_note['MDEV2'], 2, '.', ''):'' ;
				 $MEX=($nbr_note['MENTION']== 'غائب' )? 'غ':number_format($nbr_note['MEX'], 2, '.', '') ;
				 $MG=($nbr_note['MENTION']== 'غائب' )? 'غ':number_format($nbr_note['MG'], 2, '.', '') ;
				$MENTION= $nbr_note['MENTION'];
				$MDEV3= ($nbr_note['MDEV3']!= null)? number_format($nbr_note['MDEV3'], 2, '.', ''):'' ;
    }
	if($IANNEE >'2010/2009'){
		echo '
				 
				<tr>
				  <td style="text-align: center ">  المـراقبة المــستمــرة</td>
			      <td style="font-weight: bold; text-align: center;"> ' .$MDEV. '</td>
				 </tr>
				 <tr>
				  <td style="text-align: center "> معدل الإمتحان</td>
			      <td style="font-weight: bold; text-align: center;"> ' .$MEX. '</td>
				 </tr>
				 
				 <tr>
				  <td style="font-weight: bold; text-align: center;" >   المــعدل العـــام  </td>
			      <td style="font-weight: bold; text-align: center;" > ' .$MG.'</td>
				 </tr>
				 
				 </tbody>

             </table>
			 <br>
                            <table style="position:relative;width:75%; margin-left: auto; margin-right: auto;  font-weight: bold;"
                                   border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center;"colspan="2" rowspan="1">قرار
                                            اللجنة البيداغوجية :</td>
                                        <td style="font-weight: bold; text-align: center;"
                                            colspan="3" rowspan="1">' . $MENTION. '</td>
                                    </tr>
                                </tbody>


                            </table>';
				   
	}else{
    ?>
                          
              </tbody>

                   </table>      
               
              
                    
                        <div style="text-align: center;"></div>



                        <br>

                            <div style="text-align: center;"></div>
                            <table style="position:relative;width:75%; margin-left: auto; margin-right: auto;  font-weight: bold;"
                                   border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr>
    <?php
   // $req_note = mysql_query("select * from detnotes where  DNANNEXE='$IANNEXE' and DNANNEEINS='$IANNEEINS' and DNNSEQ='$INSEQ' and DNCODE='$code' and DNANNEE= '$IANNEE'   ");
  //  $nbr_note = mysql_fetch_array($req_note);
    ?>
                                        <td
                                            style="width: 25%; font-weight: bold; text-align: center;">معدل
                                            الفرض &nbsp;الأول</td>
                                        <td   
                                            style="width: 25%; font-weight: bold; text-align: center;"><?php echo $MDEV1; ?><br>
                                        </td>
                                        <td style="font-weight: bold; text-align: center;"></td>
                                        <td
                                            style="width: 25%; font-weight: bold; text-align: center;">معدل
                                            الفروض</td>
                                        <td
                                            style="width: 25%; font-weight: bold; text-align: center;"><?php echo $MDEV; ?><br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center;">معدل
                                            الفرض الثاني</td>
                                        <td style="font-weight: bold; text-align: center;"><?php echo $MDEV2; ?></td>
                                        <td style="font-weight: bold; text-align: center;"></td>
                                        <td style="font-weight: bold; text-align: center;">معدل
                                            الإمتحان</td>
                                        <td style="font-weight: bold; text-align: center;"><?php echo $MEX; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center;">معدل
                                            الفرض الثالث</td>
                                        <td style="font-weight: bold; text-align: center;"><?php echo $MDEV3; ?></td>
                                        <td style="font-weight: bold; text-align: center;"></td>
                                        <td style="font-weight: bold; text-align: center;">معدل
                                            العام</td>
                                        <td style="font-weight: bold; text-align: center;"><?php echo $MG; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight: bold; text-align: center;"colspan="2" rowspan="1">قرار
                                            اللجنة البيداغوجية :</td>
                                        <td style="font-weight: bold; text-align: center;"
                                            colspan="3" rowspan="1"><?php echo $MENTION; ?></td>
                                    </tr>
                                </tbody>


                            </table>
	<?php 
	} 
	?>
			
                 </td>   
                </tr>

                <tr style="position:relative;  height:20%;">

                    <td colspan="4" rowspan="1"> <br>
                     &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
          &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;                                      
 &nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp; 
&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;                                      
 &nbsp;&nbsp; &nbsp;&nbsp;       
                            &nbsp;&nbsp; &nbsp;    <u>  سطيف
                                    في :<?php echo date("d-m-Y"); ?></u><br>
           		   
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
                                                            <tr  style="position:relative;  height:0.7cm">
                                                                <td style="position:relative;  width:25%;">المركز الولائي سطيف</td>
                                                                <td style="position:relative; width:25%;">الهاتف:036452261 </td>
                                                                <td style="position:relative;  width:25%;">الفاكس :036452260</td>
                                                                <td style="position:relative;  width:25%;">Email:crefd19@gmail.com</td>
                                                            </tr>
                                                            </tbody>

                                                            </table>
															
</td>
</tr>
 </table>
    <?php
}
?> 



                                                        </body>
                                                        </html>