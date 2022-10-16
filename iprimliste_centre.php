 <html dir="rtl">

    <head>
        <meta http-equiv="Content-Language" content="fr">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title>rec</title>
        <style>
           
            @media print
            {
               
                @page rotated { size : landscape }
                h1 {page-break-before: always;}
                @page {size: A4 landscape;}

                @page {margin: 0.5cm;0.5cm;0.5cm;0.5cm; }  
                table{
                    width:100%;
                    hieght:50%;
                    border: 2px solid black;
                    text-align: center;
                    margin: 0cm;0cm;0cm;0cm;
                    border-collapse: collapse;}
                td {
                    font-size: 13px;
                    border: 1px solid black;
                    white-space: nowrap; overflow: hidden;
                    text-overflow: clip;

                }			
            } 

        </style>
    </head>
    <body>
        <?php
        $host = 'localhost';
        $user = 'root';
        $pass = '';
        $db = 'imthne';

       
        // j'ai cliqué sur « remplir tab_niv »
// connection à la DB

        $link = mysql_connect($host, $user, $pass) or die('Erreur : ' . mysql_error());
        mysql_select_db($db) or die('Erreur :' . mysql_error());
        mysql_query("set character_set_server='utf8'");
        mysql_query("set names 'utf8'");
        $select = "SELECT * FROM tab_stat where wil='سطيف' ";
        $result = mysql_query($select);
        $total = mysql_num_rows($result);
        if ($total) {
            ?>
            <H1 align=center> <STRONG>جـــدول توزيع الطلـبة لولايـــة ســطيــف</STRONG><BR></H1>
            <table style="text-align: centre; " border="1"cellpadding="2" cellspacing="2">
                <thead>
                    <tr>
                        <th colspan="2" rowspan="1"></th>
                        <th colspan="28" rowspan="1">المستويات</th>
                        <th colspan="2" rowspan="1"></th>
                    </tr>
                    <tr  bgcolor="#C0C0C0">
                        <th>رقم المركز</th>
                        <th bgcolor="#C0C0C0">إسم المركز</th>
                        <th>104</th>
                        <th>204</th>
                        <th>304</th>
                        <th>404</th>
                        <th>122</th>
                        <th>124</th>
                        <th>212</th>
                        <th>213</th>
                        <th>214</th>
						<th>215</th>
						 <th>216</th>
                        <th>218</th>
                  
                        <th>237</th>
						 <th>251</th>
                        <th>253</th>
                        <th>255</th>
                        <th>257</th>
                        <th>312</th>
                        <th>313</th>
                        <th>314</th>
						 <th>315</th>
                        <th>316</th>
                        <th>318</th>
                        <th>337</th>
					    <th>351</th>
                        <th>353</th>
                        <th>355</th>
                        <th>357</th>
                        <th>عدد المترشحين</th>
                        <th>عدد القاعات</th>
                    </tr>
                <thead>
    <?php
    while ($row = mysql_fetch_array($result)) {
        echo' <tr>
      <td>' . $row['code_etab'] . ' </td>
       
      <td bgcolor="#C0C0C0">' . $row['etablissent'] . '</td>
      <td>';  if($row['c104']!=0)echo $row['c104'];echo '</td>
      <td>' ; if($row['c204']!=0)echo $row['c204'] ;echo '</td>
      <td>' ; if($row['c304']!=0)echo $row['c304'] ;echo '</td>
      <td>' ; if($row['c404']!=0)echo $row['c404'] ;echo '</td>
      <td>' ; if($row['c122']!=0)echo $row['c122'] ;echo '</td>
      <td>' ; if($row['c124']!=0)echo $row['c124'] ;echo '</td>
      <td>' ; if($row['c212']!=0)echo $row['c212'] ;echo '</td>
      <td>' ; if($row['c213']!=0)echo $row['c213'] ;echo '</td>
      <td>' ; if($row['c214']!=0)echo $row['c214'] ;echo '</td>
	  <td>' ; if($row['c215']!=0)echo $row['c215'] ;echo '</td>
	   <td>' ; if($row['c216']!=0)echo $row['c216'] ;echo '</td>
      <td>' ; if($row['c218']!=0)echo $row['c218'] ;echo '</td>
     
      <td>' ; if($row['c237']!=0)echo $row['c237'] ;echo '</td>
	  <td>' ;if($row['c251']!=0)echo $row['c251'] ;echo '</td>
      <td>' ; if($row['c253']!=0)echo $row['c253'] ;echo '</td>
      <td>' ; if($row['c255']!=0)echo $row['c255'] ;echo '</td>
      <td>' ; if($row['c257']!=0)echo $row['c257'] ;echo '</td>
      <td>' ; if($row['c312']!=0)echo $row['c312'] ;echo '</td>
      <td>' ; if($row['c313']!=0)echo $row['c313'] ;echo '</td>
      <td>' ;if($row['c314']!=0)echo $row['c314'] ;echo '</td>
	  <td>' ; if($row['c315']!=0)echo $row['c315'] ;echo '</td>
      <td>' ; if($row['c316']!=0)echo $row['c316'] ;echo '</td>
      <td>' ; if($row['c318']!=0)echo $row['c318'] ;echo '</td>
      <td>' ; if($row['c337']!=0)echo $row['c337'] ;echo '</td>
	  
	  <td>' ; if($row['c351']!=0)echo $row['c351'] ;echo '</td>
      <td>' ; if($row['c353']!=0)echo $row['c353'] ;echo '</td>
      <td>' ; if($row['c355']!=0)echo $row['c355'] ;echo '</td>
      <td>' ; if($row['c357']!=0)echo $row['c357'] ;echo '</td>
      <td>' . $row['nbr_condidats'] . '</td>
      <td>' . $row['nbr_classes'] . '</td>
      
     </tr>';
    }
	// مجموع تاع المستويات
	                $req = "SELECT SUM(c104) as 's104',SUM(c204) as 's204',SUM(c304) as 's304',SUM(c404) as 's404'
					,SUM(c122) as 's122',SUM(c124) as 's124',
					SUM(c212) as 's212',SUM(c213) as 's213',SUM(c214) as 's214',SUM(c215) as 's215',SUM(c216) as 's216',SUM(c218) as 's218',SUM(c237) as 's237',SUM(c251) as 's251',SUM(c253) as 's253',SUM(c255) as 's255',SUM(c257) as 's257'
               ,SUM(c312) as 's312',SUM(c313) as 's313',SUM(c314) as 's314',SUM(c315) as 's315',SUM(c316) as 's316',SUM(c318) as 's318',SUM(c337) as 's337',SUM(c351) as 's351',SUM(c353) as 's353',SUM(c355) as 's355',SUM(c357) as 's357'
 FROM tab_stat where wil='سطيف'
			   ";

			   $result_tot = mysql_query($req);
				$row_tot = mysql_fetch_assoc($result_tot);
	echo '<tr>
	 <th colspan="2" rowspan="1"> المجموع</th>
           <th>'.$row_tot['s104'].'</th>
		    <th>'.$row_tot['s204'].'</th>
			 <th>'.$row_tot['s304'].'</th>
			  <th>'.$row_tot['s404'].'</th>
			   <th>'.$row_tot['s122'].'</th>
			    <th>'.$row_tot['s124'].'</th>
				 <th>'.$row_tot['s212'].'</th>
				  <th>'.$row_tot['s213'].'</th>
				   <th>'.$row_tot['s214'].'</th>
				    <th>'.$row_tot['s215'].'</th>
					 <th>'.$row_tot['s216'].'</th>
					  <th>'.$row_tot['s218'].'</th>
					   <th>'.$row_tot['s237'].'</th>
					    <th>'.$row_tot['s251'].'</th>
						 <th>'.$row_tot['s253'].'</th>
						  <th>'.$row_tot['s255'].'</th>
						   <th>'.$row_tot['s257'].'</th>
						     <th>'.$row_tot['s312'].'</th>
							  <th>'.$row_tot['s313'].'</th>
				   <th>'.$row_tot['s314'].'</th>
				    <th>'.$row_tot['s315'].'</th>
					 <th>'.$row_tot['s316'].'</th>
					  <th>'.$row_tot['s318'].'</th>
					   <th>'.$row_tot['s337'].'</th>
					    <th>'.$row_tot['s351'].'</th>
						 <th>'.$row_tot['s353'].'</th>
						  <th>'.$row_tot['s355'].'</th>
						   <th>'.$row_tot['s357'].'</th>
						   <th colspan="2" rowspan="1">'; echo $t=$row_tot['s104']

		    +$row_tot['s204']
			 +$row_tot['s304']
			  +$row_tot['s404']
			   +$row_tot['s122']
			    +$row_tot['s124']
				 +$row_tot['s212']
				  +$row_tot['s213']
				   +$row_tot['s214']
				    +$row_tot['s215']
					 +$row_tot['s216']
					  +$row_tot['s218']
					   +$row_tot['s237']
					    +$row_tot['s251']
						 +$row_tot['s253']
						  +$row_tot['s255']
						   +$row_tot['s257']
						     +$row_tot['s312']
							  +$row_tot['s313']
				   +$row_tot['s314']
				    +$row_tot['s315']
					 +$row_tot['s316']
					  +$row_tot['s318']
					   +$row_tot['s337']
					    +$row_tot['s351']
						 +$row_tot['s353']
						  +$row_tot['s355']
						   +$row_tot['s357'];'</th>
							
							 
	</tr>';
    ?>
            </table>
                    <?php
                    // fin du tableau.
                } else
                    echo 'Pas d\'enregistrements dans cette table...';

                $select = "SELECT * FROM tab_stat where wil='برج بوعريريج' ";
                $result = mysql_query($select);
                $total = mysql_num_rows($result);
                if ($total) {
                    ?>
            <H1 align=center> <STRONG>جـــدول توزيع الطلـبة لولايـــة برج بوعريريج</STRONG><BR></H1>
            <table style="text-align: centre;" border="1"cellpadding="2" cellspacing="2">
                <thead>
                    <tr>
                        <th colspan="2" rowspan="1"></th>
                        <th colspan="28" rowspan="1">المستويات</th>
                        <th colspan="2" rowspan="1"></th>
                    </tr>
                    <tr  bgcolor="#C0C0C0">
                        <th>رقم المركز</th>

                        <th bgcolor="#C0C0C0">إسم المركز</th>
                        <th>104</th>
                        <th>204</th>
                        <th>304</th>
                        <th>404</th>
                        <th>122</th>
                        <th>124</th>
                        <th>212</th>
                        <th>213</th>
                        <th>214</th>
                        <th>215</th>
                        <th>216</th>
						 <th>218</th>
                        <th>237</th>
						 <th>251</th>
                        <th>253</th>
                        <th>255</th>
                        <th>257</th>
                        <th>312</th>
                        <th>313</th>
                        <th>314</th>
						 <th>315</th>
                        <th>316</th>
                        <th>318</th>
                        <th>337</th>
						
						<th>351</th>
                        <th>353</th>
                        <th>355</th>
                        <th>357</th>
                        <th>عدد المترشحين</th>
                        <th>عدد القاعات</th>
                    </tr>
                <thead>
    <?php
    while ($row = mysql_fetch_array($result)) {
        echo' <tr>
      <td>' . $row['code_etab'] . ' </td>
       
      <td bgcolor="#C0C0C0">' . $row['etablissent'] . '</td>
    <td>';  if($row['c104']!=0)echo $row['c104'];echo '</td>
      <td>' ; if($row['c204']!=0)echo $row['c204'] ;echo '</td>
      <td>' ; if($row['c304']!=0)echo $row['c304'] ;echo '</td>
      <td>' ; if($row['c404']!=0)echo $row['c404'] ;echo '</td>
      <td>' ; if($row['c122']!=0)echo $row['c122'] ;echo '</td>
      <td>' ; if($row['c124']!=0)echo $row['c124'] ;echo '</td>
      <td>' ; if($row['c212']!=0)echo $row['c212'] ;echo '</td>
      <td>' ; if($row['c213']!=0)echo $row['c213'] ;echo '</td>
      <td>' ; if($row['c214']!=0)echo $row['c214'] ;echo '</td>
	  <td>' ; if($row['c215']!=0)echo $row['c215'] ;echo '</td>
	   <td>' ; if($row['c216']!=0)echo $row['c216'] ;echo '</td>
      <td>' ; if($row['c218']!=0)echo $row['c218'] ;echo '</td>
     
      <td>' ; if($row['c237']!=0)echo $row['c237'] ;echo '</td>
	  <td>' ;if($row['c251']!=0)echo $row['c251'] ;echo '</td>
      <td>' ; if($row['c253']!=0)echo $row['c253'] ;echo '</td>
      <td>' ; if($row['c255']!=0)echo $row['c255'] ;echo '</td>
      <td>' ; if($row['c257']!=0)echo $row['c257'] ;echo '</td>
      <td>' ; if($row['c312']!=0)echo $row['c312'] ;echo '</td>
      <td>' ; if($row['c313']!=0)echo $row['c313'] ;echo '</td>
      <td>' ;if($row['c314']!=0)echo $row['c314'] ;echo '</td>
	  <td>' ; if($row['c315']!=0)echo $row['c315'] ;echo '</td>
      <td>' ; if($row['c316']!=0)echo $row['c316'] ;echo '</td>
      <td>' ; if($row['c318']!=0)echo $row['c318'] ;echo '</td>
      <td>' ; if($row['c337']!=0)echo $row['c337'] ;echo '</td>
	  
	  <td>' ; if($row['c351']!=0)echo $row['c351'] ;echo '</td>
      <td>' ; if($row['c353']!=0)echo $row['c353'] ;echo '</td>
      <td>' ; if($row['c355']!=0)echo $row['c355'] ;echo '</td>
      <td>' ; if($row['c357']!=0)echo $row['c357'] ;echo '</td>
      <td>' . $row['nbr_condidats'] . '</td>
      <td>' . $row['nbr_classes'] . '</td>
      
     </tr>';
    }
	
	// مجموع تاع المستويات
	                $req = "SELECT SUM(c104) as 's104',SUM(c204) as 's204',SUM(c304) as 's304',SUM(c404) as 's404'
					,SUM(c122) as 's122',SUM(c124) as 's124',
					SUM(c212) as 's212',SUM(c213) as 's213',SUM(c214) as 's214',SUM(c215) as 's215',SUM(c216) as 's216',SUM(c218) as 's218',SUM(c237) as 's237',SUM(c251) as 's251',SUM(c253) as 's253',SUM(c255) as 's255',SUM(c257) as 's257'
               ,SUM(c312) as 's312',SUM(c313) as 's313',SUM(c314) as 's314',SUM(c315) as 's315',SUM(c316) as 's316',SUM(c318) as 's318',SUM(c337) as 's337',SUM(c351) as 's351',SUM(c353) as 's353',SUM(c355) as 's355',SUM(c357) as 's357'
 FROM tab_stat where wil='برج بوعريريج'
			   ";

			   $result_tot = mysql_query($req);
				$row_tot = mysql_fetch_assoc($result_tot);
	echo '<tr>
	 <th colspan="2" rowspan="1"> المجموع</th>
           <th>'.$row_tot['s104'].'</th>
		    <th>'.$row_tot['s204'].'</th>
			 <th>'.$row_tot['s304'].'</th>
			  <th>'.$row_tot['s404'].'</th>
			   <th>'.$row_tot['s122'].'</th>
			    <th>'.$row_tot['s124'].'</th>
				 <th>'.$row_tot['s212'].'</th>
				  <th>'.$row_tot['s213'].'</th>
				   <th>'.$row_tot['s214'].'</th>
				    <th>'.$row_tot['s215'].'</th>
					 <th>'.$row_tot['s216'].'</th>
					  <th>'.$row_tot['s218'].'</th>
					   <th>'.$row_tot['s237'].'</th>
					    <th>'.$row_tot['s251'].'</th>
						 <th>'.$row_tot['s253'].'</th>
						  <th>'.$row_tot['s255'].'</th>
						   <th>'.$row_tot['s257'].'</th>
						     <th>'.$row_tot['s312'].'</th>
							  <th>'.$row_tot['s313'].'</th>
				   <th>'.$row_tot['s314'].'</th>
				    <th>'.$row_tot['s315'].'</th>
					 <th>'.$row_tot['s316'].'</th>
					  <th>'.$row_tot['s318'].'</th>
					   <th>'.$row_tot['s337'].'</th>
					    <th>'.$row_tot['s351'].'</th>
						 <th>'.$row_tot['s353'].'</th>
						  <th>'.$row_tot['s355'].'</th>
						   <th>'.$row_tot['s357'].'</th>
						   <th colspan="2" rowspan="1">'; echo $t=$row_tot['s104']

		    +$row_tot['s204']
			 +$row_tot['s304']
			  +$row_tot['s404']
			   +$row_tot['s122']
			    +$row_tot['s124']
				 +$row_tot['s212']
				  +$row_tot['s213']
				   +$row_tot['s214']
				    +$row_tot['s215']
					 +$row_tot['s216']
					  +$row_tot['s218']
					   +$row_tot['s237']
					    +$row_tot['s251']
						 +$row_tot['s253']
						  +$row_tot['s255']
						   +$row_tot['s257']
						     +$row_tot['s312']
							  +$row_tot['s313']
				   +$row_tot['s314']
				    +$row_tot['s315']
					 +$row_tot['s316']
					  +$row_tot['s318']
					   +$row_tot['s337']
					    +$row_tot['s351']
						 +$row_tot['s353']
						  +$row_tot['s355']
						   +$row_tot['s357'];'</th>
							 
							 
	</tr>';
	
    ?>
            </table>

                    <?php
                    // fin du tableau.
                } else
                    echo 'Pas d\'enregistrements dans cette table...';

                $select_tot = "SELECT SUM(nbr_cond_par_centre),sum(nbr_niv)
       ,SUM(nbr_classes)
       ,SUM(listing)
     ,SUM(liste_cond_par_classe)
     ,SUM(feille_examen)
       ,SUM(etiquette)
       ,SUM(inter_cal)
       ,SUM(briellon)
       ,SUM(pv_salle)
       ,SUM(envloppe)
       ,SUM(stylo)
      ,SUM(ammana)
      ,SUM(commun)
       ,SUM(conv_com_secrit)
       ,SUM(autorite_tot)
       ,SUM(conv_gardien) FROM tab_total where wil='سطيف'";
                $result_tot = mysql_query($select_tot);
                $select = "SELECT * FROM tab_total where wil='سطيف' ORDER BY cod_etab ASC";
                $result = mysql_query($select);
                $total = mysql_num_rows($result);
//$row = mysql_fetch_array($result);
                $row_tot = mysql_fetch_array($result_tot);
//$t=$row_tot[0];
//echo $t;
                if ($total) {
                    ?>

            <H1 align=center> <STRONG>البــطاقــة التقـنـيـة لولايــة ســطيــف</STRONG><BR></H1>
            <table style="text-align: centre; " border="1"cellpadding="2" cellspacing="2">
                <thead>
                    <tr>
                        <th>رقم المركز</th>
                        <th>مركز الإجراء</th>
                        <th>عدد المترشحين</th>
                        <th>عدد المستويات</th>
                        <th>عدد القاعات</th>
                        <th>Listing</th>
                        <th>Listes par Salles</th>
                        <th>أوراق الإجابة</th>
                        <th>الملصقات (Etiquettes)</th>
                        <th>أوراق إضافية</th>
                        <th>أواق مسودة</th>
                        <th>محضر القاعة</th>
                        <th>أظرفة</th>
                        <th>أقلام جافة</th>

                        <th>الأمانة</th>
                        <th>الإتصال</th>
                        <th>إستدعاء الأمانة و الاتصال</th>
                        <th>ترخيص الهيئة المستخدمة</th>
                        <th>إستدعاء الحراس</th>

                    </tr>
                </thead>
    <?php
    while ($row = mysql_fetch_array($result)) {
        echo' <tr>
        <td bgcolor="#C0C0C0">' . $row['cod_etab'] . '</td>    
      <td bgcolor="#C0C0C0">' . $row['etab'] . '</td>
      <td>' . $row['nbr_cond_par_centre'] . '</td>
      <td>' . $row['nbr_niv'] . '</td>
      <td>' . $row['nbr_classes'] . '</td>
      <td>' . $row['listing'] . '</td>
      <td>' . $row['liste_cond_par_classe'] . '</td>
      <td>' . $row['feille_examen'] . '</td>
      <td>' . $row['etiquette'] . '</td>
      <td>' . $row['inter_cal'] . '</td>
      <td>' . $row['briellon'] . '</td>
      <td>' . $row['pv_salle'] . '</td>
      <td>' . $row['envloppe'] . '</td>
      <td>' . $row['stylo'] . '</td>
      <td>' . $row['ammana'] . '</td>
      <td>' . $row['commun'] . '</td>
      <td>' . $row['conv_com_secrit'] . '</td>
      <td>' . $row['autorite_tot'] . '</td>
      <td>' . $row['conv_gardien'] . '</td>
     
      
     </tr>';
    }
    echo'  <thead>
     <tr>
      <th colspan="2" rowspan="1">المجموع</th>
	  
 <th>' . $row_tot[0] . '</th>
 <th>' . $row_tot[1] . '</th>
<th>' . $row_tot[2] . '</th>
 <th>' . $row_tot[3] . '</th>
 <th>' . $row_tot[4] . '</th>
  <th>' . $row_tot[5] . '</th>
 <th>' . $row_tot[6] . '</th>
  <th>' . $row_tot[7] . '</th>
  <th>' . $row_tot[8] . '</th>
 <th>' . $row_tot[9] . '</th>
      <th>' . $row_tot[10] . '</th>
      <th>' . $row_tot[11] . '</th>
      
<th>' . $row_tot[12] . '</th>
<th>' . $row_tot[13] . '</th>
<th>' . $row_tot[14] . '</th>
      <th>' . $row_tot[15] . '</th>
      <th>' . $row_tot[16] . '</th>
      
    </tr>
	</thead>';
    ?>
            </table>

                <?php
                // fin du tableau.
            } else
                echo 'Pas d\'enregistrements dans cette table tab_total...';


            $select_tot_b = "SELECT SUM(nbr_cond_par_centre),sum(nbr_niv)
       ,SUM(nbr_classes)
       ,SUM(listing)
     ,SUM(liste_cond_par_classe)
     ,SUM(feille_examen)
       ,SUM(etiquette)
       ,SUM(inter_cal)
       ,SUM(briellon)
       ,SUM(pv_salle)
       ,SUM(envloppe)
       ,SUM(stylo)
      ,SUM(ammana)
      ,SUM(commun)
       ,SUM(conv_com_secrit)
       ,SUM(autorite_tot)
       ,SUM(conv_gardien) FROM tab_total where wil='برج بوعريريج' ";
            $result_tot_b = mysql_query($select_tot_b);
            $row_tot_b = mysql_fetch_array($result_tot_b);
            $select = "SELECT * FROM tab_total where wil='برج بوعريريج'  ORDER BY cod_etab ASC  ";
            $result = mysql_query($select);
            $total = mysql_num_rows($result);
            if ($total) {
                ?>
            <H1 align=center> <STRONG>البــطاقــة التقـنـيـة لولايــة برج بوعريريـج</STRONG><BR></H1>
            <table style="text-align: centre;" border="1"cellpadding="2" cellspacing="2">
                <thead>
                    <tr>
                        <th>رقم المركز</th>
                        <th>مركز الإجراء</th>
                        <th>عدد المترشحين</th>
                        <th>عدد المستويات</th>
                        <th>عدد القاعات</th>
                        <th>Listing</th>
                        <th>Listes par Salles</th>
                        <th>أوراق الإجابة</th>
                        <th>الملصقات (Etiquettes)</th>
                        <th>أوراق إضافية</th>
                        <th>أواق مسودة</th>
                        <th>محضر القاعة</th>
                        <th>أظرفة</th>
                        <th>أقلام جافة</th>

                        <th>الأمانة</th>
                        <th>الإتصال</th>
                        <th>إستدعاء الأمانة و الاتصال</th>
                        <th>ترخيص الهيئة المستخدمة</th>
                        <th>إستدعاء الحراس</th>

                    </tr>
                </thead>
    <?php
    while ($row = mysql_fetch_array($result)) {
        echo' <tr>
       <td bgcolor="#C0C0C0">' . $row['cod_etab'] . '</td>     
      <td bgcolor="#C0C0C0">' . $row['etab'] . '</td>
      <td>' . $row['nbr_cond_par_centre'] . '</td>
      <td>' . $row['nbr_niv'] . '</td>
      <td>' . $row['nbr_classes'] . '</td>
      <td>' . $row['listing'] . '</td>
      <td>' . $row['liste_cond_par_classe'] . '</td>
      <td>' . $row['feille_examen'] . '</td>
      <td>' . $row['etiquette'] . '</td>
      <td>' . $row['inter_cal'] . '</td>
      <td>' . $row['briellon'] . '</td>
      <td>' . $row['pv_salle'] . '</td>
      <td>' . $row['envloppe'] . '</td>
      <td>' . $row['stylo'] . '</td>
      <td>' . $row['ammana'] . '</td>
      <td>' . $row['commun'] . '</td>
      <td>' . $row['conv_com_secrit'] . '</td>
      <td>' . $row['autorite_tot'] . '</td>
      <td>' . $row['conv_gardien'] . '</td>
     
      
     </tr>';
    }
    echo'  <thead>
     <tr>
	 
     <th colspan="2" rowspan="1">المجموع</th>
	 
 <th>' . $row_tot_b[0] . '</th>
 <th>' . $row_tot_b[1] . '</th>
<th>' . $row_tot_b[2] . '</th>
 <th>' . $row_tot_b[3] . '</th>
 <th>' . $row_tot_b[4] . '</th>
  <th>' . $row_tot_b[5] . '</th>
 <th>' . $row_tot_b[6] . '</th>
  <th>' . $row_tot_b[7] . '</th>
  <th>' . $row_tot_b[8] . '</th>
 <th>' . $row_tot_b[9] . '</th>
      <th>' . $row_tot_b[10] . '</th>
      <th>' . $row_tot_b[11] . '</th>
      
<th>' . $row_tot_b[12] . '</th>
<th>' . $row_tot_b[13] . '</th>
<th>' . $row_tot_b[14] . '</th>
      <th>' . $row_tot_b[15] . '</th>
      <th>' . $row_tot_b[16] . '</th>
      
    </tr>
	</thead>';
    ?>
            </table>

                <?php
                // fin du tableau.
            } else
                echo 'Pas d\'enregistrements dans cette table...';
            ?>
    </body>
</html>
