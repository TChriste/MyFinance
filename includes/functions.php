<?php 
function login_bd(){
    try{
	   $bdd = new PDO('mysql:host=localhost;dbname=myfinance;charset=utf8', 'root', '');
    }catch (Exception $e){
        die('Erreur : ' . $e->getMessage());
    }
    
    return $bdd;
}

function isLogged(){
    if(isset($_SESSION['logged'])){
        return true;
    }else{
        return false;
    }
}

function login($email,$pwd,$login_auto=false){
    $bdd = login_bd();
    $req = $bdd->prepare("SELECT `id_users`, `name_users`,`first_name_users`, `email_users`, `mdp_users` FROM users WHERE `email_users`=?");
    $req->execute(array($email));
    
    while ($donnees = $req->fetch()){
	   $id = $donnees['id_users'];
       $name = $donnees['name_users'];
       $firstname = $donnees['first_name_users'];
       $email_BD = $donnees['email_users'];
       $mdp_BD = $donnees['mdp_users'];
    }
    
    if(isset($email_BD)){
        if($email_BD == $email && $mdp_BD==$pwd){
            $_SESSION['logged'] = true;
            $_SESSION['logged_id'] = $id;
            return true;
        }else{
            return false;
        }
    }else{
        return false;
    }

}

function register($name,$firstname,$email,$pwd,$pwd2,$date_naiss){
    echo $name;
    echo $firstname;
    echo $email;
    echo $pwd;
    echo $pwd2;
    echo $date_naiss;
    
    die();
    /*$req = $bdd->prepare('INSERT INTO users(name_users, first_name_users, email_users, mdp_users) VALUES(:nom, :possesseur, :console, :prix, :nbre_joueurs_max, :commentaires)');
    $req->execute(array(
	'nom' => $nom,
	'possesseur' => $possesseur,
	'console' => $console,
	'prix' => $prix,
	'nbre_joueurs_max' => $nbre_joueurs_max,
	'commentaires' => $commentaires
	));*/
}



function getLastExpenses(){
   $bdd = login_bd();
   
   $first_day = date('Y-m-d', strtotime('first day of this month')).'<br/>';
   $last_day = date('Y-m-d', strtotime('last day of this month'));
    
   $req = $bdd->prepare("SELECT e.`description_spe`, e.`date_spe`, e.`price_spe`, c.`name_cat` FROM expenses e INNER JOIN category c ON c.`id_cat` = e.`cat_spe` WHERE e.`fk_user_spe` = ? and  e.`date_spe` between ? and ? ORDER BY  e.`date_spe` DESC LIMIT 10");
   $req->execute(array($_SESSION['logged_id'],$first_day,$last_day));
  
   $table = "";
    while ($donnees = $req->fetch()){
       $table.="<tr><td>".$donnees['description_spe']."</td><td>".$donnees['name_cat']."</td><td>".$donnees['date_spe']."</td><td> CHF ".$donnees['price_spe']."</td></tr>";     
    }
    return $table;
    
}




?>