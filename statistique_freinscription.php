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

//$mysqli = new PDO('mysql:host=localhost;dbname=base_crefd_19', 'root', '');


            if (isset($_POST['valider'])) {
                $NUM_BUR = $_POST['NUM_BUR'];
                if ($NUM_BUR < '2003/2002') {
                   
 
                                    echo 'Pas d\'enregistrements dans cette table...';
                                
                            } else {
                        /*        $select1 = "SET group_concat_max_len=5000; 
SET @sql = NULL;
SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'COUNT(IF(FRAISINS = ''',
      FRAISINS,
      ''', INSEQ, NULL)) AS ',
      FRAISINS
    )
  ) INTO @sql
FROM inscription;
SET @sql = CONCAT('SELECT ICODE, ', @sql, ' FROM inscription GROUP BY ICODE');
PREPARE stmt FROM @sql;
EXECUTE stmt;";*/
$mysqli = new Mysqli("localhost","root","","base_crefd_19");
 $mysqli->query("SET @sql = NULL");
$mysqli->query("
SELECT
  GROUP_CONCAT(DISTINCT
    CONCAT(
      'COUNT(IF(FRAISINS = ''',
      FRAISINS,
      ''', INSEQ, NULL)) AS ',
      FRAISINS
    )
  ) INTO @sql
FROM inscription;"

);
$mysqli->query("SET @sql = CONCAT('SELECT ICODE, ', @sql, ' FROM inscription GROUP BY ICODE');");
$mysqli->query("PREPARE stmt FROM @sql");

$res = $mysqli->query("EXECUTE stmt");
 $result1=$res->fetch_row();
var_dump($res->fetch_all(MYSQLI_ASSOC));


                              $sum1 = "SELECT COUNT(DISTINCT IANNEXE,IANNEEINS,INSEQ ) AS D FROM inscription where IANNEE='$NUM_BUR' ";
                              $somme1 = mysql_query($sum1);
                            //   mysql_free_result($sum);
					// $select = "SELECT * FROM inventaire  ";
                  // $result1 = mysql_query($select1);
                  //  $total1 = mysql_num_rows($result1);
					

//var_dump($result1);
					// mysql_free_result($select);
					echo $total1=1;
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
                                        <td>  2577</td>
										<td> 2277 </td>
										<td> 2377 </td>
									   <td> 1577 </td>
									   <td> 1527 </td>
									   <td> 1877 </td>
									   <td> 1777 </td>
									    <td> نسبة النجاح </td>
                                    </tr>
            <?php
            $nbr_admet = 0;
            while ($row  = $res->fetch_row()) {
			 $nbr_admet= $nbr_admet+$row['aa'];	
        $per=number_format(( $row['aa']/ $row['SOM'])*100, 2, ',', '').' %';				
				
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
				
				   $per_tot=number_format(( $nbr_admet/ $row['D'])*100, 2, ',', '').' %';	
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
