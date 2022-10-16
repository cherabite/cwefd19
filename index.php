<?php
// On démarre la session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
 <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>
<title>Connection</title>
</head>


<body  style="direction:rtl">

<table width="50%" border="1" align="center">
  <tr>
    <td width="100%">
    <div id ="imagez">
    
   
    
    </div>
    </td>
  </tr>
   <tr>
    <td>
    
	<?php
                            mysql_connect("localhost", "root", "");
                            mysql_select_db("grh");
                            mysql_query("set character_set_server='utf8'");
                            mysql_query("set names 'utf8'");
//session_start();
                            /*                             * ***Verification du mot de passe *** */
                            if (isset($_POST['password'])) {
                                if ($_POST['password'] != "" and $_POST['login'] != "") {
                                    $mdp = $_POST['password'];
                                    $pseudo = $_POST['login'];
                                    $nbr = mysql_fetch_array(mysql_query("select count(*) as nb,type ,Num from login where pseudo='$pseudo' and passe='$mdp'"));
                                    if ($nbr['nb'] == 1) {
                                      $_SESSION=array();
                                          session_destroy();
                                          session_start();
										 if($nbr['type']=="admine") {
											 echo $nbr['Num'] ;
										 $_SESSION['admine'] = $nbr['type']; $_SESSION['NUM_USER']=$nbr['Num'] ;}
										 elseif($nbr['type']=="corecteur") {
											 echo $nbr['Num'] ;
										 $_SESSION['corecteur'] = $nbr['type']; $_SESSION['NUM_USER']=$nbr['Num'] ;}
										  elseif($nbr['type']=="inventaire") {
											 echo $nbr['Num'] ;
										 $_SESSION['inventaire'] = $nbr['type']; $_SESSION['NUM_USER']=$nbr['Num'] ;}
									     else if ($nbr['type']=="admin") 
										 {$_SESSION['admin'] = $nbr['type']; $_SESSION['NUM_USER']=$nbr['Num']; }
										 else if ($nbr['type']=="agent") 
										 {$_SESSION['agent'] = $nbr['type']; $_SESSION['NUM_USER']=$nbr['Num'];}
										 else if ($nbr['type']=="stock") 
										 {$_SESSION['stock'] = $nbr['type']; $_SESSION['NUM_USER']=$nbr['Num'];}
										 else if ($nbr['type']=="employeur") 
										 {$_SESSION['employeur'] = $nbr['type']; $_SESSION['NUM_USER']=$nbr['Num'];}
										
                                        ?>	<SCRIPT LANGUAGE="Javascript">alert("vous etes connectés"); window.location.href = 'indexx.php';</SCRIPT> 	<?php
                                    } else {
                                        ?>	<SCRIPT LANGUAGE="Javascript">alert("Login ou mot de passe incorrect");</SCRIPT> 	<?php
                                    }
                                } else {
                                    ?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");</SCRIPT> 	<?php
                                    }
                                }
                                ?>

                            <form method="post" action="<?php echo $_SERVER['PHP_SELF'] ?>" >
                                <fieldset><legend style="caption-side: centre;">الإتـصال بالـسرفـــر </legend>
                                    <table border="0" width="400" align="center">
                                        <tr>
                                            <td width="200"><b>اســم المستخــدم:</b></td>
                                            <td width="200">
                                                <input type="text" name="login">
                                            </td>
                                        </tr>
                                        <tr>
                                            <td width="200"><b>كــلـمة المـــــرور :<b></td>
                                                        <td width="200">
                                                            <input type="password" name="password">
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                            <td colspan="2" align="center">
															<p></p><p></p>
                                                                <input type="submit" name="connect" value="إتــصــال">
                                                            </td>
                                                        </tr> 
                                                        </table>
                                                        </fieldset>
                                                            </form>
    </td>
     
    
  </tr>
</table>

</body>
</html>
