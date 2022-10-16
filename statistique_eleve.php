<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <head>

    
    </head>


    <title>liste inventaire</title>
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


                        <h3><u>عدد المتمدرسين :</u> </h3>
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
                            } else {
                                $select1 = "SELECT DNCODE AS a, DNANNEXE, COUNT( MENTION ) AS SOM , DNANNEE, COUNT( IF( MENTION =  'مقبول', DNANNEE, NULL ) ) AS aa,
  						        COUNT( IF( MENTION =  'معيد', DNANNEE, NULL ) ) AS bb,
								COUNT( IF( MENTION =  'غائب', DNANNEE, NULL ) ) AS cc,
								COUNT( IF( MENTION =  'متخلي', DNANNEE, NULL ) ) AS dd,
								COUNT( IF( MENTION =  'مقصى', DNANNEE, NULL ) ) AS ee,
								COUNT( IF( MENTION =  'غايب', DNANNEE, NULL ) ) AS ff,
								COUNT( IF( MENTION =  'غش', DNANNEE, NULL ) ) AS gg
               FROM (
					SELECT DISTINCT DNANNEXE, DNANNEEINS, DNNSEQ, DNCODE, DNANNEE, MENTION
					FROM detnotes
					WHERE DNANNEE = '$NUM_BUR'
					) AS rt
					GROUP BY DNCODE";

                              $sum1 = "SELECT COUNT(DISTINCT DNANNEEINS,DNNSEQ,DNANNEE ) AS D FROM detnotes where DNANNEE='$NUM_BUR' ";
                              $somme1 = mysql_query($sum1);
                            //   mysql_free_result($sum);
					// $select = "SELECT * FROM inventaire  ";
                   $result1 = mysql_query($select1);
                    $total1 = mysql_num_rows($result1);
					// mysql_free_result($select);
					echo $total1;
                    if ($total1) {
                        ?>


                        <h3><u>جدول إحصائي إجمالي</u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										<td> عدد المترشحين </td>
                                        <td> مقبول </td>
										<td> معيد </td>
										<td> غائب </td>
									   <td> متخلي </td>
									   <td> مقصى </td>
									   <td> متخلي </td>
									   <td> غش </td>
									    <td> نسبة النجاح </td>
                                    </tr>
            <?php
            $nbr_admet = 0;
			$nbr_present_tot = 0;
            while ($row = mysql_fetch_array($result1)) {			  
			  $nbr_admet= $nbr_admet+$row['aa'];	
			  $present=$row['SOM']-( $row['cc']+$row['dd']+$row['ee']+$row['ff']+$row['gg']);
              if($present == 0){
				  $per='00.00 %';
			  }else{
				   $per=number_format(( $row['aa']/ $present)*100, 2, ',', '').' %';	
			  }		
				$nbr_present_tot=$nbr_present_tot+$present;
                echo' <tr>
      <td>' . $row['a'] . ' </td>
      <td>' . $NUM_BUR . '</td>
	   <td>' . $row['SOM'] . '</td>
	   <td>' . $row['aa'] . '</td>
	   <td>' . $row['bb'] . '</td>
	   <td>' . $row['cc'] . '</td>
	   <td>' . $row['dd'] . '</td>
	   <td>' . $row['ee'] . '</td>
	   <td>' . $row['ff'] . '</td>
	   <td>' . $row['gg'] . '</td>
	   <td>' .$per. '</td>
     
	 
       </tr>';
                
            }
            ?>
			 <?php
           
            while ($row = mysql_fetch_array($somme1)) {
				
				   $per_tot=number_format(( $nbr_admet/ $nbr_present_tot)*100, 2, ',', '').' %';	
                    echo' <tr style="background-color:blue;">
	
			   <td> المجموع </td>
			   <td></td>
			    <td>' . $row['D'] . '</td>
		        <td>' .$nbr_admet. '</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
				 <td>' .$per_tot. '</td>
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
	/**********************/
                        ?>
<tr >
<div style="page-break-before:always"></div>
<h3><u>برج بوعريريج</u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										<td> عدد المترشحين </td>
                                        <td> مقبول </td>
										<td> معيد </td>
										<td> غائب </td>
									   <td> متخلي </td>
									   <td> مقصى </td>
									   <td> متخلي </td>
									   <td> غش </td>
									    <td> نسبة النجاح </td>
                                    </tr>
            <?php
			$select3 = "SELECT DNCODE AS a, DNANNEXE, COUNT( MENTION ) AS SOM , DNANNEE, COUNT( IF( MENTION =  'مقبول', DNANNEE, NULL ) ) AS aa,
  						        COUNT( IF( MENTION =  'معيد', DNANNEE, NULL ) ) AS bb,
								COUNT( IF( MENTION =  'غائب', DNANNEE, NULL ) ) AS cc,
								COUNT( IF( MENTION =  'متخلي', DNANNEE, NULL ) ) AS dd,
								COUNT( IF( MENTION =  'مقصى', DNANNEE, NULL ) ) AS ee,
								COUNT( IF( MENTION =  'غايب', DNANNEE, NULL ) ) AS ff,
								COUNT( IF( MENTION =  'غش', DNANNEE, NULL ) ) AS gg
               FROM (
					SELECT DISTINCT o.DNANNEXE, o.DNANNEEINS, o.DNNSEQ, o.DNCODE, o.DNANNEE, o.MENTION
                   
					FROM  eleve  e
                    INNER JOIN detnotes o

                   ON o.DNANNEXE=e.ANNEXE 
                   and o.DNANNEEINS=e.ANNEEINS 
                   and  o.DNNSEQ=e.NSEQ
				   where  e.WILAYA LIKE 'برج بوعريريج'  
				   and  o.DNANNEE = '$NUM_BUR'
					) AS rt
					GROUP BY DNCODE";

                              $sum3 = "SELECT COUNT( DISTINCT i.IANNEEINS, i.INSEQ, i.IANNEXE ) AS D
FROM inscription  i INNER JOIN eleve  e
ON
 e.ANNEXE = i.IANNEXE
AND e.ANNEEINS = i.IANNEEINS
AND e.NSEQ = i.INSEQ
where 
    e.WILAYA LIKE 'برج بوعريريج'
 AND i.IANNEE =  '$NUM_BUR'

							  
							  ";
                              $somme3 = mysql_query($sum3);
 
					// $select = "SELECT * FROM inventaire  ";
                   $result3 = mysql_query($select3);
                    $total3 = mysql_num_rows($result3);
					echo $total3;
                   
                        
			
            $nbr_admet = 0;
			$nbr_present_tot = 0;
            while ($row = mysql_fetch_array($result3)) {
			 $nbr_admet= $nbr_admet+$row['aa'];	
			  $present=$row['SOM']-( $row['cc']+$row['dd']+$row['ee']+$row['ff']+$row['gg']);
			  if($present == 0){
				  $per='00.00 %';
			  }else{
				   $per=number_format(( $row['aa']/ $present)*100, 2, ',', '').' %';	
			  }
             			
				$nbr_present_tot=$nbr_present_tot+$present;				
				
                echo' <tr>
      <td>' . $row['a'] . ' </td>
      <td>' . $NUM_BUR . '</td>
	   <td>' . $row['SOM'] . '</td>
	   <td>' . $row['aa'] . '</td>
	   <td>' . $row['bb'] . '</td>
	   <td>' . $row['cc'] . '</td>
	   <td>' . $row['dd'] . '</td>
	   <td>' . $row['ee'] . '</td>
	   <td>' . $row['ff'] . '</td>
	   <td>' . $row['gg'] . '</td>
	   <td>' .$per. '</td>
     
	 
       </tr>';
                
            }
            ?>
			 <?php
           
            while ($row = mysql_fetch_array($somme3)) {
				
				   $per_tot=number_format(( $nbr_admet/ $nbr_present_tot)*100, 2, ',', '').' %';	
                echo' <tr style="background-color:blue;">
	
			  <td> المجموع </td>
			  <td></td>
			   <td>' . $row['D'] . '</td>
		        <td>' .$nbr_admet. '</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
				 <td>' .$per_tot. '</td>
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
		
<div style="page-break-before:always"></div>
<h3><u>سطيف</u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>المستوى</td>
                                        <td>السنة الدراسية</td>
										<td> عدد المترشحين </td>
                                        <td> مقبول </td>
										<td> معيد </td>
										<td> غائب </td>
									   <td> متخلي </td>
									   <td> مقصى </td>
									   <td> متخلي </td>
									   <td> غش </td>
									    <td> نسبة النجاح </td>
                                    </tr>
            <?php
			$select4 = "SELECT DNCODE AS a, DNANNEXE, COUNT( MENTION ) AS SOM , DNANNEE, COUNT( IF( MENTION =  'مقبول', DNANNEE, NULL ) ) AS aa,
  						        COUNT( IF( MENTION =  'معيد', DNANNEE, NULL ) ) AS bb,
								COUNT( IF( MENTION =  'غائب', DNANNEE, NULL ) ) AS cc,
								COUNT( IF( MENTION =  'متخلي', DNANNEE, NULL ) ) AS dd,
								COUNT( IF( MENTION =  'مقصى', DNANNEE, NULL ) ) AS ee,
								COUNT( IF( MENTION =  'غايب', DNANNEE, NULL ) ) AS ff,
								COUNT( IF( MENTION =  'غش', DNANNEE, NULL ) ) AS gg
               FROM (
					SELECT DISTINCT o.DNANNEXE, o.DNANNEEINS, o.DNNSEQ, o.DNCODE, o.DNANNEE, o.MENTION
                   
					FROM  eleve  e
                    INNER JOIN detnotes o

                   ON o.DNANNEXE=e.ANNEXE 
                   and o.DNANNEEINS=e.ANNEEINS 
                   and  o.DNNSEQ=e.NSEQ
				   where  e.WILAYA LIKE 'سطيف'  
				   and  o.DNANNEE = '$NUM_BUR'
					) AS rt
					GROUP BY DNCODE";

                              $sum4 = "SELECT COUNT( DISTINCT i.IANNEEINS, i.INSEQ, i.IANNEXE ) AS D
FROM inscription  i INNER JOIN eleve  e
ON
 e.ANNEXE = i.IANNEXE
AND e.ANNEEINS = i.IANNEEINS
AND e.NSEQ = i.INSEQ
where 
    e.WILAYA LIKE 'سطيف'
 AND i.IANNEE =  '$NUM_BUR'
							  
							  ";
                              $somme4 = mysql_query($sum4);
 
					// $select = "SELECT * FROM inventaire  ";
                   $result4 = mysql_query($select4);
                    $total4 = mysql_num_rows($result4);
					echo $total4;
                   
                        
			
            $nbr_admet = 0;
			$nbr_present_tot=0;
            while ($row = mysql_fetch_array($result4)) {
			 $nbr_admet= $nbr_admet+$row['aa'];	
			  $present=$row['SOM']-( $row['cc']+$row['dd']+$row['ee']+$row['ff']+$row['gg']);
             if($present == 0){
				 $per='00.00 %';
			  }else{
				   $per=number_format(( $row['aa']/ $present)*100, 2, ',', '').' %';	
			  }			
				$nbr_present_tot=$nbr_present_tot+$present;
                echo' <tr>
      <td>' . $row['a'] . ' </td>
      <td>' . $NUM_BUR . '</td>
	   <td>' . $row['SOM'] . '</td>
	   <td>' . $row['aa'] . '</td>
	   <td>' . $row['bb'] . '</td>
	   <td>' . $row['cc'] . '</td>
	   <td>' . $row['dd'] . '</td>
	   <td>' . $row['ee'] . '</td>
	   <td>' . $row['ff'] . '</td>
	   <td>' . $row['gg'] . '</td>
	   <td>' .$per. '</td>
     
	 
       </tr>';
                
            }
            ?>
			 <?php
           
            while ($row = mysql_fetch_array($somme4)) {
				
				   $per_tot=number_format(( $nbr_admet/ $nbr_present_tot)*100, 2, ',', '').' %';	
                echo' <tr style="background-color:blue;">
	
			  <td> المجموع </td>
			  <td></td>
			   <td>' . $row['D'] . '</td>
		        <td>' .$nbr_admet. '</td> <td></td> <td></td> <td></td> <td></td> <td></td> <td></td>
				 <td>' .$per_tot. '</td>
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
							
							}
                            } else {
                                ?>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                            <fieldset><legend style="caption-side: right;">statistique inscription</legend>
                                <br>
                                    <table style="text-align: left; width: 80%;" border="1"
                                           cellpadding="2" cellspacing="2">
                                        <tbody>
                                            <tr>
                                                <td style=" width: 30%;">السنة الميلادية :</td>
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
