<?php
 mysql_connect("localhost", "root", "");
                        mysql_select_db("gestion_stock");
                        mysql_query("set character_set_server='utf8'");
                        mysql_query("set names 'utf8'");
                        for($i = 0; $i < $nbr; 214)
						{ 
						  mysql_query("update produit set Qte_entree=0,Qte_final=0, Qte_initial=0,Seuil_produit=0,Qte_sortie=0 where ID='$i' ");
                     {  
					  ?>