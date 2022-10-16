<?php
mysql_connect("localhost", "root", "");
mysql_select_db("grh");
mysql_query("set character_set_server='utf8'");
mysql_query("set names 'utf8'");
//session_start();
/* * ***Verification du mot de passe *** */
if (isset($_POST['mdp'])) {
    if ($_POST['mdp'] != "" and $_POST['pseudo'] != "") {
        $mdp = $_POST['mdp'];
        $pseudo = $_POST['pseudo'];
        $nb = mysql_fetch_array(mysql_query("select count(*) as nb,type,Num from login where pseudo='$pseudo' and passe='$mdp'"));
        if ($nb['nb'] == 1) {

            $_SESSION['user'] = $nb['type'];
        } else {
            ?>	<SCRIPT LANGUAGE="Javascript">alert("Login ou mot de passe incorrect");</SCRIPT> 	<?php
        }
    } else {
        ?> 	<SCRIPT LANGUAGE="Javascript">alert("Vous devez remplir tous les champs!");</SCRIPT> 	<?php
    }
}
?>
<html>
    <head>
        <title>Connexion au site</title>
    </head>
    <body>
        <form method="post" action="verifLogin.php">
            <table border="0" width="400" align="center">
                <tr>
                    <td width="200"><b>V�tre login</b></td>
                    <td width="200">
                        <input type="text" name="login">
                    </td>
                </tr>
                <tr>
                    <td width="200"><b>V�tre mot de passe<b></td>
                                <td width="200">
                                    <input type="password" name="password">
                                </td>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        <input type="submit" name="submit" value="login">
                                    </td>
                                </tr> 
                                </table>
                                </form>
                                </body>
                                </html>