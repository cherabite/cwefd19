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

        <h3 style="text-align: center;">الجمهورية
            الجزائرية الديمقراطية الشعبية</h3>
        <h3 style="text-align: center;">وزارة
            التربية الوطنية</h3>
        <h3 style="text-align: center;">الديوان
            الوطني للتعليم و التكوين عن بعد</h3>
        <h3 style="text-align: center;">المركز
            الولائي سطيف</h3>
        <hr color="blue" width="75%">

            <?php
            mysql_connect("localhost", "root", "");
            mysql_select_db("gestion_stock");
            mysql_query("set character_set_server='utf8'");
            mysql_query("set names 'utf8'");




            if (isset($_POST['valider'])) {
                $NUM_BUR = $_POST['NUM_BUR'];
                if ($NUM_BUR == 'TOUTE L INVENTAIRES') {
                    $DESTRU = 'DESTRUCTION';
                    $select = "SELECT * FROM inventaire  where ETAT_INV !='$DESTRU'  ORDER BY NUM_INV  ASC ";
					// $select = "SELECT * FROM inventaire  ";
                    $result = mysql_query($select);
                    $total = mysql_num_rows($result);
					echo $total;
                    if ($total) {
                        ?>


                        <h3><u>LISTE D'INVENTAIRES</u> </h3>
                        <hr>
                            <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td>N° :</td>
                                        <td>NOM(fr) :</td>
										<td> NUM_INVTR</td>
                                        <td> &nbsp; OBSERVATION &nbsp; </td>
                                        


                                    </tr>
            <?php
            $nem = 1;
            while ($row = mysql_fetch_array($result)) {
                echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['NOM_INV_LAT'] . '</td>
	   <td>' . $row['NUM_INV'] . '</td>
      <td></td>
	 
       </tr>';
                $nem = $nem + 1;
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
                            } else {
                                $DESTRU = 'DESTRUCTION';
                                $select = "SELECT * FROM inventaire  where  NUM_BUR ='$NUM_BUR' ORDER BY NUM_INV  ASC ";
                                $result = mysql_query($select);
                                $total = mysql_num_rows($result);
                                if ($total) {
                                    ?>


                            <h3><u> <?php echo $NUM_BUR; ?> </u></h3>
                            <hr>
                                <table style="text-align: centre; " border="1" cellpadding="2" cellspacing="2">
                                    <tbody>
                                        <tr style="background-color:red;">
                                            <td>N° :</td>
                                           
                                            <td>NOM(fr) :</td>
											 <td> NUM_INVTR</td>
                                            <td> &nbsp; OBSERVATION &nbsp; </td>
                                           


                                        </tr>
            <?php
            $nem = 1;
            while ($row = mysql_fetch_array($result)) {
                echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['NOM_INV_LAT'] . '</td>
	   <td>' . $row['NUM_INV'] . '</td>
      <td></td>
	 
       </tr>';
                $nem = $nem + 1;
            }
            ?>
                                    </tbody>
                                </table>
		&nbsp; &nbsp; &nbsp;&nbsp; سطيف في : &nbsp;   <?php echo date("d-m-Y"); ?><br>
								<br>
								<table   border="0" cellpadding="2" cellspacing="2" style="width:100%">
                             
                                    <tr>
                                        <td style="valign:center" COLSPAN="1" ROWSPAN="4"><br>&nbsp;&nbsp;&nbsp;مديرة المركـز الـولائــي&nbsp;</td>
                                     
										<td style="width:25%">المسؤول عن الجرد</td>
                                        <td style="width:25%"> إمضاء الموظف (1) </td>
                                     </tr>
									  <tr>
                                         <td COLSPAN="1" ROWSPAN="3"></td>
										 <td >&nbsp;</td>
                                     </tr>
									 <tr>
                                      
                                        <td>إمضاء الموظف (2) </td>
                                     </tr>
									  <tr>
                                       <td> &nbsp;</td>
                                     </tr>
								</table>
                                        <?php
                                    } else {

                                        echo 'Pas d\'enregistrements dans cette table...';
                                    }
                                }
                            } else {
                                ?>

                        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
                            <fieldset><legend style="caption-side: right;">Liste d'inventaire par : </legend>
                                <br>
                                    <table style="text-align: left; width: 80%;" border="1"
                                           cellpadding="2" cellspacing="2">
                                        <tbody>
                                            <tr>
                                                <td style=" width: 30%;">Num inventaire :</td>
                                                <td><select name="NUM_BUR"> 
                        <?php
                        $retour = mysql_query("select distinct NUM_BUR from inventaire"); // afficher les classes
                        while ($a = mysql_fetch_array($retour)) {
                            echo '<option value="' . $a['NUM_BUR'] . '">' . $a['NUM_BUR'] . '</option>';
                        }
                        ?>  
                                                        <option selected> TOUTE L INVENTAIRES</option>
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
