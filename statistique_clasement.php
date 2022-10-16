<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <head>

    
    </head>


    <title>Classement</title>
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
<body style="position:relative;width:20cm;height:29.5cm;margin:auto; direction: ltr;" >
    <div>

        <h4 style="text-align: center;">الجمهورية
            الجزائرية الديمقراطية الشعبية</h4>
        <h4 style="text-align: center;">وزارة
            التربية الوطنية</h4>
        <h4 style="text-align: center;">الديوان
            الوطني للتعليم و التكوين عن بعد</h4>
        <h4 style="text-align: center;">المركز
            الولائي سطيف</h4>
        <hr color="blue" width="75%">

            <?php
            mysql_connect("localhost", "root", "");
            mysql_select_db("base_crefd_19");
            mysql_query("set character_set_server='utf8'");
            mysql_query("set names 'utf8'");




            if (isset($_POST['valider'])) {
                $NUM_BUR = $_POST['NUM_BUR'];
                if ($NUM_BUR < '2003/2002') {
				  $select1 = " select distinct CD_CLAS AS code from tab_eleve where COD_ANN='$NUM_BUR' order by CD_CLAS ";

                   $result1 = mysql_query($select1);
                    $total1 = mysql_num_rows($result1);
					// mysql_free_result($select);
					
                    if ($total1) {
                        ?>


                        <h3><u>القائمة الإسمية </u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>

            <?php
            while ($row = mysql_fetch_array($result1)) {
				$c= $row['code'];
         echo' <tr> 
                 <td>' . $row['code'] . ' </td>';
        ?>
	            <td>
				        <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										  <td>رقم التسجيل</td>
										<td> اللقب</td>
                                        <td> الإسم </td>
										<td> تاريخ الميلاد </td>
										 <td> الهاتف </td>
										<td> الولاية </td>
									   <td> المعدل </td>

									 
                                    </tr>
									 <?php
									  $select2 = " select  DISTINCT d.MATR, d.CD_CLAS, d.COD_ANN, d.DECISE ,o.moyen_general ,d.NOM ,d.PRENOM ,d.DATE_NAIS 
									  from tab_eleve d	
									   INNER JOIN tab_examen o
                                      ON d.MATR=o.MATR
					        		  where d.COD_ANN='$NUM_BUR'
									  and d.CD_CLAS='$c' 
									  and (d.DECISE='ينتقل'  or d.DECISE='ناجح')
									  ORDER BY  o.moyen_general DESC 
									  limit 5";
									//   $select2 = " select * from detnotes where DNANNEE='$NUM_BUR' and DNCODE='$row['code']' ORDER BY  MG DESC  limit 5";
                                      $result2 = mysql_query($select2);
                                      $total2 = mysql_num_rows($result2);
									 while ($row2 = mysql_fetch_array($result2)) {

						echo' <tr>
							  <td>' . $row2['CD_CLAS'] . ' </td>
							  <td>' . $NUM_BUR . '</td>
							   <td>' . $row2['MATR']. '</td>
							   <td>' . $row2['NOM'] . '</td>
							   <td>' . $row2['PRENOM'] . '</td>
							   <td>' . $row2['DATE_NAIS'] . '</td>';
					
						 echo    ' <td> </td>
						           <td>  </td>
								   <td>' . $row2['moyen_general'] . '</td>
		
							   </tr>';
										
									}
									?>
									 
							</tbody>
                          </table>
				
				</td>
     
	<?php 
    echo  '</tr>';
                
            }
            ?>
		

                                </tbody>
                            </table>
							
                                </tbody>
                            </table>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp; سطيف في : &nbsp; &nbsp; &nbsp;
               
                &nbsp; &nbsp;&nbsp; &nbsp; <?php echo date("d-m-Y"); ?><br>
                <br>
                
                
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;مديرة المركز الولائـــي					
                               

						<h3><u>ترتيب العام</u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>

       
				        <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
									<td>الرقم</td>
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										  <td>رقم التسجيل</td>
										<td> اللقب</td>
                                        <td> الإسم </td>
										<td> تاريخ الميلاد </td>
										 <td> الهاتف </td>
										<td> الولاية </td>
									   <td> المعدل </td>

									 
                                    </tr>
									 <?php
									  $select_st = "select  DISTINCT d.MATR, d.CD_CLAS, d.COD_ANN, d.DECISE ,o.moyen_general ,d.NOM ,d.PRENOM ,d.DATE_NAIS 
									  from tab_eleve d	
									   INNER JOIN tab_examen o
                                      ON d.MATR=o.MATR
					        		  where d.COD_ANN='$NUM_BUR'
									  and (d.DECISE='ينتقل'  or d.DECISE='ناجح')
									  ORDER BY  o.moyen_general DESC 
									  limit 30";
									//   $select2 = " select * from detnotes where DNANNEE='$NUM_BUR' and DNCODE='$row['code']' ORDER BY  MG DESC  limit 5";
                                      $result_st = mysql_query($select_st);
                                      $total_st= mysql_num_rows($result_st);
									  $n=0;
									 while ($row_st = mysql_fetch_array($result_st)) {
                             $n=$n+1;
						     echo' <tr>
							  <td>' . $n .'</td>
							  <td>' . $row_st['CD_CLAS'] . ' </td>
							  <td>' . $NUM_BUR . '</td>
							   <td>' . $row_st['MATR']. '</td>
							   <td>' . $row_st['NOM'] . '</td>
							   <td>' . $row_st['PRENOM'] . '</td>
							   <td>' . $row_st['DATE_NAIS'] . '</td>';
					
						 echo    ' <td> </td>
						           <td>  </td>
								   <td>' . $row_st['moyen_general'] . '</td>
		
							   </tr>';
										
									}
									?>
									 
							</tbody>
                          </table>
				

		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp; سطيف في : &nbsp; &nbsp; &nbsp;
               
                &nbsp; &nbsp;&nbsp; &nbsp; <?php echo date("d-m-Y"); ?><br>
                <br>
                
                
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;مديرة المركز الولائـــي					
                               
	   
							   
							   
							
                               <?php 
							   
                              
							  } else {

                                    echo 'Pas d\'enregistrements dans cette table...';
                                }
	/**********************/
                        ?>

				 <?php
 /*********                  
                    $select = " SELECT CD_CLAS AS a, COUNT( MATR ) AS SOM, COD_ANN, COUNT( IF( DECISE =  'ناجح', MATR, NULL ) ) AS aa, COUNT( IF( DECISE =  'ينتقل', MATR, NULL ) ) AS bb, COUNT( IF( DECISE =  'يعيد السنة', MATR, NULL ) ) AS cc, COUNT( IF( DECISE =  'غير محجوز', MATR, NULL ) ) AS dd
FROM tab_eleve
WHERE COD_ANN = '$NUM_BUR'
GROUP BY CD_CLAS
ORDER BY CD_CLAS";
           $sum = "SELECT COUNT( MATR ) AS D FROM tab_eleve where COD_ANN='$NUM_BUR' ";
            $somme = mysql_query($sum);
        //    mysql_free_result($sum);
					// $select = "SELECT * FROM inventaire  ";
                   $result = mysql_query($select);
                    $total = mysql_num_rows($result);
			//		mysql_free_result($select);
					echo $total;
                    if ($total) {
                        ?>


                        <h3><u>ترتيب المعدلات</u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										<td> عدد المترشحين </td>
                                        <td> ناجح </td>
										<td> ينتقل </td>
										<td> يعيد السنة </td>
									   <td> غير محجوز </td>
									    <td> نسبة النجاح </td>
                                    </tr>
            <?php
            $nbr_admet=0;
            while ($row = mysql_fetch_array($result)) {
				if($row['aa']>0){
					
			 $nbr_admet= $nbr_admet+$row['aa'];	
			
       $per=number_format(( $row['aa']/ $row['SOM'])*100, 2, ',', '').' %';				
				}elseif($row['bb']>0){
				
					 $nbr_admet= $nbr_admet+$row['bb'];	
		$per=number_format(( $row['bb']/ $row['SOM'])*100, 2, ',', '').' %';		
				}
                echo' <tr>
      <td>' . $row['a'] . ' </td>
      <td>' . $NUM_BUR . '</td>
	   <td>' . $row['SOM'] . '</td>
	   <td>' . $row['aa'] . '</td>
	   <td>' . $row['bb'] . '</td>
	   <td>' . $row['cc'] . '</td>
	   <td>' . $row['dd'] . '</td>
	   <td>' .$per. '</td>
     
	 
       </tr>';
                
            }
            ?>
			 <?php
           
            while ($row = mysql_fetch_array($somme)) {
			
				$per_u=number_format(( $nbr_admet/$row['D'] )*100, 2, ',', '').' %';
                echo' <tr style="background-color:blue;">
	
				  <td> المجموع </td>
				  <td></td>
				   <td>' . $row['D'] . '</td>
				  <td></td> <td></td> <td></td> <td></td>
				   <td> ' .$per_u . '  </td>
				 
				   </tr>';
							
						}
						?>

                                </tbody>
                            </table>
							
                                </tbody>
                            </table>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp; سطيف في : &nbsp; &nbsp; &nbsp;
               
                &nbsp; &nbsp;&nbsp; &nbsp; <?php echo date("d-m-Y"); ?><br>
                <br>
                
                
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;مديرة المركز الولائـــي					
                               <?php   
                                } else {

                                    echo 'Pas d\'enregistrements dans cette table...';
                                }
*/						
		
                            } else {
                                $select1 = " select distinct ICODE AS code from inscription where IANNEE='$NUM_BUR' order by ICODE ";

                   $result1 = mysql_query($select1);
                    $total1 = mysql_num_rows($result1);
					// mysql_free_result($select);
					
                    if ($total1) {
                        ?>


                        <h3><u>القائمة الإسمية </u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>

            <?php
            while ($row = mysql_fetch_array($result1)) {
				$c= $row['code'];
         echo' <tr> 
                 <td>' . $row['code'] . ' </td>';
        ?>
	            <td>
				        <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										  <td>رقم التسجيل</td>
										<td> اللقب</td>
                                        <td> الإسم </td>
										<td> تاريخ الميلاد </td>
										 <td> الهاتف </td>
										<td> الولاية </td>
									   <td> المعدل </td>

									 
                                    </tr>
									 <?php
									  $select2 = " select  DISTINCT d.DNANNEXE, d.DNANNEEINS, d.DNNSEQ, d.DNCODE, d.DNANNEE, d.MENTION ,d.MG ,d.DNNOM ,d.DNPRENOM ,d.DNDNS 
									  from detnotes d	
					        		  where d.DNANNEE='$NUM_BUR'
									  and d.DNCODE='$c' 
									  and d.MENTION='مقبول' 
									  ORDER BY  d.MG DESC 
									  limit 5";
									//   $select2 = " select * from detnotes where DNANNEE='$NUM_BUR' and DNCODE='$row['code']' ORDER BY  MG DESC  limit 5";
                                      $result2 = mysql_query($select2);
                                      $total2 = mysql_num_rows($result2);
									 while ($row2 = mysql_fetch_array($result2)) {

						echo' <tr>
							  <td>' . $row['code'] . ' </td>
							  <td>' . $NUM_BUR . '</td>
							   <td>' . $row2['DNANNEXE'] .$row2['DNANNEEINS'].$row2['DNNSEQ']. '</td>
							   <td>' . $row2['DNNOM'] . '</td>
							   <td>' . $row2['DNPRENOM'] . '</td>
							   <td>' . $row2['DNDNS'] . '</td>';
							    $mat1= $row2['DNANNEXE'];
								$mat2=$row2['DNANNEEINS'];
								$mat3=$row2['DNNSEQ'];
							    $select_e = " select  elv.WILAYA , elv.TELMOB
									   from eleve elv	
									   where
									    elv.ANNEXE = '$mat1'
										AND elv.ANNEEINS = '$mat2'
										AND elv.NSEQ = '$mat3' ";
										$result_e = mysql_query($select_e);
                                  //    $total2 = mysql_num_rows($result2);
								   while ($row_e = mysql_fetch_array($result_e)) {
									$w=   $row_e['WILAYA'];
									$t=   $row_e['TELMOB'];
								   }
					
						 echo    ' <td> ' . $t. ' </td>
						           <td> ' . $w . ' </td>
								   <td>' . $row2['MG'] . '</td>
		
							   </tr>';
										
									}
									?>
									 
							</tbody>
                          </table>
				
				</td>
     
	<?php 
    echo  '</tr>';
                
            }
            ?>
		

                                </tbody>
                            </table>
							
                                </tbody>
                            </table>
		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp; سطيف في : &nbsp; &nbsp; &nbsp;
               
                &nbsp; &nbsp;&nbsp; &nbsp; <?php echo date("d-m-Y"); ?><br>
                <br>
                
                
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;مديرة المركز الولائـــي					
                               

						<h3><u>ترتيب العام</u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>

       
				        <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
									<td>الرقم</td>
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										  <td>رقم التسجيل</td>
										<td> اللقب</td>
                                        <td> الإسم </td>
										<td> تاريخ الميلاد </td>
										 <td> الهاتف </td>
										<td> الولاية </td>
									   <td> المعدل </td>

									 
                                    </tr>
									 <?php
									  $select2 = " select  DISTINCT d.DNANNEXE, d.DNANNEEINS, d.DNNSEQ, d.DNCODE, d.DNANNEE, d.MENTION ,d.MG ,d.DNNOM ,d.DNPRENOM ,d.DNDNS 
									  from detnotes d	
					        		  where d.DNANNEE='$NUM_BUR'
									  and d.MENTION='مقبول' 
									  ORDER BY  d.MG DESC 
									  limit 30";
									//   $select2 = " select * from detnotes where DNANNEE='$NUM_BUR' and DNCODE='$row['code']' ORDER BY  MG DESC  limit 5";
                                      $result2 = mysql_query($select2);
                                      $total2 = mysql_num_rows($result2);
									  $n=0;
									 while ($row2 = mysql_fetch_array($result2)) {
                             $n=$n+1;
						     echo' <tr>
							  <td>' . $n .'</td>
							  <td>' . $row2['DNCODE'] . ' </td>
							  <td>' . $NUM_BUR . '</td>
							   <td>' . $row2['DNANNEXE'] .$row2['DNANNEEINS'].$row2['DNNSEQ']. '</td>
							   <td>' . $row2['DNNOM'] . '</td>
							   <td>' . $row2['DNPRENOM'] . '</td>
							   <td>' . $row2['DNDNS'] . '</td>';
							    $mat1= $row2['DNANNEXE'];
								$mat2=$row2['DNANNEEINS'];
								$mat3=$row2['DNNSEQ'];
							    $select_e = " select  elv.WILAYA , elv.TELMOB
									   from eleve elv	
									   where
									    elv.ANNEXE = '$mat1'
										AND elv.ANNEEINS = '$mat2'
										AND elv.NSEQ = '$mat3' ";
										$result_e = mysql_query($select_e);
                                  //    $total2 = mysql_num_rows($result2);
								   while ($row_e = mysql_fetch_array($result_e)) {
									$w=   $row_e['WILAYA'];
									$t=   $row_e['TELMOB'];
								   }
					
						 echo    ' <td> ' . $t. ' </td>
						           <td> ' . $w . ' </td>
								   <td>' . $row2['MG'] . '</td>
		
							   </tr>';
										
									}
									?>
									 
							</tbody>
                          </table>
				

		&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;
                &nbsp; &nbsp; &nbsp;&nbsp; سطيف في : &nbsp; &nbsp; &nbsp;
               
                &nbsp; &nbsp;&nbsp; &nbsp; <?php echo date("d-m-Y"); ?><br>
                <br>
                
                
                &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
                &nbsp;مديرة المركز الولائـــي					
                               
	   
							   
							   
							
                               <?php 
							   
                              
							  } else {

                                    echo 'Pas d\'enregistrements dans cette table...';
                                }
	/**********************/
                        ?>

				 <?php				
							
							}
                            } else {
                                ?>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                            <fieldset><legend style="caption-side: right;">ترتيب المعدلات</legend>
                                <br>
                                    <table style="text-align: left; width: 80%;" border="1"
                                           cellpadding="2" cellspacing="2">
                                        <tbody>
                                            <tr>
                                                <td style=" width: 30%;">السنة الدراسية :</td>
                                                <td><select name="NUM_BUR"> 
                        <?php
                        $retour = mysql_query("select distinct 	IANNEE from inscription order by IANNEE ASC"); // afficher les classes
						$retour1 = mysql_query("select distinct 	COD_ANN from tab_eleve");
						 while ($a = mysql_fetch_array($retour1)) {
                            echo '<option value="' . $a['COD_ANN'] . '">' . $a['COD_ANN'] . '</option>';
                        }
                        while ($a = mysql_fetch_array($retour)) {
                            echo '<option value="' . $a['IANNEE'] . '">' . $a['IANNEE'] . '</option>';
                        }
                        ?>  
                                 
                                                    </select></td>
                                            </tr>

                                            <tr>
                                                <td colspan="2" rowspan="1"  style="text-align:center">  <input type="submit" name="valider" value="valider"></td>

                                            </tr>
                                        </tbody>
                                    </table>
                            </fieldset>
                        </form > 
                                                        <?php
                                                    }
                                                    ?>
                    </div>
                    </body>
                    </html>
