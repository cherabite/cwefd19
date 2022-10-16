<?php

session_start();

if (isset($_SESSION['admin'])) {
 // echo  $_SESSION['admine']; 
   
       ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <head>




        <meta name="description" content="" />

        <meta name="keywords" content="" />

        <meta name="author" content="" />

        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />

        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>

        <title>تحديث حجرات مراكز الإجراء </title>

    </head>

    <body style="direction: rtl;">
        <div id="wrapper">
            <table style="text-align: right; width: 100%;" align="right"
                   border="1" cellpadding="0" cellspacing="2">		
                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>


                <tr>
                    <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>


                <tr> 
                    <td style="text-align: right; width: 203px;" >
                        <?php include('includes/sidebar.php'); ?>
                    </td>

                    <td> <div id="content">
                            <?php
                            mysql_connect("localhost", "root", "");
                            mysql_select_db("imthne");
                            mysql_query("set character_set_server='utf8'");
                            mysql_query("set names 'utf8'");
                            $data = mysql_query("select * from tab_stat order by code_etab desc");
                            ?>
                            <center><pre>
                            <?php
                            if (isset($_POST['code_etab'])) {//tester le chois de l'etablissent
                                $code_etab = $_POST['code_etab'];
                                $don = mysql_query("select * from tab_niv where cod_etab='$code_etab'");
                                $nb = mysql_num_rows($don);
                                // echo $nb;
                                $line = mysql_fetch_array($don);
                                //echo $etablissent;
                                ?>
      
      <table style="text-align: left; width: 100%;" border="1"
     cellpadding="2" cellspacing="2">
     <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire"> 
         <tbody>
         <tr>
          <td style="text-align: center;" colspan="2"rowspan="1">تحديث الحجرات المخصصة لكل مستوى</td>
          </tr>
          <tr>
    	  <td style="text-align: right;">ملاحظة :</td>
           <td style="text-align: right;">اكتب عدد المترشحين في الحجرة الأخيرة فقط عندما يكون العدد أكبر من 20 &nbsp;<br> </td>
          </tr>
    	
          <tr>
    	
          	     <td colspan="2" rowspan="1">
             <table style="width: 100%; text-align: center;"
                border="1" cellpadding="2" cellspacing="2">
                <tbody>
              <tr>
    		    <td>مركز الإجراء :</td>
                <td colspan="3" rowspan="1"><?php echo $line['etab']; ?></td>
    			
              </tr>
              <tr>
    		    <td>المستوى :</td>
    			<td>عدد المترشحين</td>
    			<td>عدد المعاقين</td>
                <td>نوع الإعاقة</td>
    			
              </tr>
              <tr>
                                                                        <?php
                                                                        $donn = mysql_query("select * from tab_niv where cod_etab='$code_etab'");
                                                                        while ($line = mysql_fetch_array($donn)) {
                                                                            echo '<tr>
				<td> ' . $line['niv'] . '</td>
				<td>' . $line['nbr_cond_par_niv'] . '</td>
				<td style="text-align: center;"><input type="text" name="obs1[]" value="' . $line['obs1'] . '"></td>
				<td style="text-align: center;"><input type="text" name="obs2[]" value="' . $line['obs2'] . '"></td>
			    <input type="hidden" name="cod_etab" value="' . $line['cod_etab'] . '">
	            <input type="hidden" name="niv[]" value="' . $line['niv'] . '">
					  
		       	 </tr>';
                                                                        }
                                                                        ?>
              </tr>
              </tbody>
             </table>
             </td>
    	  
    	    </tr>
    		
    	  <tr>
    	   
    	 <td style="text-align: center;" colspan="2"rowspan="1">
    	 <input type="submit" name="modiff" value="حفظ التغييرات"></td>
    	 
    	  
    	  </tr>
    	  </tbody>
      
      </form>
    </table> 


                                                <?php
                                        } //fin chois de l'etabliss ent
                                        else {//fourmulaire de chois l'etablissent
                                            $data = mysql_query("select * from tab_stat ");
                                            ?>

        <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" class="formulaire">
           إختر اسم مركز الإجـــــــــــــــــراء :<br/><br/>
                 <select name="code_etab"> 
                                        <?php
                                        while ($a = mysql_fetch_array($data)) {
                                            echo '<option value="' . $a['code_etab'] . '">' . $a['etablissent'] . '</option>';
                                        }
                                        ?></select><br/><br/><br/>
            <input type="submit" value="Afficher les etablissent">
         </form> 
                                                <?php
                                            }
                                            if (isset($_POST['modiff'])) {
                                                $id1 = $_POST['cod_etab'];
                                                $id2 = $_POST['niv'];
                                                $obs1 = $_POST['obs1'];
                                                $obs2 = $_POST['obs2'];

                                                $j = 0;
                                                /*
                                                  foreach($_POST['obs1'] as $i=>$bidon) {

                                                  // On récupère les valeurs cachées
                                                  $vo = $_POST['obs1'][$i];

                                                  echo $vo;
                                                  }
                                                 */
                                                foreach ($_POST['niv'] as $i => $bidon) {

// On récupère les valeurs cachées

                                                    $d = $_POST['niv'][$i];
                                                    $j = $j + 1;
                                                }
//echo $j;
                                                for ($i = 0; $i < $j; $i++) {
                                                    //echo $id2[$i];
                                                    $req = "update tab_niv set obs1='$obs1[$i]',obs2='$obs2[$i]' where cod_etab='$id1' and niv='$id2[$i]'";
                                                    $resulta = mysql_query($req);
                                                }
                                            }
                                            ?>
<br/><br/>

                                </pre></center>

                        </div>
                    </td> 

                </tr> 


                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
            </table

        </div>

    </body>

</html>
<?php
    } else {
        ?> <SCRIPT LANGUAGE="Javascript">	alert("ليس لديك الصلاحية");
            window.location.href = 'indexx.php';

        </SCRIPT> <?php
    }
?>