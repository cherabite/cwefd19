
 <html dir="rtl">

<head>
<meta http-equiv="Content-Language" content="fr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>إستفسار</title>
<style>
@media print
{
	   @page { size :size:portrait;
	  

margin:auto;
	   }
  



 
 table{
	page:portrait;
	
	    border: 2px solid black;
         text-align: center;
       
		    border-collapse: collapse;}
td {
	font-size: 13px;
    border: 1px solid black;
   white-space: nowrap; overflow: hidden;
    text-overflow: clip;
        
}			
}
@media screen
{
	body{
		background-color:lightgreen;
	}
	table{
		
	page:portrait;
	    border: 2px solid black;
         text-align: center;
       
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
<body style="position:relative;width:19cm;height:27cm;margin:auto" >
<div>

<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db = 'grh';



$link = mysql_connect ($host,$user,$pass) or die ('Erreur : '.mysql_error() );
mysql_select_db($db) or die ('Erreur :'.mysql_error());
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");

					  if (isset($_GET['ID_RET']) ) {
                        $ID_EMPLOYEUE = $_GET['ID_EMPLOYEUE'];
						echo($ID_EMPLOYEUE);
						$ID_RET = $_GET['ID_RET'];
                        $req = mysql_query("select * from tab_retard ,employeur where tab_retard.ID_RET='$ID_RET' and tab_retard.ID_EMPLOYEUE=employeur.ID_EMPLOYEUE   ");
                        $nbr = mysql_fetch_array($req);
	 	$TYPR_RET=$nbr['TYPR_RET'];
?>
<table style=" width: 100%;" border="1" cellpadding="2" cellspacing="2">
      <tbody>
        <tr>
          <td colspan="3" rowspan="1" style="text-align: center;">
            <h2> <span style="font-weight: bold;">الجمهورية الجزائرية
                الديمقراطية الشعبية</span></h2>
            <h2><span style="font-weight: bold;">وزارة التربية الوطنية</span></h2>
            <h2><span style="font-weight: bold;">الديوان الوطني للتعليم و
                التكوين عن بعد</span></h2>
            <h2><span style="font-weight: bold;">المركز الجهوي سطيف</span></h2>
            <p>
			<br>
			<hr width="75%" color="blue"> 
            </p>
            <h2><span style="font-weight: bold;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          <u>    إلى الســيـد (ة) :</u>    <?php echo $nbr['NOM'];?>  <?php echo $nbr['PRENOM'];?> </span></h2>
            <br>
            <h2><span style="font-weight: bold;">&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; <u> تحت&nbsp; إشــراف رئيس
              المصلحــة : </u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></h2>
         
       
        
          &nbsp;&nbsp;&nbsp; 
            <h2 align="right"><span style="font-weight: bold;">&nbsp;&nbsp;&nbsp; <u>الموضــوع : تــبـريــر </u>  </span></h2>
			<br>
            <h2 align="right"> &nbsp;&nbsp;&nbsp; بـناء عـلـى ما جــاء في المــوضـوع أعــلاه  أطـلـب منـكم تبرير : &nbsp; <u> <?php echo $nbr['TYPR_RET'];?> </u></h2> 
            <h3> </h3>
            <h2 align="right"><span style="font-weight: bold;"> &nbsp;&nbsp;&nbsp; التـــاريخ
              :&nbsp; <?php echo $nbr['DATE_RET'];?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                 
			الـســاعة : &nbsp; <?php if($TYPR_RET='تأخر'){ echo $nbr['HEUR_ENTRE_RET']; } if ($TYPR_RET='خروج'){echo $nbr['HEUR_SORTIR'];?> </span></h2><?php } ?>
            <h3><br>
            </h3>
            
            <h2>&nbsp;&nbsp;&nbsp; الــتـبـريــــــر
:...............................................................................................................................</h3>
            <h2><br>
              &nbsp;&nbsp;&nbsp;
................................................................................................................................................</h3>
            <h3><br>
              &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              إمضاء المعني بالأمر</h3>
            <br>
			<br>
          </td>
        </tr>
        <tr>
          <td colspan="3" rowspan="1">
            <table style="text-align: right; width: 100%;" border="1" cellpadding="2"

              cellspacing="2">
             
			 <tbody>
			  
                <tr>
                  <td style="width:150;" >&nbsp;إقتراح رئيس المصلحة</td>
                  <td><br>
                  </td>
                  <td style="width:150;">قرار الإدارة</td>
                  <td><br>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp; دون أثر</td>
                  <td><br>
                  </td>
                  <td>دون أثر</td>
                  <td><br>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp; خصم يوم من الراتب</td>
                  <td><br>
                  </td>
                  <td>خصم يوم من الراتب</td>
                  <td><br>
                  </td>
                </tr>
                <tr>
                  <td>&nbsp; تعويض الغياب</td>
                  <td>من :<br>
                    إلى :</td>
                  <td>الموافقة على التعويض</td>
                  <td>من :<br>
                    إلى :</td>
                </tr>
              </tbody>
			
            </table>
          </td>
        </tr>
        <tr>
          <td colspan="3" rowspan="1" align="right">&nbsp; <br>
           <h4> ملاحظات السيد رئيس المصلحة :</h4>
         
.........................................................................................................................
           
            &nbsp;&nbsp;<h3> سطــيف في :</h3> 
            
             <h3> 
         &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            توقيع و خــتــم رئيس المصلحة </h3><br>
            <br>
			<br>
          </td>
        </tr>
      </tbody>
    </table>

<?php
}
 ?> 
 
   
 </div> 
</body>
</html>