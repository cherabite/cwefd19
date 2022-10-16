<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
    <head>






        </script>
    </head>


    <title>LISTE PRODUIT</title>
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
                margin-left: 0.5cm;
                margin-bottom: 0cm;
                margin-right:0cm;

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
						
                        $select = "SELECT * FROM produit ORDER BY Nom_categorie  ASC ";
                        $result = mysql_query($select);
                        $total = mysql_num_rows($result);
                        if ($total) {
                            ?>

                           
                            <h3>Liste_produit   AU : <?php echo date("d-m-Y"); ?> </h3>

                            <table style="text-align: centre;position:relative;width:100%" border="1" cellpadding="2" cellspacing="2">
                                <tbody>
                                    <tr style="background-color:red;">
                                        <td style="position:relative;width:10%">الرقم :</td>
                                        <td style="position:relative;width:40%"> Nom produit</td>
                                        <td style="position:relative;width:40%">Type Categorie</td>
                                        <td> Qte_initial </td>
                                        <td> Qte_entree </td>
                                        <td>Qte_sortie</td>
                                        <td> Qte_final</td>
                                         <td> Qte_reel</td>
										 <td> Equare</td>
                                        
                                    </tr>
                                    <?php
                                    $nem = 1;
                                    while ($row = mysql_fetch_array($result)) {
                                        echo' <tr>
	
      <td>' . $nem . ' </td>
      <td>' . $row['Nom_produit'] . '</td>
      <td>' . $row['Nom_categorie'] . '</td>
      <td>' . $row['Qte_initial'] . '</td>
	  <td>' . $row['Qte_entree'] . '</td>
      <td>' . $row['Qte_sortie'] . '</td>
      <td>' . $row['Qte_final'] . '</td>
      <td></td>
      <td></td>
     </tr>';
                                        $nem = $nem + 1;
                                    }
                                    ?>
                                </tbody>
                            </table>
                            <?php
                        } else {

                            echo 'Pas d\'enregistrements dans cette table...';
                        }
                        ?>


                    </div>
                    </body>
                    </html>
