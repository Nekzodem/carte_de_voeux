<?php
try
{
    //$bdd = new PDO('mysql:host=localhost;dbname=carte_de_voeux','root','');
   $bdd = new PDO('mysql:host=localhost;dbname=remis_carte','remis','MZ8VxQafAC');
   $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
   $bdd->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
}
catch(Exception $e)
{
   die('Erreur : '. $e->getMessage());
}
$reponse = $bdd->prepare("INSERT INTO contact (email, message) VALUES (:email, :message)");
$reponse->bindParam(':email', $_POST['email']);
$reponse->bindParam(':message', $_POST['message']);
$reponse->execute();

$to ="remi.s@codeur.online";
$message = $_POST['message']." "."<img src='https://remis.promo-4.codeur.online/carte_de_voeux/carte_de_voeux.png'/>";
$subject = "Bonne année 2018";
$headers = 'MIME-Version: 1.0' . "\r\n";
$headers = 'Content-type: text/html; charset=UTF-8' . "\r\n";

mail($to, $subject, $message, $headers);
?>