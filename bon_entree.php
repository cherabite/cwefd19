<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html  dir="ltr" >
    <head>
        <link rel="stylesheet" type="text/css" href="style.css" media="screen" />
        <script type="text/javascript" src="jquery.js"></script>
        <script type="text/javascript" src="js.js"></script>
		<script language="JavaScript">
       
		 function change_valeur()
  {
    var selectElmt = document.getElementById("Nom_categorie");
    
  }
  
function verif() {

n=document.f1.l.value;

a=document.f1.q.value;

if (n=="") {

alert ("Vous devez remplir le champ nom produit:");

valid = false;
return valid;

document.f1.l.focus();

//exit;

}

if (a=="") {

alert ("Vous devez remplir le champ Quantite :");

valid = false;
return valid;

document.f1.q.focus();
//exit;
}

}
function verif_valider() {

a=document.form2.f.value;
b=document.form2.jour.value;
c=document.form2.mois.value;
d=document.form2.annee.value;



if (a=="" || b=="" || c=="" || d=="") {

alert ("Vous devez remplir le champ fournisseur ou la date :");

valid = false;
return valid;

document.form2.f.focus();

//exit;

}


}



</script>
        <title> Bon d'entree</title>

    </head>

    <body style="direction: ">
        <div id="wrapper">
            <table style=" width: 100%;" 
                   border="1" cellpadding="0" cellspacing="2">		
                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/header.php'); ?> </td> </tr>


                <tr>
                    <td colspan="2" rowspan="1"><?php include('includes/nav.php'); ?> </td> </tr>


                <tr> 
                    <td style="vertical-align: top; width: 203px;" >
                        <?php include('includes/sidebar_stock.php'); ?>
                    </td>
                    <td style="vertical-align: top;"> 

                        <?php
                        mysql_connect("localhost", "root", "");
                        mysql_select_db("gestion_stock");
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        ?>
                          
                         <?php
session_start();
include_once("fonctions-panier.php");
 
$erreur = false;
 
$action = (isset($_POST['action'])? $_POST['action']:  (isset($_GET['action'])? $_GET['action']:null )) ;
if($action !== null)
{
   if(!in_array($action,array('ajout', 'suppression', 'refresh','Valider Bon Entree')))
   $erreur=true;
 
   //récuperation des variables en POST ou GET
   $l = (isset($_POST['l'])? $_POST['l']:  (isset($_GET['l'])? $_GET['l']:null )) ;
  // $p = (isset($_POST['p'])? $_POST['p']:  (isset($_GET['p'])? $_GET['p']:null )) ;
   $q = (isset($_POST['q'])? $_POST['q']:  (isset($_GET['q'])? $_GET['q']:null )) ;
   $f = (isset($_POST['f'])? $_POST['f']:  (isset($_GET['f'])? $_GET['f']:null )) ;
   $jour = (isset($_POST['jour'])? $_POST['jour']:  (isset($_GET['jour'])? $_GET['jour']:null )) ;
    $mois = (isset($_POST['mois'])? $_POST['mois']:  (isset($_GET['mois'])? $_GET['mois']:null )) ;
	 $annee = (isset($_POST['annee'])? $_POST['annee']:  (isset($_GET['annee'])? $_GET['annee']:null )) ;
 
   //Suppression des espaces verticaux
   $l = preg_replace('#\v#', '',$l);
   //On verifie que $p soit un float
  // $p = floatval($p);
 
   //On traite $q qui peut etre un entier simple ou un tableau d'entier
 
   if (is_array($q)){
      $QteArticle = array();
      $i=0;
      foreach ($q as $contenu){
         $QteArticle[$i++] = intval($contenu);
      }
   }
   else
   $q = intval($q);
 
}
 
if (!$erreur){
   switch($action){
      Case "ajout":
        // ajouterArticle($l,$q,$p);
		  ajouterArticle($l,$q);
		  ajouterFournisseur($f,$jour,$mois,$annee);
         break;
         Case "Valider Bon Entree":
      
         enregistercommende();
       
                        
         break;
      Case "suppression":
         supprimerArticle($l);
         break;
 
      Case "refresh" :
	 
	 
         for ($i = 0 ; $i < count($QteArticle) ; $i++)
         {
            modifierQTeArticle($_SESSION['panier']['libelleProduit'][$i],round($QteArticle[$i]));
         }
		  modifierFournisseur($f,$jour,$mois,$annee);
         break;
	  
      Default:
         break;
   }
}
 
?>

<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="initial-scale=1.0">
	<title>Votre panier</title>
</head>
<body>
	<form   method="post" action="bon_entree.php" name="form2" onsubmit="return verif_valider();">
	 <fieldset><legend style="caption-side: left;">Votre bon d'entree </legend>
	<table border="2" cellpadding="2" cellspacing="2" >
	<tr>
	  <td> 
	  <table style="width: 400px" border="1" cellpadding="2" cellspacing="2">
		

		
		<tr>
			<td>Libelle</td>
			<td>Quantite</td>
			
			<td>Action</td>
		</tr>
 
 
		<?php
		if (creationPanier())
		{
		   $nbArticles=count($_SESSION['panier']['libelleProduit']);
		   if ($nbArticles <= 0)
		   echo "<tr><td>Votre panier est vide </ td></tr>";
		   else
		   {
			  
		      for ($i=0 ;$i < $nbArticles ; $i++)
		      {
		         echo "<tr>";
		         echo "<td>".htmlspecialchars($_SESSION['panier']['libelleProduit'][$i])."</ td>";
		         echo "<td><input type=\"text\" size=\"4\" name=\"q[]\" value=\"".htmlspecialchars($_SESSION['panier']['qteProduit'][$i])."\"/></td>";
		       //  echo "<td>".htmlspecialchars($_SESSION['panier']['prixProduit'][$i])."</td>";
		         echo "<td><a href=\"".htmlspecialchars("bon_entree.php?action=suppression&l=".rawurlencode($_SESSION['panier']['libelleProduit'][$i]))."\">Supprimer</a></td>";
		         echo "</tr>";
		      }
 
		     /*  echo "<tr><td colspan=\"2\"> </td>";
		      echo "<td colspan=\"2\">";
		     echo "Total : ".MontantGlobal();
		      echo "</td></tr>";
 
		      echo "<tr><td colspan=\"4\">";
		      echo "<input type=\"submit\" value=\"Rafraichir\"/>";
		      echo "<input type=\"hidden\" name=\"action\" value=\"refresh\"/>";
 
		      echo "</td></tr>"; */
		   }
		}
		?>
		</table>
	  </td>
	   <td>
	   <table  border="1" cellpadding="2" cellspacing="2" >
	
	  
		<?php
		if (creationFournisseur())
		{
		   $nbfr=count($_SESSION['fournisseur']['nom_fournisseur']);
		   if ($nbfr !== 0)
		   {
		
		 //  echo "<tr><td>Nom_fournisseur</td> <td>".htmlspecialchars($_SESSION['fournisseur']['nom_fournisseur'][0])." </ td></tr> <tr> <td> Date_entree </td> <td>".htmlspecialchars($_SESSION['fournisseur']['nom_fournisseur'][0])." </ td></tr>"; 
		    
		 
		// echo "<tr><td>Nom_fournisseur</td> <td>".htmlspecialchars($_SESSION['fournisseur']['nom_fournisseur'][0])." </ td></tr> <tr> <td> Date_entree </td> <td>".htmlspecialchars($_SESSION['fournisseur']['nom_fournisseur'][0])." </ td></tr>"; 
	
   
 echo '<tr><td>';
 echo '<p>Nom Fournisseur : <select name="f" id="f" > ';
                                                       
										 echo  ' <option selected >'.htmlspecialchars($_SESSION['fournisseur']['nom_fournisseur'][0]). '</option>'  ;								
                                                             $retour = mysql_query("select distinct Nom_fournisseur from fournisseur ORDER BY Nom_fournisseur  ASC"); // afficher les classes
                                                             while ($a = mysql_fetch_array($retour)) {
                                                               // echo '<option value="' . $a['Nom_produit'] . '  ' . $a['Qte_final'] . ' ">' . $a['Nom_produit'] . '  ' . $a['Qte_final'] . '</option>';
                                                                                            
                                                             echo '<option value="' . $a['Nom_fournisseur'] . ' ">'. $a['Nom_fournisseur'] . '</option>';
                                                             }
                                                                                             
                                            echo ' </select>        
                                                  choisissez la date d entree : <select name="jour"> 
                                                    <option selected >'.htmlspecialchars($_SESSION['fournisseur']['jour'][0]).' </option>'  ;
 include('fonction_date/jour.php'); 
                                           echo '     </select>
                                                <select name="mois"> 
                                                    <option selected >'.htmlspecialchars($_SESSION['fournisseur']['mois'][0]).' </option>';
                                                     include('fonction_date/mois.php'); 
                                           echo '     </select>
                                                <select name="annee"> 
                                                    <option selected > '.htmlspecialchars($_SESSION['fournisseur']['annee'][0]).'</option>';
                                                    include('fonction_date/annee.php'); 
                                            echo '    </select> </p>'; 
		      
		}    
		}
		?>
	
	</td></tr>	
	</table>
	   </td>
	   </tr>
	  <tr><td colspan="2" align="center">
	    
		     <input type="submit" value="Modifier" />
		   <input type="hidden" name="action" value="refresh"/>&nbsp; &nbsp; &nbsp;
            <input type="submit" name="action" value="Valider Bon Entree" /> 
		   </td></tr>
	 </table>
	 </fieldset>
	</form>
	 
	<form  name="f1" method="post" action="bon_entree.php" onsubmit=" return verif();" >
	 <fieldset><legend style="caption-side: right;">choisissez une produit</legend>
	<?php
	if (creationFournisseur())
		{
		   $nbfr=count($_SESSION['fournisseur']['nom_fournisseur']);
		   if ($nbfr == 0)
		   {
			  
		   echo '<p>Nom Fournisseur : <select name="f" id="f" > ';
                                                       
																		
                                                 $retour = mysql_query("select distinct Nom_fournisseur from fournisseur ORDER BY Nom_fournisseur  ASC"); // afficher les classes
                                        while ($a = mysql_fetch_array($retour)) {
                                                                                               // echo '<option value="' . $a['Nom_produit'] . '  ' . $a['Qte_final'] . ' ">' . $a['Nom_produit'] . '  ' . $a['Qte_final'] . '</option>';
                                                                                            
                                         echo '<option value="' . $a['Nom_fournisseur'] . ' ">'. $a['Nom_fournisseur'] . '</option>';
                                                                                            
																							}
                                                                                             
                                            echo '  <option selected > </option>   </select>     
                                                  Date dentree : <select name="jour"> 
                                                    <option selected > </option>'  ;
                                              include('fonction_date/jour.php'); 
                                           echo '     </select>
                                                <select name="mois"> 
                                                    <option selected > </option>';
                                                     include('fonction_date/mois.php'); 
                                           echo '     </select>
                                                <select name="annee"> 
                                                    <option selected > 2017</option>';
                                                    include('fonction_date/annee.php'); 
                                            echo '    </select> </p>'; 
		      
		 }
		
		}
		?>
	 
	
	  
	  <p>Produit :  <select name="l" id="l" > 
                                                                                            <?php
																		
																							
																						
                                                                                            $retour = mysql_query("select * from produit ORDER BY Nom_produit  ASC"); // afficher les classes
                                                                                            while ($a = mysql_fetch_array($retour)) {
                                                                                               // echo '<option value="' . $a['Nom_produit'] . '  ' . $a['Qte_final'] . ' ">' . $a['Nom_produit'] . '  ' . $a['Qte_final'] . '</option>';
                                                                                            
                                                                                              echo '<option value="' . $a['Nom_produit'] . ' ">'. $a['Nom_produit'] . '</option>';
                                                                                            
																							}
                                                                                            ?>  
                                                                                                <option selected> </option>
                                                 </select>
	

	   
	  <p>Qte &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: 
	    <input type="number" name="q" id="q" />
	  </p>
	 
	  <p>
	    <input type="submit" name="action" id="action" value="ajout"  >
		 
	  </p>
	 </fieldset>
	</form>
</body>
</html>
                        
                    </td> 




                </tr> 


                <tr>
                    <td colspan="2" rowspan="1"> <?php include('includes/footer.php'); ?> </td> </tr>
            </table

        </div>

    </body>

</html>