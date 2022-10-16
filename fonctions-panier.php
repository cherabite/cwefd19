<?php
 
/**
 * Verifie si le panier existe, le créé sinon
 * @return booleen
 */
function creationPanier(){
   if (!isset($_SESSION['panier'])){
      $_SESSION['panier']=array();
      $_SESSION['panier']['libelleProduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
    //  $_SESSION['panier']['prixProduit'] = array();
      $_SESSION['panier']['verrou'] = false;
   }
   return true;
}
function creationFournisseur(){
   if (!isset($_SESSION['fournisseur'])){
      $_SESSION['fournisseur']=array();
      $_SESSION['fournisseur']['nom_fournisseur'] = array();
      $_SESSION['fournisseur']['jour'] = array();
     $_SESSION['fournisseur']['mois'] = array();
	 $_SESSION['fournisseur']['annee'] = array();
      $_SESSION['fournisseur']['verrou'] = false;
   }
   return true;
}
 
 
/**
 * Ajoute un article dans le panier
 * @param string $libelleProduit
 * @param int $qteProduit
 * @param float $prixProduit
 * @return void
 */
function ajouterArticle($libelleProduit,$qteProduit){
 
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
 
      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['libelleProduit'],$libelleProduit);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
      //   array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
 function ajouterFournisseur($nom_fournisseur,$jour,$mois,$annee){
 
   //Si le panier existe
   if (creationFournisseur() && !isVerrouille_f() )
   {
      //Si le produit existe déjà on ajoute seulement la quantité
    $nb=count($_SESSION['fournisseur']['nom_fournisseur']);
  
 
      if ($nb == 0)
      
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['fournisseur']['nom_fournisseur'],$nom_fournisseur);
         array_push( $_SESSION['fournisseur']['jour'],$jour);
		   array_push( $_SESSION['fournisseur']['mois'],$mois);
		     array_push( $_SESSION['fournisseur']['annee'],$annee);
      //   array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      
	  }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
function modifierFournisseur($nom_fournisseur,$jour,$mois,$annee){
 
   //Si le panier existe
   if (creationFournisseur() && !isVerrouille_f() )
   {
      //Si le produit existe déjà on ajoute seulement la quantité
    $nb=count($_SESSION['fournisseur']['nom_fournisseur']);
  
 
         //Sinon on ajoute le produit
         $_SESSION['fournisseur']['nom_fournisseur'][0]=$nom_fournisseur;
         $_SESSION['fournisseur']['jour'][0]=$jour;
		   $_SESSION['fournisseur']['mois'][0]=$mois;
		      $_SESSION['fournisseur']['annee'][0]=$annee;
      //   array_push( $_SESSION['panier']['prixProduit'],$prixProduit);
      
	  
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
 
 
/**
 * Modifie la quantité d'un article
 * @param $libelleProduit
 * @param $qteProduit
 * @return void
 */
function modifierQTeArticle($libelleProduit,$qteProduit){
   //Si le panier éxiste
   if (creationPanier() && !isVerrouille())
   {
      //Si la quantité est positive on modifie sinon on supprime l'article
      if ($qteProduit > 0)
      {
         //Recharche du produit dans le panier
         $positionProduit = array_search($libelleProduit,  $_SESSION['panier']['libelleProduit']);
 
         if ($positionProduit !== false)
         {
            $_SESSION['panier']['qteProduit'][$positionProduit] = $qteProduit ;
         }
      }
      else
      supprimerArticle($libelleProduit);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
 
/**
 * Supprime un article du panier
 * @param $libelleProduit
 * @return unknown_type
 */
function supprimerArticle($libelleProduit){
   //Si le panier existe
   if (creationPanier() && !isVerrouille())
   {
      //Nous allons passer par un panier temporaire
      $tmp=array();
      $tmp['libelleProduit'] = array();
      $tmp['qteProduit'] = array();
     // $tmp['prixProduit'] = array();
      $tmp['verrou'] = $_SESSION['panier']['verrou'];
 
      for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
      {
         if ($_SESSION['panier']['libelleProduit'][$i] !== $libelleProduit)
         {
            array_push( $tmp['libelleProduit'],$_SESSION['panier']['libelleProduit'][$i]);
            array_push( $tmp['qteProduit'],$_SESSION['panier']['qteProduit'][$i]);
       //     array_push( $tmp['prixProduit'],$_SESSION['panier']['prixProduit'][$i]);
         }
 
      }
      //On remplace le panier en session par notre panier temporaire à jour
      $_SESSION['panier'] =  $tmp;
      //On efface notre panier temporaire
      unset($tmp);
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}
 
 
/**
 * Montant total du panier
 * @return int
 */
 /*
function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['libelleProduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}
*/ 
 
/**
 * Fonction de suppression du panier
 * @return void
 */
function supprimePanier(){
   unset($_SESSION['panier']);
}
 
/**
 * Permet de savoir si le panier est verrouillé
 * @return booleen
 */
function isVerrouille(){
   if (isset($_SESSION['panier']) && $_SESSION['panier']['verrou'])
   return true;
   else
   return false;
}
function isVerrouille_f(){
   if (isset($_SESSION['fournisseur']) && $_SESSION['fournisseur']['verrou'])
   return true;
   else
   return false;
}
 
/**
 * Compte le nombre d'articles différents dans le panier
 * @return int
 */
function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['libelleProduit']);
   else
   return 0;
 
}
function compterfournisseur()
{
   if (isset($_SESSION['fournisseur']))
   return count($_SESSION['fournisseur']['nom_fournisseur']);
   else
   return 0;
 
}
 function enregistercommende()
{
	
	
//	echo $nbr;
 
         // $_SESSION['panier'] = $panier;

//echo $panier;
                mysql_connect("localhost", "root", "");
                        mysql_select_db("gestion_stock");
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
 
                if (isset($_SESSION['panier']) && isset($_SESSION['fournisseur']) && count($_SESSION['panier']['libelleProduit']) >0 && count($_SESSION['fournisseur']['nom_fournisseur']) >0 )
					
                     {
						 
						  $nbr=compterArticles(); 
						 $req="select max(Num_bentre) from produit_entre ";
						 $res=mysql_query($req);
						 $idmax=mysql_result($res,0,"max(Num_bentre)");
						  $idmax=$idmax+1;
						
					//	table fournisseur 
				$nom_fournisseur=$_SESSION['fournisseur']['nom_fournisseur'][0];
      $jour=$_SESSION['fournisseur']['jour'][0];
	$mois=$_SESSION['fournisseur']['mois'][0];
	$annee=$_SESSION['fournisseur']['annee'][0];	
	

                             $DATE_B_ENTRE = $jour . "-" . $mois. "-" . $annee;
                           $date = date_create($DATE_B_ENTRE);
                                                                                        //$date1=new Date($DNSs);
                 $DATE_ENTREE = date_format($date, 'Y-m-d');	
					//	 
                        for($i = 0; $i < $nbr; $i++)
                     {  
				   $nom_produit= $_SESSION['panier']['libelleProduit'][$i];
                   $Qte=$_SESSION['panier']['qteProduit'][$i];
				   
				   $sql = " INSERT INTO `produit_entre`(`NOM_PRODUIT`, `Num_bentre`, `Qte_entre`, `DATE_ENTREE`, `NOM_FOURNISSEUR`) VALUES ('$nom_produit', '$idmax', '$Qte','$DATE_ENTREE','$nom_fournisseur') ";
                        
						 mysql_query($sql) or die('Erreur SQL !<br />' . $sql . '<br />' . mysql_error());
						
						 //`ID_PRODUIT`, `Nom_categorie`, `Nom_produit`, `Qte_initial`, `Qte_final`, `Seuil_produit`, `Unite_produit`, `Qte_entree`, `Qte_sortie`, `Equare`
						 $nbre = mysql_fetch_array(mysql_query("select * from produit where Nom_produit='$nom_produit'"));
						$Qte_entree0=$nbre['Qte_entree'];$Qte_sortie0=$nbre['Qte_sortie'];$Qte_final0=$nbre['Qte_final'];$Qte_initial=$nbre['Qte_initial'];
						$Qte_entree=$Qte_entree0+$Qte;$Qte_final=($Qte_initial+$Qte_entree)-$Qte_sortie0;
						   mysql_query("update produit set Qte_entree='$Qte_entree',Qte_final='$Qte_final'  where Nom_produit='$nom_produit' ");
						 //
						 
                                    ?> <SCRIPT LANGUAGE="Javascript">	alert("ok"); window.location.href = 'bon_entree.php';</SCRIPT> <?php
                                    
                          }
                          }
 
                        
                        // mysql_close();
						 unset($_SESSION['panier']);
						  unset($_SESSION['fournisseur']);
                         
	 }
?>